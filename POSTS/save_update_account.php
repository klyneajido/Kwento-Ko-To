<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require_once __DIR__ . '/vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Firebase\Factory;

putenv("FIRESTORE_EMULATOR_HOST=localhost:8080");
putenv("FIREBASE_AUTH_EMULATOR_HOST=localhost:9099");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $db = new FirestoreClient([
        'projectId' => 'finals-activity',
        'serviceEndpoint' => 'localhost:8080',
        'keyFilePath' => 'keys/finals-activity-firebase-adminsdk-aajm4-0da6260a64.json'
    ]);
    try {
        $userRef = $db->collection('users')->document($userId);
        $userRef->update([
            ['path' => 'name', 'value' => $name],
            ['path' => 'username', 'value' => $username],
            ['path' => 'email', 'value' => $email]
        ]);

        if ($_FILES['profile_picture']['size'] > 0) {
            $profilePicturePath = 'profile_pictures/profile_picture.jpg';
            move_uploaded_file($_FILES['profile_picture']['tmp_name'], $profilePicturePath);


            $userRef->update([
                ['path' => 'profile_picture', 'value' => $profilePicturePath]
            ]);
        }

        if ($_SESSION['email'] !== $email) {
            $factory = (new Factory())->withServiceAccount('keys/finals-activity-firebase-adminsdk-aajm4-0da6260a64.json');
            $auth = $factory->createAuth();
            $user = $auth->getUserByEmail($_SESSION['email']);
            $auth->updateUser($user->uid, ['email' => $email]);
        }
        if (!empty($_POST['password'])) {
            $factory = (new Factory())->withServiceAccount('keys/finals-activity-firebase-adminsdk-aajm4-0da6260a64.json');
            $auth = $factory->createAuth();
            $user = $auth->changeUserPassword($userId, $_POST['password']);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }

    header('Location: updateAccount.php');
    exit();
}
?>
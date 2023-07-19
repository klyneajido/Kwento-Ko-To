<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;

putenv("FIRESTORE_EMULATOR_HOST=localhost:8080");
putenv("FIREBASE_AUTH_EMULATOR_HOST=localhost:9099");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];


    $profilePicture = $_FILES['profile_picture'];
    $profilePictureName = $profilePicture['name'];
    $profilePictureTmpName = $profilePicture['tmp_name'];
    $profilePictureError = $profilePicture['error'];

    if ($profilePictureError === UPLOAD_ERR_OK) {
        $uploadDir = 'profile_pictures/';
        $profilePicturePath = $uploadDir . $profilePictureName;

        if (move_uploaded_file($profilePictureTmpName, $profilePicturePath)) {
            $userProps = [
                'email' => $email,
                'password' => $password
            ];
        } else {
            $_SESSION['error_message'] = "Error: Failed to move uploaded file.";
            header('Location: signup.php');
            exit();
        }
    } else {
        $profilePicturePath = 'profile_pictures/default.png';

        $userProps = [
            'email' => $email,
            'password' => $password
        ];
    }

    $db = new FirestoreClient([
        'projectId' => 'finals-activity',
        'keyFilePath' => 'keys/finals-activity-firebase-adminsdk-aajm4-0da6260a64.json'
    ]);

    try {
        $existingEmailQuery = $db->collection('users')
            ->where('email', '=', $email)
            ->limit(1);
        $existingEmailDocs = $existingEmailQuery->documents();
        if (!$existingEmailDocs->isEmpty()) {
            $_SESSION['error_message'] = "Error: The email is already taken. Please choose a different email.";
            header('Location: signup.php?error=' . urlencode($_SESSION['error_message']));
            exit();
        }
        $existingUsernameQuery = $db->collection('users')
            ->where('username', '=', $username)
            ->limit(1);
        $existingUsernameDocs = $existingUsernameQuery->documents();
        if (!$existingUsernameDocs->isEmpty()) {
            $_SESSION['error_message'] = "Error: The username is already taken. Please choose a different username.";
            header('Location: signup.php?error=' . urlencode($_SESSION['error_message']));
            exit();
        }
        $uid = uniqid();
        $userRef = $db->collection('users')->document($uid);
        $userRef->set([
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'profile_picture' => $profilePicturePath
        ]);
        $userProps['uid'] = $uid;
        $factory = (new Kreait\Firebase\Factory())->withServiceAccount('keys/finals-activity-firebase-adminsdk-aajm4-0da6260a64.json');
        $auth = $factory->createAuth();
        $user = $auth->createUser($userProps);
        header('Location: login.php');
        exit();
    } catch (Exception $e) {
        $_SESSION['error_message'] = "Error: " . $e->getMessage();
        header('Location: signup.php?error=' . urlencode($_SESSION['error_message']));
        exit();
    }
}
?>
<?php
// authenticate.php
session_start();
use Kreait\Firebase\Exception\Auth\UserNotFound;
use Kreait\Firebase\Factory;

require_once __DIR__ . '/vendor/autoload.php';

putenv("FIREBASE_AUTH_EMULATOR_HOST=localhost:9099");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    $email = $_POST['email'];

    $factory = (new Factory)->withServiceAccount('keys/finals-activity-firebase-adminsdk-aajm4-0da6260a64.json');

    $auth = $factory->createAuth();

    try {
        $attemptSignIn = $auth->signInWithEmailAndPassword($email, $password);
        $_SESSION['user_id'] = $attemptSignIn->firebaseUserId();
        $_SESSION['email'] = $email;
        echo "User ID: " . $_SESSION['user_id'];
        header('Location: index.php');
        exit();
    } catch (UserNotFound $e) {
        $_SESSION['error_message'] = 'Invalid credentials';
        header('Location: login.php');
        exit();
    } catch (Exception $e) {
        $error = "Error: " . $e->getMessage();
        header('Location: login.php?error=' . urlencode($error));
        exit();
    }
}
$_SESSION['error_message'] = 'Invalid request';
header('Location: login.php');
exit();
?>
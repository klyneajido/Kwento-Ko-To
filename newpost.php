<?php


date_default_timezone_set('Asia/Manila');

require_once __DIR__ . '/vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Firestore\FieldValue;

putenv("FIRESTORE_EMULATOR_HOST=localhost:8080");


$firestore = new FirestoreClient([
    'projectId' => 'finals-activity',
]);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $content = $_POST['content'];


    session_start();
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];

        $postsRef = $firestore->collection('posts');
        $postsRef->add([
            'content' => $content,
            'user_id' => $userId,
            'likes' => 0,
            'likes_by_users' => [],
            'created_at' => FieldValue::serverTimestamp(),
        ]);
    }
}

header("Location: index.php");
exit();
?>
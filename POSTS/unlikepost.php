<?php
require_once __DIR__.'/vendor/autoload.php';

use Google\Cloud\Firestore\FieldValue;
use Google\Cloud\Firestore\FirestoreClient;

putenv("FIRESTORE_EMULATOR_HOST=localhost:8080");

$firestore = new FirestoreClient([
    'projectId' => 'finals-activity',
]);

if (isset($_POST['postId'])) {
    $postId = $_POST['postId'];
} else {
    echo "Post ID not found.";
    exit();
}
session_start();
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    echo "User ID not found.";
    exit();
}
$postRef = $firestore->collection('posts')->document($postId);
$postData = $postRef->snapshot()->data();

if ($postData) {
    $likesByUsers = $postData['likes_by_users'] ?? [];
    if (in_array($userId, $likesByUsers)) {

        $postRef->update([
            ['path' => 'likes', 'value' => $postData['likes'] - 1],
        ]);
        $postRef->update([
            ['path' => 'likes_by_users', 'value' => FieldValue::arrayRemove([$userId])],
        ]);
    }
}


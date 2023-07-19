<?php

require_once __DIR__ . '/vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Firestore\FieldValue;

putenv("FIRESTORE_EMULATOR_HOST=localhost:8080");

$firestore = new FirestoreClient([
    'projectId' => 'finals-activity',
]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $commentId = $_POST['commentId'];
    $postId = $_POST['postId'];

    session_start();
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];

        $commentDocRef = $firestore->collection('post_comments')->document($postId);
        $commentData = $commentDocRef->snapshot()->data();

        if (isset($commentData['comments'])) {
            $comments = $commentData['comments'];

            foreach ($comments as $index => $comment) {
                if ($comment['comment_id'] === $commentId) {
                    if ($comment['user_id'] === $userId) {
                        unset($comments[$index]);
                        $commentDocRef->set(['comments' => $comments], ['merge' => true]);
                    } else {
                        $error = "You are not authorized to delete this comment.";
                        header("Location: commentsec.php?postId=$postId&error=$error");
                        exit();
                    }
                    break;
                }
            }
            header("Location: commentsec.php?postId=$postId&success=true");
            exit();
        } else {
            $error = "No comments available for this post.";
            header("Location: commentsec.php?postId=$postId&error=$error");
            exit();
        }
    }
}

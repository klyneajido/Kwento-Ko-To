<!-- commentsec.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'assets\head.php' ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Section</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.0.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.0.1/firebase-firestore.js"></script>
    <link rel="stylesheet" href="css/commentsec-css.php">
    <script src="https://kit.fontawesome.com/0dcd39d035.js" crossorigin="anonymous"></script>

    <style>

    </style>
</head>

<body>
    <div id="particles-js"></div>
    <?php session_start(); ?>
    <?php include 'assets\header.php' ?>
    <?php include 'css\index-css.php'; ?>
    <?php
    require_once __DIR__ . '/vendor/autoload.php';

    use Google\Cloud\Firestore\FirestoreClient;
    use Google\Cloud\Firestore\FieldValue;

    putenv("FIRESTORE_EMULATOR_HOST=localhost:8080");
    $firestore = new FirestoreClient([
        'projectId' => 'finals-activity',
    ]);
    if (isset($_GET['postId'])) {
        $postId = $_GET['postId'];
    } else {
        echo "Post ID not found.";
        exit();
    }

    $postRef = $firestore->collection('posts')->document($postId);
    $postData = $postRef->snapshot()->data();

    if ($postData) {
        $postContent = $postData['content'];
        $userId = $postData['user_id'];
        $userDoc = $firestore->collection('users')->document($userId)->snapshot();
        $username = $userDoc->get('username');
        $likesCount = $postData['likes'] ?? 0;

        $createdAt = $postData['created_at']->get()->format('g:i A');
        $profilePicture = $userDoc->get('profile_picture');
        $commentsRef = $firestore->collection('post_comments')->document($postId);
        $commentsData = $commentsRef->snapshot()->data();

        $commentCount = 0;
        if (isset($commentsData['comments'])) {
            $commentCount = count($commentsData['comments']);
        }
        echo "<div class='post-container'>";
        echo "<div class='profile'>";
        echo "<img class='profile_picture' src='$profilePicture' alt='Profile Picture'>";
        echo "<div class='name_time'>";
        echo "<h3>$username<span class='time'>$createdAt</span></h3>";
        echo "</div>";
        echo "</div>";
        echo "<p class='post-content'>$postContent</p>";
        echo "<div class='meta'>";
        echo "<span>Likes: $likesCount</span>";
        echo "<span>Comments: $commentCount</span>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "Post not found.";
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $commentContent = $_POST['comment'];
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $commentsRef = $firestore->collection('post_comments')->document($postId);
            $commentsData = $commentsRef->snapshot()->data();
            if (!isset($commentsData['comments'])) {
                $commentsRef->set(['comments' => []]);
            }
            $commentsRef->update([
                [
                    'path' => 'comments',
                    'value' => FieldValue::arrayUnion([
                        [
                            'comment_id' => uniqid(),
                            'comment' => $commentContent,
                            'user_id' => $userId,
                            'comment_time' => new \Google\Cloud\Core\Timestamp(new \DateTime()),
                        ],
                    ]),
                ],
            ]);

        }
    }

    $commentsRef = $firestore->collection('post_comments')->document($postId);
    $commentsData = $commentsRef->snapshot()->data();
    if (isset($commentsData['comments'])) {
        $comments = $commentsData['comments'];
        echo '
        <form class="post-comment" method="POST" action="commentsec.php?postId=' . $postId . '">
            <textarea name="comment" placeholder="Add a comment"></textarea>
            <button type="submit">Post Comment</button>
        </form>
        ';

        echo "<div class='comments-container'>";
        echo "<h3>Comments</h3>";
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            echo "<p class='error'>Error: $error</p>";
        }


        foreach ($comments as $comment) {
            $commentId = $comment['comment_id'];
            $commentContent = $comment['comment'];
            $commentUserId = $comment['user_id'];
            $commentTime = $comment['comment_time']->get()->format('g:i A');


            $userRef = $firestore->collection('users')->document($commentUserId);
            $userSnapshot = $userRef->snapshot();

            if ($userSnapshot->exists()) {
                $userData = $userSnapshot->data();
                $commenterUsername = $userData['username'];
                $commenterProfilePicture = $userData['profile_picture'];

                echo "<div class='comment'>";
                echo "<div class='comment-details'>";
                echo "<div class='comment-name-time'>";
                echo "<img class='comment-profile-picture' src='$commenterProfilePicture' alt='Profile Picture'>";
                echo "<h3>$commenterUsername<span class='time'>$commentTime</span></h3>";
                echo "<form class='delete-comment' method='POST' action='deleteComment.php?postId=$postId'>";
                echo "<input type='hidden' name='postId' value='$postId'>";
                echo "<input type='hidden' name='commentId' value='$commentId'>";
                echo "<div class='delete-comment-button'>";

                echo "<button  type='submit'><i class='fa-solid fa-trash'></i></button>";
                echo "</div>";
                echo "</form>";
                echo "</div>";
                echo "<p class='comment-content'>$commentContent</p>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "User not found for comment: $commentId. User ID: $commentUserId. Skipping this comment.<br>";
                error_log("User not found for comment: $commentId. User ID: $commentUserId");
            }
        }
        echo "</div>";
    } else {
        echo "<div class='no-comment-title'> <p>No comments available for this post.<p></div>";
        echo '
        <form class="post-comment" method="POST" action="commentsec.php?postId=' . $postId . '">
            <textarea name="comment" placeholder="Add a comment"></textarea>
            <button type="submit">Post Comment</button>
        </form>
        ';
    }

    ?>
    <?php include 'css/commentsec-css.php'; ?>
</body>

</html>
<style>
    .error{
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #f5c6cb;
        border-radius: 4px;
    }
</style>
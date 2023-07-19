<?php
require_once __DIR__ . '/vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;

putenv("FIRESTORE_EMULATOR_HOST=localhost:8080");


$firestore = new FirestoreClient([
    'projectId' => 'finals-activity',
]);

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
} else {
    $searchTerm = '';
}

$searchTerm = trim($searchTerm);

$pattern = '/' . preg_quote($searchTerm, '/') . '/i';

$postsRef = $firestore->collection('posts');
$query = $postsRef->orderBy('content');
$posts = $query->documents();

$filteredPosts = [];
foreach ($posts as $post) {
    $content = $post->get('content');
    $userId = $post->get('user_id');

    $userDoc = $firestore->collection('users')->document($userId)->snapshot();
    $username = $userDoc->exists() ? $userDoc->get('username') : '';
    $profilePicture = $userDoc->exists() ? $userDoc->get('profile_picture') : '';

    if (preg_match($pattern, $content) || preg_match($pattern, $username)) {
        $filteredPosts[] = [
            'post' => $post,
            'username' => $username,
            'profilePicture' => $profilePicture
        ];
    }

}

?>

<!DOCTYPE html>
<html>

<head>
    <title>KKT Search</title>
    <?php include 'assets\head.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.0.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.0.1/firebase-firestore.js"></script>
    <?php include 'css\index-css.php' ?>
</head>

<body>
    <?php include 'assets\header.php' ?>
    <?php
    echo "<div id='particles-js'></div>";
    if (empty($filteredPosts)) {
        echo "<div class='no-posts'>";
        echo "No posts found matching the search term: $searchTerm";
        echo "</div>";
    } else {
        echo "<div class='cards'>";
        echo "<div class='searchTerm'>";
        echo "Search results for: $searchTerm";
        echo "</div>";
        foreach ($filteredPosts as $filteredPost) {
            $post = $filteredPost['post'];
            $username = $filteredPost['username'];
            $profilePicture = $filteredPost['profilePicture'];
            $postId = $post->id();
            $content = $post->get('content');

            $createdAt = $post->get('created_at')->get()->format('g:i A');
            $likeCount = $post->get('likes');
            $commentsRef = $firestore->collection('post_comments')->document($postId);
            $commentsData = $commentsRef->snapshot()->data();

            $commentCount = 0;
            if (isset($commentsData['comments'])) {
                $commentCount = count($commentsData['comments']);
            }

            echo "<div class='post-card'>";
            echo '
<div class="profile">
    <img class="profile_picture" src="' . $profilePicture . '" alt="Profile Picture">
    
    <div class="name_time">
        <h3>
            ' . $username . '
            <span class="time">
                ' . $createdAt . '
            </span>
        </h3>
    </div>
</div>';
            echo "<p>";
            echo $content;
            echo "</p>";
            echo "<div class='meta'>";
            echo "<span class='likes'>Likes: ";
            echo $likeCount;
            echo "</span>";
            echo "<span>Comments: ";
            echo $commentCount;
            echo "</span>";
            echo "</div>";
            echo "<div class='actions'>";
            echo "<a href='commentsec.php?postId=$postId'><i class='ri-discuss-line'></i></a>";
            echo "<form id='likeForm' method='POST' action='likepost.php'>";
            echo "<input type='hidden' name='postId' value='$postId'>";
            echo "<button type='submit' class='like'><i class='ri-thumb-up-line'></i></button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }

        echo "</div>";
    }
    ?>
    <script src="functions/index.js"></script>
    <script src="assets\particles.js"></script>
    <script src="assets\app.js"></script>
</body>

</html>
<style>
    .searchTerm {
        font-size: 30px;
        margin: 20px;
    }

    .time {
        font-size: 12px;
        color: #888;
        margin-left: 10px;
    }

    .likes {
        margin-right: 10px;
    }
</style>
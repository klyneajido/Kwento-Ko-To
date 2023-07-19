<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>

    <title>KKT Homepage</title>
    <?php include 'assets\head.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.0.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.0.1/firebase-firestore.js"></script>

    <?php include 'css\index-css.php' ?>
</head>

<body>
    <div id="particles-js"></div>
    <?php include 'assets\header.php' ?>
    <div class="create-post-text">
        <p id="hover-area">Create a post?</p>
    </div>
    <div class="post-form">
        <form id="reveal" method="POST" action="newpost.php">
            <input autocomplete="off" type="text" name="content" placeholder="Write a post">
            <button type="submit">Post</button>
        </form>
    </div>

    <?php

    date_default_timezone_set('Asia/Manila');

    require_once __DIR__ . '/vendor/autoload.php';

    use Google\Cloud\Firestore\FirestoreClient;

    putenv("FIRESTORE_EMULATOR_HOST=localhost:8080");

    $firestore = new FirestoreClient([
        'projectId' => 'finals-activity',
    ]);

    $postsRef = $firestore->collection('posts');
    $postsQuery = $postsRef->documents();


    if ($postsQuery->isEmpty()) {
        echo "<div class='no-posts'>";
        echo "No posts available.";
        echo "</div>";
    } else {
        echo "<div class='cards'>";

        foreach ($postsQuery as $document) {
            $postId = $document->id();
            $content = $document->get('content');
            $userId = $document->get('user_id');
            $likesCount = $document->get('likes', 0);
            $createdAt = $document->get('created_at')->get()->format('g:i A');


            $userDoc = $firestore->collection('users')->document($userId)->snapshot();
            $username = $userDoc->get('username');
            $profilePicture = $userDoc->get('profile_picture');


            $commentsRef = $firestore->collection('post_comments')->document($postId);
            $commentsData = $commentsRef->snapshot()->data();

            $commentCount = 0;
            if (isset($commentsData['comments'])) {
                $commentCount = count($commentsData['comments']);
            }

            ?>
            <div class="post-card">

                <div class="profile">
                    <img class="profile_picture" src="<?php echo $profilePicture; ?>" alt="Profile Picture">
                    <div class="name_time">
                        <h3>
                            <?php echo $username; ?>
                            <span class="time">
                                <?php echo $createdAt; ?>
                            </span>
                        </h3>
                    </div>
                </div>
                <p>
                    <?php echo $content; ?>
                </p>
                <div class="meta">
                    <span>Likes:
                        <?php echo $likesCount; ?>
                    </span>
                    <span>Comments:
                        <?php echo $commentCount; ?>
                    </span>
                </div>
                <div class="actions">
                    <a href="commentsec.php?postId=<?php echo $postId; ?>"><i class="ri-discuss-line"></i></a>
                    <form id="likeForm" method="POST" action="likepost.php">
                        <input type="hidden" name="postId" value="<?php echo $postId; ?>">
                        <button type="submit" class="like"><i class="ri-thumb-up-line"></i></button>
                    </form>
                </div>
            </div>
            <?php
        }
        echo "</div>";
    }
    ?>
    <script src="functions/index.js"></script>
    <script>
        $(document).ready(function () {

            function updateCommentCount(postId, commentCount) {
                $("#commentCount-" + postId).text(commentCount);
            }


            firebase.initializeApp({
                projectId: 'finals-activity'
            });

            const firestore = firebase.firestore();
            const postCommentsRef = firestore.collection('post_comments');


            postCommentsRef.onSnapshot(snapshot => {
                snapshot.docChanges().forEach(change => {
                    const postId = change.doc.id;
                    const commentCount = change.doc.data().comments.length;


                    updateCommentCount(postId, commentCount);
                });
            });
        });
    </script>
    <script>$(document).ready(function () {
            $("#hover-area").click(function () {
                $("#reveal").slideToggle(300);
            });
        });</script>
    <script src="assets\particles.js"></script>
    <script src="assets\app.js"></script>
</body>

</html>
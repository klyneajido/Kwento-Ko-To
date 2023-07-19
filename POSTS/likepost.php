<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
    $url = 'http://localhost:5001/finals-activity/us-central1/likepost';
    $data = [
        'postId' => $postId,
        'userId' => $userId,
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $response = curl_exec($ch);

    if ($response === false) {
        echo "Failed to invoke Firebase Function.";
    } else {
        header("Location: index.php");
        exit();
    }

    curl_close($ch);
} else {
    echo "Invalid request method.";
}
?>
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require_once __DIR__ . '/vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;

putenv("FIRESTORE_EMULATOR_HOST=localhost:8080");

$db = new FirestoreClient([
    'projectId' => 'finals-activity',
]);

$userId = $_SESSION['user_id'];

$userRef = $db->collection('users')->document($userId);
$userData = $userRef->snapshot()->data();

$name = $userData['name'];
$username = $userData['username'];
$email = $userData['email'];
$profilePicture = $userData['profile_picture'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Account</title>
    <?php include 'assets\head.php'; ?>
</head>

<body>
    <div id="particles-js"></div>
    <div class="main-container">
        <?php include 'assets\header.php'; ?>
        <div class="container">
            <h2>Update Account Information</h2>
            <?php if (isset($_GET['error'])): ?>
                <p>
                    <?php echo $_GET['error']; ?>
                </p>
            <?php endif; ?>
            <form method="POST" action="save_update_account.php" enctype="multipart/form-data">
                <div class="pfp">
                    <label>Profile Picture</label>
                    <div class="image-input">
                        <div class="image-preview-container">
                            <?php if ($profilePicture): ?>
                                <img id="imagePreview" src="<?php echo $profilePicture; ?>" class="image-preview"
                                    alt="Selected Image">
                            <?php else: ?>
                                <img id="imagePreview" src="" class="image-preview" alt="Selected Image">
                            <?php endif; ?>
                            <button type="button" class="choose-image-button"
                                onclick="document.getElementById('imageInput').click()">Choose Image</button>
                            <input type="file" accept="image/*" id="imageInput" name="profile_picture"
                                style="display: none;" onchange="previewImage(event)">
                        </div>
                    </div>
                </div>
                <label>Name:</label>
                <input type="text" name="name" value="<?php echo $name; ?>" required>

                <label>Username:</label>
                <input type="text" name="username" value="<?php echo $username; ?>" required>

                <label>Email:</label>
                <input type="email" name="email" value="<?php echo $email; ?>" required>

                <label>New Password:</label>
                <input type="password" name="password">

                <input type="submit" value="Update">
            </form>
        </div>
    </div>
    <script src="assets\particles.js"></script>
    <script src="assets\app.js"></script>
    <?php include 'css/updateaccount-css.php'; ?>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var imagePreview = document.getElementById('imagePreview');
                imagePreview.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>
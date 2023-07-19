<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php include 'css/signup-css.php'; ?>
</head>

<body>
    <div class="main-container">
        <div class="background">
            <?php include "svg\Fill out-bro.svg" ?>
        </div>
        <div class="container">
            <h2>Signup</h2>
            <?php if (isset($_GET['error'])): ?>
    <p class="error-message">
        <?php echo $_GET['error']; ?>
    </p>
<?php endif; ?>


            <form method="POST" action="saveuser.php" enctype="multipart/form-data">
                <div class="pfp">
                    <label>Profile Picture</label>
                    <div class="image-input">
                        <input type="file" accept="image/*" id="imageInput" name="profile_picture">
                        <label for="imageInput" class="image-button">Choose image</label>
                        <div class="image-preview-container">
                            <img src="" class="image-preview" alt="Selected Image">
                        </div>
                        <span class="change-image">Choose different image</span>
                    </div>
                </div>
                <label>Name:</label>
                <input autocomplete="off" type="text" name="name" required>
                <label>Username:</label>
                <input autocomplete="off" type="text" name="username" required>
                <label>Email:</label>
                <input autocomplete="off" type="email" name="email" required>
                <label>Password:</label>
                <input type="password" name="password" id="password" required>
                <label>Confirm Password:</label>
                <input type="password" name="confirm_password" id="confirmPassword" required>
                <input type="submit" value="Signup">
            </form>
            <div class="login-link">
                Already have an account? <a href="login.php">Login</a>
            </div>
        </div>
    </div>
    <script>
        var password = document.getElementById("password");
        var confirmPassword = document.getElementById("confirmPassword");

        function validatePassword() {
            if (password.value != confirmPassword.value) {
                confirmPassword.setCustomValidity("Passwords do not match");
            } else {
                confirmPassword.setCustomValidity("");
            }
        }

        password.onchange = validatePassword;
        confirmPassword.onkeyup = validatePassword;

        $('#imageInput').on('change', function () {
            $input = $(this);
            if ($input.val().length > 0) {
                fileReader = new FileReader();
                fileReader.onload = function (data) {
                    $('.image-preview').attr('src', data.target.result);
                }
                fileReader.readAsDataURL($input.prop('files')[0]);
                $('.image-button').css('display', 'none');
                $('.image-preview').css('display', 'block');
                $('.change-image').css('display', 'block');
            }
        });

        $('.change-image').on('click', function () {
            $control = $(this);
            $('#imageInput').val('');
            $preview = $('.image-preview');
            $preview.attr('src', '');
            $preview.css('display', 'none');
            $control.css('display', 'none');
            $('.image-button').css('display', 'block');
        });
    </script>
</body>

</html>
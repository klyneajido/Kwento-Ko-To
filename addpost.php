<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2>add post</h2>
        <?php if (isset($_GET['error'])): ?>
            <p>
                <?php echo $_GET['error']; ?>
            </p>
        <?php endif; ?>
        <form method="POST" action="newnewpost.php">
            <label>title</label>
            <input type="text" name="title" required>

            <label>comment</label>
            <input type="text" name="comment" required>

            <input type="submit" value="addpost">
        </form>

    </div>
</body>

<style>
    body {
        font-family: 'Roboto-Mono';
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f2f2f2;
    }

    .container {
        width: 400px;
        padding: 40px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 8px;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 8px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        padding: 10px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        padding: 10px;
        background-color: black;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #333;
    }

    .login-link {
        text-align: center;
        margin-top: 16px;
    }

    .login-link a {
        color: blue;
        text-decoration: underline;
    }
</style>

</html>
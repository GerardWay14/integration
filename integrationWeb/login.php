<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="login2.css" rel="stylesheet">
</head>

<body>
    </style>
    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message']['alert'];
        echo $_SESSION['message']['text'];
    }
    unset($_SESSION['message']);
    ?>

    <div class="login-box">
        <div class="form">
            <form class="login-form" action="login_query.php" accept="" method="POST">
                <input type="text" placeholder="username" name="username" />
                <input type="password" placeholder="password" name="password" />
                <button name="login">Login</button>
                <p class="message">Not registered? <a href="register.php">Create an account</a></p>
            </form>
        </div>
    </div>
</body>

</html>
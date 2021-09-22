<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/public/styles/login.css">
</head>
<body>
    <?php include 'views/nav.php'; ?>
    <form class="form" name="Login" action="" method="POST" autocomplete="off">
        <div class="form__user-icon"></div>
        <div class="container">
            <input class="container__field" type="text" name="username" placeholder="Username" tabindex="1" title="Enter your username" >
            <input class="container__field" type="password" name="password" placeholder="Password" tabindex="0" title="Enter your password" >
            <div class="container__btn-login">
                <input type="submit" class="btn-send" value="Login">
            </div>
            <div class="form__register">
                <p class="form__register-link">Do not have account? <a href="<?php echo constant('URL'); ?>/Register">Register here</a></p>
            </div>
        </div>
    </form>
    <script src="<?php echo constant('URL'); ?>/public/scripts/login.js"></script>
</body>
</html>
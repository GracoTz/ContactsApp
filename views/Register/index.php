<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regiter User</title>
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/public/styles/register.css">
</head>
<body>
    <?php printError($this->error); ?>
    <?php include 'views/nav.php'; ?>
    <form class="form" name="Register" action="<?php echo constant('URL'); ?>/Register/createNewUser" method="POST" autocomplete="off" onsubmit="return validateRegister()" enctype="multipart/form-data">
        <div class="form__title">
            <h2>Create Your Account</h2>
        </div>
        <div class="container">
            <div class="container__photo">
                <label for="photo" class="button-photo">Upload Photo</label>
                <input accept="image/jpeg, image/png" type="file" name="photo" style="display: none;" id="photo">
            </div>
            <input class="container__field" type="text" name="name" placeholder="Fullname" value="<?php echo $this->name; ?>" tabindex="1" title="Enter your Fullname">
            <input class="container__field" type="text" name="username" placeholder="Username" value="<?php echo $this->username; ?>" tabindex="0" title="Enter your Username">
            <input class="container__field" type="password" name="password" placeholder="Password" value="<?php echo $this->password; ?>" tabindex="0" title="Enter your Passoword">
            <div class="container__btn-register">
                <input type="submit" value="Register" class="btn-register" name="btn-register">
            </div>
            <p class="container__login-link">I already have an account. <a href="<?php echo constant('URL'); ?>/Login">Log in</a></p>
        </div>
    </form>
    <script src="<?php echo constant('URL'); ?>/public/scripts/register.js"></script>
</body>
</html>
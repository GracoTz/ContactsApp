<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts App</title>
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/public/styles/forms2.css">
</head>
<body>
    <?php include 'views/nav.php'; ?>
    <form name="ADD" action="" method="POST" autocomplete="off">
        <div class="user-icon"></div>
        <div class="container">
            <input type="text" name="name" placeholder="Name" required>
            <input type="number" name="phone" placeholder="Phone Number" required>
            <input type="submit" value="Add Contact" id="btn-send">
        </div>
    </form>
    <script src="<?php echo constant('URL'); ?>/public/scripts/addC.js"></script>
</body>
</html>
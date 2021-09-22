<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/public/styles/contacts.css">
</head>
<body>
    <?php include 'views/nav.php'; ?>
    <h1>Contacts</h1>
    <div id="back">X</div>

    <div class="container">
        <?php printContacts($this->contacts); ?>
    </div>
    <script src="<?php echo constant('URL'); ?>/public/scripts/contacts.js"></script>
</body>
</html>
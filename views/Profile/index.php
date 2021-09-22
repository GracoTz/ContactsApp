<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact App</title>
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/public/styles/profile.css">
</head>
<body>
    <!-- Top Nav-->
    <div class="topnav">
        <div class="icon"></div>
        <span class="appname"> ContactsApp</span>
        <div class="topnav-right">
            <div class="btn-submenu">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <div class="dropdown-content">
                <a href="<?php echo constant('URL'); ?>/Profile/logout" id="close-session">Close Session</a>
            </div>
        </div>
    </div>
    
    <div class="container">
        <h1>Welcome</h1><br>
        <div class="user-photo"></div>
        <h2><?php echo $_SESSION['name'];?></h2>
        <h3><?php echo $_SESSION['user'];?></h3>
        <h5>Total Contacts: (<span id="num"></span>)</h5>
        <div class="buttons">
            <a href="<?php echo constant("URL"); ?>/Contacts" class="btn-1">See Contacts</a>
            <a href="<?php echo constant("URL"); ?>/Contacts/addContact" class="btn-2">Add Contact</a>
        </div>
    </div>
    <script src="<?php echo constant('URL'); ?>/public/scripts/profile.js"></script>
</body>
</html>
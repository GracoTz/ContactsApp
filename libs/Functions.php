<?php

    // This function return the correct value of data inserted
    function test_input($data) {
        $data = trim($data);  // Remove the whitespaces before and after of the data
        $data = stripslashes($data);  // Remove the innecesary backslashes
        $data = htmlspecialchars($data);  // Convert special characters to HTML entries
        return $data;
    }

    function printContacts($contacts) {
        foreach ($contacts as $contact) {
            echo "<div class='contact' id='row-".$contact['id']."'>
                    <h3>".$contact['name']."</h3>
                    <h4>".$contact['phone']."</h4>
                    <div class='buttons'>
                        <a href='".constant('URL')."/Contacts/seeContact/".$contact['id']."' class='btn-edit'>Edit</a>
                        <button data-id='".$contact['id']."' data-name='".$contact['name']."' class='btn-delete'>Delete</button>
                    </div>
                </div>";
        }
    }

    function printError($err) {
        if ($err != '') {
            echo "<div class='err_msg'>$err</div>";
        }
    }

    function checkImageProfile($file, $user) {
        $target_dir = 'public/usersPhotos/';
        $target_file = $target_dir . basename($file['photo']['name']);
        $file_size = $file['photo']['size'];
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $uploadOk = 1;
        $file_name = 'user-'.$user.".".$imageFileType;
        $target_finish = $target_dir . basename($file_name);
        $check = getimagesize($file['photo']['tmp_name']);

        // check if image file is actual image or fake image
        if ($check == false) {
            return ['msg' => "File is not an image.", 'ok' => 0];
        }

        if (file_exists($target_finish)) {
            return ['msg' => "That username already exists.", 'ok' => 0];
        }

        // Check file size
        if ($file_size > 500000) {
            return ['msg' => "Sorry, your file is too large", 'ok' => 0];
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            return ['msg' => "Sorry, only JPG, JPEG and PNG files are allowed", 'ok' => 0];
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk != 1) {
            return ['msg' => "Sorry, your file was not uploaded.", 'ok' => 0];
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($file['photo']['tmp_name'], $target_finish)) {
                return ['photo' => $file_name, 'ok' => 1];
            } else {
                return ['msg' => "Sorry, there was an error uploading your file.", 'ok' => 0];
            }
        }
    }
?>
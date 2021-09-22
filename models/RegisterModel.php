<?php
    class RegisterModel extends Model {

        public function __construct(){parent::__construct();}

        public function createUser($user) {
            $passEncrypt = password_hash($user['pass'], PASSWORD_DEFAULT, ['cost' => 10]);
            $sql = "INSERT INTO users (USERNAME, PASSWORD, FULLNAME, PHOTO_PROFILE) VALUES (:user, :pass, :name, :photo)";
            try {    
                $query = $this->db->connect()->prepare($sql);
                $query->execute([
                    'user'  => $user['user'],
                    'pass'  => $passEncrypt,
                    'name'  => $user['name'],
                    'photo' => $user['photo']
                ]);
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }
    }
?>

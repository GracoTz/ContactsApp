<?php
    class LoginModel extends Model {

        public function __construct(){parent::__construct();}

        public function userExists($user) {
            $userDB = '';
            $passDB = '';
            $nameDB = '';
            try {
                $query = $this->db->connect()->prepare("SELECT * FROM users WHERE USERNAME = :user");
                $query->execute(['user' => $user['user']]);
                while ($row = $query->fetch()) {
                    $userDB = $row['USERNAME'];
                    $passDB = $row['PASSWORD'];
                    $nameDB = $row['FULLNAME'];
                }
                if (password_verify($user['pass'], $passDB) && $user['user'] == $userDB) {
                    return ['ok' => true, 'name' => $nameDB];
                } else {
                    return ['ok' => false];
                }
            } catch (PDOException $e) {
                return false;
            }
        }
    }
?>

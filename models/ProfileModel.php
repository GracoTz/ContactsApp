<?php 
    class ProfileModel extends Model {
        public function __construct() {
            parent::__construct();
        }

        public function getImage($user) {
            try {
                $query = $this->db->connect()->query("SELECT PHOTO_PROFILE FROM users WHERE USERNAME = '$user'");
                $image = $query->fetch();
                return $image['PHOTO_PROFILE'];
            } catch (PDOException $e) {
                return null;
            }
        }

        public function getLength($user) {
            try {
                $sql = "SELECT COUNT(*) FROM contacts WHERE USER = '$user'";
                $query = $this->db->connect()->query($sql);
                $amount = $query->fetch();
                return $amount['COUNT(*)'];
            } catch (PDOException $e) {
                return false;
            }
        }
    }
?>

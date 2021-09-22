<?php
    class apiModel extends Model {
        public function __construct() {
            parent::__construct();
        }

        public function getContacts() {
            try {
                $contacts = [];
                $sql = "SELECT * FROM contacts";
                $query = $this->db->connect()->query($sql);
                while ($row = $query->fetch()) {
                    $contact = [
                        'id'    => $row['ID'],
                        'name'  => $row['NAME'],
                        'phone' => $row['PHONE_NUMBER'],
                        'user'  => $row['USER']
                    ];
                    array_push($contacts,$contact);
                }
                return $contacts;
            } catch (PDOException $e) {
                return [];
            }
        }

        public function getById($id) {
            try {
                $sql = "SELECT * FROM contacts WHERE ID = '$id'";
                $query = $this->db->connect()->query($sql);
                $row = $query->fetch();
                $contact = [
                    'id'    => $row['ID'],
                    'name'  => $row['NAME'],
                    'phone' => $row['PHONE_NUMBER'],
                    'user'  => $row['USER']
                ];
                return $contact;
            } catch (PDOException $e) {
                return null;
            }
        }

        public function getUsers() {
            try {
                $users = [];
                $sql = "SELECT * FROM users";
                $query = $this->db->connect()->query($sql);
                while ($row = $query->fetch()) {
                    $user = [
                        'fullname'     => $row['FULLNAME'],
                        'username'     => $row['USERNAME'],
                        'password'     => $row['PASSWORD'],
                        'photoProfile' => $row['PHOTO_PROFILE']
                    ];
                    array_push($users,$user);
                }
                return $users;
            } catch (PDOException $e) {
                return [];
            }
        }
    }
?>
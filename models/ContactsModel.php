<?php
    class ContactsModel extends Model {
        public function __construct() {
            parent::__construct();
        }

        public function createContact($contact) {
            try {
                $sql = "INSERT INTO contacts (USER,NAME,PHONE_NUMBER) VALUES (:user,:name,:phone)";
                $query = $this->db->connect()->prepare($sql);
                $query->execute([
                    'user'  => $contact['user'],
                    'name'  => $contact['name'],
                    'phone' => $contact['phone']
                ]);
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }

        public function getData($user) {
            try {
				$items = [];
                $sql = "SELECT * FROM contacts WHERE USER = '$user' ORDER BY NAME ASC";
                $query = $this->db->connect()->query($sql);
                while ($row = $query->fetch()) {
                    $item = ['id' => $row['ID'], 'name' => $row['NAME'], 'phone' => $row['PHONE_NUMBER']];
                    array_push($items, $item);
                }
                return $items;
            } catch (PDOException $e) {
                return [];
            }
        }

        public function getContactByID($id) {
            try {
                $sql = "SELECT * FROM contacts WHERE ID = '$id'";
                $query = $this->db->connect()->query($sql);
                $contactID = $query->fetch();
                return $contactID['ID'];
            } catch (PDOException $e) {
                return false;
            }
        }

        public function updateContact($contact) {
            try {
                $sql = "UPDATE contacts SET NAME = :name, PHONE_NUMBER = :phone WHERE ID = :id";
                $query = $this->db->connect()->prepare($sql);
                $query->execute([
                    'id'    => $contact['ID'],
                    'name'  => $contact['NAME'],
                    'phone' => $contact['PHONE']
                ]);
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }

        public function deleteContact($id) {
            try {
                $this->db->connect()->query("DELETE FROM contacts WHERE ID = '$id'");
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }
    }
?>

<?php
    class api extends Controller {
        public function __construct() {}

        public function contacts($param = null) {
            if (is_null($param)) {
                $contacts = $this->model->getContacts();
                echo json_encode($contacts);
            } else {
                $contact = $this->model->getById($param[0]);
                echo json_encode($contact);
            }
        }

        public function users() {
            $users = $this->model->getUsers();
            echo json_encode($users);
        }
    }
?>
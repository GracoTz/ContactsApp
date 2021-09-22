<?php
    class Profile extends Controller {
        public function __construct() {
            parent::__construct();
            Session::start();
        }

        public function render() {
            if (isset($_SESSION['user'])) {
                $this->view->render('Profile','index');
            } else {
                header("location: ".constant('URL')."/Home");
            }
        }

        public function getProfileImage() {
            $img = $this->model->getImage($_SESSION['user']);
            echo json_encode(['img' => $img]);
        }

        public function getContactsAmount() {
            $totalContacts = $this->model->getLength($_SESSION['user']);
            echo $totalContacts;
        }

        public function logout() {
            Session::closeSession();
            header("location: ".constant('URL')."/Login");
        }
    }
?>
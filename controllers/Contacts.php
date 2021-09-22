<?php 
    class Contacts extends Controller {

        public function __construct() {
            parent::__construct();
            Session::start();
            $this->view->contacts = [];
        }

        public function render() {
            if (isset($_SESSION['user'])) {
                $contacts = $this->model->getData($_SESSION['user']);
                $this->view->contacts = $contacts;
                $this->view->render('Contacts','index');
            } else {
                header('location: '.constant('URL').'/Home');
            }
        }

        public function addContact() {
            if (isset($_SESSION['user'])) {
                $this->view->render('Contacts', 'add');
            } else {
                header('location: '.constant('URL').'/Home');
            }
        }

        public function createNewContact() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = test_input($_POST['name']);
                $phone = test_input($_POST['phone']);
                $username = $_SESSION['user'];
                $data = ['name' => $name, 'phone' => $phone, 'user' => $username];
                $this->model->createContact($data);
                echo json_encode(['msg' => "Contact created Correctly"]);
            }
        }

        public function seeContact($param = null) {
            if (isset($_SESSION['user'])) {
                $contactID = $this->model->getContactByID($param[0]);
                $_SESSION['ContactID'] = $contactID;
                $this->view->render('Contacts','edit');
            } else {
                header('location: '.constant('URL').'/Home');
            }
        }

        public function editContact() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = test_input($_POST['name']);
                $phone = test_input($_POST['phone']);
                $contactID = $_SESSION['ContactID'];
                $data = ['ID' => $contactID, 'NAME' => $name, 'PHONE' => $phone];
                $this->model->updateContact($data);
                echo json_encode(['url' => constant('URL').'/Contacts']);
            }
        }

        public function deleteContact($param = null) {
            $this->model->deleteContact($param[0]);
        }
    }
?>
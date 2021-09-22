<?php
    class Register extends Controller {
        
        public function __construct() {
            parent::__construct();
            $this->view->error = '';
            $this->view->name = $this->view->username = $this->view->password = '';
        }

        public function render() {
            Session::start();
            if (isset($_SESSION['user'])) {
                header("location: ".constant('URL')."/Profile");
            } else {
                $this->view->render('Register','index');
            }
        }

        public function createNewUser() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = test_input($_POST['name']);
                $this->view->name = $name;
                $username = test_input($_POST['username']);
                $this->view->username = $username;
                $password = test_input($_POST['password']);
                $this->view->password = $password;
                $photo = checkImageProfile($_FILES, $username);
                if ($photo['ok'] != 0) {
                    if ($password != '' && $username != '' && $name != '') {
                        $data = ['name' => $name, 'user' => $username, 'pass' => $password, 'photo' => $photo['photo']];
                        $res = $this->model->createUser($data);
                        if ($res) {
							header("location: ".constant('URL')."/Login");
						} else {
							$this->view->error = "Error to create User";
							$this->render();
						}
                    }
                } else {
                    $this->view->error = $photo['msg'];
                    $this->render();
                }
            }
        }
    }
?>

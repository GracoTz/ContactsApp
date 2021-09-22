<?php
    class Login extends Controller {
        public function __construct() {
            parent::__construct();
        }

        public function render() {
            Session::start();
            if (isset($_SESSION['user'])) {
                header("location: ".constant('URL')."/Profile");
            } else {
                $this->view->render('Login','index');
            }
        }

        public function validateUser() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = test_input($_POST['username']);
                $password = test_input($_POST['password']);
                if ($username != '' && $password != '') {
                    $result = $this->model->userExists(['user' => $username, 'pass' => $password]);
                    if ($result['ok']) {
                        Session::start();
                        $_SESSION['user'] = $username;
                        $_SESSION['name'] = $result['name'];
                        echo json_encode(['ok' => true, 'url' => constant('URL')."/Profile"]);
                    } else {
                        echo json_encode(['ok' => false, 'msg' => "The username or password is incorrect"]);
                    }
                }
            }
        }
    }
?>
<?php 
	class App {

		public function __construct() {
			// Separe the url in an array
			$url = isset($_GET['url']) ? $_GET['url'] : null;
			$url = rtrim($url, '/');
			$url = explode('/', $url);

			// if url is empty the Home.php will be open
			if (empty($url[0])) {
				$fileController = 'controllers/Home.php';
				require $fileController;
				$controller = new Home();
				$controller->render();
				return false;
			}

			// See if the controller call exists
			$fileController = 'controllers/'.$url[0].'.php';

			if (file_exists($fileController)) {
				require $fileController;
				$controller = new $url[0]();
				$controller->loadModel($url[0]);

				// Verify the numbers of parameters
				$nparam = sizeof($url);
				if ($nparam > 1) {
					if ($nparam > 2) {
						$param = [];
						for ($i=2; $i<$nparam; $i++) {
							array_push($param, $url[$i]);
						}
						$controller->{$url[1]}($param);
					} else {
						$controller->{$url[1]}();
					}
				} else {
					$controller->render();
				}
			} else {
				echo "<h1 class='error'>The $url[0] controller dont exists"; // Execute the menssage error
			}
		}

	}
?>
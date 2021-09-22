<?php
    class View {
        
        public function __construct(){}

        // This method render the view relationship with its controller
        public function render($folder, $file) {
            require "views/$folder/$file.php";
        }
    }
?>
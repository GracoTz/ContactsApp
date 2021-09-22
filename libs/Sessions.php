<?php
    class Session {
        
        static public function start() {
            session_start();
        }

        static public function closeSession() {
            session_unset();
            session_destroy();
        }
    }
?>
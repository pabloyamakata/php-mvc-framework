<?php

    function session()
    {
        if(session_status() !== PHP_SESSION_ACTIVE) session_start();

        return new class {
            
            public function has($title)
            {
                if(isset($_SESSION[$title])) return true;
                return false;
            }

            public function get($title)
            {
                $sessionVar = $_SESSION[$title];
                unset($_SESSION[$title]);

                return $sessionVar;
            }

            public function hasError($field)
            {
                if(isset($_SESSION['errors'][$field])) return true;
                return false;
            }

            public function getError($field)
            {
                $errorMessage = $_SESSION['errors'][$field][0];
                unset($_SESSION['errors'][$field]);

                return $errorMessage;
            }
        };
    }

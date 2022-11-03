<?php

    namespace App\Libraries;

    class Request
    {
        public $path;
        public $method;

        public function __construct()
        {
            $this->path = $this->path();
            $this->method = $this->method();
        }

        private function path()
        {
            if(isset($_GET['url']))
            {
                $path = filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL);
                $position = strpos($path, '?');

                if($position == false)
                {
                    return '/' . $path;
                }

                return '/' . substr($path, 0, $position);
            } else
            {
                return '/';
            }
        }

        private function method()
        {
            return strtolower($_SERVER['REQUEST_METHOD']);
        }
    }

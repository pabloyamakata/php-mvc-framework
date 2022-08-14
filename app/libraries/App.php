<?php

    class App
    {
        protected $controller = 'HomeController';
        protected $method = 'index';
        protected $params;

        public function __construct()
        {
            $url = $this->parseUrl();

            if(!empty($url))
            {
                $capitalizedController = ucfirst($url[0]);
                $capitalizedController[-10] = strtoupper($capitalizedController[-10]);

                if(file_exists(__DIR__ . '/../controllers/' . $capitalizedController . '.php'))
                {
                    $this->controller = $capitalizedController;
                    unset($url[0]);
                }
            }

            require_once __DIR__ . '/../controllers/' . $this->controller . '.php';

            $this->controller = new $this->controller;

            if(isset($url[1]))
            {
                if(method_exists($this->controller, $url[1]))
                {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

            $this->params = $url ? array_values($url) : [];

            call_user_func_array([$this->controller, $this->method], $this->params);
        }

        public function parseUrl()
        {
            if(isset($_GET['url']))
            {
                $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
                return $url;
            }
        }
    }

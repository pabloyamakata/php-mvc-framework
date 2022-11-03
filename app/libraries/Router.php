<?php

    namespace App\Libraries;

    use App\Libraries\Request;

    class Router
    {
        private static $routes;
        
        private static function handleRequest($request)
        {
            foreach(self::$routes[$request->method] as $path => $handler)
            {
                if($path == $request->path)
                {
                    if(is_array($handler))
                    {
                        if(file_exists(__DIR__ . '/../controllers/' . $handler['controller'] . '.php'))
                        {
                            $controller = '\\App\\Controllers\\' . $handler['controller'];
                            $controller = new $controller;

                            if(method_exists($controller, $handler['method']))
                            {
                                call_user_func([$controller, $handler['method']]);
                            }
                        }
                    } else
                    {
                        call_user_func($handler);
                    }

                    break;
                } else
                {
                    $pathAsArray = explode('/', $path);
                    $requestPathAsArray = explode('/', $request->path);

                    if(count($pathAsArray) == count($requestPathAsArray))
                    {
                        $placeholders = array_diff($pathAsArray, $requestPathAsArray);
                        $params = array_diff($requestPathAsArray, $pathAsArray);

                        if(count($placeholders) == 0)
                        {
                            continue;
                        }

                        foreach($placeholders as $placeholder)
                        {
                            if(!preg_match('/{.+}/', $placeholder))
                            {
                                continue 2;
                            }
                        }
                        
                        if(is_array($handler))
                        {
                            if(file_exists(__DIR__ . '/../controllers/' . $handler['controller'] . '.php'))
                            {
                                $controller = '\\App\\Controllers\\' . $handler['controller'];
                                $controller = new $controller;
        
                                if(method_exists($controller, $handler['method']))
                                {
                                    call_user_func_array([$controller, $handler['method']], $params);
                                }
                            }
                        } else
                        {
                            call_user_func($handler);
                        }
                    } else
                    {
                        continue;
                    }

                    break;
                }
            }
        }

        public static function get($path, $handler)
        {
            if(is_array($handler))
            {
                $namespace = $handler[0];
                $controller = explode('\\', $namespace)[2];
                $method = $handler[1];
                self::$routes['get'][$path] = [
                    'controller' => $controller,
                    'method' => $method,
                ];
            } else
            {
                self::$routes['get'][$path] = $handler;
            }
        }

        public static function post($path, $handler)
        {
            if(is_array($handler))
            {
                $namespace = $handler[0];
                $controller = explode('\\', $namespace)[2];
                $method = $handler[1];
                self::$routes['post'][$path] = [
                    'controller' => $controller,
                    'method' => $method,
                ];
            } else
            {
                self::$routes['post'][$path] = $handler;
            }
        }

        public static function run()
        {
            $request = new Request;
            $files = array_diff(scandir(__DIR__ . '/../routes/'), ['.', '..']);

            foreach($files as $file)
            {
                require_once __DIR__ . '/../routes/' . $file;
            }
            
            self::handleRequest($request);
        }
    }

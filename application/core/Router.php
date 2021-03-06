<?php
    namespace application\core;

    class Router {
        protected $routes=[];
        protected $params=[];
        protected $url;

        public function __construct() {
            $arrPath=require 'application/config/routes.php';
            foreach ($arrPath as $key=>$value) {
                $this->add($key,$value);
            }
        }

        public function add($route,$params) {
            $route = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', $route);
            $route = '#^'.$route.'$#';
            $this->routes[$route] = $params;
        }

        public function match() {
            $this->url=trim($_SERVER['REQUEST_URI'],'/');

            foreach ($this->routes as $route=>$params) {
                if (preg_match($route, $this->url, $matches)) {
                    foreach ($matches as $key => $match) {
                        if (is_string($key)) {
                            if (is_numeric($match)) {
                                $match = (int) $match;
                            }
                            $params[$key] = $match;
                        }
                    }
                    $this->params = $params;
                    return true;
                }
            }
            return false;
        }

        public function run() {
            if ($this->match()) {

                $path='application\controllers\\'.ucfirst($this->params['controller']).'Controller';
                if (class_exists($path)) {
                    $action=$this->params['action'].'Action';
                    if (method_exists($path,$action)) {
                        $controller=new $path($this->params,$this->url);
                        $controller->$action();
                    }
                    else {
                        echo 'не существует метод';
                    };
                }
                else {
                    echo "класс не найден ".$path;
                }
            }
            else {View::errorCode(404);}
        }
    }
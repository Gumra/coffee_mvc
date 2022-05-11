<?php
    namespace application\core;

     class View {
        public $path; //Путь
        //Шаблон - шапка, скрипты, подвал
        public $layout="default";
        public $route;
        public function __construct($route) {
            $this->route=$route;
            $this->path=$route['controller'].'/'.$route['action'];
        }
        public function render($title,$vars=[]) {
            //Распаковка массива по переменным. ключ-переменная,
            //значение массива - значение переменной
            extract($vars);
            ob_start();
            require 'application/views/'.$this->path.'.php';
            $content=ob_get_clean();
            //Подключение шаблона
            require 'application/views/layouts/'.$this->layout.'.php';
        }
        public static function errorCode($code) {
            http_response_code($code);
            require 'application/views/errors/'.$code.'.php';
            exit;
        }
         public function message($status, $message) {
             exit(json_encode(['status' => $status, 'message' => $message]));
         }
        public function location($url) {
            exit(json_encode(['url'=>$url]));
        }
        public function redirect($url) {
            if ($url=='/') {
                header("Location: $url");
            }
            else {
                header("Location: /$url");
            }
            exit;

        }
    }
<?php
    namespace application\core;
    use application\services\Validation;

    abstract class Controller {

        public $route;
        public $view;
        public $acl;

        /*public $model;*/
        public function __construct($route) {
            $this->route=$route;
            if (!$this->checkAcl()) {
                View::errorCode(403);
            }
            $this->view=new View($route);
            $this->model=$this->loadModel($route['controller']);
        }

        /***Загрузка модели по имени
         * @param $name - имя модели
         * @return object - класс модели
         */
        public function loadModel($name)
        {
            $path='application\models\\'.ucfirst($name);
            if (class_exists($path)) {
                return new $path;
            }
        }

        /***Функция смотрит список страниц, доступные пользователю
         * @return bool - имеется ли доступ к странице
         */
        public function checkAcl() {
            $this->acl=require 'application/acl/'.$this->route['controller'].'.php';
            if ($this->isAcl("all")) {
                return true;
            }
            elseif (isset($_SESSION["admin"]) and $this->isAcl("admin")) {
                return true;
            }
            elseif ($this->isAcl('authorize')) {
                return true;
            }
            return false;
        }

        public function isAcl($key) {
            return in_array($this->route['action'],$this->acl[$key]);
        }
    }
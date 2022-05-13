<?php
    namespace application\controllers;
    use application\core\Controller;

    class UserController extends Controller {
        public function profileAction() {
            $this->view->render('Личный кабинет');
        }

        public function settingsAction() {
            $this->view->render('Настройки');
        }
    }
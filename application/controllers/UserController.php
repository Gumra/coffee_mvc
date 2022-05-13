<?php
    namespace application\controllers;
    use application\core\Controller;

    class UserController extends Controller {
        public function profileAction() {
            $this->view->render('Личный кабинет');
        }

        public function settingsAction() {
            if (!empty($_POST)) {
                if (!$this->model->checkChange($_POST)) {
                    $this->view->message('error',$this->model->error);
                }
                else {
                    $this->view->message('success','Успешная смена');
                }
            }
            $this->view->render('Настройки');
        }
    }
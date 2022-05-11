<?php


namespace application\controllers;
use application\core\Controller;

class MainController extends Controller {

    public function indexAction() {
        $this->view->render('Главная страница');
    }

    public function loginAction() {
        if (isset($_SESSION['admin'])) {
            $this->view->redirect('admin');
        }
        elseif (isset($_SESSION['user'])) {
            $this->view->redirect('/');
        }

        if (!empty($_POST)) {
            if (!$this->model->validateLoginUser($_POST)) {
                $this->view->message('error',$this->model->error);
            }
            $this->view->location(array_key_first($_SESSION)=='user' ? '/' : 'admin');
        }

        $this->view->render('Вход');
    }

    public function logoutAction() {
        unset($_SESSION[array_key_first($_SESSION)]);
        $this->view->redirect('login');
    }

    public function registerAction() {
        if (isset($_SESSION[array_key_first($_SESSION)])) {
            $this->view->redirect(array_key_first($_SESSION)=='user' ? '/' : 'admin');
        }
        if (!empty($_POST)) {
            if (!$this->model->validateRegister($_POST)) {
                $this->view->message('error',$this->model->error);
            }
            //$this->view->message('success','Успешная регистрация');
            $this->view->location('login');
        }
        $this->view->render('Регистрация');
    }

}
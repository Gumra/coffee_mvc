<?php

namespace application\controllers;
use application\core\Controller;

class MainController extends Controller {

    public function indexAction() {
        $this->view->render('Главная страница');
    }

    public function loginAction() {
        if (isset($_SESSION[array_key_first($_SESSION)])) {
            $this->view->redirect('/');
        }

        if (!empty($_POST)) {
            if (!$this->model->validateLoginUser($_POST)) {
                $this->view->message('error',$this->model->error);
            }
            $this->view->location('/');
        }

        $this->view->render('Вход');
    }

    public function logoutAction() {
        unset($_SESSION[array_key_first($_SESSION)]);
        $this->view->redirect('login');
    }

    public function registerAction() {
        if (isset($_SESSION[array_key_first($_SESSION)])) {
            $this->view->redirect('/');
        }
        if (!empty($_POST)) {
            if (!$this->model->validateRegister($_POST)) {
                $this->view->message('error',$this->model->error);
            }

            $this->view->location('login');
        }
        $this->view->render('Регистрация');
    }

    public function forgotAction() {
        if (!empty($_POST)) {
            if (!$this->model->validateEmailForgot($_POST)) {
                $this->view->message('error',$this->model->error);
            }
            $this->view->location('login');
        }
        $this->view->render('Восстановление пароля');
    }

    public function reviewAction () {
        if (!empty($_POST)) {
            if (!$this->model->createReview($_POST)) {
                $this->view->message('error',$this->model->error);
            }
            $this->view->location('review');
        }

        $reviews=$this->model->getReviews();

        $vars=[
            'data'=>$reviews,
        ];

        $this->view->render('Отзывы',$vars);
    }

    public function infoAction() {
        $this->view->render('О нас');
    }


}
<?php
    namespace application\controllers;
    use application\core\Controller;
    use application\models\Product;

    class AdminController extends Controller {
        public function crudAction() {
            $pr=new Product();
            $contPr=new ProductController($this->route,$this->url);

            if (!empty($this->route['id']) and !empty($this->route['category'])) {
                $result=$pr->getItems($this->route['category'],$this->route['id']);
                if (empty($_POST)) {
                    $vars=[
                        'data'=>$result,
                        'category'=>$result[0]['category'],
                        'url'=>$this->url,
                    ];
                    $this->view->render('Редактирование',$vars);
                }
                else {
                    if (!$contPr->editProduct($_POST,$this->route['category'],$result)) {
                        $this->view->message('error',$contPr->error);
                    } else {
                        $this->view->location($this->url);
                    }
                }
            } else {
                if (!empty($_POST)) {
                    if (!$contPr->addProduct($_POST)) {
                        $this->view->message('error',$contPr->error);
                    }
                    else {
                        $this->view->location($this->url);
                    }
                }
                $vars=[
                    'url'=>$this->url,
                ];
                $this->view->render('Добавление', $vars);
            }
        }
    }
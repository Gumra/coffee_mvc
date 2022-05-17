<?php
    namespace application\controllers;
    use application\core\Controller;
    use application\models\Product;
    use application\services\ShowPaginationData;

    class ProductController extends Controller {
        public $error;
        public function showAction() {

            $category=explode('/',$this->url)[1];

            $title='';

            switch ($category) {
                case 'deserts': {$title='Десерты'; break;}
                case 'drinks': {$title='Напитки'; break;}
                case 'torts': {$title='На заказ'; break;}
            }
            $vars=ShowPaginationData::showData($category, $this->model,$this->route);

            $this->view->render($title,$vars);
        }
        public function editProduct ($post,$category,$item) {
            $pr=new Product();
            $input=[
                'name',
                'description',
                'price',
            ];
            if (!$this->valController->validateInput($input,$post)) {
                $this->error=$this->valController->errorValidate;
                return false;
            } else {
                if (!$pr->editProduct($post,$category,$item)) {
                    $this->error='Не удалось редактировать';
                    return false;
                }
            }
            return true;
        }

        public function addProduct($post) {
            $pr=new Product();
            $category='';

            $input=[
                'name',
                'description',
                'price',
                'img'
            ];

            if (!$this->valController->validateInput($input,$post)) {
                $this->error=$this->valController->errorValidate;
                return false;
            }

            switch ($post['categories']) {
                case 'Напитки': {$category='drinks'; break;}
                case 'Десерты': {$category='deserts'; break;}
                case 'На заказ': {$category='torts'; break;}
            }

            if (!$pr->addProduct($post,$input, $category)) {
                $this->error=$pr->error;
                return false;
            }
            return true;
        }

        public function deleteAction() {
            $category=$this->route['category'];
            $id=$this->route['id'];

            if (!$this->model->deleteItem($category,$id))  {
                $this->view->message('error',$this->model->error);
            }
            else {
                $this->view->redirect("categories/$category");
            }
        }
    }
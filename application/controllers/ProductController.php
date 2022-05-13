<?php
    namespace application\controllers;
    use application\core\Controller;
    use application\services\ShowPaginationData;

    class ProductController extends Controller {
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
    }
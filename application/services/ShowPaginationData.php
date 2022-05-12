<?php
    namespace application\services;

    class ShowPaginationData {
        public static function showData($category,$model,$route) {
            $countItems=intval($model->countItems($category));

            if (!empty($route['page'])) {
                $pagination=new Pagination($route['page'],$countItems);
            }
            else {
                $pagination=new Pagination(1,$countItems);
            }
            return [
                'list'=>$model->selectItemsLimit($category,$pagination->limit,$pagination->offset),
                'pagination'=>$pagination,
                'category'=>$category,
            ];
        }
    }
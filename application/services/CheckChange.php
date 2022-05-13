<?php
    namespace application\services;

    class CheckChange {
        public static function check($post,$user,$input) {

            $middle='';
            $query='';

            $returnQueryParams=[];

            $params['id']=$user[0]['id'];

            foreach ($input as $val) {
               if (strcmp($post[$val],$user[0][$val])!=0) {
                    $middle.="$val= :$val, ";
                    $params[$val]=htmlspecialchars($post[$val]);
                }
            }

            $beginSql="UPDATE profiles SET ";
            $endSql=" WHERE id= :id";

            if (!empty($middle)) {
                $returnQueryParams['query']=$beginSql.substr($middle, 0, -2).$endSql;
                $returnQueryParams['params']=$params;
                return $returnQueryParams;
            } else return null;
        }
    }
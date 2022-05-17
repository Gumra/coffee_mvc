<?php
    namespace application\services;

    use mysql_xdevapi\Table;

    class CheckChange {

        public static function check($post,$item,$input,$table) {
            $middle='';
            $params['id']=$item[0]['id'];
            foreach ($input as $val) {
                if (strcmp($post[$val],$item[0][$val])!=0) {
                    $middle.="$val= :$val, ";
                    $params[$val]=htmlspecialchars($post[$val]);
                }
            }

            $beginSql="UPDATE $table SET ";
            $endSql=" WHERE id= :id";

            if (!empty($middle)) {
                $returnQueryParams['query']=$beginSql.substr($middle, 0, -2).$endSql;
                $returnQueryParams['params']=$params;
                return $returnQueryParams;
            } else return null;
        }
    }
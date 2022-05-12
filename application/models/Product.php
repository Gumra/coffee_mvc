<?php
    namespace application\models;
    use application\core\Model;

    class Product extends Model {
        public function getItems($category) {

            $sql="SELECT * FROM $category";
            return $this->db->row($sql);
        }

        public function countItems($category) {
            return $this->db->column("SELECT COUNT(*) FROM $category");
        }

        public function selectItemsLimit($category, $limit, $offset) {
            $params=[
                'limit'=>$limit,
                'offset'=>$offset,
            ];
            $query="SELECT * FROM $category LIMIT :limit OFFSET :offset";
            return $this->db->row($query,$params);
        }
    }
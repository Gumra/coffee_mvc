<?php
    namespace application\models;
    use application\core\Model;
    use application\services\CheckChange;
    use Imagick;
    use ImagickException;

    class Product extends Model {
        public $error;
        public function getItems($category,$id='') {
            if (empty($id)) {
                $sql="SELECT * FROM $category";
                return $this->db->row($sql);
            }
            else {
                $params=[
                    'id'=>$id,
                ];
                $sql="SELECT * FROM $category WHERE id =:id";
                return $this->db->row($sql, $params);
            }
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

        public function editProduct($post,$category,$item) {
            $input=[
                'name',
                'description',
                'price',
            ];

            $query=CheckChange::check($post,$item,$input,$category);

            if (!empty($query)) {
                $this->db->query($query['query'], $query['params']);
                $this->addImage($category,$item[0]['id']);
                return true;
            }
            else {
                if (!$this->addImage($category,$item[0]['id'])) {
                    $this->error='Нет изменений';
                    return false;
                }
                else return true;
            }
        }

        public function addImage($category, $id) {
            if (!empty($_FILES['img']['tmp_name'])) {
                $img=$this->resize($_FILES['img']['tmp_name']);
                $sql="UPDATE $category SET image =:image WHERE id =:id";
                $this->db->uploadImage($id,$sql,$img);
                return true;
            }
            else return false;
        }

        public function resize($path) {
            list($width, $height)=getimagesize($_FILES['img']['tmp_name']);

            if ($width >= 200 && $height >= 200) {
                try {
                    $image = new Imagick($_FILES['img']['tmp_name']);
                    $image->thumbnailImage(200, 200);
                    $image->writeImage($_FILES['img']['tmp_name']);
                } catch (ImagickException $e) {
                }
            }
            return file_get_contents($_FILES['img']['tmp_name']);
        }

        public function addProduct($post, $input, $category) {
            $sql="INSERT INTO $category (name, description, price) VALUES (:name, :description, :price)";

            $params=[
                'name'=>$post['name'],
                'description'=>$post['description'],
                'price'=>$post['price'],
            ];

            $this->db->query($sql,$params);
            $lastId=$this->db->lastInsertId();

            $this->addImage($category,$lastId);

            return true;
        }

        public function deleteItem($category, $id) {
            $params=[
                'id'=>$id,
            ];
            $sql="DELETE FROM $category WHERE id =:id";
            $this->db->query($sql,$params);
            return true;
        }
    }
<?php

    namespace application\lib;
    use PDO;

    class Db {
        public function __construct() {
            $params=require 'application/config/dbConf.php';
            $dsn="mysql:host={$params['host']};dbname={$params['dbname']};charset=utf8;";
            $this->db=new PDO($dsn,$params['user'],$params['password']);
        }

        public function query($sql, $params=[]) {
            $stmt=$this->db->prepare($sql);
            if (!empty($params)) {
                foreach ($params as $key => $val) {
                    if (is_int($val)) {
                        $type = PDO::PARAM_INT;
                    } else
                        $type = PDO::PARAM_STR;
                    $stmt->bindValue(':'.$key, $val, $type);
                }
            }
            if (!$stmt->execute()) {
                var_dump($stmt->errorInfo());
            }
            return $stmt;
        }

        public function row($sql, $params=[]) {
            return $this->query($sql,$params)->fetchAll(PDO::FETCH_ASSOC);
        }

        public function column($sql,$params=[]) {
            return $this->query($sql,$params)->fetchColumn();
        }

        /***Возвращает id последней записи в бд
         * @return string - id записи
         */
        public function lastInsertId(): string
        {
            return $this->db->lastInsertId();
        }
        public function uploadImage($id,$sql,$file) {

            $stmt=$this->db->prepare($sql);

            $stmt->bindParam(':id', $id,PDO::PARAM_INT,3);
            $stmt->bindParam(':image', $file, PDO::PARAM_LOB);

            if (!$stmt->execute()) {
                var_dump($stmt->errorInfo());
            }
            return $stmt;
        }
    }
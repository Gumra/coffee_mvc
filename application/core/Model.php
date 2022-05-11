<?php
    namespace application\core;
    use application\lib\Db;
    use application\services\Validation;

    abstract class Model {

        public $db;
        public $validate;

        public function __construct() {
            $this->db=new Db;
            $this->validate=new Validation;
        }
    }
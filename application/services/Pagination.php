<?php
    namespace application\services;

    class Pagination {

        public $page; // страница
        public $limit; // количество на одной странице
        public $offset; // сдвиг
        public $countPosts; // количество всего записей

        public function __construct($page, $countPosts, $limit=2) {
            $this->page=$page;
            $this->limit=$limit;
            $this->offset=$this->limit*($this->page-1);
            $this->countPosts=$countPosts;
            $this->amount=$this->amount();
        }

        public function amount() {
            return ceil($this->countPosts / $this->limit);
        }
    }
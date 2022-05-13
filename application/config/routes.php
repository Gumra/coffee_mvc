<?php
    return [
        //MainController
        '' => [
            'controller'=>'main',
            'action'=>'index',
            ],
        '/' => [
            'controller'=>'main',
            'action'=>'index',
            ],
        'login'=> [
            'controller'=>'main',
            'action'=>'login'
        ],
        'register'=>[
            'controller'=>'main',
            'action'=>'register'
        ],
        'logout'=>[
            'controller'=>'main',
            'action'=>'logout'
        ],
        'forgot'=>[
            'controller'=>'main',
            'action'=>'forgot'
        ],
        'review'=>[
            'controller'=>'main',
            'action'=>'review'
        ],
        'info'=>[
            'controller'=>'main',
            'action'=>'info'
        ],
        //ProductController
        'categories/drinks'=>[
            'controller'=>'product',
            'action'=>'show'
        ],
        'categories/drinks/{page:\d+}'=>[
            'controller'=>'product',
            'action'=>'show'
        ],
        'categories/deserts'=>[
            'controller'=>'product',
            'action'=>'show'
        ],
        'categories/deserts/{page:\d+}'=>[
            'controller'=>'product',
            'action'=>'show'
        ],
        'categories/torts'=>[
            'controller'=>'product',
            'action'=>'show'
        ],
        'categories/torts/{page:\d+}'=>[
            'controller'=>'product',
            'action'=>'show'
        ],
        //UserController
        'profile'=>[
            'controller'=>'user',
            'action'=>'profile'
        ],
        'settings'=>[
            'controller'=>'user',
            'action'=>'settings'
        ],
        //AdminController
        /*'main/index/{page:\d+}' => [
            'controller'=>'main',
            'action'=>'index',
            ],
        'about' => [
            'controller'=>'main',
            'action'=>'about',
            ],
        'contact' => [
            'controller'=>'main',
            'action'=>'contact',
            ],
        'post/{id:\d+}' => [
            'controller'=>'main',
            'action'=>'post',
            ],*/
        //AdminController
        /*'admin/login' => [
            'controller'=>'admin',
            'action'=>'login',
        ],
        'admin/logout' => [
            'controller'=>'admin',
            'action'=>'logout',
        ],
        'admin/add' => [
            'controller'=>'admin',
            'action'=>'add',
        ],
        'admin/delete/{id:\d+}' => [
            'controller'=>'admin',
            'action'=>'delete',
        ],
        'admin/edit/{id:\d+}' => [
            'controller'=>'admin',
            'action'=>'edit',
        ],
        'admin/posts/{page:\d+}' => [
            'controller'=>'admin',
            'action'=>'posts',
        ],
        'admin/posts' => [
            'controller'=>'admin',
            'action'=>'posts',
        ],*/
    ];
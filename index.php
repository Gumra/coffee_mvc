<?php

//$str='as12qe';
/*$str='11.05.2021';
var_dump(preg_match('#^[0-9]{2}.[0-9]{2}.[0-9]{4}$#',$str));

die();*/
    require 'application/lib/Dev.php';
    use application\core\Router;

    spl_autoload_register(function ($class){
        $path=str_replace("\\",'/',$class.'.php');
        if (file_exists($path)) {
            require $path;
        }
    });

    session_start();

    $router=new Router;
    $router->run();
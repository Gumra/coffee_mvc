<?php
    $currentUser=array_key_first($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?=$title?></title>
        <link href="/application/public/styles/bootstrap.css" rel="stylesheet">
        <link href="/application/public/styles/font-awesome.css" rel="stylesheet">
        <link href="/application/public/styles/styles.css" rel="stylesheet" />
        <link href="/application/public/styles/sweetalert2.min.css" rel="stylesheet" />
        <link rel="icon" href="/application/public/materials/favicon.ico">

        <script src="/application/public/scripts/fontawesome.js"></script>
        <script src="/application/public/scripts/jquery.js"></script>
        <script src="/application/public/scripts/sweetalert2.min.js"></script>
        <script src="/application/public/scripts/popper.js"></script>
        <script src="/application/public/scripts/scripts.js"></script>
        <script src="/application/public/scripts/bootstrap.js"></script>
        <script src="/application/public/scripts/form.js"></script>


    </head>
    <body class="sb-nav-fixed">
        <?php if ($this->route['action'] != 'login' and
            $this->route['action'] != 'register' and $this->route['action'] != 'forgot'): ?>

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="default.php">Coffee House</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Главная</div>
                            <a class="nav-link" href="/">
                                <div class="sb-nav-link-icon"><i class="fas fa-coffee"></i></div>
                                Coffee House
                            </a>
                            <div class="sb-sidenav-menu-heading">Товары</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Категории
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/categories/drinks">Напитки</a>
                                    <a class="nav-link" href="/categories/deserts">Десерты</a>
                                    <a class="nav-link" href="/categories/torts">На заказ</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Обратная связь</div>
                            <a class="nav-link" href="/review">
                                <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                                Отзывы
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid mt-2">
                        <?php if ($currentUser):?>
                        <div class="d-flex flex-row justify-content-between">
                            <div class="d-flex align-items-center">
                                <img src="/application/public/materials/profilesImage/<?=$_SESSION[$currentUser][0]['id'].'.jpg'?>" width="50" height="50" style="margin-right: 10px">
                                <h3><?=$_SESSION[$currentUser][0]['firstName']?></h3>
                            </div>
                            <div class="d-flex align-items-center">
                                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><svg class="svg-inline--fa fa-user fa-fw" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path></svg><!-- <i class="fas fa-user fa-fw"></i> Font Awesome fontawesome.com --></a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#!">Настройки</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="/logout">Выход</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr class="dropdown-divider">
                        <?php endif;?>
                        <div class="justify-content-between d-flex">
                            <div class="dropdown">
                                <a href="#" class="align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownNavLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Меню
                                </a>
                                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownNavLink" style="">
                                    <li><a class="dropdown-item" href="/categories/drinks">Напитки</a></li>
                                    <li><a class="dropdown-item" href="/categories/deserts">Десерты</a></li>
                                    <li><a class="dropdown-item" href="/categories/torts">На заказ</a></li>
                                </ul>
                            </div>
                            <div>
                                <a href="/info" class="align-items-center link-dark text-decoration-none" id="dropdownNavLink" aria-expanded="false">
                                    О нас
                                </a>
                            </div>
                            <div>
                                <a href="/categories/torts" class="align-items-center link-dark text-decoration-none" id="dropdownNavLink" aria-expanded="false">
                                    На заказ
                                </a>
                            </div>
                            <?php
                                $params=[];
                                if (!$currentUser) {
                                    $params['url']='login';
                                    $params['word']='Войти';
                                }
                                elseif (strcmp($currentUser,'user')==0) {
                                    $params['url']='main';
                                    $params['word']='Личный кабинет';
                                }
                                else {
                                    $params['url']='admin';
                                    $params['word']='Личный кабинет';
                                }
                            ?>
                            <div>
                                <a href="/<?=$params['url']?>" class="align-items-center link-dark text-decoration-none" id="dropdownNavLink" aria-expanded="false">
                                    <?=$params['word']?>
                                </a>
                            </div>
                        </div>
                        <hr class="dropdown-divider">
                        <ol class="breadcrumb mb-lg-2">
                            <li class="breadcrumb-item active">Главная страница</li>
                        </ol>
                        <hr class="dropdown-divider">
                    </div>
                </main>
            <?php endif?>
            <?=$content?>
            <?php if ($this->route['action'] != 'login' and $this->route['action'] != 'register'): ?>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Мы в социальных сетях:</div>
                            <div>
                                <a href="#">Вконтакте</a>
                                &middot;
                                <a href="#">Инстаграм</a>
                            </div>
                        </div>
                    </div>
                </footer>
            <?php endif?>
            </div>
        </div>
    </body>
</html>
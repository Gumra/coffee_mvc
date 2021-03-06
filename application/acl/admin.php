<?php
    return [
        //Группа доступа - все. Список сайтов, которые видят все пользователи
        'all'=> [
            'index',
            'login',
            'register',
            'forgot'
        ],
        //Авторизированные пользователи имеют доступ
        'authorize' => [
            'logout'
        ],
        //Админ
        'admin' => [
            'profiles',
            'settings',
            'edit',
            'add',
            'delete',
            'crud'
        ],
    ];

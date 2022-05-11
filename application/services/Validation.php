<?php
    namespace application\services;

    class Validation {

        public $errorValidate;

        public function validateInput($input, $post) {
            $rules=[
                'login'=>[
                    'pattern'=>'#^[a-z0-9]{3,15}$#',
                    'message'=>'Некорректный логин',
                ],
                'password'=>[
                    'pattern'=>'#^[a-zA-z0-9]{5,20}$#',
                    'message'=>'Некорректный пароль',
                ],
                'confirmPassword'=>[
                    'pattern'=>'#^[a-zA-z0-9]{5,20}$#',
                    'message'=>'Некорректный пароль',
                ],
                'firstName'=>[
                    'pattern'=>'#^[А-ЯЁ][а-яё]{3,}$#u',
                    'message'=>'Некорректное имя',
                ],
                'lastName'=>[
                    'pattern'=>'#^[А-ЯЁ][а-яё]{3,}$#u',
                    'message'=>'Некорректная фамилия',
                ],
                'phone'=>[
                    'pattern'=>'#^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$#',
                    'message'=>'Некорректный номер'
                ],
                'address'=>[
                    'pattern'=>'#^[А-ЯЁ][а-яё]{3,}$#u',
                    'message'=>'Некорректный адрес'
                ],
                'birthday'=>[
                    'pattern'=>'#^[0-9]{4}-[0-9]{2}-[0-9]{2}$#',
                    'message'=>'Некорректная дата рождения'
                ],
            ];
            if (in_array('email',$input)) {
                $index=array_keys($input,'email');
                if (!filter_var($post['email'],FILTER_VALIDATE_EMAIL)) {
                    $this->errorValidate='Некорректный email';
                    return false;
                }
                unset($input[$index[0]]);
            }
            if (in_array('img',$input)) {
                $index=array_keys($input,'img');
                if (empty($_FILES['img']['tmp_name'])) {
                    $this->errorValidate='Выберите изображение';
                    return false;
                }
                unset($input[$index[0]]);
            }

            foreach ($input as $val) {
                if (!isset($post[$val]) or !preg_match($rules[$val]['pattern'],$post[$val])) {
                    $this->errorValidate=$rules[$val]['message'];
                    return false;
                }
            }
            return true;
        }
    }
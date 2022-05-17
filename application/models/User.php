<?php
    namespace application\models;
    use application\core\Model;
    use application\services\CheckChange;

    class User extends Model {
        public $error;

        public function checkChange($post) {
            $currentUser=array_key_first($_SESSION);
            $input=[
                'firstName',
                'lastName',
                'email',
                'birthday',
                'phone',
                'address',
            ];

            if (!$this->validate->validateInput($input,$post)) {
                $this->error=$this->validate->errorValidate;
                return false;
            }

            $query=CheckChange::check($post,$_SESSION[$currentUser],$input,'profiles');

            if (!empty($query)) {
                $this->db->query($query['query'],$query['params']);
                $params=[
                    'id'=>$_SESSION[$currentUser][0]['id'],
                ];
                $_SESSION[$currentUser]=$this->db->row("SELECT * FROM profiles WHERE id =:id",$params);
                $this->checkFile($currentUser);
                return true;
            } else {
                if (!$this->checkFile($currentUser)) {
                    $this->error = 'Нет изменений';
                    return false;
                } else {
                    return true;
                }
            }
        }

        public function checkFile($user) {
            if (!empty($_FILES['img']['tmp_name'])) {
                unlink("application/public/materials/profilesImage/".$_SESSION[$user][0]['id'].".jpg");
                move_uploaded_file($_FILES['img']['tmp_name'],"application/public/materials/profilesImage/".$_SESSION[$user][0]['id'].".jpg");
                return true;
            }
            else return false;
        }
    }
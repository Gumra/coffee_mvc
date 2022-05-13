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
            $query=CheckChange::check($post,$_SESSION[$currentUser],$input);

            if (!empty($query)) {
                $this->db->query($query['query'],$query['params']);
                $params=[
                    'id'=>$_SESSION[$currentUser][0]['id'],
                ];
                $_SESSION[$currentUser]=$this->db->row("SELECT * FROM profiles WHERE id =:id",$params);
                return true;
            } else {
                $this->error='Нет изменений';
                return false;
            }
        }
    }
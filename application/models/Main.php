<?php
    namespace application\models;
    use application\core\Model;
    use application\services\Validation;


    class Main extends Model {
        public $error;

        public function validateLoginUser($post) {
            if (!$this->validate->validateInput(['password','email'],$post)) {
                $this->error=$this->validate->errorValidate;
                return false;
            }
            if (!$this->existUserInDataBase($post['email'],$post['password'])) {
                return false;
            }
            return true;
        }

        public function existUserInDataBase($email,$password) {
            $params=[
                'email'=>$email,
            ];

            $profiles=$this->db->row("SELECT * FROM profiles WHERE email= :email",$params);

            if (empty($profiles)) {
                $this->error='Пользователя с таким email не найдено';
                return false;
            }

            if (!password_verify($password,$profiles[0]['password'])) {
                $this->error='Неверный пароль';
                return false;
            }

            if ($profiles[0]['admin']) {
                $_SESSION['admin']=$profiles;
            }
            else {
                $_SESSION['user']=$profiles;
            }
            return true;
        }

        public function validateRegister($post) {
            $input=[
                'firstName',
                'lastName',
                'email',
                'birthday',
                'phone',
                'address',
                'password',
                'img',
                'confirmPassword',
            ];

            if (!$this->validate->validateInput($input,$post)) {
                $this->error=$this->validate->errorValidate;
                return false;
            }
            if (strcmp($post['password'],$post['confirmPassword'])!=0) {
                $this->error='Пароли не совпадают';
                return false;
            }

            $params=[
                'email'=>$post['email'],
            ];

            $count=intval($this->db->column('SELECT COUNT(*) FROM profiles WHERE email =:email',$params));

            if ($count>0) {
                $this->error='Пользователь с такой почтой существует';
                return false;
            }

            $params=[
                'firstName'=>$post['firstName'],
                'lastName'=>$post['lastName'],
                'email'=>$post['email'],
                'birthday'=>$post['birthday'],
                'phone'=>$post['phone'],
                'address'=>$post['address'],
                'password'=>password_hash($post['password'], PASSWORD_BCRYPT),
            ];

            $sql="INSERT INTO profiles (firstName, lastName, email, birthday, phone, address, password) VALUES (:firstName, :lastName, :email, :birthday, :phone, :address, :password)";

            $this->db->query($sql,$params);

            $lastId=$this->db->lastInsertId();

            move_uploaded_file($_FILES['img']['tmp_name'],"application/public/materials/profilesImage/".$lastId.".jpg");

            return true;
        }
    }
<?php
    namespace application\models;
    use application\core\Model;
    use application\services\Mail;
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

            if ($profiles[0]['status']==0) {
                $_SESSION['user']=$profiles;
            }
            else {
                $_SESSION['admin']=$profiles;
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

        public function validateEmailForgot($post) {
            if (!$this->validate->validateInput(['email'],$post)) {
                $this->error=$this->validate->errorValidate;
                return false;
            }
            $params=[
                'email'=>$post['email'],
            ];
            $count=intval($this->db->column('SELECT COUNT(*) FROM profiles WHERE email =:email',$params));

            if ($count!=1) {
                $this->error='Такого пользователя нет в базе';
                return false;
            }

            $profile=$this->db->row("SELECT * FROM profiles WHERE email= :email",$params);

            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';

            $password=substr(str_shuffle($permitted_chars), 0, 10);

            Mail::sendEmail($post['email'],$profile[0]['firstName'],$password);

            $params['password']=password_hash($password,PASSWORD_BCRYPT);

            $query="UPDATE profiles SET password= :password WHERE email= :email";

            $this->db->query($query,$params);

            return true;
        }

        public function createReview($post) {
            if (!isset($post['text'])) {
                $this->error='Пустой отзыв';
                return false;
            }
            $user=array_key_first($_SESSION);

            if (!isset($_SESSION[$user])) {
                $user='Неизвестный';
            }
            else {
                $user=$_SESSION[$user][0]['firstName'];
            }

            $sql="INSERT INTO review (firstName , text) VALUES (:firstName, :text)";

            $params=[
                'firstName'=>$user,
                'text'=>$post['text'],
            ];

            $this->db->query($sql,$params);

            return true;
        }

        public function getReviews() {
            $sql="SELECT * FROM review";

            return $this->db->row($sql);
        }
    }
<?php

namespace application\services;

    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;

    require 'application/services/PHPMailer-master/src/PHPMailer.php';
    require 'application/services/PHPMailer-master/src/SMTP.php';
    require 'application/services/PHPMailer-master/src/Exception.php';


    class Mail {

        public static function sendEmail($email,$firstName, $password) {

            $title = "Восстановление пароля";
            $body = "<h2>Письмо из кафе</h2> <b>Кому:</b> $firstName<br> <b>Почта:</b> $email<br> <br> <b>Пароль:</b> <br>$password";

            $mail = new PHPMailer;
            try {
                $mail->isSMTP();
                $mail->CharSet = "UTF-8";
                $mail->SMTPAuth   = true;
                //$mail->SMTPDebug = 2;
                $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

                $mail->Host = 'ssl://smtp.mail.ru';
                $mail->Port = 465;
                $mail->Username = 'shapovalov.dmit@inbox.ru';
                $mail->Password = 'fhhsGWvgAKNyvFnmVTQX';
                $mail->setFrom('shapovalov.dmit@inbox.ru', 'Дмитрий'); // Адрес самой почты и имя отправителя

                // Получатель письма
                $mail->addAddress($email);

                // Отправка сообщения
                $mail->isHTML(true);
                $mail->Subject = $title;
                $mail->Body = $body;

                // Проверяем отравленность сообщения
                if ($mail->send()) {$result = "success";}
                else {$result = "error";}

            } catch (Exception $e) {
                $result = "error";
                $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
            }
        }
    }


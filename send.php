<?php

namespace Landing;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


/**
 * Отпарвка почты
 * Class Mail
 * @package Landing
 */
class Mail{
    private $login = 'absaruslan9@yandex.ru';
    private $password = 'hlhnnknqdiownuvg';
    private $secure = 'ssl';
    private $port = '465';
    private $host = 'smtp.yandex.ru';
    private $auth = true;

    /**
     * Отправляет почту
     * @param string $from
     * @param string $to
     * @param string $subject
     * @param array $message
     * @return bool|string
     */
    public function send(string $from, string $to, string $subject, array $message)
    {
        $message = $message[0];
        $direction = (int)$message['direction_id'];
        $type = (int)$message['type'];
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = $this->host;
            $mail->SMTPAuth = $this->auth;
            $mail->Username = $this->login;
            $mail->Password = $this->password;
            $mail->SMTPSecure = $this->secure;
            $mail->Port = $this->port;

            $mail->setFrom($from);
            $mail->CharSet = 'utf-8';
            $mail->addAddress($to);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $message['direction_id'] = self::directin()[$direction];
            $message['type'] = self::type()[$type];
            $body = 'Имя: '.$message['name'].' Телефон: '.$message['phone'].' Направление: '.$message['direction_id'].' '.$message['type'];
            $mail->Body = $body;
            return $mail->send();
        } catch (Exception $e) {
            return 'Сообщение не отправлено. Ошибка: '.$mail->ErrorInfo;
        }
    }

    /**
     * Преобразует значение в направление
     * @return array
     */
    public static function directin()
    {
        return [
          '1' => 'Бачата',
          '2' => 'Сальса Чоке',
          '3' => 'Меренге',
          '4' => 'Lady Style',
          '5' => 'Стретчинг',
        ];
    }

    /**
     * Преобразует значение в тип
     * @return array
     */
    public static function type()
    {
        return [
          '1' => 'Гпупповые занятие',
          '2' => 'Индивидуальные занятие',
        ];
    }
}
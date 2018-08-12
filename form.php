<?php

use Landing\Mail;

require 'send.php';
$name = htmlspecialchars($_POST['name']);
$phone = htmlspecialchars($_POST['phone']);
$direction = (int)$_POST['direction_id'];
$type = (int)$_POST['type'];

$validate = new Validate($name, $phone);
echo json_encode($validate->getValidate(), JSON_UNESCAPED_UNICODE);


/**
 * Class Validate
 */
class Validate
{
    private $name;
    private $phone;
    private $direction;
    private $type;
    public $result = [];

    public function __construct(string $name, string $phone)
    {
        $this->phone = $phone;
        $this->name = $name;
    }

    /**
     * Проверка на заполнение телефона или email
     * Если все верно то сохраняет в бд и отправляют по email лид
     * @return array
     */
    public function getValidate()
    {
        if (!$this->name && !$this->phone){
            return $this->getMessage(true, 'Заполните имя и телефон');
        } elseif (!$this->name){
            return $this->getMessage(true, 'Заполните имя');
        } elseif (!$this->phone){
            return $this->getMessage(true, 'Заполните телефон');
        } else {
            preg_match('/[\d]+/', $this->name, $matches);
            if (strlen($this->phone) != 16){
                return $this->getMessage(true, 'Некорректный телефон');
            }
            if ($matches[0]){
                return $this->getMessage(true, 'Имя не должна содержать цифры');
            }
            $dbconn = require 'connection.php';
            pg_insert($dbconn, 'lid', $_POST);
            $message = [$_POST];
            $mail = new Mail();
            $mail->send('absaruslan9@yandex.ru', 'absaruslan90@gmail.com','Лид с лендинга Latina', $message);
            return $this->getMessage(false, 'Сообщение отправлено');
        }
    }

    /**
     * Выводит сообщение о результате
     * @param bool $error
     * @param string $message
     * @return array
     */
    public function getMessage(bool $error, string $message)
    {
        return $this->result = [
            'error' => $error,
            'message' => $message
        ];
    }
}
<?php

namespace Latina;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ValidateLanding
 * @package App
 */
class ValidateLanding implements ValidateData
{
    private $name;
    private $phone;
    public $result = [];

    public function __construct(array $data)
    {
        $this->phone = $data['phone'];
        $this->name = $data['name'];
    }

    public function getValidate()
    {
        if (!$this->name && !$this->phone){
            return $this->getMessage(true, 'Заполните имя и телефон');
        } elseif (!$this->name){
            return $this->getMessage(true, 'Заполните имя');
        } elseif (!$this->phone){
            return $this->getMessage(true, 'Заполните телефон');
        } else {
            if (strlen($this->phone) != 16){
                return $this->getMessage(true, 'Некорректный телефон');
            }
            if (preg_match('/[\d]+/', $this->name)){
                return $this->getMessage(true, 'Имя не должна содержать цифры');
            }
//            $mail = new Mail();
//            $mail->send('absaruslan9@yandex.ru', 'absaruslan90@gmail.com','Лид с лендинга Latina', $message);
            return $this->getMessage(false, 'Сообщение отправлено');
        }
    }


    public function getMessage(bool $error, string $message)
    {
        return $this->result = [
            'error' => $error,
            'message' => $message
        ];
    }
}

<?php
$name = htmlspecialchars($_POST['name']);
$phone = htmlspecialchars($_POST['phone']);

$validate = new Validate($name, $phone);
echo json_encode($validate->getValidate($direction), JSON_UNESCAPED_UNICODE);
exit();


/**
 * Class Validate
 */
class Validate
{
    private $name;
    private $phone;
    public $result = [];

    public function __construct(string $name, string $phone)
    {
        $this->phone = $phone;
        $this->name = $name;
    }

    /**
     * Проверка на заполнение телефона или email
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
<?php
$name = htmlspecialchars($_POST['name']);
$phone = htmlspecialchars($_POST['phone']);

$validate = new Validate($name, $phone);
echo json_encode($validate->getValidate(), JSON_UNESCAPED_UNICODE);
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
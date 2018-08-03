<?php
$name = htmlspecialchars($_POST['name']);
$phone = htmlspecialchars($_POST['phone']);
$direction = htmlspecialchars($_POST['direction']);

$validate = new Validate($name, $phone);
echo json_encode($validate->getValidate($direction), JSON_UNESCAPED_UNICODE);
exit();

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

    public function getValidate(string $direction)
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

    public function getMessage(bool $error, string $message)
    {
        return $this->result = [
            'error' => $error,
            'message' => $message
        ];
    }
}
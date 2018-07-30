<?php
$name = htmlspecialchars($_POST['name']);
$phone = htmlspecialchars($_POST['phone']);
$validate = [
    'status'    => 'validate',
];

if (!$_POST['name']){
    $validate['text'] = 'Заполните имя';
    $validate['error'] = true;
    echo json_encode($validate, JSON_UNESCAPED_UNICODE);
    exit();
}

if (!$_POST['phone']){
    $validate['text'] = 'Заполните телефон';
    $validate['error'] = true;
    echo json_encode($validate, JSON_UNESCAPED_UNICODE);
    exit();
}

$validate['text'] = 'Сообщение отправлено';
$validate['error'] = false;
echo json_encode($validate, JSON_UNESCAPED_UNICODE);
exit();
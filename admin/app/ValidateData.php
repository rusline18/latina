<?php
/**
 * Created by PhpStorm.
 * User: ruslan
 * Date: 25.08.18
 * Time: 13:41
 */

namespace Latina;


interface ValidateData
{
    /**
     * Если все верно то сохраняет в бд и отправляют по email лид
     * Проверка на заполнение телефона или email
     * @return array
     */
    public function getValidate();

    /**
     * Выводит сообщение о результате
     * @param bool $error
     * @param string $message
     * @return array
     */
    public function getMessage(bool $error, string $message);
}
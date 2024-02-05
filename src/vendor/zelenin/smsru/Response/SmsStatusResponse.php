<?php

namespace Zelenin\SmsRu\Response;

class SmsStatusResponse extends AbstractResponse
{

    /**
     * @var array
     */
    protected $availableDescriptions = [
        '-1' => 'Сообщение не найдено.',
        '100' => 'Сообщение находится в нашей очереди.',
        '101' => 'Сообщение передается оператору.',
        '102' => 'Сообщение отправлено (в пути).',
        '103' => 'Сообщение доставлено.',
        '104' => 'Не может быть доставлено: время жизни истекло.',
        '105' => 'Не может быть доставлено: удалено оператором.',
        '106' => 'Не может быть доставлено: сбой в телефоне.',
        '107' => 'Не может быть доставлено: неизвестная причина.',
        '108' => 'Не может быть доставлено: отклонено.',
        '200' => 'Неправильный api_id.',
        '210' => 'Используется GET, где необходимо использовать POST.',
        '211' => 'Метод не найден.',
        '220' => 'Сервис временно недоступен, попробуйте чуть позже.',
        '300' => 'Неправильный token (возможно истек срок действия, либо ваш IP изменился).',
        '301' => 'Неправильный пароль, либо пользователь не найден.',
        '302' => 'Пользователь авторизован, но аккаунт не подтвержден (пользователь не ввел код, присланный в регистрационной смс).',
    ];
}

<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');

//подключим модуль инфоблоки
\Bitrix\Main\Loader::includeModule('iblock');

//генерируем имя ORM класса для работы с инфоблоком
\Bitrix\Iblock\Iblock::wakeUp(20)->getEntityDataClass();

$res = \Bitrix\Iblock\Elements\ElementdoctorsTable::getByPrimary(45, [
    'select' => ['ID', 'NAME'],
])->fetchObject();

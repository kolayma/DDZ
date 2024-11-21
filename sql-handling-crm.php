<?php

use Bitrix\Main\Diag\Debug;
use Bitrix\Main\Loader;


require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
/**
* @var CMain $APPLICATION
 */
$APPLICATION->setTitle('отладка SQL');

Loader::includeModule('iblock');
Loader::includeModule('crm');

Application::getConnection()->startTracker();

$arSelect = ['ID'];
$arFilter = [
    'CATEGORY_ID' => 0,
    'DATE_CREATE' => \Bitrix\Main\Type\DateTime::createFromTimestamp(strtotime(1)),
];
$arDeals=\Bitrix\Crm\DealTable::getList([
    //order=>['ID' => 'DESC'],
    'filter' => $arFilter,
    'select' => $arSelect,
]);

\Bitrix\Main\Application::getConnection()->stopTracker();
Debug::dump($arDeals->getTrackerQuery()->getSql());

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';

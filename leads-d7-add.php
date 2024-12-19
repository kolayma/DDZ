<?php

use Bitrix\Main\Loader;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

Loader::includeModule( 'crm');

 echo  'HELLO';

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';

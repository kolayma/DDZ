<?php

use Bitrix\Main\Loader;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

Loader::includeModule( 'crm');

    $rawLeads =
        \Bitrix\Crm\LeadTable::getList([
 'select' => [
    'ID',
    'TITLE',
],
 ])-> fetchAll();


 echo '<pre>';
 foreach ($rawLeads as $lead) {
     var_dump($lead);
 }
 echo '</pre>';

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';

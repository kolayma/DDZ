<?php
require($_SERVER['DOCUMENT_ROOT']."/Bitrix/header.php");
/** @global $APPLICATION*/
$APPLICATION->SetTitle('Врачи');
$APPLICATION->SetAdditionalCSS('doctors/style.css');


$docId = 20; //идентификатор доктора из инфоблока
$doctors = \Bitrix\Iblock\Element\Elementdoctorstable::getList([
    'select' => [
        'ID',
        'NAME',
        'PROCEDURES.ELEMENT',
    ],
    'filter' => [
        'ID' => $docId,
        'ACTIVE' => 'Y'
    ],
])
    ->fetchCollection();

foreach ($doctors as $doctor) {
    pr($doctor->get('NAME'));
    foreach ($doctor->getPROCEDURES()->getAll() as $prItem) {
        pr($prItem->getID().'-'.$prItem->getElement()->getNAME());
    }
}

/*$procedureID = 52;
$procedure = \Bitrix\Iblock\Elements\ElementproceduresTable::getList([
    'select' => [
        'ID',
        'NAME',
        'DESCRIPTION',
        'COLORS'
    ],
    'filter' => [
        'ID' => $procedureID,
        'ACTIVE' => 'Y'
    ],
])->fetchCollection();

foreach ($procedure as $procedure) {
    pr($procedure->get('NAME'));
    pr($procedure->get('DESCRIPTION')->getValue());
    foreach ($procedure->getCOLORS()->getAll() as $color) {
        pr($color->getValue());
    }
}*/
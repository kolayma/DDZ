<?php

use Bitrix\Main\Diag\Debug;

require $_SERVER['DOCUMENT_ROOT']. '/bitrix/header.php';
/**
 * @var CMain $APPLICATION
 */

$APPLICATION->setTitle('отладка пример');

function quickSort(array $array): array
{
    if (count($array) < 2) {
        return $array;
    }
    $left = $right = [];
    reset($array);
    $pivot = array_shift($array);

    foreach ($array as $item) {
        if ($item < $pivot) {
            $left[] = $item;
        } else {
            $right[] = $item;
        }
    }
    return array_merge(quickSort($left), [$pivot], quickSort($right));
}

Debug::startTimeLabel('sortLabel');


$array = array_map(function () {
    return rand (1, 100);
}, range(1, 4000));

quickSort($array);
Debug::endTimeLabel('sortLabel');

Debug::dump(Debug::getTimeLabels());

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
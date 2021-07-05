<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Loader;
Loader::includeModule("iblock");

$dbElements = CIBlockPropertyEnum::GetList([],['IBLOCK_ID'=>IBLOCK_NEWS,'CODE'=>'MAIN_TAG']);
while ($arElement = $dbElements->GetNext())
{
    $arResult[] = [
        'TEXT'=> $arElement['VALUE'],
        'LINK'=>'/?pisun='.$arElement['VALUE'],
    ];
}
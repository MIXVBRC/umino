<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
    return;

$arIBlockType = CIBlockParameters::GetIBlockTypes();

$arIBlock=[];
$rsIBlock = CIBlock::GetList(["SORT" => "ASC"], ["TYPE" => $arCurrentValues["IBLOCK_TYPE"], "ACTIVE"=>"Y"]);
while($arr=$rsIBlock->Fetch())
    $arIBlock[$arr["ID"]] = "[".$arr["ID"]."] ".$arr["NAME"];

$arSections = [];
$dbResultIBlockSections = CIBlockSection::GetList(["LEFT_MARGIN" => "ASC", "SORT" => "ASC"], ["IBLOCK_ID" => $arCurrentValues["IBLOCK_ID"], "GLOBAL_ACTIVE" => "Y",], false);
while($obResultIBlockSections = $dbResultIBlockSections->GetNext())
    $arSections[$obResultIBlockSections["ID"]] = $obResultIBlockSections["NAME"];

$arComponentParameters = [
	"GROUPS" => [
        "DATA" => [
            "NAME" => "Источний данных",
        ],
	],
	"PARAMETERS" => [

	    // DATA
        "IBLOCK_TYPE" => [
            "PARENT" => "DATA",
            "NAME" => "Тип инфоблока",
            "TYPE" => "LIST",
            "VALUES" => $arIBlockType,
            "REFRESH" => "Y",
        ],
        "IBLOCK_ID" => [
            "PARENT" => "DATA",
            "NAME" => "Инфоблок",
            "TYPE" => "LIST",
            "VALUES" => $arIBlock,
            "REFRESH" => "Y",
            "ADDITIONAL_VALUES" => "Y",
        ],
        "AJAX_MODE" => [],
    ],
];
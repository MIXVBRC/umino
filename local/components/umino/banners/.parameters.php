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
        "APPEARANCE" => [
            "NAME" => "Внешний вид",
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

        // APPEARANCE
        "BANNER_STYLE_QUANTITY" => [
            "PARENT" => "APPEARANCE",
            "NAME" => "Колчисество стилей баннеров",
            "TYPE" => "STRING",
            "REFRESH" => "Y",
        ],
    ],
];

// DATA
if ($arCurrentValues["IBLOCK_ID"])
{
    $arComponentParameters["PARAMETERS"]["SECTIONS"] = [
        "PARENT" => "DATA",
        "NAME" => "Выводить элементы из разделов",
        "TYPE" => "LIST",
        "VALUES" => $arSections,
        "MULTIPLE" => "Y",
    ];
    $arComponentParameters["PARAMETERS"]["INVISIBLE_SECTIONS"] = [
        "PARENT" => "DATA",
        "NAME" => "Скрыть названия разделов",
        "TYPE" => "LIST",
        "VALUES" => $arSections,
        "MULTIPLE" => "Y",
    ];
}

// APPEARANCE
if ($arCurrentValues["BANNER_STYLE_QUANTITY"])
{
    $bannersStyle = [];
    for($num=1;$num<=$arCurrentValues["BANNER_STYLE_QUANTITY"];$num++)
        $bannersStyle[$num] = "Баннер №".$num;
    unset($num);
    $arComponentParameters["PARAMETERS"]["BANNER_STYLE"] = [
        "PARENT" => "APPEARANCE",
        "NAME" => "Стиль баннера",
        "TYPE" => "LIST",
        "VALUES" => $bannersStyle,
    ];

    $arComponentParameters["PARAMETERS"]["ELEMENT_QUANTITY"] = [
        "PARENT" => "APPEARANCE",
        "NAME" => "Количество элементов",
        "TYPE" => "STRING",
    ];
    $arComponentParameters["PARAMETERS"]["SHOW_TEMPLATE_TITLE"] = [
        "PARENT" => "APPEARANCE",
        "NAME" => "Вывод заголовка шаблона",
        "TYPE" => "CHECKBOX",
    ];
    $arComponentParameters["PARAMETERS"]["TITLE"] = [
        "PARENT" => "APPEARANCE",
        "NAME" => "Заголовок",
        "TYPE" => "STRING",
    ];
}
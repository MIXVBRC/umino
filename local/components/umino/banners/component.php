<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
    return;

$dbResultIBlock = CIBlock::GetList([], ['TYPE'=>$arParams["IBLOCK_TYPE"], "ID" => $arParams["IBLOCK_ID"]], true);
while($obResultIBlock = $dbResultIBlock->Fetch())
{
    $arResult = $obResultIBlock;
}

$arOrder = [];
$arFilter = ["IBLOCK_ID"=>$arParams["IBLOCK_ID"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y"];
$arNavStartParams = ["nPageSize"=>$arParams["ELEMENT_QUANTITY"]];
$arSelectFields = [];
$dbResultElements = CIBlockElement::GetList($arOrder, $arFilter, false, $arNavStartParams, $arSelectFields);
while($obResultElements = $dbResultElements->GetNextElement())
{
    $obResultElements = $obResultElements->GetFields();

    $dbResultElementsProperty = CIBlockElement::GetProperty($arParams["IBLOCK_ID"], $obResultElements["ID"], ["sort" => "asc"], []);
    while($obResultElementsProperty = $dbResultElementsProperty->Fetch())
        $obResultElements["PROPERTIES"][$obResultElementsProperty["CODE"]] = $obResultElementsProperty;

    $arResult["ITEMS"][] = $obResultElements;
}

$this->IncludeComponentTemplate();
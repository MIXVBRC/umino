<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
	return;

$arSections = [];
$dbResultIBlockSections = CIBlockSection::GetList(["LEFT_MARGIN" => "ASC", "SORT" => "ASC"], ["IBLOCK_ID" => $arCurrentValues["IBLOCK_ID"], "GLOBAL_ACTIVE" => "Y",], false);
while($obResultIBlockSections = $dbResultIBlockSections->GetNext())
	$arSections[$obResultIBlockSections["CODE"]] = $obResultIBlockSections["NAME"];

$arTemplateParameters = array(
	"DISPLAY_DATE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_DATE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_NAME" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_NAME"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PICTURE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_PICTURE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PREVIEW_TEXT" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_TEXT"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"SECTIONS" => Array(
		"NAME" => "Выводить элементы из разделов",
		"TYPE" => "LIST",
		"VALUES" => $arSections,
		"MULTIPLE" => "Y",
		"SORT" => 1000,
	),
	"INVISIBLE_SECTIONS" => Array(
		"NAME" => "Скрыть названия разделов",
		"TYPE" => "LIST",
		"VALUES" => $arSections,
		"MULTIPLE" => "Y",
		"SORT" => 1100,
	),
);
?>

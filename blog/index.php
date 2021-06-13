<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Блог");
?><?$APPLICATION->IncludeComponent(
	"umino:banners", 
	".default", 
	array(
		"BANNER_STYLE" => "1",
		"BANNER_STYLE_QUANTITY" => "7",
		"IBLOCK_ID" => "7",
		"IBLOCK_TYPE" => "content",
		"INVISIBLE_SECTIONS" => array(
			0 => "11",
		),
		"SECTIONS" => array(
			0 => "11",
		),
		"COMPONENT_TEMPLATE" => ".default",
		"ELEMENT_QUANTITY" => "20",
		"SHOW_TEMPLATE_TITLE" => "Y",
		"TITLE" => "Новости"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
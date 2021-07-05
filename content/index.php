<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?>
<div class="col-md-12">
    <?$APPLICATION->IncludeComponent(
	"umino:easy.content", 
	".default", 
	array(
		"IBLOCK_ID" => IBLOCK_NEWS,
		"IBLOCK_TYPE" => "content",
		"COMPONENT_TEMPLATE" => ".default",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_JUMP" => "Y",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
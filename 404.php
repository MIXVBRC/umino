<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");

?>

<div class="not-found">
    <span>404</span>
    <p>Уупс! Что-то пошло не так! :(</p>
</div>

<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
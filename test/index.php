<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тестирование решений");
//use Bitrix\Main\Loader;
?>
<div class="col-md-12">
<?
//Loader::includeModule("iblock");
//$res = CIBlockPropertyEnum::GetList([],['IBLOCK_ID'=>IBLOCK_NEWS,'CODE'=>'MAIN_TAG']);
//while ($res_arr = $res->GetNext())
//{
//    pre($res_arr);
//}

//pre(getimagesize($_SERVER["DOCUMENT_ROOT"].'/test/1.png'));
$endPath = $_SERVER['DOCUMENT_ROOT'] . '/test/9999999.png';
CFile::ResizeImageFile( // уменьшение картинки для превью
    $_SERVER['DOCUMENT_ROOT'] . '/test/1.png',
    $endPath,
    [
        'width' => 100,
        'height' => 100
    ],
    BX_RESIZE_IMAGE_PROPORTIONAL_ALT
)
?>

</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

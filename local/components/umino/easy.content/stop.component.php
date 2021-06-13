<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
    return;

if ($_POST["AJAX_CALL"] == "Y")
{
    $arDetailText = [];
    foreach ($_POST as $key => $item) {
        if (stripos($key, "__")) {
            $key = explode("__", $key);
            $arDetailText[end($key)] = "<div class=\"inner-page__" . $key[0] . "\">" . $item . "</div>";
        }
    }


    $images = [];
    $detailImages = [];
    foreach ($_FILES as $key => $file) {

        $uploadDir = "/upload/content/";

        $fileName = explode(".",basename($file["name"]));
        $uploadFile = $_SERVER["DOCUMENT_ROOT"] . $uploadDir . str_shuffle(time().$file["size"]).".".end($fileName);

        if ($file["error"] == 0 && !empty($uploadFile)) {
            move_uploaded_file($file['tmp_name'], $uploadFile);
            if (stripos($key, "__")) {
                $key = explode("__", $key);
                $detailImages[end($key)] = "<div class=\"inner-page__" . $key[0] . "\"><img src=\"" . stristr($uploadFile, $uploadDir) . "\"></div>";
            } else {
                $images[$key] = $uploadFile;
            }
        }
    }

    $detailText = "";
    $count = count($arDetailText) + count($detailImages);
    for ($key = 0; $key < $count; $key++)
        $detailText .= (empty($detailImages[$key]) ? $arDetailText[$key] : $detailImages[$key]);

    $arElement = new CIBlockElement;

    $arElementProperty = [
        "MODIFIED_BY"    => $USER->GetID(),
        "IBLOCK_SECTION_ID" => [],
        "IBLOCK_ID"      => $arParams["IBLOCK_ID"],
        "PROPERTY_VALUES"=> [
            "ADDITIONAL_TITLE" => htmlspecialchars($_POST["ADDITIONAL_TITLE"]),
            "KEYWORDS" => htmlspecialchars($_POST["KEYWORDS"]),
        ],
        "NAME"           => htmlspecialchars($_POST["NAME"]),
        "ACTIVE"         => "Y",
        "PREVIEW_TEXT"   => htmlspecialchars($_POST["PREVIEW_TEXT"]),
        "DETAIL_TEXT"    => $detailText,
        "DETAIL_PICTURE" => CFile::MakeFileArray($images["DETAIL_PICTURE"]),
        "PREVIEW_PICTURE" => CFile::MakeFileArray($images["PREVIEW_PICTURE"]),
        "CODE" => Cutil::translit(htmlspecialchars($_POST["NAME"]),"ru",["replace_space"=>"_","replace_other"=>"_"]) . "_" . time(),
    ];

    if($PRODUCT_ID = $arElement->Add($arElementProperty)) {
        $arResult["SUCCESS"] = "Новость добавлена!";
    } else {
        $arResult["ERROR"] = $arElement->LAST_ERROR;
    }

    foreach ($images as $image)
        unlink($image);
}

$this->IncludeComponentTemplate();
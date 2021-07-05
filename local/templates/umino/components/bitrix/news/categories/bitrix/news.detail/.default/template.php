<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="detail">
    <picture>
        <?getPictureSource($arResult["DETAIL_PICTURE"],["min"=>[1200=>848],"max"=>[260=>290,575=>515,767=>707,991=>691,1199=>668]],0)?>
        <img class="detail__image" srcset="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["PREVIEW_TEXT"]?>">
    </picture>
    <div class="detail__subtitle">
        <?=$arResult["PROPERTIES"]["ADDITIONAL_TITLE"]["VALUE"]?>
    </div>
    <div class="detail__text">
        <p>
            <?=$arResult["DETAIL_TEXT"]?>
        </p>
    </div>
</div>
<?$APPLICATION->IncludeComponent(
    "umino:comments",
    ".default",
    array(
        "IBLOCK_ID" => IBLOCK_COMMENTS,
        "IBLOCK_ID_NEWS" => IBLOCK_NEWS,
        "IBLOCK_TYPE" => "data",
        "IBLOCK_TYPE_NEWS" => "content",
        "COMPONENT_TEMPLATE" => ".default",
        "AJAX_MODE" => "Y",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "N",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "ELEMENT_ID" => $arResult['ID'],
        "COMMENT_ID" => "",
        "ACTIVE_SAVE" => "Y"
    ),
    false
);?>

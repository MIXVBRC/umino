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
        <img class="detail__image" srcset="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_TEXT"]?>">
    </picture>
    <div class="detail__subtitle">
        <?=$arResult["PROPERTIES"]["ADDITIONAL_TITLE"]["VALUE"]?>
    </div>
    <div class="detail__text">
        <?=$arResult["DETAIL_TEXT"]?>
    </div>
</div>
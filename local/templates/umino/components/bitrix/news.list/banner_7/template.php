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
<section class="banner-7">
    <div class="banner__title"><h1><?=$arParams["TITLE"]?></h1></div>
    <div class="grid__7">
        <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="banner-7__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <picture>
                <?getPictureSource($arItem["PREVIEW_PICTURE"],["min"=>[1200=>350],"max"=>[320=>290,575=>545,767=>737,991=>350,1199=>350]],200)?>
                <img class="banner-7__image" srcset="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_TEXT"]?>">
            </picture>
            <div class="banner-7__info">
                <div class="banner-7__sticker"><a href="index.html">Жизнь</a></div>
                <a class="banner-7__info-title" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
                <div class="banner-7__subtitle"><?=$arItem["PROPERTIES"]["ADDITIONAL_TITLE"]["VALUE"]?></div>
            </div>
        </div>
        <?endforeach;?>
    </div>
</section>
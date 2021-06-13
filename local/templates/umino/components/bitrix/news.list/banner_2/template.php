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
<section class="banner-2">
    <div class="grid__2 <?=(!count($arResult["ITEMS"]) % 2 ? "odd" : "")?>">
        <?foreach($arResult["ITEMS"] as $key => $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="banner-2__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <a class="banner-2__link" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                <picture>
                    <?
                    if ($key == 0)
                        getPictureSource($arItem["PREVIEW_PICTURE"],["min"=>[1200=>775],"max"=>[320=>290,575=>545,767=>737,991=>961,1199=>615]],100);
                    else
                        getPictureSource($arItem["PREVIEW_PICTURE"],["min"=>[1200=>380],"max"=>[320=>290,575=>545,767=>737,991=>437,1199=>300]],200);
                    ?>
                    <img class="banner-2__image" srcset="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_TEXT"]?>">
                </picture>
                <div class="banner-2__info">
                    <div class="banner-2__title">
                        <?=$arItem["NAME"]?>
                    </div>
                </div>
            </a>
            <div class="banner-2__sticker"><a href="index.html">Жизнь</a></div>
        </div>
        <?endforeach;?>
    </div>
</section>
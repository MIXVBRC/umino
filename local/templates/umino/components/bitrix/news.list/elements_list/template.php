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
<div class="element-list">
    <div class="grid__7">
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="element-list__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <picture>
                    <?getPictureSource($arItem["PREVIEW_PICTURE"],["min"=>[1200=>363],"max"=>[320=>290,575=>545,767=>737,991=>298,1199=>288]],200)?>
                    <img class="element-list__image" srcset="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_TEXT"]?>">
                </picture>
                <div class="element-list__info">
                    <?if (!empty($arItem["SECTIONS"])):?>
                        <?foreach ($arItem["SECTIONS"] as $arSection):?>
                            <div class="element-list__sticker"><a href="/headings/<?=$arSection["CODE"]?>/"><?=$arSection["NAME"]?></a></div>
                        <?endforeach;?>
                    <?endif;?>
                    <a class="element-list__info-title" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
                    <div class="element-list__subtitle"><?=$arItem["PROPERTIES"]["ADDITIONAL_TITLE"]["VALUE"]?></div>
                </div>
            </div>
        <?endforeach;?>
    </div>
</div>
<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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

use Bitrix\Main\Page\Asset;
Asset::getInstance()->addCss($templateFolder . "/css/{$arParams["BANNER_STYLE"]}.css");

$this->setFrameMode(true);
?>
<?if ($arParams["BANNER_STYLE"] && $arResult["ITEMS"]):?>
    <section class="banner__<?=$arParams["BANNER_STYLE"]?>">
        <?if ($arParams["SHOW_TEMPLATE_TITLE"] == "Y" && !empty($arParams["TITLE"])):?>
            <div class="banner__title"><h2><?=$arParams["TITLE"]?></h2></div>
        <?endif;?>
        <?if ($arParams["BANNER_STYLE"] == 1):?>
            <div class="banner__grid<?=(!count($arResult["ITEMS"]) % 2 ? " odd" : "")?>">
                <?foreach($arResult["ITEMS"] as $arItem):?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="banner__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <a class="banner__link" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                            <picture>
                                <?getPictureSource($arItem["PREVIEW_PICTURE"],["min"=>[1200=>380],"max"=>[320=>290,575=>545,767=>737,991=>480,1199=>300]],300)?>
                                <img class="banner__image" srcset="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_TEXT"]?>">
                            </picture>
                            <div class="banner__info">
                                <div class="banner__info-title">
                                    <?=$arItem["NAME"]?>
                                    <span class="banner__subtitle"><?=$arItem["PROPERTIES"]["ADDITIONAL_TITLE"]["VALUE"]?></span>
                                </div>
                            </div>
                        </a>
                        <div class="banner__sticker"><a href="index.html">Жизнь</a></div>
                    </div>
                <?endforeach;?>
            </div>
        <?elseif ($arParams["BANNER_STYLE"] == 2):?>
            <div class="banner__grid<?=(!count($arResult["ITEMS"]) % 2 ? " odd" : "")?>">
                <?foreach($arResult["ITEMS"] as $key => $arItem):?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="banner__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <a class="banner__link" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                            <picture>
                                <?
                                if ($key == 0)
                                    getPictureSource($arItem["PREVIEW_PICTURE"],["min"=>[1200=>775],"max"=>[320=>290,575=>545,767=>737,991=>961,1199=>615]],100);
                                else
                                    getPictureSource($arItem["PREVIEW_PICTURE"],["min"=>[1200=>380],"max"=>[320=>290,575=>545,767=>737,991=>437,1199=>300]],200);
                                ?>
                                <img class="banner__image" srcset="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_TEXT"]?>">
                            </picture>
                            <div class="banner__info">
                                <div class="banner__title">
                                    <?=$arItem["NAME"]?>
                                </div>
                            </div>
                        </a>
                        <div class="banner__sticker"><a href="index.html">Жизнь</a></div>
                    </div>
                <?endforeach;?>
            </div>
        <?elseif ($arParams["BANNER_STYLE"] == 3):?>

        <?elseif ($arParams["BANNER_STYLE"] == 4):?>

        <?elseif ($arParams["BANNER_STYLE"] == 5):?>

        <?elseif ($arParams["BANNER_STYLE"] == 6):?>

        <?elseif ($arParams["BANNER_STYLE"] == 7):?>

        <?endif;?>
    </section>
<?endif;?>

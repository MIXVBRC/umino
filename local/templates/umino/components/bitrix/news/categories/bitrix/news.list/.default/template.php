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
<section class="type-1">
    <div class="container">
        <div class="row">
            <? foreach($arResult["ITEMS"] as $key => $arItem): ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="type-1__item col-md-6" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <a class="type-1__link" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                        <picture>
                            <?getPictureSource($arItem["PREVIEW_PICTURE"],["min"=>[1200=>1170],"max"=>[320=>290,575=>545,767=>737,991=>961,1199=>930]],200)?>
                            <img class="type-1__image" srcset="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_TEXT"]?>">
                        </picture>
                        <div class="type-1__info">
                            <div class="type-1__title">
                                <?=$arItem["NAME"]?>
                            </div>
                        </div>
                    </a>
                    <ul class="type-1__category-list">
                        <?foreach ($arItem['DISPLAY_PROPERTIES']['MAIN_TAG']['VALUE'] as $key => $category):?>
                            <li class="type-1__category-item">
                                <a class="type-1__category-link" href="/category/?category=<?=$arItem['DISPLAY_PROPERTIES']['MAIN_TAG']['VALUE_XML_ID'][$key]?>">
                                    <?=$category?>
                                </a>
                            </li>
                        <?endforeach;?>
                    </ul>
                </div>
            <?endforeach;?>
        </div>
    </div>
</section>
<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<ul class="header__menu-list">
    <?foreach($arResult as $arItem):?>
        <li class="header__menu-item"><a href="<?=$arItem["LINK"]?>" class="header__menu-link"><?=$arItem["TEXT"]?></a></li>
    <?endforeach?>
</ul>
<? if (!defined ('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<?php
// Namespace D7
use Bitrix\Main\Page\Asset;
?>
<!doctype html>
<html lang="<?=LANGUAGE_ID;?>">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?= $APPLICATION->ShowTitle() ?></title>
    <?

    // Для подключения css
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/font-awesome.min.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/flexbox.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/grid.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/style.css");

    // Для подключения скриптов
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/libs/jquery/jquery.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/script.js");

    // Для вывода строки в секцию <head> ... </head>, например можно добавить шрифт
    //Asset::getInstance()->addString("");

    $APPLICATION->ShowHead();

    ?>
</head>
<body>

<?$APPLICATION->ShowPanel();?>
<?$APPLICATION->GetDirProperty("keywords");?>
<div class="grid__main">
    <header class="header">
        <div class="header__mine <?=($USER->IsAdmin() ? "nofixed" : "")?>">
            <div class="container">
                <nav class="header__body">
                    <div class="header__logo">
                        <a href="<?= ($APPLICATION->GetCurPage(false) == '/' ? "javascript:void(0)" : "/") ?>">
                            <img src="<?=SITE_TEMPLATE_PATH?>/images/logo.png" alt="UMINO">
                        </a>
                    </div>

                    <div class="header__menu">
                        <div class="container">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "menu_top",
                                array(
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "CHILD_MENU_TYPE" => "left",
                                    "DELAY" => "N",
                                    "MAX_LEVEL" => "1",
                                    "MENU_CACHE_GET_VARS" => array(
                                    ),
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_TYPE" => "N",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "ROOT_MENU_TYPE" => "top",
                                    "USE_EXT" => "N",
                                    "COMPONENT_TEMPLATE" => "menu_top"
                                ),
                                false
                            );?>
                        </div>
                    </div>

                    <div class="header__additional">
                        <div class="header__search"><i class="fa fa-search search__open"></i></div>
                        <div class="header__avatar"><i class="fa fa-user-o"></i></div>
                        <div class="header__burger">
                            <span></span>
                        </div>
                    </div>

                </nav>
            </div>
        </div>
        <div class="search">
            <div class="search__body">
                <div class="search__content">
                    <div class="search__close"></div>
                    <div class="search__title">Поиск по сайту</div>
                    <form class="search__form">
                        <div class="search__input">
                            <input class="search__text" type="text">
                            <input class="search__button" type="submit" value="Поиск">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <main class="main">
        <div class="container" style="background-color: #fff">
            <div class="main__grid<?=($APPLICATION->GetProperty("SHOW_SIDEBAR") == 'Y' ? " sidebar" : "")?>">
                <div>
                    <?if ($APPLICATION->GetProperty("SHOW_TITLE") == "Y"):?>
                        <div class="page__title"><h2><?=$APPLICATION->ShowTitle()?></h2></div>
                    <?endif;?>
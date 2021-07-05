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
$this->setFrameMode(true);
?>
<div style="margin: 50px 0;">
    <? if ($USER->IsAuthorized()):?>
    <form id="comment" action="" method="post" enctype="multipart/form-data">
        <div>Оставить комментарий:</div>
        <div>
            <textarea name="COMMENT" style="width: 100%; height: 100px; border: 1px solid #000; padding: 15px"></textarea>
        </div>
        <button style="padding: 15px 30px; background-color: burlywood;" class="submit" type="submit">Добавить комментарий</button>
    </form>
    <? else: ?>
        <div>
            <div style="margin: 30px 0; background-color: aliceblue; padding: 15px">
                <b><a href="/bitrix/">Авторизуйтесь</a></b>
            </div>
        </div>
    <? endif; ?>

    <? if ($arResult['ITEMS']): ?>
    <div>
        <? foreach ($arResult['ITEMS'] as $arItem): ?>
            <div style="margin: 30px 0; background-color: aliceblue; padding: 15px">
                <div><b>Пользователь:</b> <?= $arItem['NAME'] ?></div>
                <div><b>Рейтинг комментария:</b> <?= $arItem['COMMENT_RATING'] ?></div>
                <div><b>Комментарий:</b></div>
                <div style="margin: 0 10px 30px 10px"><?= $arItem['DETAIL_TEXT'] ?></div>
            </div>
        <? endforeach; ?>
    </div>
    <?else:?>
    <div>
        <div style="margin: 30px 0; background-color: aliceblue; padding: 15px"><b>Комментариев нет</b></div>
    </div>
    <? endif; ?>
</div>

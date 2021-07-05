<?
$snippet = htmlspecialchars($_REQUEST["snippet"]);

// Заголовок
$mess['text'] = "Текст";
$mess['quote'] = "Цитата";
$mess['image'] = "Изображение";
$mess['table'] = "Таблица";
$mess['title'] = "Заголовок";
$mess['list'] = "Список";
?>
<div class="content__area" data-snippet-<?=$snippet?>>
    <div class="name"><?= $mess[$snippet] ?></div>
    <span class="remove"></span>
    <span class="move" data-up><i class="fa fa-angle-up"></i></span>
    <span class="move" data-down><i class="fa fa-angle-down"></i></span>

    <? if ($snippet == 'text'): ?>

        <span class="refer" data-link data-unactive><i class="fa fa-link"></i></span>
        <span class="refer" data-unlink data-unactive><i class="fa fa-unlink"></i></span>
        <div class="area getter" data-area data-class="<?=$snippet?>" contenteditable="true">123456789</div>

        <div class="refer__popup">
            <div class="refer__popup-body">
                <h2 class="refer__popup-title" data-link-create>Создать ссылку</h2>
                <h2 class="refer__popup-title" data-link-remove data-hide>Удалить ссылку</h2>
                <input class="refer__popup-input" type="text" data-link-create data-input-enter>
                <input class="refer__popup-input" type="text" disabled data-link-remove data-input-look data-hide>
                <div class="refer__popup-select">
                    <span class="refer__popup-button" data-link-create data-y>Создать</span>
                    <span class="refer__popup-button" data-link-remove data-d data-hide>Удалить</span>
                    <span class="refer__popup-button" data-c>Отмена</span>
                </div>
            </div>
        </div>

    <? elseif ($snippet == 'quote'): ?>

        <div class="area getter" data-class="<?=$snippet?>" contenteditable="true"></div>

    <? elseif ($snippet == 'title'): ?>

        <div class="area getter" data-class="<?=$snippet?>" contenteditable="true"></div>

    <? elseif ($snippet == 'image'): ?>

        <div class="file">
            <input class="area getter" data-class="<?=$snippet?>" accept="image/jpeg,image/png,image/gif" type="file">
        </div>

    <? elseif ($snippet == 'table'): ?>

        <div class="table">
            <div class="getter" data-class="<?=$snippet?>">
                <table>
                    <tbody>
                    <tr>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="table__change right plus" data-side="right">+</div>
            <div class="table__change bottom plus" data-side="bottom">+</div>
            <div class="invert"><i class="fa fa-refresh"></i></div>
        </div>

    <? elseif ($snippet == 'list'): ?>

        <div class="list">
            <div class="getter" data-class="<?=$snippet?>">
                <ul>
                    <li contenteditable="true"></li>
                    <li contenteditable="true"></li>
                    <li contenteditable="true"></li>
                </ul>
            </div>
            <div class="list__change plus">+</div>
            <div class="list__change minus">-</div>
        </div>

    <? endif; ?>

    <div class="remove__popup">
        <div class="remove__popup-body">
            <h3 class="remove__popup-title">Удалить элемент?</h3>
            <div class="remove__popup-select">
                <span class="remove__popup-button" data-y>Да</span>
                <span class="remove__popup-button" data-n>Нет</span>
            </div>
        </div>
    </div>

</div>

<?
$pattern = htmlspecialchars($_REQUEST["pattern"]);

// Заголовок
$mess['text'] = "Текст";
$mess['quote'] = "Цитата";
$mess['image'] = "Изображение";
$mess['table'] = "Таблица";
$mess['title'] = "Заголовок";
$mess['list'] = "Список";
?>
<div class="content__area">
    <div class="name"><?=$mess[$pattern]?></div>
    <span class="remove"></span>
    <span data-up class="move"><i class="fa fa-angle-up"></i></span>
    <span data-down class="move"><i class="fa fa-angle-down"></i></span>

    <?if (in_array($pattern, ['text','quote','title'])):?>

        <div class="area getter" data-class="<?=$pattern?>" contenteditable="true"></div>

    <?elseif (in_array($pattern, ['image'])):?>

        <div class="file">
            <input class="area getter" data-class="<?=$pattern?>" accept="image/jpeg,image/png,image/gif" type="file">
        </div>

    <?elseif (in_array($pattern, ['table'])):?>

        <div class="table">
            <div class="getter" data-class="<?=$pattern?>">
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

    <?elseif (in_array($pattern, ['list'])):?>

        <div class="list">
            <div class="getter" data-class="<?=$pattern?>">
                <ul>
                    <li contenteditable="true"></li>
                    <li contenteditable="true"></li>
                    <li contenteditable="true"></li>
                </ul>
            </div>
            <div class="list__change plus">+</div>
            <div class="list__change minus">-</div>
        </div>

    <?endif;?>

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

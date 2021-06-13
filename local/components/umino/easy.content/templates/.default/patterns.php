<?
$pattern = htmlspecialchars($_REQUEST["pattern"]);

// Заголовок
$mess["text"] = "Текст";
$mess["quote"] = "Цитата";
$mess["image"] = "Изображение";
$mess["table"] = "Таблица";
$mess["title"] = "Заголовок";
$mess["list"] = "Список";
?>
<div class="content__area">
    <div class="name"><?=$mess[$pattern]?></div><span class="remove"></span>
        <?if (in_array($pattern, ["text","quote","title"])):?>
            <div class="area getter" data-class="<?=$pattern?>" contenteditable="true"></div>
        <?elseif (in_array($pattern, ["image"])):?>
            <div class="file">
                <input class="area" accept="image/jpeg,image/png,image/gif" type="file">
            </div>
        <?elseif (in_array($pattern, ["table"])):?>
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
        <?elseif (in_array($pattern, ["list"])):?>
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
</div>

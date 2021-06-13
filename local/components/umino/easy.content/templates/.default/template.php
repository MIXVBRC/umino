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

$snippets = [
    "text" => "Текст",
    "quote" => "Цитата",
    "image" => "Изображение",
    "table" => "Таблица",
    "title" => "Заголовок",
    "list" => "Список",
];

$this->setFrameMode(false);
?>
<form id="easyContent" class="content" action="" method="post" enctype="multipart/form-data">

    <?if ($arResult["SUCCESS"]):?>
        <div class="success">
            <?=$arResult["SUCCESS"]?>
        </div>
    <?endif;?>

    <?if ($arResult["ERROR"]):?>
        <div class="error">
            <?=$arResult["ERROR"]?>
        </div>
    <?endif;?>

    <div class="content__header">
        <h2>Создание новой новости</h2>
        <div class="content__default">

            <?foreach ($arResult["FIELDS"] as $code => $arField):?>
                <?$required = ($arField["IS_REQUIRED"] == "Y" ? " required" : "")?>
                <div class="content__area">
                    <div class="name"><?=$arField["NAME"]?></div>
                    <?if ($arField["PROPERTY_TYPE"] == "textarea"):?>
                        <textarea class="area" name="<?=$code?>"<?=$required?>></textarea>
                    <?elseif ($arField["PROPERTY_TYPE"] == "file"):?>
                        <input class="area" accept="image/jpeg,image/png,image/gif" type="file" name="<?=$code?>"<?=$required?>>
                    <?else:?>
                        <input class="area" type="<?=$arField["TYPE"]?>" name="<?=$code?>"<?=$required?>>
                    <?endif;?>
                </div>
            <?endforeach;?>

            <?foreach ($arResult["PROPERTIES"] as $code => $arField):?>
                <?$required = ($arField["IS_REQUIRED"] == "Y" ? " required" : "")?>
                <div class="content__area">
                    <div class="name"><?=$arField["NAME"]?></div>
                    <?if ($arField["PROPERTY_TYPE"] == "S"):?>
                        <input class="area" type="<?=$arField["TYPE"]?>" name="<?=$code?>"<?=$required?>>
                    <?else:?>
                        <input class="area" type="<?=$arField["TYPE"]?>" name="<?=$code?>"<?=$required?>>
                    <?endif;?>
                </div>
            <?endforeach;?>

        </div>
    </div>

    <div class="content__body">
        <h4>Детальное описание</h4>
        <div class="content__main">

        </div>
        <div class="content__snippets">
            <?foreach ($snippets as $type => $name):?>
                <div class="content__type" data-type="<?=$type?>"><?=$name?></div>
            <?endforeach;?>
        </div>
    </div>


    <div class="content__footer">
        <div class="content__buttons">
            <button class="submit" name="CREATE" type="submit">Добавить новость</button>
        </div>
    </div>

</form>

<script>
    (function () {

        let main = document.querySelector('.content__main'),
            type = document.querySelectorAll('.content__type');

        type.forEach(function (item) {
            item.addEventListener('click', function () {
                $.ajax({
                    type: 'POST',
                    url: '<?=$templateFolder?>/patterns.php',
                    data: {pattern:item.dataset.type},
                    success: function (data) {
                        $(main).append(data);
                    }
                });
            });
        });

        document.querySelectorAll('input[type=file]').forEach(function (item) {
            item.addEventListener('change', () => {

                let formData = new FormData();

                formData.append('file', $(item).prop('files')[0]);

                $.ajax({
                    type: 'POST',
                    url: '<?=$componentPath?>/file.php',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function (data) {
                        $(item).closest('.content__area').prepend(data);
                    }
                });

            });
        });

        document.querySelector('.content button.submit').addEventListener('click', function () {

            /**
             * Формирование детального текста
             */
            (function () {

                let textarea = document.createElement('textarea'),
                    detailText = '';
                textarea.name = 'DETAIL_TEXT';
                textarea.style.display = 'none';

                main.querySelectorAll('*').forEach(function (item) {
                    item.removeAttribute('contenteditable');
                });
                pre(main);
                main.querySelectorAll('.getter').forEach(function (getter) {
                    let div = document.createElement('div');
                    div.className = 'inner-page__' + getter.dataset.class;
                    div.append(getter.innerHTML);
                    detailText = detailText + div.outerHTML;
                });
                textarea.innerHTML = detailText;
                main.append(textarea);

            })();

        });

        (function () {
            const config = {
                attributes: false,
                childList: true,
                subtree: false
            };

            const callback = function(mutationsList) {

                for (let mutation of mutationsList) {

                    if (mutation.type === 'childList') {

                        if (mutation.addedNodes.length <= 0) return;

                        let mutationNode = mutation.addedNodes[0];

                        if (mutationNode.querySelector('.remove')){
                            mutationNode.querySelector('.remove').addEventListener('click', function () {
                                this.closest('.content__area').remove();
                            });
                        }

                        /**
                         * Функционал сниппетов
                         */
                        (function () {

                            /**
                             * Таблица
                             */
                            if (mutationNode.querySelector('.table')) {

                                function tableTdWidth(mutation) {
                                    mutation.addedNodes[0].querySelectorAll('tr').forEach(function (item) {
                                        let td = item.querySelectorAll('td'),
                                            tableWidth = mutation.addedNodes[0].querySelector('table').offsetWidth;
                                        td.forEach(function (item) {
                                            item.style.width = tableWidth / td.length + 'px';
                                        });
                                    });
                                }

                                mutationNode.querySelectorAll('.table__change').forEach(function (item) {
                                    item.addEventListener('click', function () {
                                        let table = this.closest('.table').querySelector('table'),
                                            tr = this.closest('.table').querySelectorAll('tr'),
                                            td = this.closest('.table').querySelectorAll('td'),
                                            tdCount = td.length / tr.length;

                                        if (this.classList.contains('plus')) {
                                            if (this.dataset.side === 'right' && !item.classList.contains('stop-plus'))
                                                tr.forEach(function (item) {
                                                    let tdElement = document.createElement('td');
                                                    tdElement.contentEditable = 'true';
                                                    item.append(tdElement);
                                                });


                                            if (this.dataset.side === 'bottom') {
                                                let trElement = document.createElement('tr');
                                                if (tdCount <= 0) tdCount = 1;
                                                while(tdCount) {
                                                    let tdElement = document.createElement('td');
                                                    tdElement.contentEditable = 'true';
                                                    trElement.append(tdElement);
                                                    tdCount--;
                                                }
                                                table.querySelector('tbody').append(trElement);
                                            }
                                        }

                                        if (this.classList.contains('minus')) {

                                            if (this.dataset.side === 'right')
                                                tr.forEach(function (item) {
                                                    let td = item.querySelectorAll('td'),
                                                        tdLength = td.length;
                                                    if (tdLength > 1)
                                                        td[tdLength - 1].remove();
                                                });

                                            if (this.dataset.side === 'bottom') {
                                                let trLength = tr.length;
                                                if (trLength > 1)
                                                    tr[trLength - 1].remove();
                                            }

                                        }

                                        let horizontalCount = this.closest('.table').querySelectorAll('td').length / this.closest('.table').querySelectorAll('tr').length,
                                            verticalCount = this.closest('.table').querySelectorAll('tr').length;

                                        if (horizontalCount >= 11 && item.classList.contains('right')) {
                                            item.classList.add('stop-plus');
                                        } else if ((horizontalCount <= 1 && item.classList.contains('right')) || (verticalCount <= 1 && item.classList.contains('bottom'))) {
                                            item.classList.add('stop-minus');
                                        } else {
                                            item.classList.remove('stop-plus');
                                            item.classList.remove('stop-minus');
                                        }

                                        tableTdWidth(mutation);
                                    });
                                });

                                tableTdWidth(mutation);

                                mutationNode.querySelector('.invert').addEventListener('click', function () {
                                    mutationNode.querySelectorAll('.table__change').forEach(function (item) {
                                        if (item.classList.contains('plus')){
                                            item.innerHTML = '-';
                                            item.classList.toggle('plus');
                                            item.classList.toggle('minus');
                                        } else {
                                            item.innerHTML = '+';
                                            item.classList.toggle('minus');
                                            item.classList.toggle('plus');
                                        }
                                    });
                                });
                            }

                            /**
                             * Список
                             */
                            mutationNode.querySelectorAll('.list__change').forEach(function (item) {
                                item.addEventListener('click', function () {

                                    if (this.classList.contains('plus')){
                                        let li = document.createElement('li');
                                        li.contentEditable = 'true';
                                        this.closest('.list').querySelector('ul').append(li);
                                    } else if (this.closest('.list').querySelectorAll('li').length > 1) {
                                        let li = this.closest('.list').querySelectorAll('li');
                                        li[li.length - 1].remove();
                                    }

                                    let minus = this.closest('.list').querySelector('.minus');
                                    if (item.closest('.list').querySelectorAll('li').length <= 1)
                                        minus.classList.add('stop-minus');
                                    else if (minus.classList.contains('stop-minus'))
                                        minus.classList.remove('stop-minus');
                                });
                            });

                            /**
                             * Файлы
                             */
                            // pre($(mutationNode));
                            mutationNode.querySelectorAll('input[type=file]').forEach(function (item) {
                                item.addEventListener('change', () => {

                                    let formData = new FormData();

                                    formData.append('file', $(item).prop('files')[0]);

                                    $.ajax({
                                        type: 'POST',
                                        url: '<?=$componentPath?>/file.php',
                                        processData: false,
                                        contentType: false,
                                        data: formData,
                                        success: function (data) {
                                            $(item).closest('.file').append(data);
                                            $(item).remove();
                                        }
                                    });

                                });
                            });

                        })();
                    }
                }
            };
            const observer = new MutationObserver(callback);
            observer.observe(main, config);
        })();
    })();
</script>


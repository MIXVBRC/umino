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
    'title' => GetMessage('SNIPPET_TITLE'),
    'image' => GetMessage('SNIPPET_IMAGE'),
    'text' => GetMessage('SNIPPET_TEXT'),
    'table' => GetMessage('SNIPPET_TABLE'),
    'quote' => GetMessage('SNIPPET_QUOTE'),
    'list' => GetMessage('SNIPPET_LIST'),
];
$this->setFrameMode(false);
?>
<form id="easyContent"
      class="content"
      action=""
      method="post"
      enctype="multipart/form-data"
      data-snippets="<?=$templateFolder?>/snippets.php"
      data-image="<?=$componentPath?>/image.php"
      data-text="<?=$componentPath?>/text.php"
>

    <?if ($arResult['SUCCESS']):?>
        <div class="success">
            <?=$arResult['SUCCESS']?>
        </div>
    <?endif;?>

    <?if ($arResult['ERROR']):?>
        <div class="error">
            <?=$arResult['ERROR']?>
        </div>
    <?endif;?>

    <div class="content__header">
        <h2><?=GetMessage('CREATE_NEWS')?></h2>
        <div class="content__default">

            <?foreach ($arResult['FIELDS'] as $code => $arField):?>
                <div class="content__area">
                    <div class="name"><?=$arField['NAME']?></div>
                    <?if ($arField['PROPERTY_TYPE'] == 'textarea'):?>
                        <textarea class="area" name="<?=$code?>" <?=$arField['ATTRIBUTES']?>><?=$arField['VALUE']?></textarea>
                    <?elseif ($arField['PROPERTY_TYPE'] == 'file'):?>
                        <input class="area" accept="image/jpeg,image/png,image/gif" type="file" name="<?=$code?>" <?=$arField['ATTRIBUTES']?>>
                    <?else:?>
                        <input class="area" type="<?=$arField['TYPE']?>" name="<?=$code?>" value="<?=$arField['VALUE']?>" <?=$arField['ATTRIBUTES']?>>
                    <?endif;?>
                </div>
            <?endforeach;?>

            <?foreach ($arResult['PROPERTIES'] as $code => $arField):?>
                <div class="content__area">
                    <div class="name"><?=$arField['NAME']?></div>
                    <?if ($arField['PROPERTY_TYPE'] == 'list'):?>
                        <select class="area" size="<?= count($arField['VALUES'])?>" name="<?=$code.$arField['CODE_PREFIX']?>" <?=$arField['ATTRIBUTES']?>>
                            <? foreach ($arField['VALUES'] as $enum): ;?>
                                <option value="<?=$enum['ID']?>"<?=$enum['ATTRIBUTES']?>><?=$enum['VALUE']?></option>
                            <? endforeach; ?>
                        </select>
                    <?else:?>
                        <input class="area" type="<?=$arField['PROPERTY_TYPE']?>" name="<?=$code?>" value="<?=$arField['VALUE']?>" <?=$arField['ATTRIBUTES']?>>
                    <?endif;?>
                </div>
            <?endforeach;?>

        </div>
    </div>

    <div class="content__body">
        <h4><?=GetMessage('NEWS_CONTENT')?></h4>
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
            <input data-lala class="submit" name="CREATE" type="submit" value="<?=GetMessage('ADD_NEWS')?>">
        </div>
    </div>

</form>

<script>
    (function() {
        let main = document.querySelector('.content__main'),
            type = document.querySelectorAll('.content__type'),
            form = document.getElementById('easyContent');

        let snippetsPath = form.dataset.snippets,
            imagePath = form.dataset.image,
            textPath = form.dataset.text;

        let patternText = new text(textPath);

        /**
         * Удаление данных при загрузке страницы
         */
        (function () {
            form.removeAttribute('data-snippets');
            form.removeAttribute('data-image');
            form.removeAttribute('data-text');
        })();

        /**
         * Вставка сниппетов
         */
        (function () {
            type.forEach(function (item) {
                item.addEventListener('click', function () {
                    $.ajax({
                        type: 'POST',
                        url: snippetsPath,
                        data: {snippet:item.dataset.type},
                        success: function (data) {
                            let snippet = document.querySelector('.content__area .name[data-select]');

                            if (snippet) {
                                snippet.closest('.content__area').insertAdjacentHTML('afterend', data);
                                snippet.removeAttribute('data-select');
                            } else {
                                main.insertAdjacentHTML('beforeend', data);
                            }

                        }
                    });
                });
            });
        })();

        /**
         * Показ картинки при загрузке
         */
        function handleFiles(element) {
            let files = element.files,
                item = element.parentNode;

            item.querySelectorAll('.content__image').forEach(function (item) {
                item.remove();
            });

            for (let i = 0; i < files.length; i++) {
                let file = files[i];

                if (!file.type.startsWith('image/')){ continue }

                let div = document.createElement('div'),
                    img = document.createElement('img');

                div.classList.add('content__image');
                img.file = file;

                item.append(div);
                div.append(img);

                let reader = new FileReader();
                reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
                reader.readAsDataURL(file);
            }
        }

        /**
         * Файлы (картинка анонса и детальная картинка)
         */
        (function () {
            document.querySelectorAll('input[type=file]').forEach(function (item) {
                if (item.value) handleFiles(item);
                item.addEventListener('change', () => {
                    handleFiles(item);
                });
            });
        })();

        /**
         * Формирование детального текста
         */
        (function () {
            document.querySelector('.content input.submit').addEventListener('click', function () {

                let textarea = document.createElement('textarea'),
                    detailText = '';
                textarea.name = 'DETAIL_TEXT';
                textarea.style.display = 'none';

                main.querySelectorAll('*').forEach(function (item) {
                    item.removeAttribute('contenteditable');
                });
                main.querySelectorAll('.getter').forEach(function (getter) {

                    let html,
                        div = document.createElement('div');

                    div.className = 'inner-page__' + getter.dataset.class;

                    if (getter.dataset.class === 'image')
                    {
                        let file = getter.files[0],
                            formData = new FormData();

                        formData.append('image', file);

                        $.ajax({
                            type: 'POST',
                            url: imagePath,
                            async: false,
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: formData,
                            success: function (img) {
                                html = img;
                            }
                        });

                    } else if (getter.dataset.class === 'title') {
                        html = document.createElement('h2');
                        html.append(getter.innerHTML);
                    } else if (getter.dataset.class === 'text') {
                        html = document.createElement('p');
                        html.append(getter.innerHTML);
                    } else {
                        html = getter;
                    }

                    div.append(html);

                    detailText = detailText + div.outerHTML;
                });
                textarea.innerHTML = detailText;
                main.append(textarea);
            });
        })();

        /**
         * Создание ссылок
         */
        function createLink(item, link, arLinks) {

            item.setAttribute('data-show','');

            item.querySelectorAll('[data-link-create]').forEach((element)=>{
                element.removeAttribute('data-hide');
            });

            item.querySelectorAll('[data-link-remove]').forEach((element)=>{
                element.setAttribute('data-hide','');
            });

            item.querySelector('[data-y]').setAttribute('data-start', link.start);
            item.querySelector('[data-y]').setAttribute('data-end', link.end);

            item.querySelector('[data-y]').addEventListener('click', function (event) {

                let input = item.querySelector('[data-input-enter]'),
                    inputValue = input.value;

                if (inputValue !== '') {

                    arLinks.push({
                        start : this.dataset.start,
                        end : this.dataset.end,
                        link : inputValue,
                    });

                    input.value = '';

                    item.removeAttribute('data-show');
                    item.removeEventListener('click', event);

                } else {

                    if (input.hasAttribute('data-empty')) return;
                    input.setAttribute('data-empty','');
                    setTimeout(function () {
                        input.removeAttribute('data-empty');
                    }, 1000);

                }
                item.querySelector('[data-y]').setAttribute('data-array', JSON.arLinks);

            });
        }

        /**
         * Удаление ссылок
         */
        function deleteLink(item, index, arLinks) {

            item.setAttribute('data-show','');
            item.querySelectorAll('[data-link-create]').forEach((element)=>{
                element.setAttribute('data-hide','');
            });
            item.querySelectorAll('[data-link-remove]').forEach((element)=>{
                element.removeAttribute('data-hide');
            });

            item.querySelector('[data-input-look]').value = arLinks[index].link;

            item.querySelector('[data-d]').addEventListener('click', function (event) {

                arLinks.splice(index,1);
                item.removeAttribute('data-show');
                item.removeEventListener('click', event);

            });


        }

        /**
         * Регистратор изменений в поле сниппетов
         */
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

                        /**
                         * Удаление сниппетов
                         */
                        (function () {
                            mutationNode.querySelectorAll('.remove').forEach((item)=>{
                                item.addEventListener('click', function () {

                                    if (item.closest('.content__area').hasAttribute('data-show')) return;

                                    item.closest('.content__area').setAttribute('data-show','');

                                });
                            });
                            mutationNode.querySelectorAll('.remove__popup-button').forEach((item)=>{
                                item.addEventListener('click', function () {

                                    if (this.hasAttribute('data-y')) {
                                        item.closest('.content__area[data-show]').remove();
                                    }

                                    if (this.hasAttribute('data-n')) {
                                        item.closest('.content__area[data-show]').removeAttribute('data-show');
                                    }

                                });
                            });
                        })();

                        /**
                         * Перемещение сниппетов
                         */
                        (function () {
                            mutationNode.querySelectorAll('.move').forEach((item)=>{
                                item.addEventListener('click', function () {

                                    let snippet = item.closest('.content__area'),
                                        parentNode = snippet.parentNode,
                                        previous = snippet.previousElementSibling,
                                        next = snippet.nextElementSibling;

                                    if (!previous && !next) return;

                                    if (item.hasAttribute('data-up')) {
                                        if (!previous) return;
                                        parentNode.insertBefore(snippet, previous);
                                    }

                                    if (item.hasAttribute('data-down')) {
                                        if (!next) return;
                                        parentNode.insertBefore(snippet, next.nextSibling);
                                    }

                                });
                            });
                        })();

                        /**
                         * Выделение сниппетов
                         */
                        (function () {
                            mutationNode.querySelectorAll('.content__area .name').forEach((item)=>{
                                item.addEventListener('click', function () {
                                    if (this.hasAttribute('data-select')) {
                                        this.removeAttribute('data-select')
                                    } else {
                                        document.querySelectorAll('.content__area .name[data-select]').forEach((selected)=>{
                                            selected.removeAttribute('data-select');
                                        });
                                        this.setAttribute('data-select','');
                                    }
                                });
                            });
                        })();

                        /**
                         * Функционал сниппетов
                         */
                        (function () {

                            /**
                             * Таблица
                             */
                            if (mutationNode.hasAttribute('data-snippet-table')) {

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
                            if (mutationNode.hasAttribute('data-snippet-list')) {
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
                            }

                            /**
                             * Картинки
                             */
                            if (mutationNode.hasAttribute('data-snippet-image')) {
                                mutationNode.querySelectorAll('input[type=file]').forEach(function (item) {
                                    item.addEventListener('change', () => {
                                        handleFiles(item);
                                    });
                                });
                            }

                            /**
                             * Текст
                             */
                            if (mutationNode.hasAttribute('data-snippet-text')) {

                                let arLinks = [];

                                mutationNode.querySelector('[data-c]').addEventListener('click', ()=>{
                                    mutationNode.querySelector('.refer__popup').removeAttribute('data-show');
                                    mutationNode.querySelector('[data-input-enter]').value = '';
                                });

                                /**
                                 * Выделение текста
                                 */
                                mutationNode.querySelector('[data-area]').addEventListener('mouseup', function () {

                                    patternText.createLink(mutationNode);

                                    let selection = window.getSelection(),
                                        start = selection.getRangeAt(0).startOffset,
                                        end = selection.getRangeAt(0).endOffset;

                                    if (start === end) return;

                                    if (start > end) {
                                        start = selection.getRangeAt(0).endOffset;
                                        end = selection.getRangeAt(0).startOffset;
                                    }

                                    let link = {
                                        start : start,
                                        end : end
                                    };

                                    let stop = false;

                                    if (arLinks.length > 0) {

                                        arLinks.forEach((link, index) => {

                                            if (stop || link === undefined) return;

                                            if (start > link.start && start < link.end
                                                || end > link.start && end < link.end
                                                || start <= link.start && end >= link.start)
                                            {
                                                stop = true;

                                                mutationNode.querySelector('[data-link]').setAttribute('data-unactive','');
                                                mutationNode.querySelector('[data-unlink]').removeAttribute('data-unactive');

                                                deleteLink(mutationNode.querySelector('.refer__popup'), index, arLinks);
                                            }
                                        });

                                    }

                                    if (stop) return;

                                    createLink(mutationNode.querySelector('.refer__popup'), link, arLinks);

                                    mutationNode.querySelector('[data-link]').removeAttribute('data-unactive');
                                    mutationNode.querySelector('[data-unlink]').setAttribute('data-unactive','');

                                    link = null;

                                    // arLinks.push(link);

                                    // console.log(arLinks);

                                    // $.ajax({
                                    //     type: 'POST',
                                    //     url: textPath,
                                    //     data: {
                                    //         start : start,
                                    //         end : end,
                                    //         text : this.innerHTML,
                                    //     },
                                    //     success: function (data) {
                                    //         console.log(data);
                                    //     }
                                    // });
                                });
                            }
                        })();
                    }
                }
            };
            const observer = new MutationObserver(callback);
            observer.observe(main, config);
        })();
    })();
</script>
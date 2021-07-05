<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
        </div>
    </div>
</main>

<footer class="footer">
    <div class="footer__mine">
        <div class="container">
            <div class="footer__body">
                <nav>
                    <div class="footer__item">
                        <div class="footer__menu">
                            <div class="footer__menu-title">Меню</div>
                            <ul>
                                <li><a href="#" class="footer__menu-link">Блог</a></li>
                                <li><a href="#" class="footer__menu-link">Новости</a></li>
                                <li><a href="#" class="footer__menu-link">Популярное</a></li>
                                <li><a href="#" class="footer__menu-link">Свежее</a></li>
                                <li><a href="#" class="footer__menu-link">Рубрики</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="footer__item">
                    <div class="footer__info">
                        <div class="footer__error">Если нашли ошибку, выделите текст и нажмите <span>Ctrl + Enter</span></div>
                        <div class="footer_warning">Копирование материалов запрещено. Издание может получать комиссию от покупки товаров, представленных в публикациях.</div>
                        <div class="footer__copyright">© <?=date('Y')?> <?= $_SERVER['HTTP_HOST'] ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="popup">
            <div class="popup__body">
                <div class="popup__content">
                    <div class="popup__close"></div>
                    <div class="popup__title">Заголовок</div>
                    <div class="popup__area">
                        <div>Culpa ex, illo modi mollitia quas repellat veritatis voluptatum? Aliquid architecto asperiores
                            commodi dicta ex fuga illo obcaecati omnis quibusdam quisquam. Animi deserunt dolorem ea illo labore
                            nulla quae, voluptatibus?
                        </div>
                        <div>Aspernatur eos labore libero mollitia nihil sed suscipit. Aspernatur culpa dolor doloremque dolores
                            hic molestias numquam quas quo sed voluptatem. Aliquid atque aut eveniet odio voluptas. Cupiditate
                            doloribus obcaecati quis?
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus consequuntur doloribus
                            exercitationem id, pariatur quam ratione tenetur? Alias aut cum, cupiditate distinctio impedit
                            ipsum, maxime nobis porro possimus quae quod.
                        </div>
                        <div>Adipisci aliquam aspernatur, autem beatae cumque eius facilis fuga harum iure iusto laboriosam
                            necessitatibus, neque nulla officia possimus quaerat qui recusandae saepe sed similique sit
                            tempore ullam? Animi, iure necessitatibus!
                        </div>
                        <div>Asperiores autem debitis dolore dolores laboriosam mollitia nemo, optio tempore veniam
                            veritatis! Cum esse expedita fugiat ipsa quibusdam ut veritatis? Aperiam dolor fugit iure nihil
                            quae sint? Laudantium, non unde.
                        </div>
                        <div>Accusamus ad architecto beatae blanditiis commodi debitis delectus dolorem eius eligendi error,
                            incidunt inventore ipsam labore molestias nisi nobis obcaecati optio quam quasi quis tempora
                            temporibus, voluptas voluptate voluptatem voluptatibus.
                        </div>
                        <div>Adipisci assumenda blanditiis consectetur debitis doloribus enim eos et expedita facere hic
                            impedit in ipsa ipsam iste mollitia necessitatibus, non odio recusandae repudiandae sapiente
                            sit, soluta sunt tempore temporibus voluptatibus?
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<div class="uColor">
    <div class="uColor_switcher">
        <i class="fa fa-arrow-up"></i>
    </div>
    <div class="uColor_el" style="display: none"><span>Заголовок:</span><input data-type="header__mine" data-pos="before" data-get="class" data-col="background" type="text"></div>
    <div class="uColor_el" style="display: none"><span>Бэкграунд:</span><input data-type="body,html" data-pos="" data-get="" data-col="background" type="text"></div>
    <div class="uColor_el" style="display: none"><span>Подвал:</span><input data-type="footer" data-pos="" data-get="class" data-col="background" type="text"></div>
    <div class="uColor_el" style="display: none"><span>Заголовок у меню подвала:</span><input data-type="footer__menu-title" data-pos="" data-get="class" data-col="color" type="text"></div>
    <div class="uColor_el" style="display: none"><span>Линия под заголовком на деталке:</span><input data-type="page__title" data-pos="" data-get="class" data-col="border" type="text"></div>
    <script>
        var styleElem = document.querySelector('.uColor').appendChild(document.createElement("style"));

        document.querySelector('.uColor_switcher').addEventListener('click', function () {
            document.querySelectorAll('.uColor_el').forEach(function (item) {
                if (item.style.display === 'none') {
                    document.querySelector('.uColor_switcher i').classList.add('fa-arrow-down');
                    document.querySelector('.uColor_switcher i').classList.remove('fa-arrow-up');
                    item.style.display = 'flex';
                } else {
                    document.querySelector('.uColor_switcher i').classList.remove('fa-arrow-down');
                    document.querySelector('.uColor_switcher i').classList.add('fa-arrow-up');
                    item.style.display = 'none';
                }
            });
        });
        document.querySelectorAll('.uColor input').forEach(function (input) {
            input.addEventListener('keyup', () => {
                let style = '';
                document.querySelectorAll('.uColor input').forEach(function (item) {

                    if (!item.value) return;

                    let pos = item.dataset.pos,
                        get = item.dataset.get,
                        col = item.dataset.col;

                    if (!col) return;

                    console.log(get);

                    style += (get === 'id' ? '#' : (get === 'class' ? '.' : ''))
                        + item.dataset.type
                        + (pos === 'before' ? ':before' : (pos === 'after' ? ':after' : ''))
                        + ' {'
                        + (col === 'background' ? 'background-color' : (col === 'color' ? 'color' : (col === 'border' ? 'border-color' : '')))
                        + ': '
                        + item.value
                        + ';} ';
                });
                styleElem.innerHTML = style;
            });
        });
    </script>

    <style>
        .uColor {
            position: fixed;
            left: 15px;
            bottom: 15px;
        }
        .uColor_switcher {
            color: green;
            display: inline-block;
            text-align: center;
            margin-bottom: 1px;
            line-height: 0;
            padding: 5px;
            font-size: 35px;
        }
        .uColor_el {
            display: flex;
            justify-content: flex-end;
            background-color: #fff;
            padding: 5px;
            border: 1px solid rgba(0,0,0,0.1);
        }
        .uColor_el:not(:last-child) {
            margin-bottom: 1px;
        }
        .uColor_el span {
            margin-right: 10px;
        }
        .uColor_el input {
            text-align: center;
            border: 1px solid rgba(0,0,0,0.1);
        }
    </style>
</div>
</body>
</html>
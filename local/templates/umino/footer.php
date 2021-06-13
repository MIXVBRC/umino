<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
            <?if ($APPLICATION->GetProperty("SIDEBAR") == 'Y'):?>
                </div>
                <div class="main__sidebar">

                </div>
            <?else:?>
                </div>
            <?endif;?>
        </div>
    </div>
</main>

<footer class="footer">
    <div class="footer__mine">
        <div class="container">
            <div class="footer__body">
                <nav>
                    <div class="footer__grid">
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
                        <div class="footer__item">
                            <div class="footer__menu">
                                <div class="footer__menu-title">Информация</div>
                                <ul>
                                    <li><a href="#" class="footer__menu-link">Редакция</a></li>
                                    <li><a href="#" class="footer__menu-link">Контакты</a></li>
                                    <li><a href="#" class="footer__menu-link">О проекте</a></li>
                                    <li><a href="#" class="footer__menu-link">Политика</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer__item">
                            <div class="footer__menu">
                                <div class="footer__menu-title">Подписка</div>
                                <ul>
                                    <li><a href="#" class="footer__menu-link">Facebook</a></li>
                                    <li><a href="#" class="footer__menu-link">Вконтакте</a></li>
                                    <li><a href="#" class="footer__menu-link">YouTube</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer__item">
                            <div class="footer__menu">
                                <div class="footer__menu-title">Реклама</div>
                                <ul>
                                    <li><a href="#" class="footer__menu-link">Реклама на «Umino»</a></li>
                                    <li><a href="#" class="footer__menu-link">Прайс лист</a></li>
                                    <li><a href="#" class="footer__menu-link">Примеры нативной рекламы</a></li>
                                    <li><a href="#" class="footer__menu-link">Требования к баннерам</a></li>
                                    <li><a href="#" class="footer__menu-link">Написать в рекламный отдел</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer__item">
                            <div class="footer__menu">
                                <div class="footer__menu-title">Персональные данные</div>
                                <ul>
                                    <li><a href="#" class="footer__menu-link">Правила обработки</a></li>
                                    <li><a href="#" class="footer__menu-link">Использование куки</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer__item">
                            <div class="footer__info">
                                <div class="footer__error">Если нашли ошибку, выделите текст и нажмите <span>Ctrl + Enter</span></div>
                                <div class="footer_warning">Копирование материалов запрещено. Издание может получать комиссию от покупки товаров, представленных в публикациях.</div>
                                <div class="footer__copyright">© <?=date('Y')?> <?= $_SERVER['HTTP_HOST'] ?></div>
                            </div>
                        </div>
                    </div>
                </nav>
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

        <?$APPLICATION->IncludeComponent(
	"umino:preloader", 
	".default", 
	array(
		"ACTIVE" => "Y",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
    </div>
</footer>
</div>
</body>
</html>
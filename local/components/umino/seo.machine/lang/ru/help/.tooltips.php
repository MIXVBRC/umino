<?
// https://ru.wikipedia.org/wiki/%D0%9C%D0%B5%D1%82%D0%B0%D1%82%D0%B5%D0%B3%D0%B8
// STYLE
$style =
"
<style>
    #uminoHelp > h5:first-of-type {
        margin-bottom: 5px;
    }
    #uminoHelp > ul {
        background-color: white;
        padding: 5px;
        border: 1px solid;
        border-color: #8e9398 #989ca1 #a2a6ad;
    }
    #uminoHelp > ul > li {
        display: block;
        color: black;
    }
    #uminoHelp > ul > li:not(:last-child) {
        padding-bottom: 5px;
        margin-bottom: 5px;
        border-bottom: 1px solid rgba(0,0,0,0.2);
    }
    #uminoHelp > table {
        margin: 5px 0;
        padding: 5px;
        background-color: white;
        border: 1px solid;
        border-color: #8e9398 #989ca1 #a2a6ad;
        border-collapse: collapse;
        width: 100%;
    }
    #uminoHelp > table > caption {
        text-align: left;
        font-weight: bold;
        margin-top: 5px;
    }
    #uminoHelp > table > tbody > tr:nth-child(2n) {
        background-color: #E9E9E9;
    }
    #uminoHelp > table > tbody > tr > td {
        vertical-align: top;
        border: none;
        padding: 5px;
        font-size: 12px;
    }
    #uminoHelp > table > tbody > tr > td:first-of-type {
        min-width: 200px;
        text-align: right;
    }
    #uminoHelp > h5:last-of-type {
        margin-top: 10px;
    }
    #uminoHelp > ul > li > p {
        margin: 5px 5px 5px 0;
        padding: 5px;
        white-space: nowrap;
        width: 100%;
    }
    #uminoHelp > p {
        margin: 5px 5px 5px 0;
        padding: 5px;
        border: 1px solid;
        border-color: #8e9398 #989ca1 #a2a6ad;
        background-color: white;
        white-space: nowrap;
        width: 100%;
        overflow: scroll;
    }
</style>
";
// BASE_PARAMETERS
$MESS["BASE_PARAMETERS_LANGUAGE"."_TIP"] = $style .
"
<div id='uminoHelp'>
    <h5>Lang:</h5>
    <ul>
        <li>Теги Author и Copyright могут содержать дополнительный атрибут «lang», позволяющий определить язык, использующийся при указании значения свойства</li>
    </ul>
    <h5>Пример:</h5>
    <p>&lt;meta name=\"copyright\" lang=\"ru\" content=\"UMINO Вася Пупкин\"/&gt;</p>
</div>
";
$MESS["BASE_PARAMETERS_AUTHOR"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <h5>Author:</h5>
    <ul>
        <li>Теги Author и Copyright, как правило, не используются одновременно.</li>
        <li>Функция тегов — идентификация автора или принадлежности документа.</li>
        <li>Тег Author содержит имя автора Интернет-страницы, в том случае, если сайт принадлежит какой-либо организации, целесообразнее использовать тег Copyright.</li>
        <li>В настоящий момент имеют крайне низкую актуальность.</li>
    </ul>
    <h5>Пример:</h5>
    <p>&lt;meta name=\"author\" lang=\"ru\" content=\"Велимира Лисичкина\"/&gt;</p>
</div>
";
$MESS["BASE_PARAMETERS_COPYRIGHT"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <h5>Copyright:</h5>
    <ul>
        <li>Теги Author и Copyright, как правило, не используются одновременно.</li>
        <li>Функция тегов — идентификация автора или принадлежности документа.</li>
        <li>Тег Author содержит имя автора Интернет-страницы, в том случае, если сайт принадлежит какой-либо организации, целесообразнее использовать тег Copyright.</li>
        <li>В настоящий момент имеют крайне низкую актуальность.</li>
    </ul>
    <h5>Пример:</h5>
    <p>&lt;meta name=\"copyright\" lang=\"ru\" content=\"umino.ru\"/&gt;</p>
</div>
";
$MESS["BASE_PARAMETERS_OWNER"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <h5>Owner:</h5>
    <ul>
        <li>Для указания собственника веб-страницы</li>
    </ul>
    <h5>Пример:</h5>
    <p>&lt;meta name=\"owner\" content=\"umino.ru\"/&gt;</p>
</div>
";
$MESS["BASE_PARAMETERS_ADDRESS"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <h5>Address:</h5>
    <ul>
        <li>Можно сообщить фактический адрес для связи с автором или собственником:</li>
    </ul>
    <h5>Пример:</h5>
    <p>&lt;meta name=\"address\" content=\"Хабаровск\"/&gt;</p>
</div>
";
$MESS["BASE_PARAMETERS_DESCRIPTION"."_TIP"] = $style .
"
<div id='uminoHelp'>
    <h5>Description:</h5>
    <ul>
        <li>Description должен соответствовать конкретной веб-странице, а не всему сайту. Он должен отражать текущее, актуальное состояние страницы.</li>
        <li>Старайтесь создавать различные описания для каждой конкретной страницы и не использовать шаблоны для description. Или, по крайней мере, заполнять description оригинальным описанием на важных, ключевых страницах сайта.</li>
        <li>Мета-описание не должно быть слишком коротким, из нескольких слов.</li>
        <li>Размер meta description не должен превышать 100-140 символов. На вопрос нет однозначного ответа. Существуют различные точки зрения о верхней границе длины мета тега description: средние 160 символов или от 120 до 250 знаков. Большинство людей плохо воспринимают текстовую информацию длиной более 120-140 символов (вспомним тот же Twitter).</li>
        <li>Мета-описание может быть написано как в форме одного (с точкой или без точки на конце) или нескольких предложений, так и в форме перечисления важных параметров, ценных для пользователя.</li>
        <li>Мета-описание должно соответствовать языку страницы сайта, быть кратким, емким, но при этом содержательным. Необходимо коротко и ясно выразить суть содержимого страницы. Размещайте наиболее важную часть описания ближе к началу текста.</li>
        <li>Мета-описание должно быть простым, понятным без чрезмерного употребления ключевых слов/фраз, заглавных букв, рекламных слоганов, лишних символов (для «украшения») и восклицательных знаков.</li>
        <li>содержание данного тега может использоваться в сниппетах (описаниях сайтов на странице результатов поиска).</li>
    </ul>
    <p>&lt;meta name=\"description\" content=\"Подсказки для настраивания мета тегов\"/&gt;</p>
</div>
";
$MESS["BASE_PARAMETERS_KEYWORDS"."_TIP"] = $style .
"
<div id='uminoHelp'>
    <h5>Keywords:</h5>
    <ul>
        <li>Почти все поисковики игнорируют слова из этого списка если они не встречаются в видимой части страницы.</li>
        <li>Рекомендованное количество слов в данном теге — 5-10, не больше 20. Излишнее перечисление ключевых слов вряд ли будет позитивно воспринято поисковыми системами.</li>
        <li>Не более 3-х повторов. Многократное повторное перечисление одного и того же ключевого слова (фразы) всегда негативно воспринимается при СЕО анализе сайта и определении соответствия страницы поисковым запросам.</li>
        <li>Если очень хочется использовать ключевое словно мета кейвордс несколько раз — используйте ключевое слово (фразу) в различных склонениях и числах.</li>
        <li>Список ключевых слов можно разбавить популярными опечатками ключевых слов. Иногда опечатки бывают настолько популярными, что отображаются в подсказках прямо в поисковой строке.</li>
        <li>Если на сайте могут быть использованы англоязычные ключевые слова, значение которых соответствует содержимому страницы, почему бы не добавить их в мета тэг кейвордс.</li>
    </ul>
    <p>&lt;meta name=\"keywords\" content=\"подказки, метатеги, seo\"/&gt;</p>
</div>
";
$MESS["BASE_PARAMETERS_THEME_COLOR"."_TIP"] = $style .
"
<div id='uminoHelp'>
    <h5>Theme-color:</h5>
    <ul>
        <li>Если вы заходили с мобильного хрома в фейсбук, то наверняка видели, что интерфейс браузера красится в фирменный синий цвет соцсети.</li>
        <li>Мобильные сайты все больше походят на приложения, нежели на просто сайт с информацией, и Google поддерживает эту тенденцию. Посмотрите хотя бы на то, что в последних версиях мобильного хрома по умолчанию вкладки браузера смешиваются со списком недавно запущенных приложений. Но что не хватает сайту, чтобы стать еще чуточку больше приложением? Конечно же кастомизации оболочки (интрефейса). Начиная с 39 версии хрома для Android Lollipop была внедрена возможность менять цвет интерфейса браузера веб-разработчиками.</li>
        <li>Если у пользователя не включено смешивание вкладок с приложениями, то он увидит выбранный вами цвет вкладки на вашем сайте, но в списке вкладок, она по прежнему будет серой.</li>
    </ul>
    <p>&lt;meta name=\"theme-color\" content=\"#a2a6ad\"/&gt;</p>
</div>
";
$MESS["BASE_PARAMETERS_RATING"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <h5>Rating:</h5>
    <ul>
        <li>С помощью этого метатега страница помечается как содержащая контент для взрослых, из-за которого она не должна показываться в Google при использовании Безопасного поиска.</li>
        <li>Если пользователь включил режим Безопасного поиска, алгоритмы Google на основе различных данных определяют, какие результаты не показывать.</li>
        <li>В случае с изображениями свою роль играет машинное обучение, однако учитываются и достаточно простые факторы, например, где и в каком контексте определенное изображение использовалось раньше.</li>
        <li>Больше всего помогает различать контент для взрослых специальная разметка.</li>
        <li>Если вы публикуете такой контент, рекомендуем добавить в код своих страниц следующие метатеги:<br><br>&lt;meta name=\"rating\" content=\"adult\"/&gt;<br>&lt;meta name=\"rating\" content=\"RTA-5042-1996-1400-1577-RTA\"/&gt;</li>
    </ul>
    <p>&lt;meta name=\"rating\" content=\"restricted\"/&gt;</p>
</div>
";
$MESS["BASE_PARAMETERS_DOCUMENT_STATE"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <h5>Document-state:</h5>
    <ul>
        <li>Метатег Document-state может учитываться при индексации страницы поисковиками.</li>
        <li>Учитываются два значения атрибута content — Static и Dynamic.</li>
        <li>Значение Static указывает, что документ изменяется крайне редко.</li>
        <li>Dynamic (по умолчанию) — страница создается при запросе и может меняться в зависимости от дополнительных условий запроса.</li>
    </ul>
    <p>&lt;meta name=\"document-state\" content=\"dynamic\"/&gt;</p>
</div>
";
$MESS["BASE_PARAMETERS_URL"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <h5>Url:</h5>
    <ul>
        <li>Тег прекращает индексацию страницы поисковой системой, и перенаправляет робота поисковой машины по указанной ссылке.</li>
        <li>Тег применяется для отмены индексации «зеркала» и генерируемых страниц.</li>
    </ul>
    <p>&lt;meta name=\"url\" content=\"http://umino.ru/\"/&gt;</p>
</div>
";
$MESS["BASE_PARAMETERS_CACHE_CONTROL"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <h5>Cache-control:</h5>
    <ul>
        <li>Должно давать четкие указанию браузеру и промежуточным серверам как вести кэширование этой страницы.</li>
    </ul>
    <table>
        <caption>Управление кэшированием:</caption>
        <tbody>
        <tr>
            <td>public</td>
            <td>Указывает, что ответ может быть закэширован в любом кэше.</td>
        </tr>
        <tr>
            <td>private</td>
            <td>Указывает, что ответ предназначен для одного пользователя и не должен помещаться в разделяемый кэш. Частный кэш может хранить ресурс.</td>
        </tr>
        <tr>
            <td>no-cache</td>
            <td>Указывает на необходимость отправить запрос на сервер для валидации ресурса перед использованием закешированных данных.</td>
        </tr>
        <tr>
            <td>only-if-cached</td>
            <td>Указывает на необходимость использования только закэшированных данных. Запрос на сервер не должен посылаться.</td>
        </tr>
        </tbody>
    </table>
    <table>
        <caption>Управление временем жизни:</caption>
        <tbody>
        <tr>
            <td>max-age=&lt;seconds&gt;</td>
            <td>Задает максимальное время в течение которого ресурс будет считаться актуальным. В отличие от Expires, данная инструкция является относительной по отношению ко времени запроса.</td>
        </tr>
        <tr>
            <td>s-maxage=&lt;seconds&gt;</td>
            <td>Переопределяет max-age или заголовок Expires, но применяется только для разделяемых кэшей (например, прокси) и игнорируется частными кэшами.</td>
        </tr>
        <tr>
            <td>max-stale[=&lt;seconds&gt;]</td>
            <td>Указывает, что клиент хочет пролучить ответ, для которого было превышено время устаревания. Дополнительно может быть указано значение в секундах, указывающее, что ответ не должен быть просрочен более чем на указанное значение.</td>
        </tr>
        <tr>
            <td>min-fresh=&lt;seconds&gt;</td>
            <td>Указывает, что клиент хочет получить ответ, который будет актуален как минимум указанное количество секунд.</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
    <table>
        <caption>Управление ревалидацией и перезагрузкой:</caption>
        <tbody>
        <tr>
            <td>must-revalidate</td>
            <td>Кэш должен проверить статус устаревших ресурсов перед их использованием. Просроченные ресурсы не должны быть использованы.</td>
        </tr>
        <tr>
            <td>proxy-revalidate</td>
            <td>То же самое, что must-revalidate, но применимо только к разделяемым кэшам (например, прокси) и игнорируется частными кэшами.</td>
        </tr>
        <tr>
            <td>immutable</td>
            <td>Указывает, что тело ответа не изменится со временем.</td>
        </tr>
        </tbody>
    </table>
    <table>
        <caption>Другие инструкции:</caption>
        <tbody>
        <tr>
            <td>no-store</td>
            <td>Кэш не должен хранить никакую информацию о запросе и ответе</td>
        </tr>
        <tr>
            <td>no-transform</td>
            <td>Никакие преобразования не должны применяться к ресурсу. Заголовки Content-Encoding, Content-Range, Content-Type не должны изменяться прокси. Непрозрачный прокси может, например, конвертировать изображения из одного формата в другой для сохранения дискового пространства или уменьшения трафика. Инструкция no-transform запрещает это.</td>
        </tr>
        </tbody>
    </table>
    <p>&lt;meta name=\"cache-control\" content=\"no-cache, no-store, must-revalidate\"/&gt;</p>
</div>
";
$MESS["BASE_PARAMETERS_ROBOTS"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <h5>Robots:</h5>
    <ul>
        <li>Тег формирует информацию о гипертекстовых документах, которая поступает к роботам поисковых систем.</li>
        <li>Впервые предложен поисковиком Google, но очень быстро стал учитываться другими крупными поисковиками.</li>
        <li>Правильное применение очень положительно влияет на индексацию и ранжирование всеми крупными поисковиками, как и ошибки применения могут сильно повредить.</li>
    </ul>
    <table>
        <caption>Значения тега могут быть следующими:</caption>
        <tbody>
        <tr>
            <td>index</td>
            <td>Страница должна быть проиндексирована.</td>
        </tr>
        <tr>
            <td>noindex</td>
            <td>Документ не индексируется.</td>
        </tr>
        <tr>
            <td>follow</td>
            <td>Гиперссылки на странице отслеживаются.</td>
        </tr>
        <tr>
            <td>nofollow</td>
            <td>Гиперссылки не прослеживаются.</td>
        </tr>
        <tr>
            <td>all</td>
            <td>Включает значения index и follow, включен по умолчанию.</td>
        </tr>
        <tr>
            <td>none</td>
            <td>Включает значения noindex и nofollow.</td>
        </tr>
        </tbody>
    </table>
    <p>&lt;meta name=\"robots\" content=\"http://umino.ru/\"/&gt;</p>
</div>
";

// IPHONE_ICONS
$MESS["IPHONE_ICONS_APPLE_TOUCH_ICON_57"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <h5>Apple-touch-icon:</h5>
    <ul>
        <li>IPhone – first generation</li>
        <li>iPhone 2G</li>
        <li>iPhone 3G</li>
        <li>iPhone 3GS</li>
    </ul>
    <p>&lt;link rel=\"apple-touch-icon\" sizes=\"57x57\" href=\"/ios-icon-57.png\"/&gt;</p>
</div>
";
$MESS["IPHONE_ICONS_APPLE_TOUCH_ICON_76"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <h5>Apple-touch-icon:</h5>
    <ul>
        <li>iPad mini</li>
    </ul>
    <p>&lt;link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"/ios-icon-76.png\"/&gt;</p>
</div>
";
$MESS["IPHONE_ICONS_APPLE_TOUCH_ICON_120"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <h5>Apple-touch-icon:</h5>
    <ul>
        <li>iPhone 4</li>
        <li>iPhone 4s</li>
        <li>iPhone 5</li>
        <li>iPhone 5c</li>
        <li>iPhone 5s</li>
        <li>iPhone se</li>
        <li>iPhone 6</li>
        <li>iPhone 6s</li>
        <li>iPhone 7</li>
        <li>iPhone8</li>
    </ul>
    <p>&lt;link rel=\"apple-touch-icon\" sizes=\"120x120\" href=\"/ios-icon-120.png\"/&gt;</p>
</div>
";
$MESS["IPHONE_ICONS_APPLE_TOUCH_ICON_152"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <h5>Apple-touch-icon:</h5>
    <ul>
        <li>iPad</li>
        <li>iPad mini 2</li>
    </ul>
    <p>&lt;link rel=\"apple-touch-icon\" sizes=\"152x152\" href=\"/ios-icon-152.png\"/&gt;</p>
</div>
";
$MESS["IPHONE_ICONS_APPLE_TOUCH_ICON_167"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <h5>Apple-touch-icon:</h5>
    <ul>
        <li>iPad Pro</li>
    </ul>
    <p>&lt;link rel=\"apple-touch-icon\" sizes=\"167x167\" href=\"/ios-icon-167.png\"/&gt;</p>
</div>
";
$MESS["IPHONE_ICONS_APPLE_TOUCH_ICON_180"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <h5>Apple-touch-icon:</h5>
    <ul>
        <li>iPhone 6 Plus</li>
        <li>iPhone 6s Plus</li>
        <li>iPhone 7 Plus</li>
        <li>iPhone 8 Plus</li>
        <li>iPhone X</li>
    </ul>
    <p>&lt;link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"/ios-icon-180.png\"/&gt;</p>
</div>
";

// OPEN_GRAPH
$MESS["OPEN_GRAPH_LOCALE"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <p>&lt;meta property=\"og:locale\" content=\"ru_RU\"/&gt;</p>
</div>
";
$MESS["OPEN_GRAPH_TYPE"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <p>&lt;meta property=\"og:type\" content=\"article\"/&gt;</p>
</div>
";
$MESS["OPEN_GRAPH_TITLE"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <p>&lt;meta property=\"og:title\" content=\"Example title\"/&gt;</p>
</div>
";
$MESS["OPEN_GRAPH_DESCRIPTION"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <p>&lt;meta property=\"og:description\" content=\"Example description\"/&gt;</p>
</div>
";
$MESS["OPEN_GRAPH_IMAGE"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <p>&lt;meta property=\"og:image\" content=\"http://www.site.com/example.jpg\"/&gt;</p>
    <h5>Так же создаются автоматически:</h5>
    <p>&lt;meta property=\"og:image:secure_url\" content=\"http://www.site.com/example.jpg\"/&gt;</p>
    <p>&lt;meta property=\"og:image:type\" content=\"image/jpg\"/&gt;</p>
    <p>&lt;meta property=\"og:image:width\" content=\"1200\"/&gt;</p>
    <p>&lt;meta property=\"og:image:height\" content=\"600\"/&gt;</p>
</div>
";
$MESS["OPEN_GRAPH_URL"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <p>&lt;meta property=\"og:url\" content=\"http://www.site.com/example\"/&gt;</p>
</div>
";
$MESS["OPEN_GRAPH_SITE_NAME"."_TIP"] = $style .
    "
<div id='uminoHelp'>
    <p>&lt;meta property=\"og:site_name\" content=\"example.com\"/&gt;</p>
</div>
";
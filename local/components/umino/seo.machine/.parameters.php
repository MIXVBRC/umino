<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

__IncludeLang(GetLangFileName(dirname(__FILE__)."/lang/", "/help/.tooltips.php"));

$arComponentParameters = [
	"GROUPS" => [
        "BASE_PARAMETERS" => [
            "NAME" => "Стандартные параметры",
        ],
        "ICONS" => [
            "NAME" => "Иконки",
        ],
        "IPHONE_ICONS" => [
            "NAME" => "Иконки для устройств с операционной системой iOS",
        ],
        "OPEN_GRAPH" => [
            "NAME" => "OpenGraph",
        ],
        "OPEN_GRAPH_VIDEO" => [
            "NAME" => "OpenGraph видео",
        ],
        "OPEN_GRAPH_AUDIO" => [
            "NAME" => "OpenGraph аудио",
        ],
        "FACEBOOCK" => [
            "NAME" => "Facebook",
        ],
        "TWITTER" => [
            "NAME" => "Twitter",
        ],
        "VK" => [
            "NAME" => "ВКонтакте",
        ],
        "REST" => [
            "NAME" => "Остальные",
        ],
        "REDIRECT" => [
            "NAME" => "Редирект",
        ],
	],
	"PARAMETERS" => [

        // BASE_PARAMETERS
        "BASE_PARAMETERS_LANGUAGE" => [
            "PARENT" => "BASE_PARAMETERS",
            "NAME" => "Язык",
            "TYPE" => "STRING",
        ],
        "BASE_PARAMETERS_AUTHOR" => [
            "PARENT" => "BASE_PARAMETERS",
            "NAME" => "Автор страницы",
            "TYPE" => "STRING",
        ],
        "BASE_PARAMETERS_COPYRIGHT" => [
            "PARENT" => "BASE_PARAMETERS",
            "NAME" => "Авторские права",
            "TYPE" => "STRING",
        ],
        "BASE_PARAMETERS_OWNER" => [
            "PARENT" => "BASE_PARAMETERS",
            "NAME" => "Собственник веб-страницы",
            "TYPE" => "STRING",
        ],
        "BASE_PARAMETERS_ADDRESS" => [
            "PARENT" => "BASE_PARAMETERS",
            "NAME" => "Адрес автора",
            "TYPE" => "STRING",
        ],
        "BASE_PARAMETERS_DESCRIPTION" => [
            "PARENT" => "BASE_PARAMETERS",
            "NAME" => "Краткое описание страницы" . ($arCurrentValues["BASE_PARAMETERS_DESCRIPTION"] ? " [".iconv_strlen($arCurrentValues["BASE_PARAMETERS_DESCRIPTION"])."]" : ""),
            "REFRESH" => "Y",
            "TYPE" => "STRING",
        ],
        "BASE_PARAMETERS_KEYWORDS" => [
            "PARENT" => "BASE_PARAMETERS",
            "NAME" => "Ключевые слова страницы" . ($arCurrentValues["BASE_PARAMETERS_KEYWORDS"] ? " [".str_word_count($arCurrentValues["BASE_PARAMETERS_KEYWORDS"], 0)."]" : ""),
            "REFRESH" => "Y",
            "TYPE" => "STRING",
        ],
        "BASE_PARAMETERS_THEME_COLOR" => [
            "PARENT" => "BASE_PARAMETERS",
            "NAME" => "Цвет темы в формате HEX",
            "TYPE" => "COLORPICKER",
        ],
        "BASE_PARAMETERS_RATING" => [
            "PARENT" => "BASE_PARAMETERS",
            "NAME" => "Возростное ограничение",
            "TYPE" => "STRING",
            "MULTIPLE" => "Y",
        ],
        "BASE_PARAMETERS_DOCUMENT_STATE" => [
            "PARENT" => "BASE_PARAMETERS",
            "NAME" => "Как часто обновляется информация на странице",
            "TYPE" => "LIST",
            "VALUES" => [
                "" => "Не выбранно",
                "static" => "static - редко",
                "dynamic" => "dynamic - часто",
            ],
            "DEFAULT" => "",
        ],
        "BASE_PARAMETERS_URL" => [
            "PARENT" => "BASE_PARAMETERS",
            "NAME" => "Прекратить индексацию страницы и перенаправить робота потсковой машины по указанному адресу",
            "TYPE" => "STRING",
        ],
        "BASE_PARAMETERS_CACHE_CONTROL" => [
            "PARENT" => "BASE_PARAMETERS",
            "NAME" => "Управление кэшированием",
            "TYPE" => "STRING",
        ],
        "BASE_PARAMETERS_ROBOTS" => [
            "PARENT" => "BASE_PARAMETERS",
            "NAME" => "Тег формирует информацию о гипертекстовых документах, которая поступает к роботам поисковых систем",
            "TYPE" => "STRING",
        ],

        // ICONS
        "ICONS_ICON_16" => [
            "PARENT" => "ICONS",
            "NAME" => "Иконка 16x16",
            "TYPE" => "FILE",
            "FD_TARGET" => "F",
            "FD_EXT" => "png,jpg,jpeg",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => Array('image'),
        ],
        "ICONS_ICON_32" => [
            "PARENT" => "ICONS",
            "NAME" => "Иконка 32x32",
            "TYPE" => "FILE",
            "FD_TARGET" => "F",
            "FD_EXT" => "png,jpg,jpeg",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => Array('image'),
        ],
        "ICONS_SHORTCUT_ICON" => [
            "PARENT" => "ICONS",
            "NAME" => "Фавикон в формате ico",
            "TYPE" => "FILE",
            "FD_TARGET" => "F",
            "FD_EXT" => "ico",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => Array('image'),
        ],

        // IPHONE_ICONS
        "IPHONE_ICONS_APPLE_TOUCH_ICON_57" => [
            "PARENT" => "IPHONE_ICONS",
            "NAME" => "Иконка 57x57",
            "TYPE" => "FILE",
            "FD_TARGET" => "F",
            "FD_EXT" => "png,jpg,jpeg",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => Array('image'),
        ],
        "IPHONE_ICONS_APPLE_TOUCH_ICON_76" => [
            "PARENT" => "IPHONE_ICONS",
            "NAME" => "Иконка 76x76",
            "TYPE" => "FILE",
            "FD_TARGET" => "F",
            "FD_EXT" => "png,jpg,jpeg",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => Array('image'),
        ],
        "IPHONE_ICONS_APPLE_TOUCH_ICON_120" => [
            "PARENT" => "IPHONE_ICONS",
            "NAME" => "Иконка 120x120",
            "TYPE" => "FILE",
            "FD_TARGET" => "F",
            "FD_EXT" => "png,jpg,jpeg",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => Array('image'),
        ],
        "IPHONE_ICONS_APPLE_TOUCH_ICON_152" => [
            "PARENT" => "IPHONE_ICONS",
            "NAME" => "Иконка 152x152",
            "TYPE" => "FILE",
            "FD_TARGET" => "F",
            "FD_EXT" => "png,jpg,jpeg",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => Array('image'),
        ],
        "IPHONE_ICONS_APPLE_TOUCH_ICON_167" => [
            "PARENT" => "IPHONE_ICONS",
            "NAME" => "Иконка 167x167",
            "TYPE" => "FILE",
            "FD_TARGET" => "F",
            "FD_EXT" => "png,jpg,jpeg",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => Array('image'),
        ],
        "IPHONE_ICONS_APPLE_TOUCH_ICON_180" => [
            "PARENT" => "IPHONE_ICONS",
            "NAME" => "Иконка 180x180",
            "TYPE" => "FILE",
            "FD_TARGET" => "F",
            "FD_EXT" => "png,jpg,jpeg",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => Array('image'),
        ],

        // OPEN_GRAPH
        "OPEN_GRAPH_LOCALE" => [
            "PARENT" => "OPEN_GRAPH",
            "NAME" => "Локализация страницы (для русскоязычного сайта ru_RU, для англоязычного en_US)",
            "TYPE" => "STRING",
        ],
        "OPEN_GRAPH_TITLE" => [
            "PARENT" => "OPEN_GRAPH",
            "NAME" => "Заголовок страницы, который будет выводится в записи социальной сети",
            "TYPE" => "STRING",
        ],
        "OPEN_GRAPH_DESCRIPTION" => [
            "PARENT" => "OPEN_GRAPH",
            "NAME" => "Описание страницы",
            "TYPE" => "STRING",
        ],
        "OPEN_GRAPH_IMAGE" => [
            "PARENT" => "OPEN_GRAPH",
            "NAME" => "Ссылка на изображение, которое будет публиковаться в записи (URL изображения, описывающего объект, форматы: png,jpg,jpeg)",
            "TYPE" => "STRING",
            "MULTIPLE" => "Y",
        ],
        "OPEN_GRAPH_URL" => [
            "PARENT" => "OPEN_GRAPH",
            "NAME" => "Ссылка на текущую страницу (канонический URL объекта, который будет использован в качестве постоянного идентификатора)",
            "TYPE" => "STRING",
        ],
        "OPEN_GRAPH_SITE_NAME" => [
            "PARENT" => "OPEN_GRAPH",
            "NAME" => "Название сайта",
            "TYPE" => "STRING",
        ],
        "OPEN_GRAPH_TYPE" => [
            "PARENT" => "OPEN_GRAPH",
            "NAME" => "Тип контента",
            "TYPE" => "LIST",
            "VALUES" => [
                "" => "Не выбрано",
                "article" => "article - Статья",
                "book" => "book - Книга",
                "profile" => "profile - Профайл",
                "website" => "website - Web-сайт",
            ],
            "REFRESH" => "Y",
        ],
        "OPEN_GRAPH_ARTICLE_PUBLISHED_TIME" => [
            "PARENT" => "OPEN_GRAPH",
            "NAME" => "Когда статья была впервые опубликована",
            "TYPE" => "STRING",
            "HIDDEN" => ($arCurrentValues["OPEN_GRAPH_TYPE"] == "article" ? "N" : "Y"),
        ],
        "OPEN_GRAPH_ARTICLE_MODIFIED_TIME" => [
            "PARENT" => "OPEN_GRAPH",
            "NAME" => "Когда статья была последний раз изменена",
            "TYPE" => "STRING",
            "HIDDEN" => ($arCurrentValues["OPEN_GRAPH_TYPE"] == "article" ? "N" : "Y"),
        ],
        "OPEN_GRAPH_ARTICLE_EXPIRATION_TIME" => [
            "PARENT" => "OPEN_GRAPH",
            "NAME" => "Время истечения срока статьи",
            "TYPE" => "STRING",
            "HIDDEN" => ($arCurrentValues["OPEN_GRAPH_TYPE"] == "article" ? "N" : "Y"),
        ],
        "OPEN_GRAPH_ARTICLE_AUTHOR" => [
            "PARENT" => "OPEN_GRAPH",
            "NAME" => "Авторы статьи",
            "TYPE" => "STRING",
            "HIDDEN" => ($arCurrentValues["OPEN_GRAPH_TYPE"] == "article" ? "N" : "Y"),
        ],
        "OPEN_GRAPH_ARTICLE_SECTION" => [
            "PARENT" => "OPEN_GRAPH",
            "NAME" => "Название категории",
            "TYPE" => "STRING",
            "HIDDEN" => ($arCurrentValues["OPEN_GRAPH_TYPE"] == "article" ? "N" : "Y"),
        ],
        "OPEN_GRAPH_ARTICLE_TAG" => [
            "PARENT" => "OPEN_GRAPH",
            "NAME" => "Теги, связанные с этой статьей",
            "TYPE" => "STRING",
            "HIDDEN" => ($arCurrentValues["OPEN_GRAPH_TYPE"] == "article" ? "N" : "Y"),
        ],
        "OPEN_GRAPH_BOOK_AUTHOR" => [
            "PARENT" => "OPEN_GRAPH",
            "NAME" => "Кто написал эту книгу",
            "TYPE" => "STRING",
            "HIDDEN" => ($arCurrentValues["OPEN_GRAPH_TYPE"] == "book" ? "N" : "Y"),
        ],
        "OPEN_GRAPH_BOOK_ISBN" => [
            "PARENT" => "OPEN_GRAPH",
            "NAME" => "Международный стандартный книжный номер ISBN",
            "TYPE" => "STRING",
            "HIDDEN" => ($arCurrentValues["OPEN_GRAPH_TYPE"] == "book" ? "N" : "Y"),
        ],
        "OPEN_GRAPH_BOOK_RELEASE_DATE" => [
            "PARENT" => "OPEN_GRAPH",
            "NAME" => "Дата выпуска книги",
            "TYPE" => "STRING",
            "HIDDEN" => ($arCurrentValues["OPEN_GRAPH_TYPE"] == "book" ? "N" : "Y"),
        ],
        "OPEN_GRAPH_BOOK_TAG" => [
            "PARENT" => "OPEN_GRAPH",
            "NAME" => "Теги, связанные с этой книгой",
            "TYPE" => "STRING",
            "HIDDEN" => ($arCurrentValues["OPEN_GRAPH_TYPE"] == "book" ? "N" : "Y"),
        ],
        "OPEN_GRAPH_PROFILE_FIRST_NAME" => [
            "PARENT" => "OPEN_GRAPH",
            "NAME" => "Имя пользователя профайла",
            "TYPE" => "STRING",
            "HIDDEN" => ($arCurrentValues["OPEN_GRAPH_TYPE"] == "profile" ? "N" : "Y"),
        ],
        "OPEN_GRAPH_PROFILE_LAST_NAME" => [
            "PARENT" => "OPEN_GRAPH",
            "NAME" => "Фамилия пользователя профайла",
            "TYPE" => "STRING",
            "HIDDEN" => ($arCurrentValues["OPEN_GRAPH_TYPE"] == "profile" ? "N" : "Y"),
        ],
        "OPEN_GRAPH_PROFILE_USERNAME" => [
            "PARENT" => "OPEN_GRAPH",
            "NAME" => "Ник",
            "TYPE" => "STRING",
            "HIDDEN" => ($arCurrentValues["OPEN_GRAPH_TYPE"] == "profile" ? "N" : "Y"),
        ],
        "OPEN_GRAPH_PROFILE_GENDER" => [
            "PARENT" => "OPEN_GRAPH",
            "NAME" => "Пол (мужской, женский)",
            "TYPE" => "STRING",
            "HIDDEN" => ($arCurrentValues["OPEN_GRAPH_TYPE"] == "profile" ? "N" : "Y"),
        ],

        // FACEBOOCK
        "FACEBOOCK_ADMINS" => [
            "PARENT" => "FACEBOOCK",
            "NAME" => "ID страницы Facebook",
            "TYPE" => "STRING",
        ],
        "FACEBOOCK_PROFILE_FIRST_NAME" => [
            "PARENT" => "FACEBOOCK",
            "NAME" => "Имя",
            "TYPE" => "STRING",
        ],
        "FACEBOOCK_PROFILE_LAST_NAME" => [
            "PARENT" => "FACEBOOCK",
            "NAME" => "Фамилия",
            "TYPE" => "STRING",
        ],
        "FACEBOOCK_PROFILE_USERNAME" => [
            "PARENT" => "FACEBOOCK",
            "NAME" => "Ник",
            "TYPE" => "STRING",
        ],

        // TWITTER
        "TWITTER_CARD" => [
            "PARENT" => "TWITTER",
            "NAME" => "Тип карты, по умолчанию используется summary",
            "TYPE" => "STRING",
        ],
        "TWITTER_SITE" => [
            "PARENT" => "TWITTER",
            "NAME" => "@username пользователя сайта. Требуется либо twitter:site, либо twitter:site:id",
            "TYPE" => "STRING",
        ],
        "TWITTER_SITE_ID" => [
            "PARENT" => "TWITTER",
            "NAME" => "То же, что twitter:site, но идентификатор пользователя в Twitter. Требуется либо twitter:site, либо twitter:site:id",
            "TYPE" => "STRING",
        ],
        "TWITTER_CREATOR" => [
            "PARENT" => "TWITTER",
            "NAME" => "@username создателя контента",
            "TYPE" => "STRING",
        ],
        "TWITTER_CREATOR_ID" => [
            "PARENT" => "TWITTER",
            "NAME" => "ID пользователя Twitter создателя контента",
            "TYPE" => "STRING",
        ],
        "TWITTER_URL" => [
            "PARENT" => "TWITTER",
            "NAME" => "Cсылка на страницу",
            "TYPE" => "STRING",
        ],
        "TWITTER_TITLE" => [
            "PARENT" => "TWITTER",
            "NAME" => "Название страницы",
            "TYPE" => "STRING",
        ],
        "TWITTER_DESCRIPTION" => [
            "PARENT" => "TWITTER",
            "NAME" => "Описание страницы (максимум 200 символов)" . ($arCurrentValues["TWITTER_DESCRIPTION"] ? " [".iconv_strlen($arCurrentValues["TWITTER_DESCRIPTION"])."]" : ""),
            "REFRESH" => "Y",
            "TYPE" => "STRING",
        ],
        "TWITTER_IMAGE" => [
            "PARENT" => "TWITTER",
            "NAME" => "Cсылка на изображение, которое будет публиковаться в записи (png,jpg,jpeg)",
            "TYPE" => "FILE",
            "FD_TARGET" => "F",
            "FD_EXT" => "png,jpg,jpeg",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => Array('image'),
        ],
        "TWITTER_IMAGE_ALT" => [
            "PARENT" => "TWITTER",
            "NAME" => "Текстовое описание изображения, передающее сущность изображения пользователям с нарушениями зрения (максимум 420 символов)" . ($arCurrentValues["TWITTER_IMAGE_ALT"] ? " [".iconv_strlen($arCurrentValues["TWITTER_IMAGE_ALT"])."]" : ""),
            "REFRESH" => "Y",
            "TYPE" => "STRING",
        ],
        "TWITTER_DOMAIN" => [
            "PARENT" => "TWITTER",
            "NAME" => "Домен",
            "TYPE" => "STRING",
        ],

        // VK
        "VK_IMAGE" => [
            "PARENT" => "VK",
            "NAME" => "Cсылка на изображение, которое будет публиковаться в записи (png,jpg,jpeg)",
            "TYPE" => "FILE",
            "FD_TARGET" => "F",
            "FD_EXT" => "png,jpg,jpeg",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => Array('image'),
        ],

        // REST
        "REST_NAME" => [
            "PARENT" => "REST",
            "NAME" => "Название сайта",
            "TYPE" => "STRING",
        ],
        "REST_DESCRIPTION" => [
            "PARENT" => "REST",
            "NAME" => "Описание сайта",
            "TYPE" => "STRING",
        ],
        "REST_IMAGE" => [
            "PARENT" => "REST",
            "NAME" => "Ссылка на изображение, которое будет публиковаться в записи (png,jpg,jpeg)",
            "TYPE" => "FILE",
            "FD_TARGET" => "F",
            "FD_EXT" => "png,jpg,jpeg",
            "FD_UPLOAD" => true,
            "FD_USE_MEDIALIB" => true,
            "FD_MEDIALIB_TYPES" => Array('image'),
        ],

        // REDIRECT
        "REDIRECT_REFRESH_TIME" => [
            "PARENT" => "REDIRECT",
            "NAME" => "Редирект. Задержка в секундах",
            "TYPE" => "STRING",
        ],
        "REDIRECT_REFRESH_URL" => [
            "PARENT" => "REDIRECT",
            "NAME" => "Редирект. Адрес сайта или страницы",
            "TYPE" => "STRING",
        ],
    ]
];
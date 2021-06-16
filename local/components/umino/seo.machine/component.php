<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Page\Asset;

function getImagePath($src, $check = false)
{
    $errors = "";

    $protocol = 'https';
    if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off")
        $protocol = 'http';

    $imageInfo = getimagesize(str_replace(" ", "%20", $_SERVER["DOCUMENT_ROOT"].$src));

    if (!$imageInfo)
        $errors .= "- Изображения не существует.<br>";
    elseif ($check)
    {
        if ($check["WIDTH"] && $check["WIDTH"] != $imageInfo[0])
            $errors .= "- Ширина изображения " . ($check["WIDTH"] > $imageInfo[0] ? "больше" : "меньше") . " положенной. Рекомендуемая ширина изображения " . $check["WIDTH"] . "px.<br>";
        if ($check["HEIGHT"] && $check["HEIGHT"] != $imageInfo[1])
            $errors .= "- Высота изображения " . ($check["HEIGHT"] > $imageInfo[1] ? "больше" : "меньше") . " положенной. Рекомендуемая высота изображения " . $check["WIDTH"] . "px.<br>";
        if ($check["MIME"] && !in_array($imageInfo["mime"], $check["MIME"]))
        {
            $errors .= "- MIME тип изображение не соответсвует рекомендуемому. Рекомендуемый MIME тип изобаржения: ";
            if (is_array($check["MIME"]))
                foreach ($check["MIME"] as $key => $mime)
                    $errors .= $mime . (count($check["MIME"]) > 1 ? (($key+1) == count($check["MIME"]) ? "" : ", ") : "");
            else
                $errors .= $check["MIME"];
            $errors .= ".<br>";
        }

    }

    if ($errors)
    {
        global $USER;
        if ($USER->IsAdmin())
        {
            $mess = "<div style='color:#721c24;background-color:#f8d7da;border:1px solid #f5c6cb;padding:5px;'>";
            $mess .= "<h5>[SEO Machine] Несоответствие формата изображения!</h5><br>";
            $mess .= $errors . "<br>";
            $mess .= "<p>Путь до изображения: \"{$_SERVER["DOCUMENT_ROOT"]}{$src}\".</p>";
            $mess .= "</div>";
            echo $mess;
        }
        return false;
    }

    $imageInfo = [
        "SRC" => "{$protocol}://{$_SERVER['HTTP_HOST']}{$src}",
        "WIDTH" => $imageInfo[0],
        "HEIGHT" => $imageInfo[1],
        "MIME" => $imageInfo["mime"]
    ];

    return $imageInfo;
}

// BASE_PARAMETERS
if ($arParams["BASE_PARAMETERS_AUTHOR"]):
    Asset::getInstance()->addString("<meta name=\"author\" lang=\"{$arParams["BASE_PARAMETERS_LANGUAGE"]}\" content=\"{$arParams["BASE_PARAMETERS_AUTHOR"]}\">");
endif;
if ($arParams["BASE_PARAMETERS_COPYRIGHT"]):
    Asset::getInstance()->addString("<meta name=\"copyright\" lang=\"{$arParams["BASE_PARAMETERS_LANGUAGE"]}\" content=\"{$arParams["BASE_PARAMETERS_COPYRIGHT"]}\">");
endif;
if ($arParams["BASE_PARAMETERS_ADDRESS"]):
    Asset::getInstance()->addString("<meta name=\"address\" content=\"{$arParams["BASE_PARAMETERS_ADDRESS"]}\">");
endif;
if ($rParams["BASE_PARAMETERS_OWNER"]):
    Asset::getInstance()->addString("<meta name=\"owner\" content=\"{$arParams["BASE_PARAMETERS_OWNER"]}\">");
endif;
if ($arParams["BASE_PARAMETERS_DESCRIPTION"]):
    Asset::getInstance()->addString("<meta name=\"description\" content=\"{$arParams["BASE_PARAMETERS_DESCRIPTION"]}\">");
endif;
if ($arParams["BASE_PARAMETERS_KEYWORDS"]):
    Asset::getInstance()->addString("<meta name=\"keywords\" content=\"{$arParams["BASE_PARAMETERS_KEYWORDS"]}\">");
endif;
if ($arParams["BASE_PARAMETERS_THEME_COLOR"]):
    Asset::getInstance()->addString("<meta name=\"theme-color\" content=\"{$arParams["BASE_PARAMETERS_THEME_COLOR"]}\">");
endif;
if ($arParams["BASE_PARAMETERS_RATING"]):
    foreach ($arParams["BASE_PARAMETERS_RATING"] as $param):
        Asset::getInstance()->addString("<meta name=\"rating\" content=\"{$param}\">");
    endforeach;
endif;
if ($arParams["BASE_PARAMETERS_DOCUMENT_STATE"]):
    Asset::getInstance()->addString("<meta name=\"document-state\" content=\"{$arParams["BASE_PARAMETERS_DOCUMENT_STATE"]}\">");
endif;
if ($arParams["BASE_PARAMETERS_URL"]):
    Asset::getInstance()->addString("<meta name=\"url\" content=\"{$arParams["BASE_PARAMETERS_URL"]}\">");
endif;
if ($arParams["BASE_PARAMETERS_CACHE_CONTROL"]):
    Asset::getInstance()->addString("<meta name=\"cache-control\" content=\"{$arParams["BASE_PARAMETERS_CACHE_CONTROL"]}\">");
endif;
if ($rParams["BASE_PARAMETERS_ROBOTS"]):
    Asset::getInstance()->addString("<meta name=\"robots\" content=\"{$arParams["BASE_PARAMETERS_CACHE_CONTROL"]}\">");
endif;



// ICONS
if ($arParams["ICONS_ICON_16"]):
    if ($imageInfo = getImagePath($arParams["ICONS_ICON_16"], ["WIDTH" => 16, "HEIGHT" => 16]))
        Asset::getInstance()->addString("<link rel=\"icon\" type=\"{$imageInfo["MIME"]}\" sizes=\"{$imageInfo["WIDTH"]}x{$imageInfo["HEIGHT"]}\" href=\"{$imageInfo["SRC"]}\">");
endif;
if ($rParams["ICONS_ICON_32"]):
    if ($imageInfo = getImagePath($arParams["ICONS_ICON_32"], ["WIDTH" => 32, "HEIGHT" => 32]))
        Asset::getInstance()->addString("<link rel=\"icon\" type=\"{$imageInfo["MIME"]}\" sizes=\"{$imageInfo["WIDTH"]}x{$imageInfo["HEIGHT"]}\" href=\"{$imageInfo["SRC"]}\">");
endif;
if ($rParams["ICONS_SHORTCUT_ICON"]):
    if ($imageInfo = getImagePath($arParams["ICONS_SHORTCUT_ICON"], ["MIME" => "image/x-icon"]))
        Asset::getInstance()->addString("<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"{$imageInfo["SRC"]}\">");
endif;



// IPHONE_ICONS
if ($rParams["IPHONE_ICONS_APPLE_TOUCH_ICON_57"]):
    if ($imageInfo = getImagePath($arParams["IPHONE_ICONS_APPLE_TOUCH_ICON_57"], ["WIDTH" => 57, "HEIGHT" => 57]))
        Asset::getInstance()->addString("<link rel=\"apple-touch-icon\" sizes=\"{$imageInfo["WIDTH"]}x{$imageInfo["HEIGHT"]}\" href=\"{$imageInfo["SRC"]}\">");
endif;
if ($rParams["IPHONE_ICONS_APPLE_TOUCH_ICON_76"]):
    if ($imageInfo = getImagePath($arParams["IPHONE_ICONS_APPLE_TOUCH_ICON_76"], ["WIDTH" => 76, "HEIGHT" => 76]))
        Asset::getInstance()->addString("<link rel=\"apple-touch-icon\" sizes=\"{$imageInfo["WIDTH"]}x{$imageInfo["HEIGHT"]}\" href=\"{$imageInfo["SRC"]}\">");
endif;
if ($rParams["IPHONE_ICONS_APPLE_TOUCH_ICON_120"]):
    if ($imageInfo = getImagePath($arParams["IPHONE_ICONS_APPLE_TOUCH_ICON_120"], ["WIDTH" => 120, "HEIGHT" => 120]))
        Asset::getInstance()->addString("<link rel=\"apple-touch-icon\" sizes=\"{$imageInfo["WIDTH"]}x{$imageInfo["HEIGHT"]}\" href=\"{$imageInfo["SRC"]}\">");
endif;
if ($rParams["IPHONE_ICONS_APPLE_TOUCH_ICON_152"]):
    if ($imageInfo = getImagePath($arParams["IPHONE_ICONS_APPLE_TOUCH_ICON_152"], ["WIDTH" => 152, "HEIGHT" => 152]))
        Asset::getInstance()->addString("<link rel=\"apple-touch-icon\" sizes=\"{$imageInfo["WIDTH"]}x{$imageInfo["HEIGHT"]}\" href=\"{$imageInfo["SRC"]}\">");
endif;
if ($rParams["IPHONE_ICONS_APPLE_TOUCH_ICON_167"]):
    if ($imageInfo = getImagePath($arParams["IPHONE_ICONS_APPLE_TOUCH_ICON_167"], ["WIDTH" => 167, "HEIGHT" => 167]))
        Asset::getInstance()->addString("<link rel=\"apple-touch-icon\" sizes=\"{$imageInfo["WIDTH"]}x{$imageInfo["HEIGHT"]}\" href=\"{$imageInfo["SRC"]}\">");
endif;
if ($rParams["IPHONE_ICONS_APPLE_TOUCH_ICON_180"]):
    if ($imageInfo = getImagePath($arParams["IPHONE_ICONS_APPLE_TOUCH_ICON_180"], ["WIDTH" => 180, "HEIGHT" => 180]))
        Asset::getInstance()->addString("<link rel=\"apple-touch-icon\" sizes=\"{$imageInfo["WIDTH"]}x{$imageInfo["HEIGHT"]}\" href=\"{$imageInfo["SRC"]}\">");
endif;



// OPEN_GRAPH
if ($arParams["OPEN_GRAPH_LOCALE"]):
    Asset::getInstance()->addString("<meta property=\"og:locale\" content=\"{$arParams["OPEN_GRAPH_LOCALE"]}\">");
endif;
if ($arParams["OPEN_GRAPH_TITLE"]):
    Asset::getInstance()->addString("<meta property=\"og:title\" content=\"{$arParams["OPEN_GRAPH_TITLE"]}\">");
endif;
if ($arParams["OPEN_GRAPH_DESCRIPTION"]):
    Asset::getInstance()->addString("<meta property=\"og:description\" content=\"{$arParams["OPEN_GRAPH_DESCRIPTION"]}\">");
endif;
if ($arParams["OPEN_GRAPH_IMAGE"]):
    foreach ($arParams["OPEN_GRAPH_IMAGE"] as $image)
        if ($image && $imageInfo = getImagePath($image, ["MIME" => ["image/png","image/jpeg"]]))
        {
            Asset::getInstance()->addString("<meta property=\"og:image\" content=\"{$imageInfo["SRC"]}\">");
            Asset::getInstance()->addString("<meta property=\"og:image:secure_url\" content=\"{$imageInfo["SRC"]}\">");
            Asset::getInstance()->addString("<meta property=\"og:image:type\" content=\"{$imageInfo["MIME"]}\">");
            Asset::getInstance()->addString("<meta property=\"og:image:width\" content=\"{$imageInfo["WIDTH"]}\">");
            Asset::getInstance()->addString("<meta property=\"og:image:height\" content=\"{$imageInfo["HEIGHT"]}\">");
        }
endif;
if ($arParams["OPEN_GRAPH_URL"]):
    Asset::getInstance()->addString("<meta property=\"og:url\" content=\"{$arParams["OPEN_GRAPH_URL"]}\">");
endif;
if ($arParams["OPEN_GRAPH_SITE_NAME"]):
    Asset::getInstance()->addString("<meta property=\"og:site_name\" content=\"{$arParams["OPEN_GRAPH_SITE_NAME"]}\">");
endif;
if ($arParams["OPEN_GRAPH_TYPE"]):
    Asset::getInstance()->addString("<meta property=\"og:type\" content=\"{$arParams["OPEN_GRAPH_TYPE"]}\">");
endif;
if ($arParams["OPEN_GRAPH_ARTICLE_PUBLISHED_TIME"] && $arParams["OPEN_GRAPH_TYPE"] == "article"):
    Asset::getInstance()->addString("<meta property=\"article:published_time\" content=\"{$arParams["OPEN_GRAPH_ARTICLE_PUBLISHED_TIME"]}\">");
endif;
if ($arParams["OPEN_GRAPH_ARTICLE_MODIFIED_TIME"] && $arParams["OPEN_GRAPH_TYPE"] == "article"):
    Asset::getInstance()->addString("<meta property=\"article:modified_time\" content=\"{$arParams["OPEN_GRAPH_ARTICLE_MODIFIED_TIME"]}\">");
endif;
if ($arParams["OPEN_GRAPH_ARTICLE_EXPIRATION_TIME"] && $arParams["OPEN_GRAPH_TYPE"] == "article"):
    Asset::getInstance()->addString("<meta property=\"article:expiration_time\" content=\"{$arParams["OPEN_GRAPH_ARTICLE_EXPIRATION_TIME"]}\">");
endif;
if ($arParams["OPEN_GRAPH_ARTICLE_AUTHOR"] && $arParams["OPEN_GRAPH_TYPE"] == "article"):
    Asset::getInstance()->addString("<meta property=\"article:author\" content=\"{$arParams["OPEN_GRAPH_ARTICLE_AUTHOR"]}\">");
endif;
if ($arParams["OPEN_GRAPH_ARTICLE_SECTION"] && $arParams["OPEN_GRAPH_TYPE"] == "article"):
    Asset::getInstance()->addString("<meta property=\"article:section\" content=\"{$arParams["OPEN_GRAPH_ARTICLE_SECTION"]}\">");
endif;
if ($arParams["OPEN_GRAPH_ARTICLE_TAG"] && $arParams["OPEN_GRAPH_TYPE"] == "article"):
    Asset::getInstance()->addString("<meta property=\"article:tag\" content=\"{$arParams["OPEN_GRAPH_ARTICLE_TAG"]}\">");
endif;
if ($arParams["OPEN_GRAPH_BOOK_AUTHOR"] && $arParams["OPEN_GRAPH_TYPE"] == "book"):
    Asset::getInstance()->addString("<meta property=\"book:author\" content=\"{$arParams["OPEN_GRAPH_BOOK_AUTHOR"]}\">");
endif;
if ($arParams["OPEN_GRAPH_BOOK_ISBN"] && $arParams["OPEN_GRAPH_TYPE"] == "book"):
    Asset::getInstance()->addString("<meta property=\"book:isbn\" content=\"{$arParams["OPEN_GRAPH_BOOK_ISBN"]}\">");
endif;
if ($arParams["OPEN_GRAPH_BOOK_RELEASE_DATE"] && $arParams["OPEN_GRAPH_TYPE"] == "book"):
    Asset::getInstance()->addString("<meta property=\"book:release_date\" content=\"{$arParams["OPEN_GRAPH_BOOK_RELEASE_DATE"]}\">");
endif;
if ($arParams["OPEN_GRAPH_BOOK_TAG"] && $arParams["OPEN_GRAPH_TYPE"] == "book"):
    Asset::getInstance()->addString("<meta property=\"book:tag\" content=\"{$arParams["OPEN_GRAPH_BOOK_TAG"]}\">");
endif;
if ($arParams["OPEN_GRAPH_PROFILE_FIRST_NAME"] && $arParams["OPEN_GRAPH_TYPE"] == "profile"):
    Asset::getInstance()->addString("<meta property=\"profile:first_name\" content=\"{$arParams["OPEN_GRAPH_PROFILE_FIRST_NAME"]}\">");
endif;
if ($arParams["OPEN_GRAPH_PROFILE_LAST_NAME"] && $arParams["OPEN_GRAPH_TYPE"] == "profile"):
    Asset::getInstance()->addString("<meta property=\"profile:last_name\" content=\"{$arParams["OPEN_GRAPH_PROFILE_LAST_NAME"]}\">");
endif;
if ($arParams["OPEN_GRAPH_PROFILE_USERNAME"] && $arParams["OPEN_GRAPH_TYPE"] == "profile"):
    Asset::getInstance()->addString("<meta property=\"profile:username\" content=\"{$arParams["OPEN_GRAPH_PROFILE_USERNAME"]}\">");
endif;
if ($arParams["OPEN_GRAPH_PROFILE_GENDER"] && $arParams["OPEN_GRAPH_TYPE"] == "profile"):
    Asset::getInstance()->addString("<meta property=\"profile:gender\" content=\"{$arParams["OPEN_GRAPH_PROFILE_GENDER"]}\">");
endif;



// OPEN_GRAPH_VIDEO
if ($arParams["OPEN_GRAPH_VIDEO_TYPE"]):
    Asset::getInstance()->addString("<meta property=\"og:video:type\" content=\"{$arParams["OPEN_GRAPH_VIDEO_TYPE"]}\">");
endif;
if ($arParams["OPEN_GRAPH_VIDEO"]):
    Asset::getInstance()->addString("<meta property=\"og:video\" content=\"{$arParams["OPEN_GRAPH_VIDEO"]}\">");
endif;
if ($arParams["OPEN_GRAPH_VIDEO_SECURE_URL"]):
    Asset::getInstance()->addString("<meta property=\"og:video:secure_url\" content=\"{$arParams["OPEN_GRAPH_VIDEO_SECURE_URL"]}\">");
endif;
if ($arParams["OPEN_GRAPH_VIDEO_HEIGHT"]):
    Asset::getInstance()->addString("<meta property=\"og:video:height\" content=\"{$arParams["OPEN_GRAPH_VIDEO_HEIGHT"]}\">");
endif;
if ($arParams["OPEN_GRAPH_VIDEO_WIDTH"]):
    Asset::getInstance()->addString("<meta property=\"og:video:width\" content=\"{$arParams["OPEN_GRAPH_VIDEO_WIDTH"]}\">");
endif;
if ($arParams["OPEN_GRAPH_DURATION"]):
    Asset::getInstance()->addString("<meta property=\"og:duration\" content=\"{$arParams["OPEN_GRAPH_DURATION"]}\">");
endif;



// OPEN_GRAPH_AUDIO
if ($arParams["OPEN_GRAPH_AUDIO"]):
    Asset::getInstance()->addString("<meta property=\"og:audio\" content=\"{$arParams["OPEN_GRAPH_AUDIO"]}\">");
endif;
if ($arParams["OPEN_GRAPH_AUDIO_SECURE_URL"]):
    Asset::getInstance()->addString("<meta property=\"og:audio:secure_url\" content=\"{$arParams["OPEN_GRAPH_AUDIO_SECURE_URL"]}\">");
endif;
if ($arParams["OPEN_GRAPH_AUDIO_TYPE"]):
    Asset::getInstance()->addString("<meta property=\"og:audio:type\" content=\"{$arParams["OPEN_GRAPH_AUDIO_TYPE"]}\">");
endif;



// FACEBOOCK
if ($arParams["FACEBOOCK_ADMINS"]):
    Asset::getInstance()->addString("<meta property=\"fb:admins\" content=\"{$arParams["FACEBOOCK_ADMINS"]}\">");
endif;
if ($arParams["FACEBOOCK_PROFILE_FIRST_NAME"]):
    Asset::getInstance()->addString("<meta property=\"profile:first_name\" content=\"{$arParams["FACEBOOCK_PROFILE_FIRST_NAME"]}\">");
endif;
if ($arParams["FACEBOOCK_PROFILE_LAST_NAME"]):
    Asset::getInstance()->addString("<meta property=\"profile:last_name\" content=\"{$arParams["FACEBOOCK_PROFILE_LAST_NAME"]}\">");
endif;
if ($arParams["FACEBOOCK_PROFILE_USERNAME"]):
    Asset::getInstance()->addString("<meta property=\"profile:username\" content=\"{$arParams["FACEBOOCK_PROFILE_USERNAME"]}\">");
endif;



// TWITTER
if ($arParams["TWITTER_CARD"]):
    Asset::getInstance()->addString("<meta name=\"twitter:card\" content=\"{$arParams["TWITTER_CARD"]}\">");
endif;
if ($arParams["TWITTER_SITE"]):
    Asset::getInstance()->addString("<meta name=\"twitter:site\" content=\"{$arParams["TWITTER_SITE"]}\">");
endif;
if ($arParams["TWITTER_SITE_ID"]):
    Asset::getInstance()->addString("<meta name=\"twitter:site:id\" content=\"{$arParams["TWITTER_SITE_ID"]}\">");
endif;
if ($arParams["TWITTER_CREATOR"]):
    Asset::getInstance()->addString("<meta name=\"twitter:creator\" content=\"{$arParams["TWITTER_CREATOR"]}\">");
endif;
if ($arParams["TWITTER_CREATOR_ID"]):
    Asset::getInstance()->addString("<meta name=\"twitter:creator:id\" content=\"{$arParams["TWITTER_CREATOR_ID"]}\">");
endif;
if ($arParams["TWITTER_URL"]):
    Asset::getInstance()->addString("<meta name=\"twitter:url\" content=\"{$arParams["TWITTER_URL"]}\">");
endif;
if ($arParams["TWITTER_TITLE"]):
    Asset::getInstance()->addString("<meta name=\"twitter:title\" content=\"{$arParams["TWITTER_TITLE"]}\">");
endif;
if ($arParams["TWITTER_DESCRIPTION"]):
    Asset::getInstance()->addString("<meta name=\"twitter:description\" content=\"{$arParams["TWITTER_DESCRIPTION"]}\">");
endif;
if ($arParams["TWITTER_IMAGE"]):
    if ($imageInfo = getImagePath($arParams["OPEN_GRAPH_IMAGE"]))
        Asset::getInstance()->addString("<meta name=\"twitter:image\" content=\"{$imageInfo["SRC"]}\">");
endif;
if ($arParams["TWITTER_IMAGE_ALT"]):
    Asset::getInstance()->addString("<meta name=\"twitter:image:alt\" content=\"{$arParams["TWITTER_IMAGE_ALT"]}\">");
endif;
if ($arParams["TWITTER_DOMAIN"]):
    Asset::getInstance()->addString("<meta name=\"twitter:domain\" content=\"{$arParams["TWITTER_DOMAIN"]}\">");
endif;


// VK
if ($arParams["VK_IMAGE"]):
    if ($imageInfo = getImagePath($arParams["VK_IMAGE"]))
        Asset::getInstance()->addString("<meta property=\"vk:image\" content=\"{$imageInfo["SRC"]}\">");
endif;




// REST
if ($arParams["REST_NAME"]):
    Asset::getInstance()->addString("<meta itemprop=\"name\" content=\"{$arParams["REST_NAME"]}\">");
endif;
if ($arParams["REST_DESCRIPTION"]):
    Asset::getInstance()->addString("<meta itemprop=\"description\" content=\"{$arParams["REST_DESCRIPTION"]}\">");
endif;
if ($arParams["REST_IMAGE"]):
    if ($imageInfo = getImagePath($arParams["OPEN_GRAPH_IMAGE"]))
        Asset::getInstance()->addString("<meta itemprop=\"image\" content=\"{$imageInfo["SRC"]}\">");
endif;



// REDIRECT
if ($arParams["REDIRECT_REFRESH_TIME"] && ($arParams["REDIRECT_REFRESH_TIME"] && $arParams["REDIRECT_REFRESH_URL"])):
    Asset::getInstance()->addString("<meta http-equiv=\"refresh\" content=\"{$arParams["REDIRECT_REFRESH_TIME"]};{$arParams["REDIRECT_REFRESH_URL"]}\">");
endif;



//$this->IncludeComponentTemplate();
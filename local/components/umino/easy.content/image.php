<?require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

function resizeImage($input, $output, $size)
{
    return \CFile::ResizeImageFile(
        $input,
        $output,
        [
            'width' => $size,
            'height' => $size
        ],
        BX_RESIZE_IMAGE_PROPORTIONAL_ALT
    );
}

$fileDir = '/upload/easy_content/';
$fileExtension = str_replace(substr($_FILES['image']['name'], 0, strrpos($_FILES['image']['name'], '.')),'',$_FILES['image']['name']);
$fileName = str_shuffle('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890');
$filePath = $fileDir . $fileName . $fileExtension;

if (!file_exists($_SERVER['DOCUMENT_ROOT'].$fileDir))
    mkdir($_SERVER['DOCUMENT_ROOT'].$fileDir);

move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$filePath);
$arSize = [
    400 => 400,
    600 => 600,
    800 => 800,
    1000 => 1000,
];
$arImages = [];
$mime = getimagesize(str_replace(" ", "%20", $_SERVER["DOCUMENT_ROOT"] . $filePath))['mime'];

foreach ($arSize as $width => $height)
{
    $fileResizeName = $fileName . '_' . $width . '_' . $height . $fileExtension;

    resizeImage(
            $_SERVER['DOCUMENT_ROOT'] . $filePath,
            $_SERVER['DOCUMENT_ROOT'] . $fileDir . $fileResizeName,
            $height
    );

    $arImages[$width] = $fileDir . $fileResizeName;
}

if ($arImages):?>

    <picture>
        <?foreach ($arImages as $width => $src):?>
            <source type="<?= $mime ?>" media="(max-width:<?= $width ?>px)" srcset="<?= $src ?>">
        <?endforeach;?>
        <img srcset="<?=$filePath?>">
    </picture>

<?else:?>

    <img src="<?= $filePath ?>">

<?endif;?>

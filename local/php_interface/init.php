<?
function pre($data)
{
    global $USER;
    if ($USER->IsAdmin())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

function getPictureSource($image, $arSizeInfo, $minHeight)
{
    foreach ($arSizeInfo as $minmax => $arSize) {
        foreach ($arSize as $windows => $size) {
            $arImageInfo = getimagesize(str_replace(" ", "%20", $_SERVER["DOCUMENT_ROOT"] . $image["SRC"]));
            $width = $size;
            $height = $arImageInfo[1] / ($arImageInfo[0] / $width);
            if ($height < $minHeight) {
                $height = $minHeight;
                $width = $arImageInfo[0] / ($arImageInfo[1] / $minHeight);
            }
            $arImage = CFile::ResizeImageGet($image, ["width"=>$width,"height"=>$height]);
            echo "<source type=\"{$arImageInfo['mime']}\" media=\"({$minmax}-width:{$windows}px)\" srcset=\"{$arImage['src']}\">";
        }
    }
}
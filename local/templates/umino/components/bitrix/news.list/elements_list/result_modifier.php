<?php
foreach ($arResult["ITEMS"] as $key => $arItem)
{
    $arSections = [];
    $dbResultSections = CIBlockElement::GetElementGroups($arItem["ID"], true);
    while($obResultSections = $dbResultSections->Fetch())
    {
        $arSections[] = $obResultSections["CODE"];
        if (!in_array($obResultSections["CODE"], $arParams["INVISIBLE_SECTIONS"]))
            $arResult["ITEMS"][$key]["SECTIONS"][] = $obResultSections;
    }
    if ($arParams["SECTIONS"])
        if (!array_intersect($arSections,$arParams["SECTIONS"])) unset($arResult["ITEMS"][$key]);
}

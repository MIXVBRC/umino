<?php
use Bitrix\Main\EventManager;

EventManager::getInstance()->addEventHandler('main', 'OnBuildGlobalMenu', 'onBuildGlobalMenuHandler');
EventManager::getInstance()->addEventHandler('iblock', 'OnBeforeIBlockElementAdd', 'onBeforeIBlockElementAddHandler');

function onBuildGlobalMenuHandler(&$aGlobalMenu, &$aModuleMenu)
{
    $arUserGroups = CUser::GetUserGroup(getUserID());

    if(in_array(USER_GROUP_MANAGER_ID,$arUserGroups) || in_array(USER_GROUP_DESIGNER_ID,$arUserGroups))
    {
        foreach ($aGlobalMenu as $key => $aGlobalMenuItem)
            if ($key != 'global_menu_content') unset($aGlobalMenu[$key]);

        foreach ($aModuleMenu as $key => $iBlockType)
            if ($iBlockType['items_id'] != 'menu_iblock_/content') unset($aModuleMenu[$key]);
    }
}

function onBeforeIBlockElementAddHandler(&$arFields)
{
    if ((CIBlockElement::GetList([], ['CODE' => $arFields['CODE']]))->SelectedRowsCount())
    {
        $arFields['CODE'] .= '-' . (CIBlockElement::GetList(['ID' => 'DESC'], [], false, ['nPageSize' => 1], ['ID']))->GetNextElement()->GetFields()['ID'];
    }
}

<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule('iblock'))
    return;

$arIBlockType = $arIBlockTypeComment = CIBlockParameters::GetIBlockTypes();

$arIBlock=[];
$rsIBlock = CIBlock::GetList(['SORT' => 'ASC'], ['TYPE' => $arCurrentValues['IBLOCK_TYPE'], 'ACTIVE'=>'Y']);
while($arr=$rsIBlock->Fetch())
    $arIBlock[$arr['ID']] = '['.$arr['ID'].'] '.$arr['NAME'];

$arIBlockComment=[];
$rsIBlock = CIBlock::GetList(['SORT' => 'ASC'], ['TYPE' => $arCurrentValues['IBLOCK_TYPE_NEWS'], 'ACTIVE'=>'Y']);
while($arr=$rsIBlock->Fetch())
    $arIBlockComment[$arr['ID']] = '['.$arr['ID'].'] '.$arr['NAME'];

$arComponentParameters = [
	'GROUPS' => [
        'DATA' => [
            'NAME' => 'Источний данных',
        ],
        'PROPERTIES' => [
            'NAME' => 'Свойства',
        ],
	],
	'PARAMETERS' => [

        'AJAX_MODE' => [],

	    // DATA
        'IBLOCK_TYPE' => [
            'PARENT' => 'DATA',
            'NAME' => 'Тип инфоблока комментариев',
            'TYPE' => 'LIST',
            'VALUES' => $arIBlockType,
            'REFRESH' => 'Y',
        ],
        'IBLOCK_ID' => [
            'PARENT' => 'DATA',
            'NAME' => 'Инфоблок комментариев',
            'TYPE' => 'LIST',
            'VALUES' => $arIBlock,
        ],
        'IBLOCK_TYPE_NEWS' => [
            'PARENT' => 'DATA',
            'NAME' => 'Тип инфоблока новости',
            'TYPE' => 'LIST',
            'VALUES' => $arIBlockTypeComment,
            'REFRESH' => 'Y',
        ],
        'IBLOCK_ID_NEWS' => [
            'PARENT' => 'DATA',
            'NAME' => 'Инфоблок новости',
            'TYPE' => 'LIST',
            'VALUES' => $arIBlockComment,
        ],

        // PROPERTIES
        'ELEMENT_ID' => [
            'PARENT' => 'PROPERTIES',
            'NAME' => 'ID элемента',
            'TYPE' => 'STRING',
            'VALUES' => '',
        ],
        'ACTIVE_SAVE' => [
            'PARENT' => 'PROPERTIES',
            'NAME' => 'Комментарий активен при создании',
            'TYPE' => 'CHECKBOX',
            'VALUES' => 'Y',
        ],
    ],
];
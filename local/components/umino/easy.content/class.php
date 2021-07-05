<?
Class EasyContent extends CBitrixComponent
{

    private $imagesDir = __DIR__ . '/uploadFiles';

    public function executeComponent()
    {
        if(!CModule::IncludeModule('iblock')) return;

        /**
         * Получаем все данные об инфоблоке кроме элементов
         */
        $this->getIBlock();
        $this->getIBlockProperties();
        $this->getIBlockSections();
        $this->getIBlockFields([
            'NAME' => 'text',
            'DETAIL_PICTURE' => 'file',
            'PREVIEW_PICTURE' => 'file',
            'PREVIEW_TEXT' => 'textarea',
        ]);

        if ($_REQUEST['AJAX_CALL'])
            $this->addElement();

        $this->IncludeComponentTemplate();
    }

    private function getIBlock()
    {
        /**
         * Структура таблиц модуля информационных блоков:
         * https://dev.1c-bitrix.ru/api_help/iblock/fields.php
         */

        $this->arResult = CIBlock::GetList([], ['ID' => $this->arParams['IBLOCK_ID']])->GetNext(true, false);
    }

    private function setType(&$bxType)
    {
        switch ($bxType) {
            case 'S': $bxType = 'text'; break;
            case 'L': $bxType = 'list'; break;
            case 'F': $bxType = 'file'; break;
            case 'N': $bxType = 'number'; break;
        }
    }

    private function getIBlockProperties()
    {
        /**
         * Структура таблиц модуля информационных блоков:
         * https://dev.1c-bitrix.ru/api_help/iblock/fields.php
         */

        $dbIBlockProps = CIBlockProperty::GetList(
            [
                'SORT'=>'ASC',
                'NAME'=>'ASC'
            ],
            [
                'IBLOCK_ID'=>$this->arParams['IBLOCK_ID']
            ]
        );

        while ($obIBlockProps = $dbIBlockProps->GetNext(true, false))
        {


            $obIBlockProps['ATTRIBUTES'] = implode(' ', [
                $obIBlockProps['MULTIPLE']!='Y'?'':'multiple',
                $obIBlockProps['IS_REQUIRED']!='Y'?'':'required'
            ]);

            $this->setType($obIBlockProps['PROPERTY_TYPE']);

            if ($obIBlockProps['PROPERTY_TYPE'] == 'list')
            {
                if ($obIBlockProps['MULTIPLE']=='Y') $obIBlockProps['CODE_PREFIX'] .= '[]';
                $obIBlockProps['VALUES'] = $this->getEnum($obIBlockProps['ID']);
            }


            $this->arResult['PROPERTIES'][$obIBlockProps['CODE']] = $obIBlockProps;

        }

    }

    private function getEnum($propertyId)
    {
        $arResult = [];
        $dbIBlockPropsEnum = CIBlockProperty::GetPropertyEnum(
            $propertyId,
            ['VALUE'=>'ASC']);
        while ($obIBlockPropsEnum = $dbIBlockPropsEnum->GetNext()) {
            $arResult[] = $obIBlockPropsEnum;
        }
        return $arResult;
    }

    private function getIBlockSections()
    {
        $dbIBlockSections = CIBlockSection::GetList(
            [
                'LEFT_MARGIN' => 'ASC',
                'RIGHT_MARGIN' => 'ASC'
            ],
            [
                'IBLOCK_ID' => $this->arParams['IBLOCK_ID'],
            ]
        );
        while ($obIBlockSections = $dbIBlockSections->GetNext(true, false))
            $this->arResult['SECTIONS'][] = $obIBlockSections;
    }

    private function getIBlockFields($arFieldsCode)
    {
        $arIBlockFields = CIBlock::GetFields($this->arParams['IBLOCK_ID']);
        foreach ($arIBlockFields as $code => $field) {
            $field['ATTRIBUTES'] = $field['IS_REQUIRED']!='Y'?'':'required';
            if (!in_array($code, array_keys($arFieldsCode))) continue;
            $this->arResult['FIELDS'][$code] = array_merge($field, ['PROPERTY_TYPE' => $arFieldsCode[$code]]);
        }
    }

    private function addElement()
    {
        $arElement = new CIBlockElement;
        if ($arElement->Add($this->getArrayPOST())) {
            $this->arResult['SUCCESS'] = 'Новость добавлена!';
        } else {
            $this->arResult['ERROR'] = $arElement->LAST_ERROR;
        }
    }

    private function getArrayPOST()
    {
        $arFields = [];
        $arData = array_merge($_POST ,$_FILES);

        $arIBlockFieldCode = array_merge(array_keys($this->arResult['FIELDS']));
        $arIBlockPropertyCode = array_merge(array_keys($this->arResult['PROPERTIES']));

        foreach ($arData as $key => $value)
        {
            if ($key == 'DETAIL_TEXT') {

                $arFields = array_merge($arFields, [$key=>$value]);

            } elseif (in_array($key, $arIBlockFieldCode)) {

                $this->arResult['FIELDS'][$key]['VALUE'] = $value;
                $arFields = array_merge($arFields, [$key=>$value]);

            } elseif (in_array($key, $arIBlockPropertyCode)) {

                if ($this->arResult['PROPERTIES'][$key]['PROPERTY_TYPE'] == 'list')
                {
                    foreach ($this->arResult['PROPERTIES'][$key]['VALUES'] as &$arValue)
                    {
                        if (in_array($arValue['ID'], $value)) $arValue['ATTRIBUTES'] = 'selected';
                    }
                } else {
                    $this->arResult['PROPERTIES'][$key]['VALUE'] = $value;
                }

                $arFields = array_merge($arFields, ['PROPERTY_VALUES' => [$key=>$value]]);

            }
        }

        $arFields = array_merge(
            $arFields,
            [
                'IBLOCK_ID' => $this->arParams['IBLOCK_ID'],
                'MODIFIED_BY' => CUser::GetID(),
                'CODE' => Cutil::translit(htmlspecialchars($arFields['NAME']),'ru',['replace_space'=>'_','replace_other'=>'_']),
                'ACTIVE' => 'Y',
                'DETAIL_TEXT_TYPE' => 'html'
            ]
        );

        if ($arFields['PREVIEW_PICTURE']['error']) $arFields['PREVIEW_PICTURE'] = $arFields['DETAIL_PICTURE'];

        return $arFields;
    }
}
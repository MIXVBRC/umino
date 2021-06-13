<?

Class EasyContent extends CBitrixComponent
{

    private $imagesDir = __DIR__ . "/uploadFiles";

    /**
     * Быстрый просмотр данных
     * @param $data
     */
    private function pre($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    public function executeComponent()
    {
        /**
         * Подключаем модель инфоблоков
         */
        if(!CModule::IncludeModule("iblock"))
            return;

        /**
         * Проверяем существование папки для временных изображений
         */
        if (file_exists($this->imagesDir))
            mkdir($this->imagesDir);

        /**
         * Получаем все данные об инфоблоке кроме элементов
         */
        $this->getIBlock();
        $this->getIBlockProperties();
        $this->getIBlockSections();
        $this->getIBlockFields([
            "NAME" => "text",
            "DETAIL_PICTURE" => "file",
            "PREVIEW_PICTURE" => "file",
            "PREVIEW_TEXT" => "textarea",
        ]);

        if ($_POST["AJAX_CALL"] == "Y")
            $this->addElement();

        $this->IncludeComponentTemplate();
    }

    private function getIBlock()
    {
        /**
         * Структура таблиц модуля информационных блоков:
         * https://dev.1c-bitrix.ru/api_help/iblock/fields.php
         */

        $dbIBlock = CIBlock::GetList(
            [
                "SORT"=>"ASC",
                "NAME"=>"ASC"
            ],
            [
                "ID" => $this->arParams["IBLOCK_ID"],
            ]
        );
        if ($obIBlock = $dbIBlock->GetNext(true, false))
            $this->arResult = $obIBlock;
    }

    private function getIBlockProperties()
    {
        /**
         * Структура таблиц модуля информационных блоков:
         * https://dev.1c-bitrix.ru/api_help/iblock/fields.php
         */

        $dbIBlockProps = CIBlockProperty::GetList(
            [
                "SORT"=>"ASC",
                "NAME"=>"ASC"
            ],
            [
                "IBLOCK_ID"=>$this->arParams["IBLOCK_ID"],
            ]
        );

        while ($obIBlockProps = $dbIBlockProps->GetNext(true, false))
            $this->arResult["PROPERTIES"][$obIBlockProps["CODE"]] = $obIBlockProps;
    }

    private function getIBlockSections()
    {
        $dbIBlockSections = CIBlockSection::GetList(
            [
                "LEFT_MARGIN" => "ASC",
                "RIGHT_MARGIN" => "ASC"
            ],
            [
                "IBLOCK_ID" => $this->arParams["IBLOCK_ID"],
            ]
        );
        while ($obIBlockSections = $dbIBlockSections->GetNext(true, false))
            $this->arResult["SECTIONS"][] = $obIBlockSections;
    }

    private function getIBlockFields($arFieldsCode)
    {
        $arIBlockFields = CIBlock::GetFields($this->arParams["IBLOCK_ID"]);
        foreach ($arIBlockFields as $code => $field) {
            if (!in_array($code, array_keys($arFieldsCode)))
                continue;
            $this->arResult["FIELDS"][$code] = array_merge($field, ["PROPERTY_TYPE" => $arFieldsCode[$code]]);
        }
    }

    private function addElement()
    {
        $arElement = new CIBlockElement;
        if ($arElement->Add($this->getArrayPOST())) {
            $this->arResult["SUCCESS"] = "Новость добавлена!";
        } else {
            $this->arResult["ERROR"] = $arElement->LAST_ERROR;
        }
    }

    private function getArrayPOST()
    {
        $arPOST = [];
        foreach ($_POST as $key => $value)
        {
            if ($key == "DETAIL_TEXT")
                $arPOST = array_merge($arPOST, [$key=>$value]);
            elseif (in_array($key, array_merge(array_keys($this->arResult["FIELDS"]))))
                $arPOST = array_merge($arPOST, [$key=>$value]);
            elseif (in_array($key, array_keys($this->arResult["PROPERTIES"])))
                $arPOST = array_merge($arPOST, ["PROPERTY_VALUES" => [$key=>$value]]);

            $arPOST = array_merge(
                $arPOST,
                [
                    "IBLOCK_SECTION_ID" => [],
                    "IBLOCK_ID" => $this->arParams["IBLOCK_ID"],
                    "ACTIVE" => "N",
                    "MODIFIED_BY" => CUser::GetID(),
                    "CODE" => Cutil::translit(htmlspecialchars($arPOST["NAME"]),"ru",["replace_space"=>"_","replace_other"=>"_"])
                ]
            );
        }
        return $arPOST;
    }
}
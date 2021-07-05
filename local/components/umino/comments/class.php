<?

Class Comments extends CBitrixComponent
{
    public function executeComponent()
    {
        global $APPLICATION;
        if($_REQUEST['AJAX_CALL'] == 'Y') {
            $GLOBALS['APPLICATION']->RestartBuffer();
            $this->addComment();
        }

        if(!\CModule::IncludeModule('iblock'))
            return;

        $this->arResult['ITEMS'] = $this->getComments();

        $this->IncludeComponentTemplate();
    }

    private function getComments()
    {
        $arResult = [];
        $dbElement = CIBlockElement::GetList(
            ['DATE_CREATE' => 'ASC'],
            [
                'IBLOCK_ID' => $this->arParams['IBLOCK_ID'],
                'PROPERTY_ELEMENT_ID' => $this->arParams['ELEMENT_ID']
            ],
            false, false,
            [
                'ID',
                'NAME',
                'DETAIL_TEXT',
                'PROPERTY_LIKE',
                'PROPERTY_DISLIKE',
                'DATE_CREATE',
            ]
        );
        while ($arElement = $dbElement->GetNext())
        {

            if (!isset($arElement['PROPERTY_LIKE_VALUE'])) $arElement['PROPERTY_LIKE_VALUE'] = 0;
            if (!isset($arElement['PROPERTY_DISLIKE_VALUE'])) $arElement['PROPERTY_DISLIKE_VALUE'] = 0;

            $arElement['COMMENT_RATING'] = $arElement['PROPERTY_LIKE_VALUE'] - $arElement['PROPERTY_DISLIKE_VALUE'];
            $arResult[] = $arElement;
        }

        return $arResult;
    }

    private function addComment()
    {
        $user = $this->getUsersById($GLOBALS['USER']->GetID(), ['ID','LOGIN']);
        (new \CIBlockElement)->Add([
            'MODIFIED_BY'    => (int) $user['ID'],
            'IBLOCK_ID'      => (int) $this->arParams['IBLOCK_ID'],
            'PROPERTY_VALUES'=> [
                'ELEMENT_ID' => (int) $this->arParams['ELEMENT_ID'],
                'COMMENT_ID' => '',
            ],
            'NAME'           => $user['LOGIN'],
            'ACTIVE'         => $this->arParams['ACTIVE_SAVE'],
            'DETAIL_TEXT'    => $this->checkPost($_POST['COMMENT']),
        ]);
    }

    private function checkPost($data)
    {
        return htmlspecialchars(trim($data));
    }

    private function getUsersById($userId, $fields)
    {
        return CUser::GetList(
            ($by="id"),
            ($order="asc"),
            ['ID' => $userId],
            ['FIELDS' => $fields]
        )->Fetch();
    }
}
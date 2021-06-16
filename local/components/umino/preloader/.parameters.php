<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = [
	"GROUPS" => [
        "OPTIONS" => [
            "NAME" => "Цветовое решение",
        ],
	],
	"PARAMETERS" => [

        // OPTIONS
        "ACTIVE" => [
            "PARENT" => "OPTIONS",
            "NAME" => "Включить прелоадер",
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "N"
        ],
    ],
];


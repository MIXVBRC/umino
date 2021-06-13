<?php
$arUrlRewrite=array (
  2 => 
  array (
    'CONDITION' => '#^/news/([a-zA-Z0-9_-]+)/#',
    'RULE' => 'ELEMENT_CODE=$1',
    'ID' => '',
    'PATH' => '/news/detail.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/headings/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/headings/index.php',
    'SORT' => 100,
  ),
);

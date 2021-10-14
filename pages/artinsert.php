<?php
require("header.php");
$icons = file_get_contents("./json/article.json");
foreach (json_decode($icons) as $key => $value) {
   if($_REQUEST['save'] == "ok"){
    new DInsert(
    'article',
    [
        'art_names',
        'art_alias',
        'art_title',
        'art_keyword',
        'art_description',
        'art_subcontent',
        'art_content'


    ],
    [
        $value->title,
        $value->alias,
        $value->title,
        '',
        '',
        '',
        $value->introtext



    ]
);
echo "ok";
   }
  
   
}


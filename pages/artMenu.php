<?php
require("header.php");
$art_menu_select = new DSelect('menu,article,art_menu');
$settings = new DSelect('settings');
$nameSite = $settings->queryRow('settings_id', 3); 
$limit = $nameSite['name_site'];
$controller->limit = $limit;
$countPageMin = ($controller->twocorrectthird($sansize->getrequestInt("id"), '', 1, $sansize->getrequestInt("id")) * $controller->limit) - $controller->limit;
$art_menu = $art_menu_select->queryRowWhere('menu.menu_id = art_menu.menu AND art_id = art_menu.articles AND menu.menu_id ="' 
. $sansize->getrequestInt("menu_id").'" LIMIT '. $countPageMin.','. $controller->limit.'');
$rez = [];
foreach ($art_menu as $key => $value) {
  $rez[$key] =  array_merge(
  ['art_id'=> $value['art_id']],
  ['art_names'=> $value['art_names']],
  ['art_alias'=> $value['art_alias']],
  ['art_title'=> $value['art_title']],
  ['art_keyword'=> $value['art_keyword']],
  ['art_description'=> $value['art_description']],
  ['art_subcontent'=> html_entity_decode($value['art_subcontent'], ENT_HTML5)],
  ['art_content'=> html_entity_decode($value['art_content'], ENT_HTML5)]
 
);
}
echo json_encode($rez);
<?php
require("header.php");

$sansize = new Sansize();
$controller  = new Controller();
$art_menu_select = new DSelect('menu,article,art_menu');
$controller->limit = 4;
$countPageMin = ($controller->twocorrectthird($sansize->getrequestInt("id"), '', 1, $sansize->getrequestInt("id")) * $controller->limit) - $controller->limit;
$art_menu = $art_menu_select->queryRowWhere('menu.menu_id = art_menu.menu AND art_id = art_menu.articles AND menu.menu_id ="' 
. $sansize->getrequestInt("menu_id"). ' "AND article.art_lang = "'.$sansize->getrequest("lang").'" LIMIT '. $countPageMin.','. $controller->limit.'');
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
  ['art_content'=> html_entity_decode($value['art_content'], ENT_HTML5)],
  ['art_lang'=> $value['art_lang']]
);
}
echo json_encode($rez);
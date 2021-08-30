<?php
require("header.php");
$select = new DSelect('article');
$article = $select->queryRows();
$rez = [];
foreach ($article as $key => $value) {
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
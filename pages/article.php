<?php
require("header.php");
$sansize = new Sansize();
$select = new DSelect('article');
$article = $select->queryRowWhere("article.art_alias = '".$sansize->getrequest('page')."'");
$rez = [];

echo json_encode($article);
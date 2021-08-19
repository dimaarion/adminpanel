<?php
require("header.php");
require("../admin/classes/Database.php");
require("../admin/classes/DSelect.php");
require("../admin/classes/Sansize.php");
$sansize = new Sansize();
$select = new DSelect('article');
$article = $select->queryRowWhere("article.art_alias = '".$sansize->getrequest('page')."'");
$rez = [];

echo json_encode($article);
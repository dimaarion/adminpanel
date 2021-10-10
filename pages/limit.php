<?php
require("header.php");
$select = new DSelect('article');
$article = $select->queryRows();
$settings = new DSelect('settings');
$nameSite = $settings->queryRow('settings_id', 3); 
$limit = $nameSite['name_site'];
echo json_encode(count($article)/$limit);
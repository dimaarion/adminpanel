<?php
require("header.php");
$art_menu_select = new DSelect('menu,article,art_menu');
$art_menu = $art_menu_select->queryRowWhere('menu.menu_id = art_menu.menu AND art_id = art_menu.articles AND menu.menu_id = "'. $sansize->getrequestInt("menu_id").'"');
echo json_encode(count($art_menu));

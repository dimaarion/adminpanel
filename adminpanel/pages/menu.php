<?php
require("header.php");
require("../admin/classes/Database.php");
require("../admin/classes/DSelect.php");
$select = new DSelect('menu');
$menu = $select->queryRows();
echo json_encode($menu);
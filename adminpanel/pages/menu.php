<?php
require("header.php");
$select = new DSelect('menu');
$menu = $select->queryRows();
echo json_encode($menu);
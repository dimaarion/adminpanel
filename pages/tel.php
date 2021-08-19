<?php
require("header.php");
require("../admin/classes/Database.php");
require("../admin/classes/DSelect.php");
$select = new DSelect('tel');
$tel = $select->queryRow('tel_id', 1);
echo json_encode($tel['tel_content']);
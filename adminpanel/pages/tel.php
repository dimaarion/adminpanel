<?php
require("header.php");
$select = new DSelect('tel');
$tel = $select->queryRow('tel_id', 1);
echo json_encode($tel['tel_content']);
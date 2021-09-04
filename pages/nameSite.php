<?php
require("header.php");
$settings = new DSelect('settings');
$nameSite = $settings->queryRow('settings_id', 1); 
echo json_encode($nameSite['name_site']);
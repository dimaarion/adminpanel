<?php
require("header.php");
$icons = file_get_contents("./json/icons.json");
echo json_encode(json_decode($icons)) ;
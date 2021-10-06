<?php
header("Access-Control-Allow-Origin:*");
header("Content-type: application/json");
require("../admin/classes/Controller.php");
$controller = new Controller();
echo json_encode($controller->get_json("fonts.json")) ;
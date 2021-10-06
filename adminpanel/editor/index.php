<?php
header("Access-Control-Allow-Origin:*");
header("Content-type: application/json");
require("../admin/classes/Controller.php");
$controller = new Controller();
$controller->set_json("fonts.json",["fonts"=>$_REQUEST['fonts']]);
echo(json_encode($controller->get_json("fonts.json")));
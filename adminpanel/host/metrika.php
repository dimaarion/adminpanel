<?php
header("Access-Control-Allow-Origin:*");
header("Content-type: application/json");
require("../admin/classes/Controller.php");
require("../admin/classes/Metrika.php");
$metrika = new Metrika();
echo(json_encode($metrika->get_json("host.json")));
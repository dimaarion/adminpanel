<?php
header("Access-Control-Allow-Origin:*");
header("Content-type: application/json");
require("../admin/classes/Metrika.php");
$metrika = new Metrika();
echo($metrika->get_json("host.json"));
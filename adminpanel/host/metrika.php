<?php
header("Access-Control-Allow-Origin:*");
header("Content-type: application/json");
require("../admin/classes/Database.php");
require("../admin/classes/Controller.php");
require("../admin/classes/Metrika.php");
require("../admin/classes/DSelect.php");
$metrika = new Metrika();
$settings = new DSelect('settings');
$nameSite = $settings->queryRow('settings_id', 1); 
echo(json_encode([
   [  "id"=>1,
      "name"=>"host",
      "content" => [
         [
      "id"=>1,
      "host" => $metrika->get_json("host.json")
         ]
      ]
   ],
   [  "id"=>2,
      "name"=>"nameSite",
      "content" =>  [
         [
         "id"=>1,
         "name"=> $nameSite['name_site']
         ]
      ]
   ],
   [  "id"=>3,
      "name"=>"hostPage",
      "content" =>  [
         [
         "id"=>1,
         "host" => $metrika->get_json("hostPage.json")
         ]
      ]
   ]
]));
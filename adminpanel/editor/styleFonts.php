<?php
require("../admin/classes/Controller.php");
$controller = new Controller();
$a = [];
foreach ($controller->get_json('./fonts.json') as $key => $value) {
  $value =  preg_replace('/[,]+/',"&family=",$value);
  $value =  preg_replace('/[" "]+/',"+",$value);
  $value =  preg_replace('/^/',"family=",$value);
  $value =  preg_replace('/$/',"&display=swap');",$value);
  $a[$key] = "@import url('https://fonts.googleapis.com/css2?".$value; 
}
$controller->set_json('./styleFonts.json',$a['fonts']);
echo $a['fonts'];
               
                
                

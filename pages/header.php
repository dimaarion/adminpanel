<?php
header("Access-Control-Allow-Origin:*");
header("Content-type: application/json");
spl_autoload_register(function ($className) {
    require '../adminpanel/admin/classes/' . $className . '.php';
});
$sansize = new Sansize();
$controller  = new Controller();

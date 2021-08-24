<?php
header("Access-Control-Allow-Origin:*");
header("Content-type: application/json");
spl_autoload_register(function ($className) {
    require '../admin/classes/' . $className . '.php';
});

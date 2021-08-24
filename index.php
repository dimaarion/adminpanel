<?php spl_autoload_register(function ($className) {
    require './adminpanel/admin/classes/' . $className . '.php';
});
$controller = new Controller();
$controller->includer(true, true, 'template/function.php', $controller);
 ?>
<!doctype html>
<html lang="ru">

<head>
<?php 

$controller->includer(true, true, 'template/header.php', $controller); 
?>
</head>

<body>
<?php

$controller->includer(true, true, 'template/articles.php', $controller); ?>
</body>

</html>
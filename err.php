<?php 
spl_autoload_register(function ($className) {
    require './adminpanel/admin/classes/' . $className . '.php';
});
$controller = new Controller();
?>
<!doctype html>
<html lang="ru">

<head>
<?php
$controller->includer(true, true, 'template/header.php', $controller);
?>
</head>

<body>
<?php $controller->includer(true, true, 'template/articles.php', $controller); ?>
<h1 class = "text-center">404</h1>
<h3 class = "text-center">Такой страницы не существует</h3>
</body>

</html>
<?php
spl_autoload_register(function ($className) {
    require './admin/classes/' . $className . '.php';
});
$controller  = new Controller();
$sansize = new Sansize();
$new_menu_select = new DSelect('menu');
$new_menu = $new_menu_select->queryRows();
$page = $sansize->getrequest('page');
$id = $sansize->getrequest('id');
$delid = $sansize->getrequest('delid');
$nmenu = $sansize->getrequest('nmenu');
if($nmenu == 'new'){
    header('location:/index.php?page=menu&id=newmenu');
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <?php include_once('./admin/template/header.php'); ?>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col">
            <?php include_once('./admin/template/logo.php'); ?>
        </div>
        <div class="col">
            <?php include_once('./admin/template/menutop.php'); ?>
        </div>

    </div>
    <?php if($page == 'menu'): ?>
            <?php include_once('./admin/template/menumain.php'); ?>
    <?php endif; ?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
<?php
spl_autoload_register(function ($className) {
    require './admin/classes/' . $className . '.php';
});

$controller  = new Controller();
$sansize = new Sansize();
//Переменные
$page = $sansize->getrequest('page');
$id = $sansize->getrequest('id');
$delid = $sansize->getrequest('delid');
$nmenu = $sansize->getrequest('nmenu');

//меню
$new_menu_select = new DSelect('menu');
$update_menu_select = new DSelect('menu');
$update_menu_parent_select = new DSelect('menu');
$new_menu = $new_menu_select->queryRows();
$menu_update = $update_menu_select->queryRow('menu_id', $id);

//Статьи
$art_select = new DSelect('article');
$art_select_id = new DSelect('article');
$article = $art_select->queryRows();
$article_id =  $art_select_id->queryRow('art_id', $id);

//Меню + Статьи
$art_menu_select = new DSelect('menu,article,art_menu');
$art_menu = $art_menu_select->queryRowWhere('menu.menu_id = art_menu.menu AND art_id = art_menu.articles AND menu.menu_id =' . $id);

// Файлы css и js 
$links = $controller->dirExt('css');
$script = $controller->dirExt('js');
// создание и редактирование таблиц
$controller->createTables();
$controller->insertTable($sansize);
$controller->deleteTable($sansize);
//Загрузка файла
$files_upload = new DUpload('files', '/img/upload/');
$images = $files_upload->getImg('/img/upload');
//

if ($page == 'menu') {
    $head_title = 'Меню';
    //$head_title_txt = 'Добавить пункт меню';
    //$includer = include_once('./admin/template/menumain.php');
}
//----------------------------------------------------------------------------------------------------------------------------
if ($nmenu == 'new') {
    header('location:/index.php?page=menu&nmenu=menu');
}
if ($nmenu == 'newart') {
    header('location:/index.php?page=articles&nmenu=articles');
}
if ($nmenu == 'load') {
    header('location:/index.php?page=files');
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
        <?php include('./admin/template/headtitle.php'); 
         $controller->includer($nmenu, 'menu', './admin/template/menumain.php', $controller, $new_menu,  $x2, $arr); 
         $controller->includer($nmenu, 'newmenu', './admin/template/newmenu.php', $controller, $x, $x2, $new_menu);
        $controller->includer($nmenu, 'newmenu', './admin/template/newmenu.php', $controller, $art_menu, $x2, $new_menu);
         $controller->includer($page, 'articles', './admin/template/artmain.php', $controller, $article, $x2, $arr); 
          
         ?>
        <?php if ($page == 'articles') : ?>
            <?php //include_once('./admin/template/artmain.php'); 
            ?>
        <?php endif; ?>
        <?php if ($page == 'files') : ?>
            <?php include_once('./admin/template/files.php'); ?>
        <?php endif; ?>
    </div>
    <?php include_once('./admin/template/footer.php'); ?>
    <script>
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
 <?php

    $menu = [
[
    "menu_id"=>1,
    "names"=>"Главная",
    "alias"=>"/",
    "parent_id"=>0
],[
    "menu_id"=>2,
    "names"=>"Меню",
    "alias"=>"index.php?page=menu",
    "parent_id"=>0
],[
    "menu_id"=>3,
    "names"=>"Статьи",
    "alias"=>"index.php?page=articles",
    "parent_id"=>0
],[
    "menu_id"=>4,
    "names"=>"Файлы",
    "alias"=>"index.php?page=files",
    "parent_id"=>0
]
    ];
    $menu_class = new Menu();
    $menu_class->props = $menu;
    $tableMenu = new Database();
    $tableMenu->createTable(
        "CREATE TABLE  menu (
            menu_id INT(6) AUTO_INCREMENT NOT NULL,
            alias VARCHAR(255) NOT NULL,
            title VARCHAR(255) NOT NULL,
            names VARCHAR(255) NOT NULL,
            keywords VARCHAR(255) NOT NULL,
            descriptions VARCHAR(255) NOT NULL,
            parent_id int(11) NOT NULL,
            PRIMARY KEY (`menu_id`))"
        );
    $menuSelect = new DSelect('menu');

 ?>

 <div class="container menu-top">
     <ul class="nav justify-content-end">
         <?php $menu_class->menu_recursions(); ?>
     </ul>
 </div>
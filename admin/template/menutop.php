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
    "alias"=> "/index.php?page=menu&nmenu=menu",
    "parent_id"=>0
],[
    "menu_id"=>3,
    "names"=>"Статьи",
    "alias"=> "/index.php?page=articles&nmenu=articles",
    "parent_id"=>0
],[
    "menu_id"=>4,
    "names"=>"Файлы",
    "alias"=>"/index.php?page=files",
    "parent_id"=>0
]
    ];
    $menu_class = new Menu();
    $menu_class->props = $menu;
 ?>

 <div class="container menu-top">
     <ul class="nav justify-content-end">
         <?php $menu_class->menu_recursions(); ?>
     </ul>
 </div>
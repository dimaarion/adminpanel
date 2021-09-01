<?php
$sansize = new Sansize();
$menuClass = new DSelect('menu');
$articleClassRow = new DSelect('article');
$articleClassRows = new DSelect('article');
$menu_class = new Menu();
$metrika = new Metrika();

//Переменные

$controller->limit = 4;
$controller->alias = $sansize->getrequest('alias');
$controller->id = $sansize->getrequest('id');
$menu_alias =  $menuClass->queryRow('alias', $controller->indexPage($controller->alias, ''));
$artRow = $articleClassRow->queryRow('art_alias', $controller->indexPage($controller->alias, ''));
$artRows = $articleClassRows->queryRows();
$metrika->display($artRows);
//переадресация на главную если статьи не существует
$controller->redirects($controller->ifElseContent($controller->ifElseContent($artRow['art_alias'],$menu_alias['alias']),'nopage'), 'nopage','/');
//переадресация с http на https
$controller->redirects($_SERVER['HTTP_X_FORWARDED_PROTOCOL'],'http','https://'. $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
//
$controller->redirects('', 'http', 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

//Создание файлов
$controller->createFiles('robots.txt',$controller->createRobotText());
$controller->createFiles('sitemap.xml', $controller->createSitemap($artRows),'sitemap');
?>
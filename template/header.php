<?php
$menuClass = new DSelect('menu');
$articleClassRow = new DSelect('article');
$menu_alias =  $menuClass->queryRow('alias', $controller->indexPage($controller->alias, ''));
$artRow = $articleClassRow->queryRow('art_alias', $controller->indexPage($controller->alias, ''));
?>
<meta charset="utf-8" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.css">
    <link
        href="https://fonts.googleapis.com/css?family=Acme|Great+Vibes|Kaushan+Script|Lobster|Patua+One|Ravi+Prakash&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@500&display=swap" rel="stylesheet">
    <meta name="keywords" content="<?php
                                        echo $controller->ifElseContent(
                                                $menu_alias['keywords'],
                                                $artRow['art_keyword']
                                        );
                                        ?>">
        <meta name="description" content="<?php
                                                echo $controller->ifElseContent(
                                                        $menu_alias['descriptions'],
                                                        $artRow['art_description']
                                                );
                                                ?>">

        <title><?php
                echo $controller->ifElseContent(
                        $menu_alias['title'],
                        $artRow['art_title']
                ) . $page;
                ?>

        </title>
        <link href="/static/css/main.f295b131.chunk.css" rel="stylesheet">
<?php
class Controller
{

    public $err;
    public $saveurls;
    public $savenames;
    public function inputs($inputs)
    {
        echo '<div class="form-group '
            . $inputs['divclass'] . '">';
        if ($inputs['names']) :
            echo '<label class="col-sm col-form-label '
                . $inputs['labelclass']
                . '" for="'
                . $inputs['name']
                . '"><h5>'
                . $inputs['names']
                . '</h5></label>';
        endif;
        echo '<input value = "'
            . $inputs['value']
            . '" class="form-control form-control-lg '
            . $inputs['inputclass']
            . '" type="'
            . $inputs['type']
            . '" name="'
            . $inputs['name']
            . '" id="'
            . $inputs['name']
            . '"></div>';
    }

    public function inputsCheckbox($inputs)
    {
        echo '<div class="' . $inputs['divclass']
            . '"><input value = "' . $inputs['value']
            . '" class="form-control ' . $inputs['inputclass']
            . '" type="'
            . $inputs['type']
            . '" name="' . $inputs['name']
            . '" id="' . $inputs['id']
            . '"><label class="col-sm col-form-label '
            . $inputs['labelclass']
            . '" for="'
            . $inputs['id']
            . '">'
            . $inputs['names']
            . '</label></div>';
    }
    public function inputsTextarera($inputs)
    {
        echo '<div class="form-group '
            . $inputs['divclass']
            . '"><label class="col-sm col-form-label '
            . $inputs['labelclass']
            . '" for="'
            . $inputs['name']
            . '"><h5>'
            . $inputs['names']
            . '</h5></label><textarea class="form-control form-control-lg '
            . $inputs['inputclass']
            . '"name="' . $inputs['name'] . '" id="'
            . $inputs['id']
            . '">'
            . $inputs['value']
            . '</textarea></div>';
    }

    public function saves($inputs)
    {
        echo  '<div class="row"><div class="col-3">' .
            $this->inputs($inputs)
            . '</div><a href = "'
            . $inputs['saveurls']
            . '" class="col-3"><div class="form-control form-control-lg  text-center">'
            . $inputs['savenames']
            . '</div></a></div>';
    }


    public function getLinck($inputs)
    {
        echo  '<div class="form-group  '
            . $inputs['divclass']
            . '"><a style="display: block;" href = "'
            . $inputs['saveurls']
            . '" class="col"><div class="form-control form-control-lg  text-center">'
            . $inputs['savenames']
            . '</div></a></div>';
    }
    public function dirExt($u)
    {
        $newdir = [];
        $css = scandir($u);
        foreach ($css as $key => $value) {
            if ($value == '.' || $value == '..') {
            } else {
                $newdir[$key] = $value;
            }
        }
        return $newdir;
    }

    public function createTables()
    {
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
        $tableMenu->createTable(
            "CREATE TABLE  art_menu (
            art_menu_id INT(6) AUTO_INCREMENT NOT NULL,
            menu int(11) NOT NULL,
            articles int(11) NOT NULL,
            PRIMARY KEY (`art_menu_id`))"
        );

        $tableMenu->createTable(
            "CREATE TABLE  article (
            art_id INT(6) AUTO_INCREMENT NOT NULL,
            art_names VARCHAR(255) NOT NULL,
            art_alias VARCHAR(255) NOT NULL,
            art_title VARCHAR(255) NOT NULL,
            art_keyword VARCHAR(255) NOT NULL,
            art_description VARCHAR(255) NOT NULL,
            art_subcontent text(255) NOT NULL,
            art_content text(255) NOT NULL,
            PRIMARY KEY (`art_id`))"
        );
    }

    public function insertTable($sansize)
    {
        //Добавление пунктов меню
        if (@$_REQUEST['new_menu_save']) {
            $din =  new DInsert(
                'menu',
                [
                    'alias',
                    'title',
                    'names',
                    'keywords',
                    'descriptions',
                    'parent_id'
                ],
                [
                    $sansize->getrequest('alias'),
                    $sansize->getrequest('title'),
                    $sansize->getrequest('names'),
                    $sansize->getrequest('keywords'),
                    $sansize->getrequest('description'),
                    $sansize->getrequest('parent_id'),
                ]
            );

            $this->err = $din->err;
        }
        // Редактирование меню
        if (@$_REQUEST['update_menu_save']) {
            $din =  new DUpdate(
                'menu',
                [
                    'alias',
                    'title',
                    'names',
                    'keywords',
                    'descriptions',
                    'parent_id',
                    'menu_id'

                ],
                [
                    $sansize->getrequest('alias'),
                    $sansize->getrequest('title'),
                    $sansize->getrequest('names'),
                    $sansize->getrequest('keywords'),
                    $sansize->getrequest('description'),
                    $sansize->getrequest('parent_id'),
                ],
                $sansize->getrequest('menu'),
            );

            $this->err = $din->err;
            header('location:/index.php?page=menu&nmenu=updatemenu&id=' . $sansize->getrequest('menu'));
        }
        // добавление статьи к меню
        if (@$_REQUEST['update_menu_art_save']) {
            try {
                $din =  new DInsert(
                    'art_menu',
                    [
                        'menu',
                        'articles'

                    ],
                    [
                        $sansize->getrequest('menu'),
                        $sansize->getrequest('articles'),

                    ]
                );
                header('location:/index.php?page=menu&nmenu=updatemenu&id=' . $sansize->getrequest('menu'));
            } catch (\Throwable $th) {
                $this->err = 'Ошибка добавления статьи';
            }
        }
        // Редактирование статьи
        if (@$_REQUEST['update_art_save']) {
            $din =  new DUpdate(
                'article',
                [
                    'art_names',
                    'art_alias',
                    'art_title',
                    'art_keyword',
                    'art_description',
                    'art_subcontent',
                    'art_content',
                    'art_id'
                ],
                [
                    $sansize->getrequest('names'),
                    $sansize->getrequest('alias'),
                    $sansize->getrequest('title'),
                    $sansize->getrequest('keywords'),
                    $sansize->getrequest('description'),
                    htmlentities($_REQUEST['subcontent'], ENT_HTML5),
                    htmlentities($_REQUEST['content'], ENT_HTML5)

                ],
                $sansize->getrequest('update_art_id'),
            );

            $this->err = $din->err;
            header('location:/index.php?page=articles&nmenu=updateart&id=' . $sansize->getrequest('update_art_id'));
        }
        //Добавление статьи
        if (@$_REQUEST['new_art_save']) {
            $din =  new DInsert(
                'article',
                [
                    'art_names',
                    'art_alias',
                    'art_title',
                    'art_keyword',
                    'art_description',
                    'art_subcontent',
                    'art_content'
                ],
                [
                    $sansize->getrequest('names'),
                    $sansize->getrequest('alias'),
                    $sansize->getrequest('title'),
                    $sansize->getrequest('keywords'),
                    $sansize->getrequest('description'),
                    htmlentities($_REQUEST['subcontent'], ENT_HTML5),
                    htmlentities($_REQUEST['content'], ENT_HTML5)

                ]
            );

            $this->err = $din->err;
        }
    }

    public function deleteTable($sansize)
    {
        if ($_REQUEST['delete_menu_id']) {
            $d = new DDelete('menu', 'menu_id', $_REQUEST['delete_menu_id']);
            $d->delete();
            header('location:/index.php?page=menu&nmenu=menu');
        }
        if ($_REQUEST['update_menu_art_delete']) {
            $d = new DDelete('art_menu', 'articles', [$_REQUEST['menu_articles']]);
            $d->delete();
            header('location:/index.php?page=menu&nmenu=updatemenu&id=' . $sansize->getrequest('menu'));
        }
    }
    
    public function includer($request,$ifender,$u, $controller, $x,$x2, $arr)
    {
        if($request == $ifender){
            return include($u);
        }
    }
}

<?php
class Controller
{

    public $err;
    public $saveurls;
    public $savenames;
    public $errFiles = 'Такого файла или каталога не существует';

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
        if (file_exists($u)) {
            $newdir = [];
            $css = scandir($u);
            foreach ($css as $key => $value) {
                if ($value == '.' || $value == '..') {
                } else {
                    $newdir[$key] = $value;
                }
            }
            return $newdir;
        } else {
            echo $this->errFiles;
        }
    }

    public function dirFileName($nameDir)
    {
      $r =  array_map(function ($x) {
            preg_match('/\w+\.\w+\.\w+\.css|\w+\.\w+\.\w+\.js/', $x, $p);
            return $p[0];
        }, $nameDir); 
        
        return array_unique($r);
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
        $tableMenu->createTable(
            "CREATE TABLE  prais (
            id INT(11) AUTO_INCREMENT NOT NULL,
            profiles VARCHAR(255) NOT NULL,
            okno VARCHAR(255) NOT NULL,
            stvorka VARCHAR(255) NOT NULL,
            width VARCHAR(255) NOT NULL,
            height VARCHAR(255) NOT NULL,
            znacenie text(255) NOT NULL,
            PRIMARY KEY (`id`))"
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
                $sansize->getrequest('menu')
            );

            $this->err = $din->err;
            header('location:/adminpanel/menu/updatemenu/' . $sansize->getrequest('menu'));
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
                header('location:/adminpanel/menu/updatemenu/' . $sansize->getrequest('menu'));
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
                $sansize->getrequest('update_art_id')
            );

            $this->err = $din->err;
            header('location:/adminpanel/articles/updateart/' . $sansize->getrequest('update_art_id'));
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
        //calculator
        if ($_REQUEST['calculatorRezultSave'] && $sansize->getrequestInt('calculatorRezult')) {
            $din =  new DUpdate(
                'prais',
                [
                    'znacenie',
                    'id'
                ],
                [
                    $sansize->getrequestInt('calculatorRezult'),
                ],
                $sansize->getrequestInt('calculatorid')
            );

            $this->err = $din->err;
            header('location:/adminpanel/calculator/' . $sansize->getrequest('nmenu') . '/' . $sansize->getrequest('id') . '/' . $sansize->getrequest('id2') . '/'. $sansize->getrequest('calculatorRezult').'/'. $sansize->getrequest('calculatorid'));
        }
        //calculator sill
       
        if ($_REQUEST['calculatorRezultSaveSill'] && $sansize->getrequestInt('calculatorRezultSill')) {
            $din =  new DUpdate(
                'grid',
                [
                    $sansize->getrequest('id3'),
                    'grid_id'
                ],
                [
                    $sansize->getrequestInt('calculatorRezultSill'),
                ],
                $sansize->getrequestInt('calculatoridSill')
            );

            $this->err = $din->err;
           header('location:/adminpanel/calculator/' . $sansize->getrequest('nmenu') .'/' . $sansize->getrequest('calculatoridSill') . '/' . $sansize->getrequest('calculatorRezultSill').'/'. $sansize->getrequest('id3'));
        }
        //calculator tide

        if ($_REQUEST['calculatorRezultSaveTide'] && $sansize->getrequestInt('calculatorRezultTide')) {
            $din =  new DUpdate(
                'tide',
                [
                    $sansize->getrequest('id3'),
                    'tide_id'
                ],
                [
                    $sansize->getrequestInt('calculatorRezultTide'),
                ],
                $sansize->getrequestInt('calculatoridTide')
            );

            $this->err = $din->err;
            header('location:/adminpanel/calculator/' . $sansize->getrequest('nmenu') . '/' . $sansize->getrequest('calculatoridTide') . '/' . $sansize->getrequest('calculatorRezultTide') . '/' . $sansize->getrequest('id3'));
        }
    }

    public function deleteTable($sansize)
    {
        if ($_REQUEST['delete_menu_id']) {
            $d = new DDelete('menu', 'menu_id', $_REQUEST['delete_menu_id']);
            $d->delete();
            header('location:/adminpanel/menu/menu');
        }
        if ($_REQUEST['update_menu_art_delete']) {
            $d = new DDelete('art_menu', 'articles', [$_REQUEST['menu_articles']]);
            $d->delete();
            header('location:/adminpanel/menu/updatemenu/' . $sansize->getrequest('menu'));
        }
        if ($_REQUEST['art_delete']) {
            $d = new DDelete('article', 'art_id', $_REQUEST['delete_art_id']);
            $d->delete();
            header('location:/adminpanel/articles/articles');
        }

        if ($_REQUEST['deleteFiles']) {
            $f = preg_replace('/http:\/\/' . $_SERVER['HTTP_HOST'] . '/', '..', $_REQUEST['deleteFiles']);
            @unlink($f);
        }
    }

    public function includer($request, $ifender, $u, $controller, $x = [], $x2 = [], $arr = [], $row = [], $id = 1, $id2 = [], $x3 = [])
    {
        if ($request == $ifender) {
            return include($u);
        }
    }

    public function redirects($request, $ifender, $u)
    {
        if ($request == $ifender) {
            return header('location:' . $u);
        }
    }

    public function indexPage($alias, $prist)
    {
        if ($alias == '') {
            return '/';
        } else {
            return $alias . $prist;
        }
    }

    public function ifElseContent($value1, $value2)
    {
        if (isset($value1)) {
            return $value1;
        } else {
            return $value2;
        }
    }

    public function calculator_profile($var)
    {
        if ($var == 'ru') {
            return 'Россия, Турция';
        } elseif ($var == '3k') {
            return '3-камерный';
        } elseif ($var == '5k') {
            return '5-камерный';
        }
    }

    public function calculator_okno($var)
    {
        if ($var == 'oo') {
            return 'Одностворчатое окно';
        } elseif ($var == 'do') {
            return 'Двустворчатое окно';
        } elseif ($var == 'to') {
            return 'Трехстворчатое окно';
        }
    }
    public function calculator_stvorka($var)
    {
        if ($var == 'sg') {
            return 'глухое';
        } elseif ($var == 'sp') {
            return 'Поворотное';
        } elseif ($var == 'spo') {
            return 'Поворотно-откидное';
        }
    }

    public function twocorrectthird($item1, $item2, $rezult1,$rezult2)
    {
        if($item1 == $item2){
            return $rezult1;
        }else{
            return $rezult2;
        }
    }
}

<?php $menu_update_parent = $update_menu_parent_select->queryRow('menu_id', $menu_update['parent_id']); ?>
<form id="menunain" action="/index.php?page=menu&id=newmenu&nmenu=updatemenu&id=<?php echo $id; ?>" method="post">
    <div class="mt-4 row">
        <?php

        $controller->inputs(
            [
                'type' => 'submit',
                'name' => 'update_menu_save',
                'value' => 'Сохранить',


            ]
        );
        $controller->getLinck(
            [
                'saveurls' => '/index.php?page=menu&nmenu=menu',
                'savenames' => 'Закрыть',

            ]
        );
        ?>
    </div>
    <div class="row">
        <div class="col">
            <?php
            $controller->inputs(
                [
                    'type' => 'text',
                    'names' => 'Название',
                    'name' => 'names',
                    'divclass' => '',
                    'value' => $menu_update['names']
                ]
            );
            $controller->inputs(
                [
                    'type' => 'text',
                    'names' => 'Алиас',
                    'name' => 'alias',
                    'value' => $menu_update['alias']
                ]
            );
            $controller->inputs(
                [
                    'type' => 'text',
                    'names' => 'Заголовок страницы',
                    'name' => 'title',
                    'value' => $menu_update['title']
                ]
            );
            $controller->inputs(
                [
                    'type' => 'text',
                    'names' => 'Ключевые слова',
                    'name' => 'keywords',
                    'value' => $menu_update['keywords']
                ]
            );
            $controller->inputsTextarera(
                [
                    'names' => 'Краткое описание',
                    'name' => 'description',
                    'value' => $menu_update['descriptions']
                ]
            );
            ?>
        </div>
        <div class="col">
            <div class="col mt-2">
                <label for="parent_id">
                    <h5>Категории</h5>
                </label>
                <select class="custom-select" name="parent_id" id="parent_id">
                    <option value="<?php if ($menu_update_parent['names']) {
                                        echo $menu_update_parent['names'];
                                    } else {
                                        echo '0';
                                    }; ?>" selected> <?php if ($menu_update_parent['menu_id']) {
                                                            echo $menu_update_parent['names'];
                                                        } else {
                                                            echo 'Нет';
                                                        }; ?></option>
                    <?php if ($menu_update_parent['menu_id']) : ?>
                        <option value="0">Нет</option>
                    <?php endif; ?>
                    <?php foreach ($new_menu as $key => $value) : ?>
                        <option value="<?php echo $value['menu_id']; ?>"><?php echo $value['names']; ?></option>

                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h5 class="h5  mt-4">Статьи</h5>
                    </div>
                    <div class="col">
                        <?php $controller->inputs(
                            [
                                'type' => 'submit',
                                'name' => 'update_menu_art_delete',
                                'value' => 'Удалить',
                                'divclass' => 'mt-4 '
                            ]
                        ); ?>
                    </div>
                </div>
                <div class="col">
                    <?php
                    array_map(function ($x) {
                        $c = new Controller();
                        $c->inputsCheckbox(
                            [
                                'type' => 'checkbox',
                                'value' => $x['art_id'],
                                'names' => $x['art_names'],
                                'name' => 'menu_articles',
                                'id' => 'update_menu_art' . $x['art_id'],
                                'inputclass' => 'col-1',
                                'divclass' => 'row'
                            ]
                        );
                    }, $art_menu);

                    ?>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h5 class="h5 mt-4">Привязать статью</h5>
                    </div>
                    <div class="col">
                        <?php 
                        $controller->inputs(
                            [
                                'type' => 'submit',
                                'name' => 'update_menu_art_save',
                                'value' => 'Сохранить',
                                'divclass' => 'mt-4 '
                            ]
                        );
                        $controller->inputs(
                            [
                                'type' => 'hidden',
                                'name' => 'menu',
                                'value' => $id,
                                
                            ]
                        );
                        ?>
                    </div>
                </div>

                <div class="col new_menu_art_bl">

                    <?php
                    array_map(function ($x) {
                        $c = new Controller();
                        $c->inputsCheckbox(
                            [
                                'type' => 'checkbox',
                                'value' => $x['art_id'],
                                'names' => $x['art_names'],
                                'name' => 'articles',
                                'id' => 'new_menu_art' . $x['art_id'],
                                'inputclass' => 'col-1',
                                'divclass' => 'new_menu_art row'
                            ]
                        );
                    }, $article);

                    ?>
                </div>
            </div>
        </div>

    </div>

</form>
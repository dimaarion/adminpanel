<div>
    <div class="row">
        <div class="col-1">
            <h2>Статьи</h2>
        </div>
        <div class="col">
            <h5 class="pt-2 ">
                <?php if ($nmenu == 'newart') {
                    echo ': создать новую статью';
                } ?></h5>
        </div>
    </div>

    <?php

    if ($nmenu == 'artnew') {
        //include_once('./admin/template/artnew.php');
    } else if ($nmenu == 'updateart') {
       // include_once('./admin/template/artupdate.php');
    }  ?>
        <form id="main_menu" class="mt-4" action="/index.php" method="post">
            <div class="mt-4 row">
                <?php
                $controller->getLinck(
                    [
                        'savenames' => 'Добавить',
                        'saveurls' => '/index.php?page=articles&nmenu=artnew',
                        'divclass' => 'col-2 p-0'

                    ]
                );
                $controller->inputs(
                    [
                        'type' => 'submit',
                        'name' => 'art_delete',
                        'value' => 'Удалить',
                        'divclass' => 'col-2 p-0'

                    ]
                );

                ?>
            </div>
            <?php
            array_map(function ($t) {
                $c = new Controller();
                $c->inputsCheckbox(
                    [
                        'type' => 'checkbox',
                        'value' => $t['art_id'],
                        'names' => '<a href = "/index.php?page=articles&nmenu=updateart&id=' . $t['art_id'] . '">' . $t['art_names'] . '</a>',
                        'name' => 'delete_art_id[]',
                        'id' => 'delete_art_id' . $t['art_id'],
                        'inputclass' => 'col-1',
                        'divclass' => 'main_menu_cl row'
                    ]
                );
            }, $x);

            ?>
        </form>
   
</div>
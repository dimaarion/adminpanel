<?php $controller->includer(true, true, './admin/template/headtitle.php', $controller, 'Статьи', 'редактировать статью'); ?>
<form id="menunain" action="/articles/updateart/<?php echo $id; ?>" method="post">
    <div class="mt-4 row">
        <?php
        $controller->inputs(
            [
                'type' => 'hidden',
                'name' => 'update_art_id',
                'value' => $id,


            ]
        );
        $controller->inputs(
            [
                'type' => 'submit',
                'name' => 'update_art_save',
                'value' => 'Сохранить',


            ]
        );
        $controller->getLinck(
            [
                'saveurls' => '/articles/articles',
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
                    'value' => $x['art_names']
                ]
            );
            $controller->inputs(
                [
                    'type' => 'text',
                    'names' => 'Алиас',
                    'name' => 'alias',
                    'value' => $x['art_alias']
                ]
            );
            $controller->inputs(
                [
                    'type' => 'text',
                    'names' => 'Заголовок страницы',
                    'name' => 'title',
                    'value' => $x['art_title']
                ]
            );
            $controller->inputs(
                [
                    'type' => 'text',
                    'names' => 'Ключевые слова',
                    'name' => 'keywords',
                    'value' => $x['art_keyword']
                ]
            );
            $controller->inputsTextarera(
                [
                    'type' => 'text',
                    'names' => 'Краткое описание страницы',
                    'name' => 'description',
                    'id' => 'description',
                    'value' => $x['art_description']
                ]
            );
            $controller->inputsTextarera(
                [
                    'type' => 'text',
                    'names' => 'Краткое описание статьи',
                    'name' => 'subcontent',
                    'id' => 'editor1',
                    'value' => $x['art_subcontent']
                ]
            );
            $controller->inputsTextarera(
                [
                    'type' => 'text',
                    'names' => 'Текст статьи',
                    'name' => 'content',
                    'id' => 'editor2',
                    'value' => $x['art_content']
                ]
            );
            ?>
        </div>


    </div>

</form>
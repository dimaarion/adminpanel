<form id="menunain" action="/index.php?page=articles&nmenu=updateart&id=<?php echo $id; ?>" method="post">
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
                'saveurls' => '/index.php?page=articles&nmenu=articles',
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
                    'value' => $article_id['art_names']
                ]
            );
            $controller->inputs(
                [
                    'type' => 'text',
                    'names' => 'Алиас',
                    'name' => 'alias',
                    'value' => $article_id['art_alias']
                ]
            );
            $controller->inputs(
                [
                    'type' => 'text',
                    'names' => 'Заголовок страницы',
                    'name' => 'title',
                    'value' => $article_id['art_title']
                ]
            );
            $controller->inputs(
                [
                    'type' => 'text',
                    'names' => 'Ключевые слова',
                    'name' => 'keywords',
                    'value' => $article_id['art_keyword']
                ]
            );
            $controller->inputsTextarera(
                [
                    'type' => 'text',
                    'names' => 'Краткое описание страницы',
                    'name' => 'description',
                    'id' => 'description',
                    'value' => $article_id['art_description']
                ]
            );
            $controller->inputsTextarera(
                [
                    'type' => 'text',
                    'names' => 'Краткое описание статьи',
                    'name' => 'subcontent',
                    'id' => 'editor1',
                    'value' => $article_id['art_subcontent']
                ]
            );
            $controller->inputsTextarera(
                [
                    'type' => 'text',
                    'names' => 'Текст статьи',
                    'name' => 'content',
                    'id' => 'editor2',
                    'value' => $article_id['art_content']
                ]
            );
            ?>
        </div>


    </div>

</form>
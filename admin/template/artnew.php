<form id="menunain" action="/index.php?page=articles&nmenu=newart" method="post">
    <div class="mt-4 row">
        <?php

        $controller->inputs(
            [
                'type' => 'submit',
                'name' => 'new_art_save',
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

                ]
            );
            $controller->inputs(
                [
                    'type' => 'text',
                    'names' => 'Алиас',
                    'name' => 'alias'
                ]
            );
            $controller->inputs(
                [
                    'type' => 'text',
                    'names' => 'Заголовок страницы',
                    'name' => 'title'
                ]
            );
            $controller->inputs(
                [
                    'type' => 'text',
                    'names' => 'Ключевые слова',
                    'name' => 'keywords'
                ]
            );
            $controller->inputsTextarera(
                [
                    'type' => 'text',
                    'names' => 'Краткое описание страницы',
                    'name' => 'description',
                    'id' => 'description'
                ]
            );
            $controller->inputsTextarera(
                [
                    'type' => 'text',
                    'names' => 'Краткое описание статьи',
                    'name' => 'subcontent',
                    'id' => 'editor1'
                ]
            );
            $controller->inputsTextarera(
                [
                    'type' => 'text',
                    'names' => 'Текст статьи',
                    'name' => 'content',
                    'id' => 'editor2'
                ]
            );
            ?>
        </div>


    </div>

</form>
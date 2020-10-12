<?php
$art_class_select = new DSelect('article');
if(!$sv){
    $sv = explode('.', explode('/', $_SERVER['REQUEST_URI'])[2])[0];
}
$art_rows = $art_class_select->queryRowsLimit($category, $sv,0, 2);

?>
<?php foreach ($art_rows as $key => $value) : ?>
    <div class="container content mb-4 mt-2">
        <h2 class="h2 pt-2 pb-2" style="color: rgb(0, 136, 204); font-weight: bold; font-family: Noto Serif;"><?php echo ($value['names_art']); ?></h2>
        <div class="row">
            <div class="col-sm text-left">
                <div>
                    <?php echo (mb_substr(strip_tags($value['content'], '<p><b>'), 0, 800, 'utf-8')); ?>
                </div>
                <div class="col-sm text-right pb-3"><a class="detailed  justify-content-end" href="/<?php echo ($value['alias_art']); ?>">Подробнее ...</a></div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
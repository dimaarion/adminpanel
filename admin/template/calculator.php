<?php

$profile = $arr->getrequest('nmenu');
$okno = $arr->getrequest('id');
$stvorka = $arr->getrequest('id2');
$rez = $arr->getrequest('id3');
$id = $arr->getrequest('id4');
$activeSt = 'background-color: #cccccc;';
$st = 'background-color: #ffffff;';
$calculatorRezult = 'calculatorRezult';
$calculatorid = 'calculatorid';
$calculatorRezultSave = 'calculatorRezultSave';
$title = 'Окно';
if ($profile == 'sill') {
    $rez = $arr->getrequest('id2');
    $id = $arr->getrequest('id');
    $calculatorRezult = 'calculatorRezultSill';
    $calculatorid = 'calculatoridSill';
    $calculatorRezultSave = 'calculatorRezultSaveSill';
    $title = 'Подоконник';
}
if ($profile == 'tide') {
    $rez = $arr->getrequest('id2');
    $id = $arr->getrequest('id');
    $calculatorRezult = 'calculatorRezultTide';
    $calculatorid = 'calculatoridTide';
    $calculatorRezultSave = 'calculatorRezultSaveTide';
    $title = 'Отлив';
}

?>
<div class="col-sm-2"><h2 class="h2 ml-5"><?php echo $title; ?></h2></div>

<form method="POST">
    <div class="col-sm mb-3 row">
        <div class="col-sm">
            <?php $controller->includer(true, true, './admin/template/calculatorMenu.php', $controller); ?>
        </div>

        <div class="col-sm">
            <?php
            $controller->inputs(
                [
                    'type' => 'text',
                    'name' => $calculatorRezult,
                    'divclass' => 'mt-3',
                    'inputclass' => 'text-center',
                    'value' => $rez
                ]
            );
            $controller->inputs(
                [
                    'type' => 'hidden',
                    'name' => $calculatorid,
                    'divclass' => 'mt-3',
                    'inputclass' => 'text-center',
                    'value' => $id
                ]
            );

            ?>
        </div>
        <div class="col-sm">
            <?php $controller->inputs(
                [
                    'type' => 'submit',
                    'name' => $calculatorRezultSave,
                    'value' => 'Сохранить',
                    'divclass' => 'text-center mt-3',

                ]
            ); ?>
        </div>

    </div>
</form>

<?php
if ($arr->getrequest('nmenu') == 'sill') {
    $controller->includer(true, true, './admin/template/calculatorsill.php', $controller, $x, $x2, $arr);
} elseif ($arr->getrequest('nmenu') == 'tide') {
    $controller->includer(true, true, './admin/template/calculatortide.php', $controller, $row, $x2, $arr);
} else {
    $controller->includer(true, true, './admin/template/calculatorwindow.php', $controller, [], $x2, $arr);
}


?>
<?php

$sill = $arr->getrequest('nmenu');
$id = $arr->getrequest('id');
$id2 = $arr->getrequest('id2');
$rez = $arr->getrequest('id3');
$id4 = $arr->getrequest('id4');
$activeSt = 'background-color: #cccccc;';
$st = 'background-color: #ffffff;';
?>

<table class="table text-center">
    <thead>
        <tr>
            <th scope="col">Ширина</th>
            <th scope="col">Белый</th>
            <th scope="col">Цветной</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($x as $key => $value) : ?>
            <tr>
                <th scope="row"><?php echo $value['size']; ?></th>
                <td style="<?php echo $controller->twocorrectthird($value['tide_id'] . '/' . $value['white'], $id . '/' . $id2, $activeSt, $st); ?>"><a href="/adminpanel/calculator/tide/<?php echo $value['tide_id'] . '/' . $value['white'] . '/white'; ?>"><?php echo $value['white']; ?></a></td>
                <td style="<?php echo $controller->twocorrectthird($value['tide_id'] . '/' . $value['color'], $id . '/' . $id2, $activeSt, $st); ?>"><a href="/adminpanel/calculator/tide/<?php echo $value['tide_id'] . '/' . $value['color'] . '/color'; ?>"><?php echo $value['color']; ?></a></td>

            </tr>

        <?php endforeach; ?>
    </tbody>
</table>
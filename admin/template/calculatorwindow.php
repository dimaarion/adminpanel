<?php
$profile = $arr->getrequest('nmenu');
$okno = $arr->getrequest('id');
$stvorka = $arr->getrequest('id2');
$rez = $arr->getrequest('id3');
$id = $arr->getrequest('id4');
$activeSt = 'background-color: #cccccc;';
$st = 'background-color: #ffffff;';
$num = 4;
if($okno == 'do' || $okno == 'to'){
    $num = 9;
}
?>

<table class="table">
    
    <thead>
        
        <tr class="text-center">
            <th scope="col">

                <?php echo $controller->calculator_profile($profile); ?>
            </th>
            <?php for ($i = 0; $i < 8; $i++) : ?>
                <th scope="col">1<?php echo $i; ?>00</th>
            <?php endfor; ?>
        </tr>
    </thead>
    <tbody>
        <?php
        for ($i = 5,$ins = $num, $a = -8, $b = -7, $c = -6, $d = -5, $e = -4, $g = -3, $j = -2, $l = -1; $i < 13; $i++) :
            $a = $a + 8;
            $b = $b + 8;
            $c = $c + 8;
            $d = $d + 8;
            $e = $e + 8;
            $g = $g + 8;
            $j = $j + 8;
            $l = $l + 8;
            $ins = $ins + 1;
        ?>
            <tr class="text-center">
                <th scope="row"><?php echo $ins; ?>00</th>
                <td style="<?php echo $controller->twocorrectthird($x2[$a]['id'], $id, $activeSt, $st); ?>"><a href="/adminpanel/calculator/<?php echo $profile . '/' . $okno . '/' . $stvorka . '/' . $x2[$a]['znacenie'] . '/' . $x2[$a]['id']; ?>"><?php echo $x2[$a]['znacenie']; ?></a></td>
                <td style="<?php echo $controller->twocorrectthird($x2[$b]['id'], $id, $activeSt, $st); ?>"><a href="/adminpanel/calculator/<?php echo $profile . '/' . $okno . '/' . $stvorka . '/' . $x2[$b]['znacenie'] . '/' . $x2[$b]['id']; ?>"><?php echo $x2[$b]['znacenie']; ?></a></td>
                <td style="<?php echo $controller->twocorrectthird($x2[$c]['id'], $id, $activeSt, $st); ?>"><a href="/adminpanel/calculator/<?php echo $profile . '/' . $okno . '/' . $stvorka . '/' . $x2[$c]['znacenie'] . '/' . $x2[$c]['id']; ?>"><?php echo $x2[$c]['znacenie']; ?></a></td>
                <td style="<?php echo $controller->twocorrectthird($x2[$d]['id'], $id, $activeSt, $st); ?>"><a href="/adminpanel/calculator/<?php echo $profile . '/' . $okno . '/' . $stvorka . '/' . $x2[$d]['znacenie'] . '/' . $x2[$d]['id']; ?>"><?php echo $x2[$d]['znacenie']; ?></a></td>
                <td style="<?php echo $controller->twocorrectthird($x2[$e]['id'], $id, $activeSt, $st); ?>"><a href="/adminpanel/calculator/<?php echo $profile . '/' . $okno . '/' . $stvorka . '/' . $x2[$e]['znacenie'] . '/' . $x2[$e]['id']; ?>"><?php echo $x2[$e]['znacenie']; ?></a></td>
                <td style="<?php echo $controller->twocorrectthird($x2[$g]['id'], $id, $activeSt, $st); ?>"><a href="/adminpanel/calculator/<?php echo $profile . '/' . $okno . '/' . $stvorka . '/' . $x2[$g]['znacenie'] . '/' . $x2[$g]['id']; ?>"><?php echo $x2[$g]['znacenie']; ?></a></td>
                <td style="<?php echo $controller->twocorrectthird($x2[$j]['id'], $id, $activeSt, $st); ?>"><a href="/adminpanel/calculator/<?php echo $profile . '/' . $okno . '/' . $stvorka . '/' . $x2[$j]['znacenie'] . '/' . $x2[$j]['id']; ?>"><?php echo $x2[$j]['znacenie']; ?></a></td>
                <td style="<?php echo $controller->twocorrectthird($x2[$l]['id'], $id, $activeSt, $st); ?>"><a href="/adminpanel/calculator/<?php echo $profile . '/' . $okno . '/' . $stvorka . '/' . $x2[$l]['znacenie'] . '/' . $x2[$l]['id']; ?>"><?php echo $x2[$l]['znacenie']; ?></a></td>
            <tr>

            <?php endfor; ?>




    </tbody>
</table>
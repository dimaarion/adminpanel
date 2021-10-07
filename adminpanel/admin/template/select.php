<?php
$id =  $_REQUEST['id2'];
?>
<label class="col-sm col-form-label " for = "position"><h5>Выбрать меню</h5></label>
<select name = "position" id = "position" class="form-select form-control" aria-label="Default select example">
  <?php

if($id == 0): ?>
  <option value = "0">Основное меню</option>
  <option value = "1">Верхнее меню</option>
  <option value = "2">Боковое меню</option>
  <?php elseif($id == 1): ?>
  <option value = "1">Верхнее меню</option>
  <option value = "0">Основное меню</option>
  <option value = "2">Боковое меню</option>
   <?php elseif($id == 2): ?>
  <option value = "2">Боковое меню</option>
  <option value = "0">Основное меню</option>
  <option value = "1">Верхнее меню</option>
  <?php else: ?>
 <option value = "0">Основное меню</option>
  <option value = "1">Верхнее меню</option>
  <option value = "2">Боковое меню</option>
  <?php
endif;
?>


</select>
<?php

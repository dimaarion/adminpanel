<?php 
 preg_match('/[a-z]+/',$_REQUEST['id2'], $lang );
 ;
  ?>
<label class="col-sm col-form-label " for = "lang"><h5>Язык</h5></label>
<select name = "lang" id = "lang" class="form-select form-control" aria-label="Default select example">
  <?php 
  if($lang[0]):
  if($lang[0] == "ru"): ?>
  <option value = "ru">Русский</option>
  <option value= "md">Молдавский</option>
  <?php else: ?>
  <option value= "md">Молдавский</option>
  <option value = "ru">Русский</option>
  <?php 
endif;
else: 
?>
<option value = "ru">Русский</option>
<option value= "md">Молдавский</option>
<?php endif; ?>
</select>
<?php

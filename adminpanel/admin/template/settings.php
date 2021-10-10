<?php 


$selecttel = new DSelect('tel');
$settings = new DSelect('settings');
$nameSite = $settings->queryRows(); 
$tel = $selecttel->queryRow('tel_id', 1); 
$controller->includer(true, true, './admin/template/headtitle.php', $controller, 'Настройки', '');
$label = ['Название сайта','Почта','Колличество страниц на странице'];
$names = ['nameSiteSave','nameMailSave','nameCountSave'];
?>

<form action = "/adminpanel/settings" method = "post"> 
 <div class = "text-right"> <button type="submit" name="telsavebutton" id="" value = "telsave" class="btn btn-primary text-right" btn-lg btn-block >Сохранить</button></div>
 <div class="form-group">
   <?php foreach ($nameSite as $key => $value): ?>
   <label for="nameSite"><?php echo $label[$key]; ?></label>
   <input type = "text" name = "<?php echo $names[$key]; ?>" value = "<?php echo $value['name_site']; ?>" class="form-control" id = "nameSite">
   <input type="text" value = "<?php echo ($key + 1); ?>" name = "<?php echo $names[$key].'id'; ?>" style = "display:none;">
   <?php endforeach; ?>
   <label for="telsave">Добавить номер телефона (номера записывать через запятую)</label>
   <textarea class="form-control" name="telsave" id="telsave" rows="3"><?php echo $tel['tel_content']?></textarea>
   <input type="text" value = "1" name = "tel_id" style = "display:none;">
  
 </div>
</form>
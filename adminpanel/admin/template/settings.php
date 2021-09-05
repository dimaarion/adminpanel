<?php 


$selecttel = new DSelect('tel');
$settings = new DSelect('settings');
$nameSite = $settings->queryRow('settings_id', 1); 
$tel = $selecttel->queryRow('tel_id', 1); 
$controller->includer(true, true, './admin/template/headtitle.php', $controller, 'Настройки', '');
?>

<form action = "/adminpanel/settings" method = "post"> 
 <div class = "text-right"> <button type="submit" name="telsavebutton" id="" value = "telsave" class="btn btn-primary text-right" btn-lg btn-block >Сохранить</button></div>
 <div class="form-group">
   <label for="nameSite">Название сайта</label>
   <input type = "text" name = "nameSiteSave" value = "<?php echo $nameSite['name_site']; ?>" class="form-control" id = "nameSite">
   <input type="text" value = "1" name = "settings_id" style = "display:none;">
   <label for="telsave">Добавить номер телефона (номера записывать через запятую)</label>
   <textarea class="form-control" name="telsave" id="telsave" rows="3"><?php echo $tel['tel_content']?></textarea>
   <input type="text" value = "1" name = "tel_id" style = "display:none;">
  
 </div>
</form>
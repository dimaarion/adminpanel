<?php 
$selecttel = new DSelect('tel');
$settings = new DSelect('settings');
$controller->nameSite = $settings->queryRow('settings_id', 1); 
$tel = $selecttel->queryRow('tel_id', 1); 
?>

<form action = "/adminpanel/settings" method = "post"> 
 <div class="form-group">
   <?php echo $controller->nameSite['name_site'];?>
   <label for="telsave">Добавить номер телефона (номера записывать через запятую)</label>
   <textarea class="form-control" name="telsave" id="telsave" rows="3"><?php echo $tel['tel_content']?></textarea>
   <input type="text" value = "1" name = "tel_id" style = "display:none;">
   <div class = "text-right"> <button type="submit" name="telsavebutton" id="" value = "telsave" class="btn btn-primary text-right" btn-lg btn-block >Сохранить</button></div>
 </div>
</form>
<div>
	<div class="row">
		<div class="col-1">
			<h2>Меню</h2>
		</div>
		<div class="col">
			<h5 class="pt-2 "><?php if($id == 'newmenu'){ echo ': создать новый пункт меню';} ?></h5>
		</div>
	</div>
	<form id = "menunain" >
		<?php
		include_once('./admin/template/mainpanel.php');
		if($id == 'newmenu'){
			include_once('./admin/template/newmenu.php');
		}
		?>
	</form>

</div>
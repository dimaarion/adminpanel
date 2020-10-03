<div>
	<div class="row">
		<div class="col-1">
			<h2>Меню</h2>
		</div>
		<div class="col">
			<h5 class="pt-2 ">
				<?php if ($id == 'newmenu') {
					echo ': создать новый пункт меню';
				} ?></h5>
		</div>
	</div>

	<?php
	if ($id !== 'newmenu') {
		include_once('./admin/template/mainpanel.php');
	}
	if ($id == 'newmenu') {
		include_once('./admin/template/newmenu.php');
	} else { ?>
		<form id="main_menu">
			<?php
			foreach ($new_menu as $key => $value) {
				$controller->inputsCheckbox(
					[
						'type' => 'checkbox',
						'value' => '0',
						'names' => '<a href = "/index.php?page=menu&nmenu=updatemenu&id='. $value['menu_id'].'">' .$value['names'].'</a>',
						'name' => 'parent_id',
						'inputclass' => 'col-1',
						'divclass' => 'main_menu_cl row'
					]
				);
				
			}

			?>
		</form>
	<?php } ?>
</div>
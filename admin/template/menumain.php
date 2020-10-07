<div>


	<?php
	
	if ($nmenu == 'newmenu') {
		//include_once('./admin/template/newmenu.php');
	} else if ($nmenu == 'updatemenu') {
		//include_once('./admin/template/menuupdate.php');
	} ?>
		<form id="main_menu" class="mt-4" action="/index.php" method="post">
			<div class="mt-4 row">
				<?php
				$controller->getLinck(
					[
						'savenames' => 'Добавить',
						'saveurls' => '/index.php?page=menu&nmenu=newmenu',
						'divclass' => 'col-2 p-0'

					]
				);
				$controller->inputs(
					[
						'type' => 'submit',
						'name' => 'new_menu_save',
						'value' => 'Удалить',
						'divclass' => 'col-2 p-0'

					]
				);

				?>
			</div>
			<?php
			array_map(function ($t) {
				$c = new Controller();
				$c->inputsCheckbox(
					[
						'type' => 'checkbox',
						'value' => $t['menu_id'],
						'names' => '<a href = "/index.php?page=menu&nmenu=updatemenu&id=' . $t['menu_id'] . '">' . $t['names'] . '</a>',
						'name' => 'delete_menu_id[]',
						'id' => 'delete_menu_id' . $t['menu_id'],
						'inputclass' => 'col-1',
						'divclass' => 'main_menu_cl row'
					]
				);
			}, $x);

			?>
		</form>
	<?php  ?>
</div>
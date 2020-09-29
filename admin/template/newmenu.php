<div class="row">
	<div class="col">
		<?php
		$controller->inputs(['type'=>'text', 'names'=>'Название', 'name'=>'menunames', 'value'=>'','divclass'=>'mt-5']);
		$controller->inputs(['type' => 'text', 'names' => 'Алиас', 'name' => 'menualias']);
		$controller->inputs(['type' => 'text', 'names' => 'Ключевые слова', 'name' => 'menukeywords']);
		$controller->inputs(['type' => 'text', 'names' => 'Краткое описание', 'name' => 'menudescription']);
		?>
	</div>
	<div class="col">
		<?php $controller->inputs(['type' => 'text', 'names' => 'Категории', 'name' => 'menunames', 'divclass' => 'mt-5 col-8']);  ?>
	</div>

</div>
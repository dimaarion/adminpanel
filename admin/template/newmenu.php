<?php
if (@$_REQUEST['new_menu_save']) {
	$new_menu_insert = new DInsert(
		'menu',
		[
			'rout',
			'alias',
			'title',
			'names',
			'keywords',
			'description',
			'parent_id'
		],
		[
			$sansize->getrequest('rout'),
			$sansize->getrequest('alias'),
			$sansize->getrequest('title'),
			$sansize->getrequest('names'),
			$sansize->getrequest('keywords'),
			$sansize->getrequest('description'),
			$sansize->getrequest('parent_id'),
		]
	);
}


?>
<form id="menunain" action="/index.php?page=menu&id=newmenu&nmenu=new" method="post">
	<?php
	$controller->saves(
		[
			'type' => 'submit',
			'name' => 'new_menu_save',
			'value' => 'Сохранить',
			'saveurls' => '/',
			'savenames' => 'Закрыть',
		]
	);;
	?>
	<div class="row">
		<div class="col">
			<?php
			$controller->inputs(
				[
					'type' => 'text',
					'names' => 'Название',
					'name' => 'names',
					'divclass' => 'mt-5'
				]
			);
			$controller->inputs(
				[
					'type' => 'text',
					'names' => 'Алиас',
					'name' => 'alias'
				]
			);
			$controller->inputs(
				[
					'type' => 'text',
					'names' => 'Заголовок страницы',
					'name' => 'title'
				]
			);
			$controller->inputs(
				[
					'type' => 'text',
					'names' => 'Ключевые слова',
					'name' => 'keywords'
				]
			);
			$controller->inputs(
				[
					'type' => 'text',
					'names' => 'Краткое описание',
					'name' => 'description'
				]
			);
			?>
		</div>
		<div class="col">
			<?php
			$controller->inputs(
				[
					'type' => 'text',
					'value' => 'Нет',
					'names' => 'Категории',
					'inputclass' => ' new_menu_category_parent_input',
					'name' => 'menucategory',
					'divclass' => 'mt-5 col-8 new_menu_category_input'
				]
			);
			$controller->inputs(
				[
					'type' => 'text',
					'value' => '0',
					'name' => 'parent_id',
					'inputclass' => 'col-2 new_menu_category_parent',
					'divclass' => 'new_menu_parent'
				]
			);
			?>
			<div class="col" id="new_menu_category">
				<div class="new_menu_category_no">Нет
					<div class="new_menu_category_linck">
						0
					</div>
				</div>

				<?php foreach ($new_menu as $key => $value) : ?>
					<div class="new_menu_category_no">
						<?php echo $value['names']; ?>
						<div class="new_menu_category_linck">
							<?php echo $value['menu_id']; ?>
						</div>
					</div>

				<?php endforeach; ?>
			</div>
		</div>

	</div>
</form>
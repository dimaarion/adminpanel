<div id = "images" class = "col text-center"></div>
<?php $controller->includer(true, true, './admin/template/headtitle.php', $controller, 'Файлы', ''); ?>
<form id = "filesForm" enctype="multipart/form-data" action="/adminpanel/files/load" method="post">
  <div class="row mt-3">
    <div class="col-3">
      <?php

      $controller->inputs(
        [
          'type' => 'submit',
          'name' => 'upload_files',
          'value' => 'Сохранить',

        ]
      );


      ?>

    </div>
    <div class="col">
      <div class="custom-file form-control">
        <input type="file" class="custom-file-input" name="files" id="customFileLangHTML">
        <label class="custom-file-label" for="customFileLangHTML" data-browse="Загрузить файл">Выбрать файл</label>
      </div>
    </div>
  </div>
  <div class="container row mt-3 images_block" >
    <?php $controller->inputs(
          [
            'type' => 'text',
            'name' => 'deleteFiles',
            'value' => '',
            'divclass' => 'col-2 ',
            'id'=>'deleteFiles',
            'divclass'=>'deleteFilesDiv'

          ]
        ); ?>
    <?php foreach ($x as $key => $value) : ?>
      <div class="col-3 images">
<div class="text-right  deleteF">

  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
    </svg>
</div>
        <div class="srcimg" title = "Копировать">/img/upload/<?php echo $value; ?></div>
        <img class="img-fluid" src="/img/upload/<?php echo $value; ?>" alt="">


      </div>
    <?php endforeach; ?>
  </div>

</form>
<form enctype="multipart/form-data" action="/index.php?page=files&nmenu=load" method="post">
  <div class="row mt-3">
    <div class="col-3">
      <?php $controller->inputs(
        [
          'type' => 'submit',
          'name' => 'upload_files',
          'value' => 'Сохранить',
          
        ]
      ); ?>

    </div>
    <div class="col">
      <div class="custom-file form-control">
        <input type="file" class="custom-file-input" name="files" id="customFileLangHTML">
        <label class="custom-file-label" for="customFileLangHTML" data-browse="Загрузить файл">Выбрать файл</label>
      </div>
    </div>
  </div>
<div class="container row mt-3">
  <?php foreach ($images as $key => $value):?>
  <div class="col-3">
    <img class="img-fluid" src="/img/upload/<?php echo $value; ?>" alt="">
  </div>
  <?php endforeach; ?>
</div>

</form>
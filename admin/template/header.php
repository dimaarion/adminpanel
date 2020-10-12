    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php foreach ($x as $key => $value) : ?>
        <link rel="stylesheet" href="/css/<?php echo $value; ?>" />
    <?php endforeach; ?>
    
    <script src="/jquery/jquery.js"></script>
    <script src="/ckeditor/ckeditor.js"></script>
    <?php foreach ($x2 as $key => $value) : ?>
        <script src="/js/<?php echo $value; ?>"></script>
    <?php endforeach; ?>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <title><?php echo $arr ?></title>
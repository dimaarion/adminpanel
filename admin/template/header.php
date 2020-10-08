    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="/jquery/jquery.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="/bs-custom-file-input/bs-custom-file-input.js"></script>
    <?php foreach ($x as $key => $value) : ?>
        <link rel="stylesheet" href="/css/<?php echo $value; ?>" />
    <?php endforeach; ?>
    <?php foreach ($x2 as $key => $value) : ?>
        <script src="/js/<?php echo $value; ?>"></script>
    <?php endforeach; ?>

    <script src="/ckeditor/ckeditor.js"></script>
    <title><?php echo $arr?></title>
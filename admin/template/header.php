
<?php
$links = $controller->dirExt('css');
$script = $controller->dirExt('js');
 ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="referrer" content="origin" />
    <?php foreach ($links as $key => $value): ?>
        <link rel="stylesheet" href="/css/<?php echo $value; ?>">
    <?php endforeach; ?>
    <?php foreach ($script as $key => $value): ?>
        <script src="/js/<?php echo $value; ?>"></script>
    <?php endforeach; ?>
    <link href="https://fonts.googleapis.com/css?family=Alice|Kurale|Oswald" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Админ панель</title>


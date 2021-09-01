<?php
$metrika = new Metrika();
$metrika->fUrl = './host/host.json';
print_r($metrika->viewCount());
foreach ($metrika->viewCount() as $key => $value):
    if($key == 'count'):
?>
<div>Просмотров: <?php echo $value; ?></div>
<?php
 endif;
 endforeach; 
?>
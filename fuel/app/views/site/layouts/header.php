<meta charset="utf-8">
<title><?php echo $title; ?></title>
<?php echo Asset::css('bootstrap.css'); ?>
<style>
    body { margin: 50px; }
</style>
<?php echo Asset::js(array(
    'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
    'bootstrap.js',
)); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
      <?php 
foreach($icons as $icon) {

 echo $icon."\n";
}
?>
    
  <?php 
foreach($head as $head1) {

 echo $head1."\n";
}
?>
 
<title><?php echo $title; ?></title>
<style>
    @font-face
{
font-family: Aller;
src: url('<?php echo $APP_URL_FOLDER; ?>images/fonts/aller.ttf') format('truetype');
      
}
    
</style>
</head>
<body>
    
 
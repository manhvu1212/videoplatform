<?php
require_once '../ThumbLib.inc.php';
$url=$_GET['url'];
$w=isset($_GET['w'])?$_GET['w']:0;
$h=isset($_GET['h'])?$_GET['h']:0;
$thumb = PhpThumbFactory::create($url);
$thumb->cropFromCenter($w, $h);
$thumb->show();
?>

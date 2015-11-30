<?php
require_once '../ThumbLib.inc.php';

$url=$_GET['url'];
$bien=getimagesize($url);

$wim=$bien[0];  //chieu rong thuc te
$him=$bien[1];// chieu cao thuc te
$pw=isset($_GET['w'])?$_GET['w']:0; // chieu rong bien
$ph=isset($_GET['h'])?$_GET['h']:0; // chieu cao bien

$x=$pw;
$y=$ph;

 if($pw<=$wim && $ph > $him)
    {
       $y=$him;
        $x=floor($y*$pw/$ph);

    }
else if($pw>$wim && $ph <= $him)
{
    $x=$wim;
    $y=floor($x*$ph/$pw);

}
else if($pw>$wim && $ph >=$him)
{
    if($pw/$ph < $wim/$him) {
        $y = $him;
        $x = floor($y * $pw / $ph);

    }else{
        $x = $wim;
        $y = floor($x * $ph / $pw);

    }
}
//echo $x.'-'.$y;exit;
$thumb = PhpThumbFactory::create($url);
$thumb->cropFromCenter($x, $y);
$thumb->show();

<?php
define('DOMAIN_BASE','http://'.$_SERVER["HTTP_HOST"].'/upload/');
define('SITE_DIR_BASE',$_SERVER["DOCUMENT_ROOT"].'/upload/');
define('IMAGES_DIR','http://'.$_SERVER["HTTP_HOST"].'/upload/thumbs');
include_once (SITE_DIR_BASE.'lib/phpthumb/ThumbLib.inc.php');
echo $_SERVER['REQUEST_URI'];
if(!file_exists($_SERVER["DOCUMENT_ROOT"].$_SERVER['REQUEST_URI'])){
	$arg = explode('/', $_SERVER['REQUEST_URI']);
    pr($arg); die;
	$partfull = 'files/'.$arg[5].'/'.$arg[6].'/'.$arg[7];
	$partrelative  = 'files/'.$arg[5].'/'.$arg[6].'/';
	thumb_image_scale($arg[2],$arg[3],$partrelative, $partfull);
}
 


//THUMB IMAGES DOAN NAM
//Creat FODEL
function makeDir( $path='' ){

    $folders = explode ( '/',  ( $path ) );

    $tmppath =  SITE_DIR_BASE.'thumbs/';
    $tmppath1 =  'thumbs/';

    if( !file_exists($tmppath) ) {
        mkdir($tmppath, 0777, true);
    };
    for( $i1 = 0; $i1 < count ( $folders ) - 1; $i1 ++) {
        if($folders[$i1]!='')
        {
            if (! file_exists ( $tmppath . $folders [$i1] )) {
                mkdir( $tmppath . $folders [$i1], 0777) ;
            }

            $tmppath = $tmppath . $folders [$i1] . '/';
            $tmppath1 =$tmppath1. $folders [$i1] . '/';
        }
    }

    return $tmppath1;
}



function thumb_image_scale($width=1,$height=1,$partrelative=null,$partfull='' ){
    $link2 = explode('/', $partfull);
    $name1 = $partrelative.'/'.$width.'/'.$height.'/'.$link2[count($link2)-1];
   
   $name1 = $width.'/'.$height.'/'.$partrelative.$link2[count($link2)-1];
   
    if (! file_exists(SITE_DIR_BASE.$partfull) || $partfull=='') {
        $name1 = SITE_DIR_BASE.'notfound.jpg';
    }
    $check1=explode('.',$partfull);

    if(!in_array($check1[count($check1)-1],array('jpg','png','jpeg','gif'))){
        $link1='';
    }
    else {

        $bien = getimagesize(DOMAIN_BASE . $partfull);
        $wimg = isset($bien[0])?$bien[0]:1;  //chieu rong thuc te
        $himg = isset($bien[1])?$bien[1]:1;// chieu cao thuc te
        $x = $wimg;
        $y = $himg;
        $h=floor($wimg * $height/$width);
        if($h<=$himg){
            $y =  $h;
        }
        else{
            $x=floor($y * $width/$height);

        }
        if($x<=$width) $tl=100;

        else $tl=100 - floor(($x-$width)*100/$x);

        $link2 = explode('/', $partfull);
  
        $link1 = makeDir($name1);
        $name = 'tmp_'.$width . "x" . $height . '_' . $link2[count($link2) - 1];

        $name1= $link1;
        $link1 = $link1.$name;	
        $name1 .= $link2[count($link2) - 1];

        if (! file_exists(SITE_DIR_BASE.$link1)){

            $thumb = PhpThumbFactory::create(DOMAIN_BASE . $partfull);
            $thumb->cropFromCenter($x, $y);
            //$thumb->resizePercent($tl);
            $thumb->save(SITE_DIR_BASE . $link1);

            $thumb = PhpThumbFactory::create(SITE_DIR_BASE. $link1);
            $thumb->resizePercent($tl);
            $thumb->save(SITE_DIR_BASE. $name1);
            @unlink(SITE_DIR_BASE . $link1);
            header('Content-Type: image/jpeg');
			readfile(SITE_DIR_BASE.$name1);
			exit;
        }
    }
    return $name1;

}

<?php
use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Illuminate\Support\Facades\View;
use App\Entities\Slideshow;
use App\Entities\Taxonomy;
use App\Entities\Taxonomyitem;
use Intervention\Image\Facades\Image;

/**
 * Created by PhpStorm.
 * User: mrhoang
 * Date: 07/08/2015
 * Time: 16:26
 */

class Utility {
    public static function getUser($id=0){
        if($id == 0){
            return Sentry::getUser();
        }else{
            return Sentry::findUserById($id);
        }
    }

    public static function thumb($url,$width, $height)
    {
        $paththumb = '/upload/thumbs/'.$width.'/'.$height.'/'.$url;
        if(file_exists(public_path().'/upload/'.$url) && !file_exists(public_path().$paththumb)){
            $bien = $width.'/'.$height.'/'.$url;
            $bien1 = explode('/',$bien);
            $url1=public_path().'/upload/thumbs';
            for($i=0;$i<count($bien1)-1;$i++){
                $url1 = $url1.'/'.$bien1[$i];
                if(!file_exists($url1)){
                    mkdir($url1);
                    chmod($url1, 0777);
                }
            }
            $image = Image::make(public_path().'/upload/'.$url)->resize($width, $height);
            $image->save(public_path().$paththumb);
            return $paththumb;
        }else{
            return $paththumb;
        }
    }

    public static function files(){
        return View::make('files::popup_files');
    }

    public static function jssor_slider(){
        $obj = new Slideshow();
        $slider = $obj->where('status','=',1)->get();
       return $slider;
    }

    public static function setting($type='site_settings')
    {
        return \App\Entities\Settings::where('type','=',$type)->first();
    }
    public static function get_taxonomyitem($id=null)
    {
        return \App\Entities\Taxonomyitem::where('id','=',$id)->first();
    }

}
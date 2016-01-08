<?php

namespace App\Http\Controllers;

use App\Entities\Posts;
use App\Entities\Taxonomy;
use App\Entities\Settings;
use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Illuminate\Support\Str;
use Pingpong\Modules\Routing\Controller;

class BaseController extends Controller
{
    public function slug($name, $table = '')
    {
        switch ($table) {

            case 'taxonomy':
                $slug = Str::slug($name);
                $obj = new Taxonomy();
                $i = 0;
                while (1) {
                    if ($i == 0) {
                        $check = $obj->where('alias', '=', $slug)->count();
                    } else {
                        $check = $obj->where('alias', '=', $slug . '-' . $i)->count();
                    }
                    if ($check == 0 && $i != 0) {
                        return $slug . '-' . $i;
                    } elseif ($check == 0 && $i == 0) {
                        return $slug;
                    }
                    $i++;
                }
                break;
            case 'post':
                $slug = Str::slug($name);
                $obj = new Posts();
                $i = 0;
                while (1) {
                    if ($i == 0) {
                        $check = $obj->where('alias', '=', $slug)->count();
                    } else {
                        $check = $obj->where('alias', '=', $slug . '-' . $i)->count();
                    }
                    if ($check == 0 && $i != 0) {
                        return $slug . '-' . $i;
                    } elseif ($check == 0 && $i == 0) {
                        return $slug;
                    }
                    $i++;
                }
                break;

            default:
                $slug = Str::slug($name);
                break;
        }
        return $slug;
    }

    public function getUser()
    {
        return Sentry::getUser();
    }


    public function getFileSetting()
    {
        $obj = new Settings();

        return $obj->where('type', '=', 'file_settings')->first();
    }

    function url_exist($url)
    {
        $h = get_headers($url);
        $status = array();
        preg_match('/HTTP\/.* ([0-9]+) .*/', $h[0], $status);
        return ($status[1] == 200);
    }

    function file_get_contents_curl($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

}

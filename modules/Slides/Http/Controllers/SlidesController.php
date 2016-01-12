<?php namespace Modules\Slides\Http\Controllers;

use App\Entities\Slides;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SlidesController extends BaseController
{

    public function index()
    {
        return view('slides::index');
    }

    public function add()
    {
        return view('slides::add');
    }

    public function save()
    {
        $input = Input::all();
        $rules = array(
            "image_video_id" => array('required'),
            "title" => array("required")
        );
        $validation = Validator::make($input, $rules);
        if (!$validation->fails()) {
            $objSlide = new Slides();

            if (isset($input['_id']) && $input['_id'] != '') {
                $objSlide = $objSlide->where('_id', $input['_id'])->first();
            } else {
                $objSlide->status = 1;
            }
            $objSlide->title = isset($input['title']) ? $input['title'] : '';
            $objSlide->description = isset($input['description']) ? $input['description'] : '';
            $objSlide->type = isset($input['options']) ? $input['options'] : '';
            $objSlide->url = isset($input['url']) ? $input['url'] : '';
            $objSlide->thumb = isset($input['thumb']) ? $input['thumb'] : '';
            $objSlide->save();
            Session::flash('message', 'Success');
            return Response::json(1);
        } else {
            Session::flash('message', 'Error');
            return Response::json(0);
        }
    }
}
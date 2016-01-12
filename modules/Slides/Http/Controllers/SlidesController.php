<?php namespace Modules\Slides\Http\Controllers;

use App\Entities\Slides;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use League\Flysystem\Exception;

class SlidesController extends BaseController
{

    public function index()
    {
        $user = $this->getUser();
        $request = Request::all();
        $objSlides = new Slides();
        $slides = $objSlides->get();

        if (isset($request['name'])) {
            $slides = $objSlides->where('title', 'like', '%' . $request['name'] . '%')->get();
        }

        return view('slides::index')->with('slides', $slides);
    }

    public function add()
    {
        return view('slides::add');
    }

    public function edit($slide_id)
    {
        $objSlides = new Slides();
        $slide = $objSlides->where('_id', $slide_id)->first();
        $slide = json_decode($slide);
        return view('slides::add')->with('slide', $slide);
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
            $objSlide->image_video_id = isset($input['image_video_id']) ? $input['image_video_id'] : '';
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

    public function change_status()
    {
        $input = Input::all();
        try {
            if (isset($input['id']) && $input['id'] != '') {
                $slide = Slides::where('_id', $input['id'])->first();
                $slide->status = (int)$input['activated'];
                $slide->save();
            }
            Response::json(1);
        } catch (Exception $e) {
            Response::json(0);
        }
    }

    public function destroy()
    {
        try {
            $input = Input::all();
            foreach ($input['aids'] as $l) {
                $objSlide = new Slides();
                $slide = $objSlide->where('_id', $l)->first();
                $slide->delete();
            }
            Session::flash('message', trans('Deleted'));
            return Response::json(1);
        } catch (Exception $e) {
            Session::flash('message', trans('Delete Error'));
            Response::json(0);
        }
    }
}
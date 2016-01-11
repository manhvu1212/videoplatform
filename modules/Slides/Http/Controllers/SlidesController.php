<?php namespace Modules\Slides\Http\Controllers;

use App\Http\Controllers\BaseController;

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
}
<?php namespace Modules\Slides\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class SlidesController extends Controller {
	
	public function index()
	{
		return view('slides::index');
	}
	
}
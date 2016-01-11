<?php namespace Modules\Slide\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class SlideController extends Controller {
	
	public function index()
	{
		return view('slide::index');
	}
	
}
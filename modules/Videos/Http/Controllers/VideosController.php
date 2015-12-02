<?php namespace Modules\Videos\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class VideosController extends Controller {
	
	public function index()
	{
		return view('videos::index');
	}
	public function add(){
		return view('videos::add');
	}
	
}
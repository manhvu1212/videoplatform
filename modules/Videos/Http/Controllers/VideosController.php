<?php 
namespace Modules\Videos\Http\Controllers;

use App\Entities\Videos;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class VideosController extends BaseController {
	
	public function index()
	{
		$user = $this->getUser();
		$objVideos = new Videos();
		$videos = json_decode($objVideos->get());
		//print_r($videos);die;
		return view('videos::index')->with('videos',$videos);
	}
	public function add(){
		return view('videos::add');
	}

	public function edit($video_id){
		$objVideos = new Videos();
		$video = $objVideos->where('_id',$video_id)->first();
		$video = json_decode($video);		
		return view('videos::add')->with('video',$video);
	}

	public function save(){
		$input = Input::all();		
		$rules=array(
			"title_video" => array('required'),
			"url_video"	=> array("required")
			);

		$validation = Validator::make(Input::all(), $rules);
		if(!$validation->fails()){
			$objVideos = new Videos();

			if(isset($input['_id'])&&$input['_id']!=''){
				$objVideos = $objVideos->where('_id',$input['_id'])->first();
			}			

			$objVideos->title 		= $input['title_video'];
			$objVideos->idVideo 	= $input['url_video'];
			$objVideos->description = $input['content'];
			$objVideos->images 		= $input['image'];

			$objVideos->save();		
		}
		
		return response()->json("ypn response");
	}	
}
<?php 
namespace Modules\Videos\Http\Controllers;

use App\Entities\Files;
use App\Entities\Videos;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Youtube;

class VideosController extends BaseController {
	
	public function index()
	{
		$user = $this->getUser();
		$request=Request::all();
		$objVideos = new Videos();
		$videos = $objVideos->get();
		
		if(isset($request['name'])){				
			$videos = $objVideos->where('title','like', '%'.$request['name'].'%')->get();
		}

		return view('videos::index')->with('videos',$videos);
	}
	public function add(){
		return view('videos::add');
	}

	public function edit($video_id){
		$objVideos = new Videos();
		$objFile = new Files();
		$video = $objVideos->where('_id',$video_id)->first();		
		$video = json_decode($video);	
		if(isset($video->images)&&$video->images!=''){	
			foreach ($video->images as $img) {
				$file = $objFile->where('_id',$img->id)->first();
				$img->title 	=	$file->title;
				$img->url 		=	$file->url;
				$img->name 		=	$file->name;
				$img->folder_id	=	$file->folder_id;
				$img->mime 		=	$file->mime;								
			}
		}
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
			else{
				$objVideos->status=1;
			}

			$idVideo = isset($input['url_video'])?$input['url_video']:'';

			$video_info = Youtube::getVideoInfo($idVideo);			
			$objVideos->title 		= 	isset($input['title_video'])?$input['title_video']:'';
			$objVideos->idVideo 	=	 $idVideo;
			$objVideos->description = 	isset($input['content'])?$input['content']:'';
			$objVideos->images 		= 	isset($input['image'])?$input['image']:'';	
			$objVideos->viewCount = (int)$video_info->statistics->viewCount;
			$objVideos->likeCount = (int)$video_info->statistics->likeCount;
			$objVideos->commentCount = (int)$video_info->statistics->commentCount;	
			$objVideos->dislikeCount= (int)$video_info->statistics->dislikeCount;
			

			$objVideos->save();		
		}
		
		return response()->json("ypn response");
	}	

	public function change_status(){
		$input= Input::all();		
		if(isset($input['id'])&&$input['id']!=''){		
			$video = Videos::where('_id',$input['id'])->first();
			$video->status=(int)$input['activated'];
			$video->save();
		}
		Response::json('1');
	}

	public function destroy(){
		$input= Input::all();	
		foreach ($input['aids'] as $l) {
			$objVideo = new Videos();
			$video = $objVideo->where('_id',$l)->first();
			$video->delete();
		}

		Session::flash('message',trans('Delete'));
		return Response::json('1');
	}
}
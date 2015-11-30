<?php namespace Modules\Posts\Http\Controllers;

use App\Entities\Files;
use App\Entities\Posts;
use App\Entities\Taxonomyitem;
use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FormsController extends BaseController {

	public function form()
	{
		$user = $this->getUser();
		$objPost = new Posts();
		$objPost = $objPost->where('type','=','form');
		$limit = 50;
		$request = Request::all();
		$page = isset($request['page'])?$request['page']:1;
		$order = isset($request['order'])?$request['order']:'asc';
		$sort = isset($request['sort'])?$request['sort']:'';
		$start = $page*$limit - $limit;
		if(isset($request['name'])){
			$objPost = $objPost->where('title','like','%'.$request['name'].'%');
		}
		$paging = $objPost->paginate($limit);
		switch($sort){
			case 'name':
				$objPost = $objPost->orderBy('name',$order);
				break;
			case 'status':
				$objPost = $objPost->orderBy('status',$order);
				break;
			default:
				$objPost = $objPost->orderBy('id','DESC');
				break;
		}
		$list = $objPost->skip($start)->take($limit)->get();
		$title='Docusign Form';
		return view('posts::index_form',array('paging' => $paging, 'listdata' => $list,'start' => $start,'request' => $request,'title'=>$title,'type'=>'form'));
	}
	public function add($id=null){
		$list = Taxonomyitem::where('vid','=','5')->get();

		$objPost = new Posts();
		$objPost = $objPost->where('id','=',$id)->first();

		$listdatas = array();
		foreach($list as $k => $v){
			$tmp['id'] = $v['id'];
			$tmp['name'] = $v['name'];
			$tmp['parent'] = $v['parent'];
			$listdatas[$k] = $tmp;
		}
		$tree =array();
		$listdatas1  = $listdatas;
		$listree = $this->listtree($listdatas1,0,$tree);

		return view('posts::add_form', array('list'=>$listree,'type'=>'form','data'=>$objPost));
	}


	public function getUser(){
		return Sentry::getUser();
	}

	public function save(){
		$input = Input::all();
		$rules = array(
			'title' => array('required'),
		);
		$validation = Validator::make(Input::all(), $rules);
		if (!$validation->fails()){
			$objPost = new Posts();
			$user = $this->getUser();
			$alias = $this->slug(strip_tags($input['title']),'post');
			if(isset($input['_id']) && $input['_id'] !='')
			{
				$objPost = $objPost->where('id','=',$input['_id'])->first();
			}

			else {
				$objPost->status = 1;
				$objPost->alias = $alias;
			}
			$objPost->title = strip_tags((isset($input['title']))?$input['title']:'');
			$objPost->summary = isset($input['summary'])?$input['summary']:'';
			$objPost->cat_id = isset($input['cat_id'])?$input['cat_id']:'';
			$objPost->type = isset($input['type'])?$input['type']:'';
			$objPost->frame = isset($input['frame'])?$input['frame']:'';
			$objPost->checkid = isset($input['checkid'])?$input['checkid']:'';
			$objPost->uid = $user['id'];
			$img=array();
			$img['id']= isset($input['imageid'])?$input['imageid']:'';
			$img['url']= isset($input['imageurl'])?$input['imageurl']:'';
			$objPost->image = json_encode($img);
			$objPost->save();
			return Response::json('1');
		}
		return Response::json('0');
	}

	public function listtree($listdata,$parent = 0,&$tree,$sp=''){
		if($parent == 0){
			$sp = '';
		}else{
			$sp =$sp.' - ';
		}
		foreach($listdata as $k => $v){
			if($v['parent'] == $parent){
				$v['nameold'] = $v['name'];
				$v['name'] = $sp.$v['name'];
				$tree[] =$v;
				unset($listdata[$k]);
				$this->listtree($listdata,$v['id'],$tree,$sp);
			}
		}
		return $tree;
	}

	public function change_status(){
		$input = Input::all();
		if(isset($input['id']) && $input['id']!=''){
			$Posts = Posts::where('id','=',$input['id'])->first();
			$Posts->status = $input['activated'];
			$Posts->save();
		}
		Response::json('1');
	}
	public function change_frame(){
		$input = Input::all();
		if(isset($input['id']) && $input['id']!=''){
			$Posts = Posts::where('id','=',$input['id'])->first();
			$Posts->frame = $input['activated'];
			$Posts->save();
		}
		Response::json('1');
	}
	public function change_check_id(){
		$input = Input::all();
		if(isset($input['id']) && $input['id']!=''){
			$Posts = Posts::where('id','=',$input['id'])->first();
			$Posts->checkid = $input['activated'];
			$Posts->save();
		}
		Response::json('1');
	}

	public function destroy(){
		$input = Input::all();
		foreach ($input['aids'] as $l) {
			$objPosts = new Posts();
			$Posts = $objPosts->where('id', '=', $l)->first();
			if (isset($Posts['id'])) {
				$objFile = new Files();
				$v = json_decode($Posts['image']);
				 if($v->id!='' && $v->url!='') {
					$file = $objFile->where('_id','=',$v->id)->first();
					if(isset($file['id'])){
						@unlink(PATH_IMG_DOMAIN.$v->url);
						$file->delete();
					}
				}
				$Posts->delete();
			}
		}
		Session::flash('message', trans('Deleted'));
		return Response::json('1');
	}

}
<?php namespace Modules\Files\Http\Controllers;

use App\Entities\Files;
use App\Entities\Folder;
use App\Entities\Settings;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class FilesController extends BaseController {

	public function index()
	{
		return view('files::index');
	}


	public  function files($id=null)
	{


		$limit = 25;
		$request = Request::all();
        $user = $this->getUser();
		$page = isset($request['page'])?$request['page']:1;
		$order = isset($request['order'])?$request['order']:'asc';
		$sort = isset($request['sort'])?$request['sort']:'';
		$start = $page*$limit - $limit;
		$objFile = new Files();
        //$objFile = $objFile->where('uid','=',$user['id']);
		if(isset($request['keyword'])){
            $objFile = $objFile->where('name','like','%'.$request['keyword'].'%');
		}
		if($id!=null){
            $objFile = $objFile->where('folder_id','like','%'.$id.'%');
		}

		$paging = $objFile->paginate($limit);


        $objFile = $objFile->skip($start)->take($limit);
		switch($sort){
			case 'name':
                $objFile = $objFile->orderBy('name',$order);
				break;
		}
        $objFile = $objFile->orderBy('id','DESC');
		$list = $objFile->skip($start)->take($limit)->get();
		$objFolder = new Folder();
		$listdata = $objFolder->get();
		return view('files::files', array('paging' => $paging, 'listdata' => $list,'start' => $start,'request' => $request,'id'=>$id,'folders'=>$listdata));


	}



	public function savefolder(){

		$data= Input::all();
		$objFolder = new Folder();
        $user = $this->getUser();
		if($data['name']=='') {
			return Response::json('0');
		}

		if(isset($data['id']) && $data['id']!=''){
            $objFolder = $objFolder->where('_id','=',new \MongoId($data['id']))->first();
            $objFolder->name = $data['name'];
            $objFolder->uid = intval($user['id']);
            $objFolder->save();
		}else{
			$objFolder->name = $data['name'];
            $objFolder->uid = intval($user['id']);
			$objFolder->save();
		}
        return Response::json('1');
	}

	public function deletefolder(){
		$data= Input::all();
		if($data['id']=='') {
            return Response::json('0');
		}
		else{
			$objFolder = new Folder();
			$objFolder->where('_id','=',new \MongoId($data['id']))->delete();
			$objFiles = new Files();
			$listdata = $objFiles->where('folder_id','=',$data['id'])->get();

			foreach ($listdata as $v) {
				@unlink(PATH_IMG.$v['url']);
				$objFiles = new Files();
				$objFiles->where('_id','=',$v['id'])->delete();
			}
            return Response::json('1');
		}
	}


	public function destroyfile()
	{
		$data= Input::all();
		$objFiles = new Files();
		$file = $objFiles->where('_id','=',new \MongoId($data['id']))->first();

		if(is_file(PATH_IMG.'/'.$file['url']))
			@unlink(PATH_IMG.'/'.$file['url']);
        $file->delete();
        return Response::json('1');
	}

	public function uploadimage() {
        // getting all of the post data

        $file = Input::file();
        $input = Input::all();
        // setting up rules

        $setting = $this->getFileSetting();
        $setting=json_decode($setting->content);
        $maximum_size =  $setting->maximum_size*1024*1024;
        $rules = array('image' => 'required|max:'.$maximum_size);
        $validator = Validator::make($file, $rules);
        $extension = strtolower(Input::file('image')->getClientOriginalExtension());
        $extensions = explode('|',$setting->extension);
        $checkmimes = 0;
        if(in_array($extension,$extensions)){
            $checkmimes = 1;
        }
        if ($validator->fails() || $checkmimes == 0) {
            return Response::json(array('status' => 0,'url' => '', 'message' => trans('system.upload_fail')));
        }
        else {
            if (Input::file('image')->isValid()) {
                $time = time();
                $fileName = date('Y') . '/' . date('m') . '/';
                if(!file_exists(PATH_IMG.date('Y') )){
                    mkdir(PATH_IMG.date('Y'));
                    chmod(PATH_IMG.date('Y'), 0777);
                }
                if(!file_exists(PATH_IMG.date('Y').'/'.date('m'))){
                    mkdir(PATH_IMG.date('Y').'/'.date('m'));
                    chmod(PATH_IMG.date('Y').'/'.date('m'), 0777);
                }
                $destinationPath = PATH_IMG.'/' . $fileName; // upload path
                $extension = strtolower(Input::file('image')->getClientOriginalExtension());
                $name = Str::slug(Input::file('image')->getClientOriginalName()).$time . '.' . $extension;
                $fileName .= $name;
                $size = Input::file('image')->getSize();
                $mime = Input::file('image')->getMimeType();
                Input::file('image')->move($destinationPath, $name);

                $user = $this->getUser();
                $objFile = new Files();
                $objFile->name = Input::file('image')->getClientOriginalName();
                $objFile->size = $size;
                $objFile->mime = $mime;
                $objFile->url = 'files/'.$fileName;
                $objFile->folder_id = isset($input['folder_id']) ? $input['folder_id'] : 0;
                $objFile->uid = intval($user['id']);
                $objFile->extension = $extension;
                $objFile->save();

                return Response::json(array('status' => 1, 'url' => $fileName, 'message' => trans('system.upload_success'), 'id' => (string)$objFile->id));
            } else {
                return Response::json(array('status' => 0, 'url' => '', 'message' => trans('system.upload_not_valid')));

            }
        }
	}

	public function getdetail() {
        $user = $this->getUser();
        $request = Request::all();
        $objPhotos = new Files();
        //$photo = $objPhotos->where('_id','=',$request['id'])->where('uid','=',$user['id'])->first();
        $photo = $objPhotos->where('_id','=',new \MongoId($request['id']))->first();
        return Response::json($photo);
	}

	public  function  update(){

        $user = $this->getUser();
        $request = Request::all();
        $objPhotos = new Files();
        $photo = $objPhotos->where('_id','=',new \MongoId($request['id']))->where('uid','=',$user['id'])->first();
        $photo->name = $request['name'];
        $photo->title = $request['title'];
        $photo->save();
        return Response::json($photo);
	}



}
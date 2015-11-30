<?php namespace Modules\Registers\Http\Controllers;

use App\Entities\Registers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class RegistersController extends BaseController {
	
	public function index()
	{
		$objRegisters = new Registers();

		$limit = 50;
		$request = Request::all();
		$page = isset($request['page'])?$request['page']:1;
		$order = isset($request['order'])?$request['order']:'asc';
		$sort = isset($request['sort'])?$request['sort']:'';
		$start = $page*$limit - $limit;
		if(isset($request['name'])){
			$objRegisters = $objRegisters->where('name','like','%'.$request['name'].'%');
		}
		$paging = $objRegisters->paginate($limit);
		switch($sort){
			case 'name':
				$objRegisters = $objRegisters->orderBy('name',$order);
				break;
			case 'status':
				$objRegisters = $objRegisters->orderBy('status',$order);
				break;
			default:
				$objRegisters = $objRegisters->orderBy('id','DESC');
				break;
		}
		$list = $objRegisters->skip($start)->take($limit)->get();
		$title='List Registers';
		return view('registers::index',array('paging' => $paging, 'listdata' => $list,'start' => $start,'request' => $request,'title'=>$title));
	}

	public function destroy(){
		$input = Input::all();
		$objRegisters = new Registers();
		$Registers = $objRegisters->where('id','=',$input['_id'])->first();
		if(isset($Registers['id'])){
			$Registers->delete();
		}
		Session::flash('message', trans('Deleted'));
		return Response::json('1');
	}

	public function deletemulti(){
		$input = Input::all();
		foreach ($input['aids'] as $l) {
			$objRegisters = new Registers();
			$Registers = $objRegisters->where('id', '=', $l)->first();
			if (isset($Registers['id'])) {

				$Registers->delete();
			}
		}
		Session::flash('message', trans('Deleted'));
		return Response::json('1');
	}
	
}
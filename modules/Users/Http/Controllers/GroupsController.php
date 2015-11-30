<?php namespace Modules\Users\Http\Controllers;

use App\Entities\Groups;
use App\Entities\Permission;
use App\Http\Controllers\BaseController;
use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Cartalyst\Sentry\Groups\GroupExistsException;
use Cartalyst\Sentry\Groups\GroupNotFoundException;
use Cartalyst\Sentry\Groups\NameRequiredException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class GroupsController extends BaseController {
	
	public function groups()
	{
        $request = Request::all();
        $limit = 50;
        $page = isset($request['page'])?$request['page']:1;
        $order = isset($request['order'])?$request['order']:'asc';
        $sort = isset($request['sort'])?$request['sort']:'';
        $start = $page*$limit - $limit;
        $obGroup = new Groups();
        if(isset($request['name'])){
            $obGroup = $obGroup->where('name','like','%'.$request['name'].'%');
        }
        $paging = $obGroup->paginate($limit);

        $obGroup = new Groups();
        if(isset($request['name'])){
            $obGroup = $obGroup->where('name','like','%'.$request['name'].'%');
        }
        $obGroup = $obGroup->skip($start)->take($limit);
        switch($sort){
            case 'name':
                $obGroup = $obGroup->orderBy('name',$order);
                break;
        }
        $list = $obGroup->skip($start)->take($limit)->get();
        return view('users::groups',array('paging' => $paging, 'listdata' => $list,'start' => $start,'request' => $request));
	}

    public function  savegroups(){

        $input = Input::all();
        if(isset($input['_id']) && $input['_id'] ==''){
            try
            {

                Sentry::createGroup(array(
                    'name'        => $input['name'],
                    'permissions' => array(),
                ));
                Session::flash('message', 'Save success');
            }
            catch (NameRequiredException $e)
            {
                Session::flash('message', 'Name field is required');
            }
            catch (GroupExistsException $e)
            {
                Session::flash('message', 'Group already exists');
            }
        }else if($input['_id']!=''){
            try
            {
                $group = Sentry::findGroupById($input['_id']);
                $group->name = $input['name'];
                if ($group->save())
                {
                    Session::flash('message', 'Group was updated');
                }
                else
                {
                    Session::flash('message', 'Group was not updated');
                }
            }
            catch (NameRequiredException $e)
            {
                Session::flash('message', 'Name field is required');
            }
            catch (GroupExistsException $e)
            {
                Session::flash('message', 'Group already exists');
            }
            catch (GroupNotFoundException $e)
            {
                Session::flash('message', 'Group was not found.');
            }
        }
        return Response::json('1');
    }

    public function deletegroups(){
        $input = Input::all();
        foreach($input['aids'] as $v) {
            try {
                $group = Sentry::findGroupById($v);
                $group->delete();
                Session::flash('message', 'Group ' . $v . ' deleted.');
            } catch (GroupNotFoundException $e) {
                Session::flash('message', 'Group ' . $v . '  was not found.');
            }
        }
        return Response::json('1');
    }

    public function permission(){

        $groups = Groups::get();
        $limit = 200;
        $request = Request::all();
        $page = isset($request['page'])?$request['page']:1;
        $order = isset($request['order'])?$request['order']:'asc';
        $sort = isset($request['sort'])?$request['sort']:'';
        $start = $page*$limit - $limit;
        $objPermission = new Permission();
        if(isset($request['name'])){
            $objPermission = $objPermission->where('name','like','%'.$request['name'].'%');
        }
        $paging = $objPermission->paginate($limit);


        $objPermission = new Permission();
        if(isset($request['name'])){
            $objPermission = $objPermission->where('name','like','%'.$request['name'].'%');
        }
        $objPermission = $objPermission->skip($start)->take($limit);
        switch($sort){
            case 'name':
                $objPermission = $objPermission->orderBy('name',$order);
                break;
            case 'res':
                $objPermission = $objPermission->orderBy('count_restaurant',$order);
                break;
        }
        $list = $objPermission->skip($start)->take($limit)->get();
        return view('users::permission', array('paging' => $paging, 'listdata' => $list ,'groups' => $groups,'start' => $start,'request' => $request));
    }

    public function storepermission()
    {
        $input = Input::all();
        $rules = array(
            'name' => array('required', 'min:5')
        );
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails())
        {
            Session::flash('message', trans('system.save_fail'));
        }
        $objPermisstion = new Permission();
        $objPermisstion->name = $input['name'];
        $objPermisstion->key = Str::slug($input['name']);
        $objPermisstion->description = $input['description'];
        $objPermisstion->save();
        Session::flash('message', trans('system.save_success'));
        return Response::json('1');

    }

    public function  savegroupspermission(){
        $input = Input::all();
        $rules = array(
            'key' => array('required')
        );
        $validation = Validator::make(Input::all(), $rules);
        if (!$validation->fails())
        {
            foreach($input['data'] as $k => $v){



                try
                {
                    $group = Sentry::findGroupById($k);
                    $permission = $group->permissions;
                    $permission = array_merge($permission,array($input['key'] => $v));
                    $group->permissions = $permission;
                    if ($group->save())
                    {
                        Session::flash('message', 'Group information was updated');

                    }
                    else
                    {
                        Session::flash('message', 'Group information was not updated');
                    }
                }
                catch (NameRequiredException $e)
                {
                    Session::flash('message', 'Name field is required');
                }
                catch (GroupExistsException $e)
                {
                    Session::flash('message', 'Group already exists.');
                }
                catch (GroupNotFoundException $e)
                {
                    Session::flash('message', 'Group was not found.');
                }
            }
        }
        return Response::json('1');
    }

    public function destroypermisstion()
    {
        try
        {
            $input = Input::all();
            $rules = array(
                'id' => array('required'),
            );
            $validation = Validator::make(Input::all(), $rules);
            if (!$validation->fails())
            {
                $group = Sentry::findGroupById($input['id']);
                $group->delete();
            }
            Session::flash('message', 'Deleted');
        }
        catch (GroupNotFoundException $e)
        {
            Session::flash('message', 'Group was not found.');
        }
        return Response::json('1');
    }


    public function deletepermission(){


        $input = Input::all();
        $objPermission = new Permission();
        foreach($input['aids'] as $v){
            $objPermission->destroy($v);
        }
        $permissions = $objPermission->get();
        $listkey = array();
        foreach ($permissions as $v) {
            $listkey[] = $v['key'];
        }
        $objGroup = new Groups();
        $groups = $objGroup->get();
        foreach ($groups as $v) {
            $group = Sentry::findGroupById($v['id']);
            $groupPermissions = $group->getPermissions();
            foreach($groupPermissions as $k => $vl){
                if(!in_array($k,$listkey)){
                    $groupPermissions[$k] = 0;
                }
            }
            $group->permissions = $groupPermissions;
            $group->save();
        }

        return Response::json('1');

    }




}
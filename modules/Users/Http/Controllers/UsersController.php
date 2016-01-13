<?php namespace Modules\Users\Http\Controllers;

use App\Entities\Groups;
use App\Entities\Profiles;
use App\Entities\Users;
use App\Http\Controllers\BaseController;
use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Cartalyst\Sentry\Groups\GroupNotFoundException;
use Cartalyst\Sentry\Users\LoginRequiredException;
use Cartalyst\Sentry\Users\PasswordRequiredException;
use Cartalyst\Sentry\Users\UserExistsException;
use Cartalyst\Sentry\Users\UserNotFoundException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UsersController extends BaseController
{

    public function index()
    {
        $limit = 50;
        $request = Request::all();
        $page = isset($request['page']) ? $request['page'] : 1;
        $order = isset($request['order']) ? $request['order'] : 'asc';
        $sort = isset($request['sort']) ? $request['sort'] : '';
        $start = $page * $limit - $limit;
        $objUsers = new Users();

        if (isset($request['name'])) {
            $objUsers = $objUsers->where('first_name', 'like', '%' . $request['name'] . '%');
        }
        $paging = $objUsers->paginate($limit);


        $objUsers = new Users();

        if (isset($request['name'])) {
            $objUsers = $objUsers->where('first_name', 'like', '%' . $request['name'] . '%');
        }
        $objUsers = $objUsers->skip($start)->take($limit);
        switch ($sort) {
            case 'first_name':
                $objUsers = $objUsers->orderBy('first_name', $order);
                break;
            case 'last_name':
                $objUsers = $objUsers->orderBy('last_name', $order);
                break;
            case 'email':
                $objUsers = $objUsers->orderBy('email', $order);
                break;
            case 'status':
                $objUsers = $objUsers->orderBy('activated', $order);
                break;
        }
        $list = $objUsers->skip($start)->take($limit)->get();
        $data = array();
        foreach ($list as $v) {
            $data[] = $v;
        }
        return view('users::users', array('paging' => $paging, 'listdata' => $data, 'start' => $start, 'request' => $request));
    }

    public function edit($id = 0)
    {
        if ($id == 0) {
            $old = Input::old();
            $data = array();
            if (!empty($old)) {
                $data = $old;
            }
            $data['groups'] = array();
        } else {
            $data = Sentry::findUserById($id);
            $groupscursor = $data->getGroups();
            $groups = array();
            foreach ($groupscursor as $v) {
                $groups[] = $v['id'];
            }
            $data['groups'] = $groups;
        }
        $groups = Groups::get();
        return view('users::edit', array('data' => $data, 'groups' => $groups));
    }

    public function store()
    {
        $input = Input::all();
        Input::flash();
        if (isset($input['id']) && $input['id'] != '') {
            $input = Input::all();
            $rules = array(
                'id' => array('required'),
                'email' => 'required|email',
            );
            $useredit = Sentry::findUserById($input['id']);
            if ($input['password'] != '') {
                $rules['password'] = array('required', 'min:6');
                $rules['retype_password'] = array('required', 'min:6');
            }
            $validation = Validator::make(Input::all(), $rules);
            //check email
            if ($validation->fails()) {
                $message = '';
                $mess = $validation->errors()->getMessages();
                foreach ($mess as $v) {
                    $message .= $v[0] . ' ';
                }
                if ($message != '') {
                    Session::flash('message', $message);
                }
                if (!isset($input['id'])) {
                    return Redirect::to('manager/users');
                }
                return Redirect::to('manager/users/edit/' . $input['id']);
            } else {
                try {

                    $useredit->email = $input['email'];
                    $useredit->first_name = isset($input['first_name']) ? $input['first_name'] : '';
                    $useredit->last_name = isset($input['last_name']) ? $input['last_name'] : '';
                    if ($input['password'] != '') {
                        $useredit->password = $input['password'];
                    }
                    if ($useredit->save()) {
                        $groupscursor = $useredit->getGroups();
                        $groups = array();
                        $inputgroups = isset($input['groups']) ? $input['groups'] : array();
                        foreach ($groupscursor as $v) {
                            if (!in_array($v['id'], $inputgroups)) {
                                $g = Sentry::findGroupById($v['id']);
                                $useredit->removeGroup($g);
                            }
                            $groups[] = $v['id'];
                        }

                        if (isset($input['groups'])) {
                            foreach ($input['groups'] as $v) {
                                if (!in_array($v, $groups)) {
                                    $Group = Sentry::findGroupById($v);
                                    $useredit->addGroup($Group);
                                }
                            }
                        }
                    }
                    Session::flash('message', trans('saved'));
                    return Redirect::to('manager/users');
                } catch (LoginRequiredException $e) {
                    Session::flash('message', 'Login field is required.');
                    return Redirect::to('manager/users/edit/' . $input['id']);


                } catch (PasswordRequiredException $e) {
                    Session::flash('message', 'Password field is required.');
                    return Redirect::to('manager/users/edit/' . $input['id']);

                } catch (UserExistsException $e) {
                    Session::flash('message', 'User with this login already exists.');
                    return Redirect::to('manager/users/edit/' . $input['id']);

                } catch (GroupNotFoundException $e) {
                    Session::flash('message', 'Group was not found.');
                    return Redirect::to('manager/users/edit/' . $input['id']);

                }

            }
        } else {
            $rules = array(
                'password' => array('required', 'min:6'),
                'retype_password' => array('required', 'min:6'),
                'email' => 'required|email',
            );
            $validation = Validator::make(Input::all(), $rules);
            //check
            $objUsers = new Users();
            $check = $objUsers->where('email', '=', trim(strtolower($input['email'])))->count();
            if ($validation->fails() || $check > 0) {
                $messages = '';
                if ($check > 0) {
                    $messages .= 'User with this email already exists. ';
                }
                $mess = $validation->errors()->getMessages();
                foreach ($mess as $v) {
                    $messages .= $v[0] . ' ';
                }
                if ($messages != '') {
                    Session::flash('message', $messages);
                }
                return Redirect::to('manager/users/edit');
            } else {
                try {
                    $datacreateUser = array(
                        'email' => trim(strtolower($input['email'])),
                        'password' => isset($input['password']) ? $input['password'] : '',
                        'activated' => true,
                        'first_name' => isset($input['first_name']) ? $input['first_name'] : '',
                        'last_name' => isset($input['last_name']) ? $input['last_name'] : '',
                    );

                    $user = Sentry::createUser($datacreateUser);
                    /*$email = trim(strtolower($input['email']));
                    $first_name = trim(strtolower($input['first_name']));*/

                    if (isset($input['groups']) && isset($user['id'])) {
                        foreach ($input['groups'] as $v) {
                            $Group = Sentry::findGroupById($v);
                            $user->addGroup($Group);
                        }
                    }

                    /*Mail::send('system::email.email_template.acount_info', $input, function($message) use ($email, $first_name) {
                        $message->to($email, $first_name)->subject('Welcome to the Tastable.net');
                    });*/

                } catch (LoginRequiredException $e) {

                    Session::flash('message', 'Login field is required. ');
                    return Redirect::to('manager/users/edit');

                } catch (PasswordRequiredException $e) {
                    Session::flash('message', 'Password field is required. ');
                    return Redirect::to('manager/users/edit');


                } catch (UserExistsException $e) {
                    Session::flash('message', 'User with this email already exists. ');
                    return Redirect::to('manager/users/edit');

                } catch (GroupNotFoundException $e) {
                    Session::flash('message', 'Group was not found.');
                    return Redirect::to('manager/users/edit');

                }

            }
            Session::flash('message', 'User created');
            return Redirect::to('manager/users');
        }

    }


    public function destroy()
    {
        try {
            $input = Input::all();
            foreach ($input['aids'] as $v) {
                $userdelete = Sentry::findUserById($v);
                $userdelete->delete();
            }
        } catch (UserNotFoundException $e) {
            Session::flash('message', 'User was not found.');
        }
        Session::flash('message', 'Deleted.');
        return Response::json('1');
    }

    public function login()
    {
        $user = $this->getUser();
        if (isset($user['id'])) {
            Session::flash('message', 'Logined');
            return Redirect::to('/');
        }
        return view('users::login');
    }

    public function checklogin()
    {
        $input = Input::all();
        $rules = array(
            'password' => array('required'),
            'email' => array('required'),
        );
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails()) {
            return Response::json(0);
        }
        $credentials = array(
            'email' => $input['email'],
            'password' => $input['password'],
        );
        try {
            $user = Sentry::findUserByLogin($input['email']);
        } catch (UserNotFoundException $e) {
            return Response::json(0);
        }

        //check password
        if (!$user->checkPassword($input['password'])) {
            return Response::json(0);
        }
        $throttle = Sentry::findThrottlerByUserId($user['id']);

        //check Suspended
        if ($suspended = $throttle->isSuspended()) {
            return Response::json(0);
        }
        //check banned
        if ($banned = $throttle->isBanned()) {
            return Response::json(0);
        }

        //check deactive
        if (!$user->isActivated()) {
            return Response::json(0);
        }
        if (isset($input['rememberme']) && $input['rememberme'] == 1) {
            Sentry::authenticateAndRemember($credentials);
        } else {
            Sentry::authenticate($credentials, false);
        }
        return Response::json(1);
    }

    public function loginsubmit()
    {
        $input = Input::all();
        $rules = array(
            'password' => array('required'),
            'email' => array('required'),
        );
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails()) {
            return Redirect::to('user/login');
        }
        $credentials = array(
            'email' => $input['email'],
            'password' => $input['password'],
        );
        try {
            $user = Sentry::findUserByLogin($input['email']);
        } catch (UserNotFoundException $e) {
            Session::flash('message', 'User or Password not match.');
            return Redirect::to('user/login');
        }

        //check password
        if (!$user->checkPassword($input['password'])) {
            Session::flash('message', 'User or Password not match.');
            return Redirect::to('user/login');
        }
        $throttle = Sentry::findThrottlerByUserId($user['id']);

        //check Suspended
        if ($suspended = $throttle->isSuspended()) {
            Session::flash('message', ' User is Suspended.');
            return Redirect::to('user/login');
        }
        //check banned
        if ($banned = $throttle->isBanned()) {
            Session::flash('message', 'User banned.');
            return Redirect::to('user/login');
        }

        //check deactive
        if (!$user->isActivated()) {
            Session::flash('message', 'User not activated.');
            return Redirect::to('user/login');
        }
        if (isset($input['rememberme']) && $input['rememberme'] == 1) {
            Sentry::authenticateAndRemember($credentials);
        } else {
            Sentry::authenticate($credentials, false);
        }
        if ($user->hasAccess('dashboard')) {
            return Redirect::to('manager/videos');
        } else {
            return Redirect::to('/');
        }
    }


    public function logout()
    {
        Sentry::logout();
        return Redirect::to('/');
    }

    public function changstatususer()
    {
        $input = Input::all();
        $user = Sentry::findUserById($input['id']);
        $user->activated = $input['activated'];
        if ($user->save()) {
            $throttle = Sentry::findThrottlerByUserId($input['id']);
            if ($input['activated'] == 0) {
                $throttle->ban();
            } else {
                $throttle->unBan();
            }
            Response::json('1');
        } else {
            Response::json('0');
        }

    }

    public function myprofiles()
    {
        $user = $this->getUser();
        $objProfile = new Profiles();
        $profile = $objProfile->where('id', '=', intval($user['id']))->first();
        return view('users::profile', array('profile' => $profile, 'user' => $user));
    }


    public function myprofilestore()
    {
        $input = Input::all();
        $user = $this->getUser();
        $objProfile = new Profiles();
        $profile = $objProfile->where('id', '=', intval($user['id']))->first();
        if ($profile) {
            $profile->company = isset($input['company']) ? $input['company'] : '';
            $profile->lives_in = isset($input['lives_in']) ? $input['lives_in'] : '';
            $profile->country = isset($input['country']) ? $input['country'] : '';
            $profile->description = isset($input['description']) ? $input['description'] : '';
            $profile->facebook = isset($input['facebook']) ? $input['facebook'] : '';
            $profile->twitter = isset($input['twitter']) ? $input['twitter'] : '';
            $profile->google_plus = isset($input['google_plus']) ? $input['google_plus'] : '';
            $profile->flicr = isset($input['flicr']) ? $input['flicr'] : '';
            $profile->youtube = isset($input['youtube']) ? $input['youtube'] : '';
            $profile->addr1 = isset($input['addr1']) ? $input['addr1'] : '';
            $profile->addr2 = isset($input['addr2']) ? $input['addr2'] : '';
            $profile->phone = isset($input['phone']) ? $input['phone'] : '';
            $profile->cell = isset($input['cell']) ? $input['cell'] : '';
            $profile->email = isset($input['email']) ? $input['email'] : '';
            $profile->skype = isset($input['skype']) ? $input['skype'] : '';
            $profile->save();
        } else {
            $objProfile->id = intval($user['id']);
            $objProfile->company = isset($input['company']) ? $input['company'] : '';
            $objProfile->lives_in = isset($input['lives_in']) ? $input['lives_in'] : '';
            $objProfile->country = isset($input['country']) ? $input['country'] : '';
            $objProfile->description = isset($input['description']) ? $input['description'] : '';
            $objProfile->facebook = isset($input['facebook']) ? $input['facebook'] : '';
            $objProfile->twitter = isset($input['twitter']) ? $input['twitter'] : '';
            $objProfile->google_plus = isset($input['google_plus']) ? $input['google_plus'] : '';
            $objProfile->flicr = isset($input['flicr']) ? $input['flicr'] : '';
            $objProfile->youtube = isset($input['youtube']) ? $input['youtube'] : '';
            $objProfile->addr1 = isset($input['addr1']) ? $input['addr1'] : '';
            $objProfile->addr2 = isset($input['addr2']) ? $input['addr2'] : '';
            $objProfile->phone = isset($input['phone']) ? $input['phone'] : '';
            $objProfile->cell = isset($input['cell']) ? $input['cell'] : '';
            $objProfile->email = isset($input['email']) ? $input['email'] : '';
            $objProfile->skype = isset($input['skype']) ? $input['skype'] : '';
            $objProfile->save();
        }
        Session::flash('message', trans('system.save_success'));
        return Redirect::to('user/myprofiles');
    }


}
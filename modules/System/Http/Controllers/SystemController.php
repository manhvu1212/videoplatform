<?php namespace Modules\System\Http\Controllers;

use App\Entities\Posts;
use App\Entities\Settings;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Pingpong\Modules\Routing\Controller;
use Sentry;
class SystemController extends Controller {
	
	public function index()
	{
		return view('system::index');
	}

    public function dashboard(){
        return view('system::dashboard');
    }


    /**
     * GET /setting
     *
     * @return Response
     */
    public function site()
    {
        $url = '';
        $objSetting = new Settings();
        $sitesetting = $objSetting->where('type','=','site_settings')->first();
        $sitesetting1=json_decode($sitesetting['content']);

        return view('system::setting.site',array('url' => $url, 'data' => $sitesetting1,'id'=>$sitesetting['id']));
    }



    /**
     * Store a newly created resource in storage.
     * POST /setting
     *
     * @return Response
     */
    public function sitesettingstore()
    {
        $input = Input::all();
        $rules = array(
            'type' => array('required')
        );
        $validate = Validator::make($input,$rules);
        if(!$validate->fails()){
            if(isset($input['_id']) && $input['_id']!=''){
                $objSetting = Settings::where('id','=',$input['_id'])->first();
                $objSetting->type = isset($input['type'])?$input['type']:'';
                $content=array();
                $content['site_title']= isset($input['site_title'])?$input['site_title']:'';
                $content['site_slogan']= isset($input['site_slogan'])?$input['site_slogan']:'';
                $content['site_email']= isset($input['site_email'])?$input['site_email']:'';
                $content['meta_description']= isset($input['meta_description'])?$input['meta_description']:'';
                $content['meta_keyword']= isset($input['meta_keyword'])?$input['meta_keyword']:'';
                $content['domain_image']= isset($input['domain_image'])?$input['domain_image']:'';
                $content['banner']= isset($input['banner'])?$input['banner']:'';
                $content['logo']= isset($input['logo'])?$input['logo']:'';
                $objSetting->content =  json_encode($content);
                $objSetting->save();
                Session::flash('message', trans('system.save_success'));
            }else{
                $objSetting = new Settings();
                $objSetting->type = isset($input['type'])?$input['type']:'';
                $content=array();
                $content['site_title']= isset($input['site_title'])?$input['site_title']:'';
                $content['site_slogan']= isset($input['site_slogan'])?$input['site_slogan']:'';
                $content['site_email']= isset($input['site_email'])?$input['site_email']:'';
                $content['meta_description']= isset($input['meta_description'])?$input['meta_description']:'';
                $content['meta_keyword']= isset($input['meta_keyword'])?$input['meta_keyword']:'';
                $content['domain_image']= isset($input['domain_image'])?$input['domain_image']:'';
                $content['banner']= isset($input['banner'])?$input['banner']:'';
                $content['logo']= isset($input['logo'])?$input['logo']:'';
                $objSetting->content = json_encode($content);
                $objSetting->save();
                Session::flash('message', trans('system.save_success'));
            }
        }
        return Response::json('1');

    }




    /**
     * GET /setting
     *
     * @return Response
     */
    public function email()
    {
        $url = '';
        $objSetting = new Settings();
        $sitesetting = $objSetting->where('type','=','smtp_settings')->first();
        $sitesetting1=json_decode($sitesetting['content']);
        return View::make('system::setting.email',array('url' => $url, 'data' => $sitesetting1,'id'=>$sitesetting['id']));
    }


    /**
     * Store a newly created resource in storage.
     * POST /setting
     *
     * @return Response
     */
    public function smtpsettingstore()
    {
        $input = Input::all();
        $rules = array(
            'type' => array('required')
        );
        $validate = Validator::make($input,$rules);
        if(!$validate->fails()){
            if(isset($input['_id']) && $input['_id']!=''){
                $objSetting = Settings::where('id','=',$input['_id'])->first();
                $content=array();
                $content['host']= isset($input['host'])?$input['host']:'';
                $content['port']= isset($input['port'])?$input['port']:'';
                $content['from']= isset($input['from'])?$input['from']:'';
                $content['encryption']= isset($input['encryption'])?$input['encryption']:'';
                $content['username']= isset($input['username'])?$input['username']:'';
                $content['email_contact']= isset($input['email_contact'])?$input['email_contact']:'';
                $content['address_contact']= isset($input['address_contact'])?$input['address_contact']:'';
                $content['phone_contact']= isset($input['phone_contact'])?$input['phone_contact']:'';
                $content['phone_contact1']= isset($input['phone_contact1'])?$input['phone_contact1']:'';
                $content['email_docusign']= isset($input['email_docusign'])?$input['email_docusign']:'';
                $content['password_docusign']= isset($input['password_docusign'])?$input['password_docusign']:'';
                $content['key_docusign']= isset($input['key_docusign'])?$input['key_docusign']:'';
                  $content['name_docusign']= isset($input['name_docusign'])?$input['name_docusign']:'';
                $content['fax']= isset($input['fax'])?$input['fax']:'';
                if(isset($input['password']) && $input['password'] !=''){
                    $content['username']= isset($input['password'])?$input['password']:'';
                }
                $objSetting->type = isset($input['type'])?$input['type']:'';
                $objSetting->content = json_encode($content);
                $objSetting->save();
                Session::flash('message', trans('system.save_success'));
            }else{
                $objSetting = new Settings();
                $content=array();
                $content['host']= isset($input['host'])?$input['host']:'';
                $content['port']= isset($input['port'])?$input['port']:'';
                $content['from']['address']= isset($input['from[address]'])?$input['from[address]']:'';
                $content['from']['name']= isset($input['from[name]'])?$input['from[name]']:'';
                $content['encryption']= isset($input['encryption'])?$input['encryption']:'';
                $content['username']= isset($input['username'])?$input['username']:'';
                $content['username']= isset($input['password'])?$input['password']:'';
                $content['email_contact']= isset($input['email_contact'])?$input['email_contact']:'';
                $content['address_contact']= isset($input['address_contact'])?$input['address_contact']:'';
                $content['phone_contact']= isset($input['phone_contact'])?$input['phone_contact']:'';
                $content['phone_contact1']= isset($input['phone_contact1'])?$input['phone_contact1']:'';
                $content['fax']= isset($input['fax'])?$input['fax']:'';
                $content['email_docusign']= isset($input['email_docusign'])?$input['email_docusign']:'';
                $content['password_docusign']= isset($input['password_docusign'])?$input['password_docusign']:'';
                $content['key_docusign']= isset($input['key_docusign'])?$input['key_docusign']:'';
                $content['name_docusign']= isset($input['name_docusign'])?$input['name_docusign']:'';
                $objSetting->type = isset($input['type'])?$input['type']:'';
                $objSetting->content = json_encode($content);
                $objSetting->save();
                Session::flash('message', trans('system.save_success'));
            }
        }
        return Response::json('1');

    }



    /**
     * GET /setting
     *
     * @return Response
     */
    public function file()
    {
        $url = '';
        $objSetting = new Settings();
        $filesetting = $objSetting->where('type','=','file_settings')->first();
        $filesetting1=json_decode($filesetting['content']);
        return view('system::setting.files',array('url' => $url, 'data' => $filesetting1,'id'=>$filesetting['id']));
    }




    /**
     * Store a newly created resource in storage.
     * POST /setting
     *
     * @return Response
     */
    public function filessettingstore()
    {
        $input = Input::all();
        $rules = array(
            'type' => array('required')
        );
        $validate = Validator::make($input,$rules);
        if(!$validate->fails()){
            if(isset($input['_id']) && $input['_id']!=''){
                $objSetting = Settings::where('id','=',$input['_id'])->first();;
                $content=array();
                $content['extension']= isset($input['extension'])?$input['extension']:'';
                $content['thumb_image']= isset($input['thumb_image'])?$input['thumb_image']:'';
                $content['maximum_size']= isset($input['maximum_size'])?$input['maximum_size']:'';
                $objSetting->type = isset($input['type'])?$input['type']:'';
                $objSetting->content = json_encode($content);
                $objSetting->save();
                Session::flash('message', trans('system.save_success'));
            }else{
                $objSetting = new Settings();
                $content=array();
                $content['extension']= isset($input['extension'])?$input['extension']:'';
                $content['thumb_image']= isset($input['thumb_image'])?$input['thumb_image']:'';
                $content['maximum_size']= isset($input['maximum_size'])?$input['maximum_size']:'';
                $objSetting->type = isset($input['type'])?$input['type']:'';
                $objSetting->content = json_encode($content);
                $objSetting->save();
                Session::flash('message', trans('system.save_success'));
            }
        }
        return Response::json('1');

    }


	
}
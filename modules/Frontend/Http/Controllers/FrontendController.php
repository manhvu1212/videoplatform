<?php namespace Modules\Frontend\Http\Controllers;

use App\Entities\Files;
use App\Entities\Registers;
use App\Entities\Settings;
use App\Entities\Slides;
use App\Entities\Taxonomy;
use App\Entities\Taxonomyitem;
use App\Entities\Videos;
use DocuSign_Client;
use DocuSign_Document;
use DocuSign_Recipient;
use DocuSign_RequestSignatureService;
use DocuSign_ViewsService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use mikehaertl\wkhtmlto\Pdf;
use Pingpong\Modules\Routing\Controller;
use Youtube;

class FrontendController extends Controller
{
    public function home()
    {


        //$videoList = Youtube::getPopularVideos('US'); 
        $objtaxo = new Taxonomy();
        $objSetting = new Settings();
        $objVideos = new Videos();
        $objSlide = (new Slides())->where('status', 1)->get();
        $popular = Youtube::getPopularVideos('US');

        //get videos by category
        $taxo = $objtaxo->first();

        $objSetting = $objSetting->where('type', '=', 'site_settings')->first();

        $setting = json_decode($objSetting->content);

        return view('frontend::home', array(
            'setting' => $setting,
            'ft_videos' => $this->getFeaturedVideos(),
            'youtube_cate' => $this->getYoutubeVideos(),
            'populars' => $popular,
            'slides' => $objSlide
        ));
    }

    public function getFeaturedVideos()
    {
        $objVideos = new Videos();
        $list = $objVideos->select('idVideo')->where('status', 1)->get();
        $list_id = array();
        foreach ($list as $video) {
            array_push($list_id, $video->idVideo);
        }

        $featured_vid = Youtube::getVideoInfo($list_id);
        return $featured_vid;
    }

    public function getYoutubeVideos()
    {
        $param_auto = array(
            'q' => '',
            'part' => 'id,snippet',
            'type' => 'video',
            'maxResults' => 6,
            'videoCategoryId' => 2,
            'videoDuration' => 'medium',
            'videoDefinition' => 'high',
            'videoCaption' => 'none',
            'safeSearch' => 'strict'
        );
        $param_game = array(
            'q' => '',
            'part' => 'id,snippet',
            'type' => 'video',
            'maxResults' => 6,
            'videoCategoryId' => 28,
            'videoDuration' => 'medium',
            'videoDefinition' => 'high',
            'videoCaption' => 'none',
            'safeSearch' => 'strict'
        );

        $param_entertain = array(
            'q' => '',
            'part' => 'id,snippet',
            'type' => 'video',
            'maxResults' => 6,
            'videoCategoryId' => 24,
            'videoDuration' => 'medium',
            'videoDefinition' => 'high',
            'videoCaption' => 'none',
            'safeSearch' => 'strict'
        );

        $param_education = array(
            'q' => '',
            'part' => 'id,snippet',
            'type' => 'video',
            'maxResults' => 6,
            'videoCategoryId' => 27,
            'videoDuration' => 'medium',
            'videoDefinition' => 'high',
            'videoCaption' => 'none',
            'safeSearch' => 'strict'
        );

        $search_auto = Youtube::searchAdvanced($param_auto, true);
        $search_game = Youtube::searchAdvanced($param_game, true);
        $search_entertain = Youtube::searchAdvanced($param_entertain, true);
        $search_education = Youtube::searchAdvanced($param_education, true);

        $videos_by_auto = array(
            'name' => 'Autos & Vehicles',
            'list_videos' => $search_auto['results']
        );

        $video_by_game = array(
            'name' => 'Science & Technology',
            'list_videos' => $search_game['results']
        );

        $video_by_entertain = array(
            'name' => "Entertainment",
            'list_videos' => $search_entertain['results']

        );

        $video_by_education = array(
            'name' => "Education",
            'list_videos' => $search_education['results']
        );

        return array($videos_by_auto, $video_by_game, $video_by_entertain, $video_by_education);

    }

    public function page($alias = null)
    {
        $objPost = new Posts();
        $page = $objPost->where('alias', '=', $alias)->first();
        $posts = $objPost->where('type', '=', 'posts')->where('cat_id', '=', 2)->where('status', '=', 1)->orderBy('updated_at', 'DESC')->get();

        if (isset($page['template']) && $page['template'] != '')
            return view('frontend::templates.' . $page['template'], array('data' => $page, 'posts' => $posts));
        else  return view('frontend::templates.template_ira');
    }

    public function videoDetail($video_id, $pr)
    {

        $relatedVideos = Youtube::getRelatedVideos($video_id);
        $video_info = Youtube::getVideoInfo($video_id);
        $video_des = $video_info->snippet->description;
        $sender = array(
            'video_id' => $video_id,
            'video_des' => $video_des,
            'relate_videos' => $relatedVideos,
            'pr' => $pr
        );

        if ($pr) {
            $objFile = new Files();
            $objVideos = new Videos();
            $video = $objVideos->where('idVideo', $video_id)->first();
            $video = json_decode($video);
            $images = array();
            if ($video->description != '') {
                $sender['description'] = $video->description;
            }
            if (!empty($video->images)) {
                foreach ($video->images as $k => $img) {
                    $file = $objFile->where('_id', $img->id)->first();
                    $images[] = array(
                        'url' => $file->url,
                        'title' => $file->title,
                        'minutes' => $img->minutes,
                        'seconds' => $img->seconds,
                        'current' => $k,
                        'extern_url' => $img->extern_url
                    );
                }

                $sender['images'] = $images;
            } else {
                $sender['images'] = array();
            }
        }

        //print_r($sender);die;   

        return view('frontend::templates.video_detail', $sender);
    }

    public function post($alias = null)
    {
        $objPost = new Posts();
        $page = $objPost->where('alias', '=', $alias)->first();
        return view('frontend::templates.template_ira', array('data' => $page));

    }

    public function search()
    {
        session_start();
        $keywords = $_GET['s_keyword'];
        $params = array(
            'q' => $keywords,
            'type' => 'video',
            'part' => 'snippet',
            'maxResults' => 15,
            'videoDefinition' => 'high',
            'videoCaption' => 'none',
            'religionCode' => 'US',
            'safeSearch' => 'moderate'
        );

        if (!isset($_SESSION['search'])) {
            $search = Youtube::paginateResults($params, null);
            $_SESSION['search'] = $search;
        } else {
            $search = Youtube::paginateResults($params, null);
        }

        if (isset($_GET['next'])) {
            $search = Youtube::paginateResults($params, $_SESSION['search']['info']['nextPageToken']);
            $_SESSION['search'] = $search;
        }

        if (isset($_GET['prev'])) {
            $search = Youtube::paginateResults($params, $_SESSION['search']['info']['prevPageToken']);
            $_SESSION['search'] = $search;
        }

        return view('frontend::templates.search')->with('videos', $search['results']);

    }

    public function videobycate($cate_title, $cate_id)
    {
        $params = array(
            'q' => '',
            'type' => 'video',
            'part' => 'id, snippet',
            'maxResults' => 15,
            'videoCategoryId' => $cate_id,
            'videoDuration' => 'medium',
            'videoDefinition' => 'high',
            'videoCaption' => 'none',
            'safeSearch' => 'strict'
        );
        $videos = Youtube::searchAdvanced($params, true);

        return view('frontend::templates.category', array(
            'videos' => $videos['results'],
            'title' => $cate_title
        ));

    }


    public function contact()
    {
        $input = Input::all();
        $objSetting = new Settings();
        $objSetting = $objSetting->where('type', '=', 'smtp_settings')->first();
        $setting = json_decode($objSetting['content']);
        $email_contact = $setting->email_contact;
        if (isset($input['email'])) {
            $rules = array(
                'name' => 'required',
                'message' => 'required',
                'email' => 'required|email',
            );
            $validation = Validator::make(Input::all(), $rules);
            // Find the user using the user email address
            if (!$validation->fails()) {
                $us = new \stdClass();
                $us->email = $email_contact;
                $us->name = 'Contact';
                Mail::send('frontend::emails.contact', ['input' => $input], function ($m) use ($us) {
                    $m->to($us->email, 'User contact')->subject('Contact!');
                });
                Session::flash('message', "Thank you for submitting contact us. We will respond in as soon as possible.");
                return view('frontend::contact', array('setting' => $setting));
            } else {
                Session::flash('message', "Please enter all information");
            }
        }
        return view('frontend::contact', array('setting' => $setting));
    }

    public function  login_signup()
    {
        $objSetting = new Settings();
        $objSetting = $objSetting->where('type', '=', 'smtp_settings')->first();
        $setting = json_decode($objSetting['content']);
        return view('frontend::login_signup', array('setting' => $setting));
    }

    public function  login_signup1($alias = null)
    {
        $alias = str_replace('-', ' ', $alias);
        Session::put('type', $alias);
        return view('frontend::login_signup1');
    }

    public function faq()
    {
        $input = Input::all();
        $objPost = new Posts();
        if (isset($input['title'])) {
            $mang = $objPost->where('title', 'like', '%' . $input['title'] . '%')->where('type', '=', 'faq')->where('status', '=', 1)->get();
            $search = $input['title'];
        } else {
            $objTaxonomyitem = new Taxonomyitem();
            $objTaxonomyitem = $objTaxonomyitem->where('vid', '=', '4')->get();
            $i = 0;
            $mang = array();
            foreach ($objTaxonomyitem as $row) {
                $mang[$i] = $row;
                $mang[$i++]['sub'] = $objPost->where('cat_id', '=', $row['id'])->where('status', '=', 1)->get();
            }
            $search = '';
        }

        return view('frontend::faq', array('mang' => $mang, 'search' => $search));
    }

    //Register
    public function register()
    {
        $obj = new Posts();
        $page = $obj->where('id', '=', 30)->first();
        return view('frontend::login_signup2', array('page' => $page));
    }

    public function register_step1()
    {
        return view('frontend::register_step1');
    }

    public function register_step2()
    {
        $input = Input::all();
        if (isset($input['_token'])) {
            $data = Session::get('data');
            $data['content1'] = $input;
            Session::put('data', $data);
            $objRegister1 = new Registers();
            $objRegister = $objRegister1->where('email', '=', $data['content1']['email'])->first();
            $objRegister2 = $objRegister1->where('social_security_number', '=', $data['content1']['Social_Security_Number1'] . '-' . $data['content1']['Social_Security_Number2'] . '-' . $data['content1']['Social_Security_Number3'])->first();
            if (isset($objRegister->id) || isset($objRegister2->id)) {
                Session::flash('message', 'Email or Social Security Number already exists');
                return Redirect::back();
                //return redirect('/register-step1');
            }
        }

        return view('frontend::register_step2');
    }

    public function register_step3()
    {
        $input = Input::all();
        if (isset($input['_token'])) {
            $data = Session::get('data');
            $data['content2'] = $input;
            Session::put('data', $data);
        }
        $tpl_beneficiary = view('frontend::templates.template_beneficiary');
        return view('frontend::register_step3', array('tpl_beneficiary' => $tpl_beneficiary));
    }

    public function register_step4()
    {
        $input = Input::all();
        if (isset($input['_token'])) {
            $data = Session::get('data');
            $data['content3'] = $input;
            Session::put('data', $data);
        }
        return view('frontend::register_step4');
    }

    public function register_step5()
    {
        $input = Input::all();
        if (isset($input['_token'])) {
            $data = Session::get('data');
            $data['content4'] = $input;
            Session::put('data', $data);
        }
        return view('frontend::register_step5');
    }

    public function register_step6()
    {
        $input = Input::all();
        if (isset($input['_token'])) {
            $data = Session::get('data');
            $data['content5'] = $input;
            Session::put('data', $data);
        }
        return view('frontend::register_step6');
    }

    /**
     * @return View
     */
    public function register_step7()
    {
        $input = Input::all();
        $objRegister = new Registers();
        if (isset($input['_token'])) {
            $data = Session::get('data');
            $objRegister1 = new Registers();
            $objRegister = $objRegister1->where('email', '=', $data['content1']['email'])->first();
            $objRegister2 = $objRegister1->where('social_security_number', '=', $data['content1']['Social_Security_Number1'] . '-' . $data['content1']['Social_Security_Number2'] . '-' . $data['content1']['Social_Security_Number3'])->first();
            if (!isset($objRegister->id) && !isset($objRegister2->id)) {
                $type = Session::get('type');
                if ($type == 'SEP Plan') $type = 'SW';
                elseif ($type == 'Roth IRA') $type = 'RW';
                elseif ($type == 'Traditional IRA') $type = 'TW';
                $bien = rand(100000, 999999);
                $account_id = $type . $bien;

                $objRegister2 = $objRegister1->where('account_id', '=', $account_id)->first();
                while (isset($objRegister2->id)) {
                    $bien = rand(100000, 999999);
                    $account_id = $type . $bien;
                    $objRegister2 = $objRegister1->where('account_id', '=', $account_id)->first();
                }
                $objRegister = new Registers();
                $objRegister->account_id = $account_id;
                $objRegister->email = strip_tags($data['content1']['email']);
                $objRegister->first_name = strip_tags($data['content1']['first_name']);
                $objRegister->last_name = strip_tags($data['content1']['last_name']);
                $objRegister->type = $type;
                $objRegister->social_security_number = $data['content1']['Social_Security_Number1'] . '-' . $data['content1']['Social_Security_Number2'] . '-' . $data['content1']['Social_Security_Number3'];
                $objRegister->phone = strip_tags($data['content1']['home_phone']);
                $objRegister->content1 = json_encode($data['content1']);
                $objRegister->content2 = json_encode($data['content2']);
                $objRegister->content3 = json_encode($data['content3']);
                $objRegister->content4 = json_encode($data['content4']);
                $objRegister->content5 = json_encode($data['content5']);
                $objRegister->save();
            } else {
                Session::flash('message', trans('Email or Social Security Number already exists'));
            }
            Session::put('data', '');
        }
        $objSetting = new Settings();
        $setting = $objSetting->where('type', '=', 'smtp_settings')->first();
        $setting = json_decode($setting->content);
        return view('frontend::register_step7', array('objRegister' => $objRegister, 'setting' => $setting));
    }

    public function create_pdf($slug = null)
    {
        $objRegister = new Registers();
        $objRegister = $objRegister->where('account_id', '=', $slug)->first();
        $view = View::make('frontend::pdf', array('data' => $objRegister))->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        if (!file_exists(public_path() . '/upload/' . $slug . '.pdf')) {
            $link = public_path() . '/upload/' . $slug . '.pdf';
            $pdf->save($link);
            $objRegister = new Registers();
            $objRegister = $objRegister->where('account_id', '=', $slug)->first();
            $objRegister->pdf = $link;
            $objRegister->save();
        }
        return $pdf->download($slug . '.pdf');
        //return view('frontend::pdf');
    }

    public function docusign($slug = null)
    {
        $objRegister = new Registers();
        $objRegister = $objRegister->where('account_id', '=', $slug)->first();
        $content1 = json_decode($objRegister['content1']);
        // Download PHP client:  https://github.com/docusign/DocuSign-PHP-Client
        require_once base_path() . '/inc/DocuSign-PHP-Client/src/DocuSign_Client.php';
        $fullname = $content1->first_name . ' ' . $content1->last_name;
        $email = $content1->email;
        if ($objRegister['pdf'] == '') {
            $view = View::make('frontend::pdf', array('data' => $objRegister))->render();
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML($view);
            $link = public_path() . '/upload/' . $slug . '.pdf';
            $pdf->save($link);
            $objRegister->pdf = $link;
            $objRegister->save();
        }
//=======================================================================================================================
// STEP 1: Login API
//=======================================================================================================================
        $setting = new Settings();
        $setting = $setting->where('type', '=', 'smtp_settings')->first();
        $setting = json_decode($setting['content']);
// client configuration
        $testConfig = array(
            // Enter your Integrator Key, Email, and Password
            'integrator_key' => $setting->key_docusign, 'email' => $setting->email_docusign, 'password' => $setting->password_docusign,
            // API version and environment (demo, www, etc)
            'version' => 'v2', 'environment' => 'demo'
        );

// instantiate client object and call Login API
        $client = new DocuSign_Client($testConfig);

        if ($client->hasError()) {
            echo "\nError encountered in client, error is: " . $client->getErrorMessage() . "\n";
            return;
        }

//=======================================================================================================================
// STEP 2: Create and Send Envelope API
//=======================================================================================================================
        require_once base_path() . '/inc/DocuSign-PHP-Client/src/service/DocuSign_RequestSignatureService.php';
// create service object and configure envelope settings, document(s), and recipient(s)
        $service = new DocuSign_RequestSignatureService($client);
        $emailSubject = $setting->email_docusign;
        $emailBlurb = $setting->email_docusign;
// add one signHere tab for the recipient located 100 pixels right and
// 150 pixels down from the top left corner of document's first page
        $tabs = array("signHereTabs" => array(
            array("documentId" => "1",
                "pageNumber" => "1",
                "xPosition" => "500",
                "yPosition" => "650")));
// add an embedded recipient and document to the envelope.  Here we set the clientUserId to "101"
        $recipients = array(new DocuSign_Recipient("1", "1", $fullname, $email, "101", 'signers', $tabs));
        $documents = array(new DocuSign_Document($slug . '.pdf', "1", file_get_contents($objRegister->pdf)));
// "sent" to send immediately, "created" to save as draft in your account
        $status = 'sent';
//*** Create and send the envelope with embedded recipient
        $response = $service->signature->createEnvelopeFromDocument(
            $emailSubject, $emailBlurb, $status, $documents, $recipients, array());
        //pr($response);
        //=======================================================================================================================
        // STEP 3: Create and Send Envelope API
        //=======================================================================================================================
        require_once base_path() . '/inc/DocuSign-PHP-Client/src/service/DocuSign_ViewsService.php';
        $service = new DocuSign_ViewsService($client);
        $returnUrl = DOMAIN . "success/" . $slug;
        $authMethod = "email";
        $envelopeId = $response->envelopeId;    // response from step 2
        $response = $service->views->getRecipientView($returnUrl,
            $envelopeId,
            $fullname,
            $email,
            "101",
            $authMethod);

        /*    echo "\nOpen the following URL in an iFrame to sign the document:\n\n";
            print_r($response);*/
        return view('frontend::docusign', array('response' => $response));
    }

    public function success($slug = null)
    {
        return view('frontend::success', array('slug' => $slug));
    }

    //End register


    public function template_form()
    {
        $objPost = new Posts();
        $objTaxonomyitem = new Taxonomyitem();
        $objTaxonomyitem = $objTaxonomyitem->where('vid', '=', '5')->get();
        $i = 0;
        $mang = array();
        foreach ($objTaxonomyitem as $row) {
            $mang[$i] = $row;
            $mang[$i++]['sub'] = $objPost->where('cat_id', '=', $row['id'])->where('status', '=', 1)->get();
        }
        return view('frontend::template_forms', array('mang' => $mang));
    }

    public function detail_form($alias = null)
    {
        $objPost = new Posts();
        $objPost = $objPost->where('alias', '=', $alias)->first();
        return view('frontend::detail_form', array('objPost' => $objPost));
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//base controller
require APPPATH . '/libraries/BaseController.php';
class Bosetechnologies extends BaseController {

	public function __construct(){
        parent::__construct();
        $this->load->model('Model_default');
    }
	
	public function index(){
		$data['page_title']		=	'Welcome to Bosetechnologies';
		$this->loadviews('homepage',$data);
	}

	public function services(){
		$data['page_title']		=	'Service : : Bosetechnologies';
		$this->loadviews('services',$data);
	}

	public function aboutUsPage(){
		$data['page_title']		=	'Aboutus : : Bosetechnologies';
		$this->loadviews('aboutus',$data);
	}
	
	public function contactusPage(){
		$data['page_title']		=	'Contactus : : Bosetechnologies';
		$this->loadviews('contactus',$data);
	}

	public function sendmailDetails(){
	    extract($_REQUEST);
	    //send mail
        $tomail = 'admin@bosetechnologies.com';
        $insertdata = array('name'=>$contactName,'mail_id'=>$contactEmail,'content'=>$ContactNote);
        $viewdetails['maildata'] = $insertdata;
        $title = 'Request from '.$contactName;
        $sentstatus = $this->sendemail('mail_templates/request_feedback',$viewdetails,$contactEmail,$tomail,$title,'',$contactName,'Bosetechnologies');
        if ($sentstatus != 1){
            $mailmsg = array('code'=>0,'msg'=>"Your request as been failed to send");;
        }else{
            $mailmsg = array('code'=>1,'msg'=>"Your request as been succcessfully send");
        }
        echo json_encode($mailmsg);
    }
}

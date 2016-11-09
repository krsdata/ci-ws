<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
	  
		
	}
	function sendmsg()
	{
	    $num_to_sendmsg = $this->input->get()['no'];
	    $currentmsg = $this->input->get()['msg'];
	    $this->load->library('twilio');
		$from = '+15208954126';
		$response = $this->twilio->sms($from, '+'.$num_to_sendmsg, $currentmsg);
		if($response->IsError)
			echo json_encode(array('Status'=>'Failed','Error'=>$response->ErrorMessage));
		else
			echo json_encode(array('Status'=>'Success','Error'=>'null')); 
			
	}

	function getrouter()
	{
		$data = $this->routermodel->getrouter();

		print_r(json_encode($data));
	}

}


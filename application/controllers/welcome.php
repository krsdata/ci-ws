<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index()
	{		
		$img=$this->config->item('freeas');		
		$img=explode(",",$img['Img']);
		$data['img']=$img;
		$this->load->view('welcome_message',$data);
	}
	public function send_msg()
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}
		$msg91=$this->config->item('msg91');		
		$auth_key=$msg91['Authkey'];
		$sender_id=$msg91['Sender_id'];
		
		$mobile_msg=$this->config->item('mobile');
		$message=$mobile_msg['Message'];
		$link=$mobile_msg['Link'];
		
		$message = sprintf($message,$link);		
		$mobile=$this->input->post('mobile');
		/***********insert data in table************/
		$data['mobile']	= $mobile;
		$data['ip']		= $_SERVER['REMOTE_ADDR'];
		$data['type']	= 'WEB';		
		$insert = $this->routermodel->sms_log_insert($data);	
		
		/***********end of insertion data code**************/
		
        $encodedMessage = urlencode($message);
        $api = "http://api.msg91.com/sendhttp.php?authkey=$auth_key&mobiles=$mobile&message=" . $encodedMessage . "&sender=$sender_id&route=4";
		$get_res=file_get_contents($api);		
		if($get_res)
		{
			echo "Message sent successfuly.";
		}
		else{
			echo "Message sent failed.";
		}		
	}
	
	function send_contact()
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}
				
		if($this->session->userdata('opreator')=="+")
		{
			$total= $this->session->userdata('num1')+$this->session->userdata('num2');
		}
		else
		{
			$total=$this->session->userdata('num1')*$this->session->userdata('num2');
		}	
		if($total==$this->input->post('varify_capcha'))
		{
			$reciever_email=$this->config->item('email_id');		
			$reciever_email_id=$reciever_email['Reciever_email'];
			$from=$reciever_email['from'];
			$title=$reciever_email['title'];
			$subject=$reciever_email['subject'];
			
			$this->session->unset_userdata('opreator');
			$this->session->unset_userdata('num1');
			$this->session->unset_userdata('num2');
			
			$full_name=$this->input->post('full_name');
			$phone_no=$this->input->post('phone_no');
			$email=$this->input->post('email_addr');
			$message=$this->input->post('message');
			
			$msg="<table>
					<tr><td>Name</td><td>$full_name</td></tr>					
					<tr><td>Phone Number</td><td>$phone_no</td></tr>
					<tr><td>Email</td><td>$email</td></tr>
					<tr><td>Message</td><td>$message</td></tr>
					<tr><td>FreeAsAir Best Regards <br><a href='".base_url()."'>FreeAsAir</a> </td></tr>
				</table>";
			
			$config = array();
			$config['useragent']           = "CodeIgniter";
			$config['mailpath']            = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
			$config['protocol']            = "smtp";
			$config['smtp_host']           = "localhost";
			$config['smtp_port']           = "25";
			$config['mailtype'] = 'html';
			$config['charset']  = 'utf-8';
			$config['newline']  = "\r\n";
			$config['wordwrap'] = TRUE;
	
			$this->load->library('email');
	
			$this->email->initialize($config);	
			$this->email->from($from, $title);
			$this->email->to($reciever_email_id);
	
			$this->email->subject($subject);
			$this->email->message($msg);
	
			$this->email->send();						
			die;
		}
		else
		{
			echo 0;
		}
	}
	
	public function Captcha()
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}
		$num1 = mt_rand(1,5);
		$num2 = mt_rand(1,5);

		$operators = array(
			"+",               
			"*",               
			);
		$opr= $operators[array_rand($operators)];
		echo $result = $num1 . $opr . $num2;
		$this->session->set_userdata("num1",$num1);
		$this->session->set_userdata("num2",$num2);
		$this->session->set_userdata("opreator",$opr);
		$this->session->set_userdata("result",$result);
		die;
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
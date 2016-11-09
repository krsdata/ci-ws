<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if(!$this->session->userdata('username'))
		{
		$data = $this->loginmodel->checksignup();

		$this->load->view('login_view',array('check'=>$data['num_rows']),false);
	    }
	    else
	    {

	    	header('Location: '.base_url().'dashboard/');

	    	//redirect();
	    }
		
	}


	public function checklogin()
	{
		         
        $this->load->library('token');
               
        $username = $this->token->decrypt(token,$this->input->post()['username']);

	   	$pwd = md5($this->token->decrypt(token,$this->input->post()['pswd']));

	   	
	  
	   	$data = $this->loginmodel->userauthentication($username,$pwd);

       	if($data['num_rows'] > 0)
       	{
       	   $newdata = array(
                   'username'  =>  $data['results']->user_name,
                    'app_id'  =>  $data['results']->app_id
                  );

          $this->session->set_userdata($newdata);
      
       	}
       	else
       	{
       	echo 'error';
       	}

	}

	public function signup()
	{
	  $this->load->view('signup_view',null,false);
	}

	public function signup_data()
	{
		$data = $this->input->post();
        $password =  md5($this->input->post()['pass_word']);
        unset($data['pass_word']);
        unset($data['oldpwd']);
        $arr = array('pass_word'=>$password);
        $data = array_merge($data,$arr);
        
        $id = $this->loginmodel->signup($data);

        if($id)
        {
        	redirect(base_url().'success');
        }
  
	}

	public function getsuccess()
	{
		$this->load->view('successpage',null,false);
	}

	public function logout()
	{
		 $newdata = array(
                   'username'  =>  '',
                  );

          $this->session->set_userdata($newdata);
          redirect('/login');

	}


     public function downlaodview()
	 {
		
		$css = $this->load->view('css/css',null,true);
		$js = $this->load->view('js/js',null,true);
	        	
        $content = '<a href="'.base_url().'uploads/FreeAsAir.apk" download="" >Start Download</a>';	
       
        echo $content;
		
     

	}

	
}

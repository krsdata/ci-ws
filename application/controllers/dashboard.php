<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	public function index()
	{
	 
		
	}

	public function homepage()
	{

		
		if($this->session->userdata('username'))
		{
		$css = $this->load->view('css/css',null,true);
		$js = $this->load->view('js/js',null,true);
		$header = $this->load->view('header',null,true);
		$navigation = $this->load->view('navigation',array('Dashboard'=>'active'),true);
        $app_id = $this->session->userdata('app_id');
	    
	    $data = $this->routermodel->getrouterbyowner($app_id);

	    $content = $this->load->view('sharerouter/sharewifi',array('data'=>$data),true);
        		
        $arr = array(

        		'css'=>$css,
        		'js'=>$js,
        		'header'=>$header,
        		'navigation'=>$navigation,
        		'content'=>$content,
        		'pagename'=>'Dashboard'

        	);
        echo $this->load->view('mainpage',$arr,true);
     }
     else
     {
     	redirect('/login');
     }



	}

}
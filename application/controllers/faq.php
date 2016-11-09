<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faq extends CI_Controller {

	
	public function index()
	{

		$this->load->view('faq/mainpage',null,false);
	  
		
	}


	public function allfaq()
	{
		if($this->session->userdata('username'))
		{
		$css = $this->load->view('css/css',null,true);
		$js = $this->load->view('js/js',null,true);
		$header = $this->load->view('header',null,true);
		$navigation = $this->load->view('navigation',array('Faq'=>'active'),true);
            
	    $data = $this->routermodel->getallfaq();

	    $content = $this->load->view('faq/allfaq',array('data'=>$data),true);
        		
        $arr = array(

        		'css'=>$css,
        		'js'=>$js,
        		'header'=>$header,
        		'navigation'=>$navigation,
        		'content'=>$content,
        		'pagename'=>'FAQ'

        	);
        echo $this->load->view('mainpage',$arr,true);
     }
     else
     {
     	redirect(base_url().'login');
     }


	}

	function editfaq()
	{
		if($this->session->userdata('username'))
		{
		$css = $this->load->view('css/css',null,true);
		$js = $this->load->view('js/js',null,true);
		$header = $this->load->view('header',null,true);
		$navigation = $this->load->view('navigation',array('Dashboard'=>'active'),true);

		$id = base64_decode($this->input->get()['id']);
		
		$data = $this->routermodel->editfaq($id);
	    	   
		$content = $this->load->view('faq/editfaq',array('data'=>$data['results']),true);

        $arr = array(

        		'css'=>$css,
        		'js'=>$js,
        		'header'=>$header,
        		'navigation'=>$navigation,
        		'content'=>$content,
        		'pagename'=>'FAQ'

        	);
		echo $this->load->view('mainpage',$arr,true);
	   }
	   else
	   {
	   	redirect(base_url().'login');
	   }

	}

	function editfaqdata()
	{
		  $id =  base64_decode($this->input->post()['id']);
		
		  
		  $data = $this->input->post(); 

		  unset($data['id']);

		  $arr = array('updated_at'=>date('Y-m-d H:i:s'));
		  $data =  array_merge($data,$arr);
		  $value = $this->routermodel->updatefaq($data,$id);
		  print_r($value);
	
	}

	public function addfaq()
	{
		if($this->session->userdata('username'))
		{
		$css = $this->load->view('css/css',null,true);
		$js = $this->load->view('js/js',null,true);
		$header = $this->load->view('header',null,true);
		$navigation = $this->load->view('navigation',array('Dashboard'=>'active'),true);

		$content = $this->load->view('faq/addfaq',null,true);

        $arr = array(

        		'css'=>$css,
        		'js'=>$js,
        		'header'=>$header,
        		'navigation'=>$navigation,
        		'content'=>$content,
        		'pagename'=>'FAQ'

        	);
		echo $this->load->view('mainpage',$arr,true);
	   }
	   else
	   {
	   	redirect(base_url().'login');
	   }


	}

	function addfaqdata()
	{
 
		 
		  $arr = array('created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'));
		  $data =  array_merge($this->input->post(),$arr);

		  $id = $this->routermodel->addfaqdata($data);
		  print_r($id);
	
	}

}
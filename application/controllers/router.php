<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Router extends CI_Controller {

	
	public function index()
	{
	  
		
	}
	public function activeuser()
	{ 
		$id = $this->input->post()['user_id'];

	
	 //echo  $this->routermodel->activeuser($id);
	 $a = $this->routermodel->activeuser($id);
	 echo $a; exit;
	}
	public function appusers()
	{
		if($this->session->userdata('app_id') == 0)
		{

		$css = $this->load->view('css/css',null,true);
		$js = $this->load->view('js/js',null,true);
		$header = $this->load->view('header',null,true);
		$navigation = $this->load->view('navigation',array('Dashboard'=>'active'),true);
		$data = $this->routermodel->appusers();

		$content = $this->load->view('router/appusers',array('data'=>$data['results']),true);
	
 $arr = array(

        		'css'=>$css,
        		'js'=>$js,
        		'header'=>$header,
        		'navigation'=>$navigation,
        		'content'=>$content,
        		'pagename'=>'App Users'

        	);
		echo $this->load->view('mainpage',$arr,true);
		}
	}

	public function addrouter()
	{
		if($this->session->userdata('username'))
		{
		$css = $this->load->view('css/css',null,true);
		$js = $this->load->view('js/js',null,true);
		$header = $this->load->view('header',null,true);
		$navigation = $this->load->view('navigation',array('Dashboard'=>'active'),true);

		$content = $this->load->view('router/router',null,true);

        $arr = array(

        		'css'=>$css,
        		'js'=>$js,
        		'header'=>$header,
        		'navigation'=>$navigation,
        		'content'=>$content,
        		'pagename'=>'Router'

        	);
		echo $this->load->view('mainpage',$arr,true);
	   }
	   else
	   {
	   	redirect(base_url().'login');
	   }


	}

	function editrouter()
	{
		if($this->session->userdata('username'))
		{
		$css = $this->load->view('css/css',null,true);
		$js = $this->load->view('js/js',null,true);
		$header = $this->load->view('header',null,true);
		$navigation = $this->load->view('navigation',array('Dashboard'=>'active'),true);

		$id = base64_decode($this->input->get()['id']);
		
		$data = $this->routermodel->editrouter($id);
	    	   
		$content = $this->load->view('router/editrouter',array('data'=>$data['results']),true);

        $arr = array(

        		'css'=>$css,
        		'js'=>$js,
        		'header'=>$header,
        		'navigation'=>$navigation,
        		'content'=>$content,
        		'pagename'=>'Router'

        	);
		echo $this->load->view('mainpage',$arr,true);
	   }
	   else
	   {
	   	redirect(base_url().'login');
	   }

	}

	public function addrouterdata()
	{       
		  $pwd =  base64_encode($this->input->post()['pwd']);
		  $arr = array('pwd'=>$pwd,'created_date'=>date('Y-m-d H:i:s'),'updated_date'=>date('Y-m-d H:i:s'));
		  $data =  array_merge($this->input->post(),$arr);

		  $id = $this->routermodel->addrouter($data);
		  print_r($id);
	}

	public function editrouterdata()
	{       

		  $id =  base64_decode($this->input->post()['id']);
		  $pwd =  base64_encode($this->input->post()['pwd']);
		  
		  $data = $this->input->post(); 

		  unset($data['id']);

		  $arr = array('pwd'=>$pwd,'updated_date'=>date('Y-m-d H:i:s'));
		  $data =  array_merge($data,$arr);
		  $value = $this->routermodel->updaterouter($data,$id);
		  print_r($value);
	}

	public function allrouter()
	{
		if($this->session->userdata('username'))
		{
		$css = $this->load->view('css/css',null,true);
		$js = $this->load->view('js/js',null,true);
		$header = $this->load->view('header',null,true);
		$navigation = $this->load->view('navigation',array('Dashboard'=>'active'),true);
		
		$data = $this->routermodel->getallrouter();
				
		$content = $this->load->view('router/allrouter',array('data'=>$data),true);

        $arr = array(

        		'css'=>$css,
        		'js'=>$js,
        		'header'=>$header,
        		'navigation'=>$navigation,
        		'content'=>$content,
        		'pagename'=>'Router'

        	);
		echo $this->load->view('mainpage',$arr,true);
	   }
	   else
	   {
	   	redirect(base_url().'login');
	   }
	}

	public function addrouterimage()
	{

		if($this->session->userdata('username'))
		{
		$css = $this->load->view('css/css',null,true);
		$js = $this->load->view('js/js',null,true);
		$header = $this->load->view('header',null,true);
		$navigation = $this->load->view('navigation',array('Dashboard'=>'active'),true);

		$content = $this->load->view('sharerouter/addimage',null,true);

        $arr = array(

        		'css'=>$css,
        		'js'=>$js,
        		'header'=>$header,
        		'navigation'=>$navigation,
        		'content'=>$content,
        		'pagename'=>'Router'

        	);
		echo $this->load->view('mainpage',$arr,true);
	   }
	   else
	   {
	   	redirect(base_url().'login');
	   }


	}

	public function addimage()
	{
	
		$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = base_url().$target_file;

			
			
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}


			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
		
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			       

			    $data = array('img_name'=>$_FILES["fileToUpload"]["name"],'app_id'=>base64_decode($_POST['imgid']));

			      $id = $this->routermodel->addrouterimage($data);
			      header('Location: '.base_url().'dashboard');

			      echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}


	}

}
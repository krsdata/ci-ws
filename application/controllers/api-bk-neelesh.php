<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	public function index()
	{
	}
	function dcryptkey($key)
	{
		$this->load->library('mcrypt');
		$decrypt_value = $this->mcrypt->decrypt($key);
		return array('get'=>$key,'result'=>$decrypt_value);
	}


function version()
	{
	   
		$device_id = $this->input->get()['device_id'];
		$data = $this->routermodel->getdeviceuser($device_id);
		//print_r($data);

		foreach ($data['results'] as  $value)
		 {
	 	$check = $value->deleted_at;
	 		if ($check)
	 		{
	 			echo json_encode(array('version'=>'1.1','active'=>True));
	 		}
	 		else
	 		{
	 			echo json_encode(array('version'=>'1.1','active'=>True));
	 		}
		}
		
	}


	function sendmsg()
	{

		
		if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
		$num_to_sendmsg = $this->input->get()['no'];
        $currentmsg = $this->input->get()['msg'];
        $deviceid = $this->input->get()['deviceid'];
        $key = $this->input->get()['key'];
	    }
	    else
	    {
	    $num_to_sendmsg = $this->input->post()['no'];
        $currentmsg = $this->input->post()['msg'];
        $deviceid = $this->input->post()['deviceid'];
        $key = $this->input->post()['key'];

	    }
       
	    
	    $dcrypt_data =  $this->dcryptkey($key);
   	 
	  

	    if($dcrypt_data['result'] != $deviceid )
	    {
	    	echo json_encode(array('Status'=>'Failed','Error'=>'Token value is wrong','id'=>'0'));
	    	return;

	    }

	    if(!preg_match('/'.$deviceid.'/', $currentmsg))
	    {
	    	echo json_encode(array('Status'=>'Failed','Error'=>'The pattern of message is wrong','id'=>'0'));
	    	return;

	    }
   
       
	  	$ipaddress = $this->input->ip_address();
	                       
	    $entry_data = array('ip_address'=>$ipaddress,'sim_id'=>$num_to_sendmsg,
	    					'device_id'=>$deviceid,'msg'=>$currentmsg,'created_date'=>date('Y-m-d'));

	   

	    $noentry = $this->loginmodel->checkfornoentry($entry_data);
	    

	    if($noentry['no_entry']=="0")
	    {
	    	echo json_encode(array('Status'=>'Failed','Error'=>'Too much MSG has been sent from this number','id'=>'0'));
    		return;

	    }

	    $entry = $this->loginmodel->checkforentry($entry_data);

	    if($entry['ip_entry'] == "0")
	    {
             echo json_encode(array('Status'=>'Failed','Error'=>'Too much MSG has been sent from this IP','id'=>'0'));
    		 return;
	    }

	    // if($_SERVER['HTTP_USER_AGENT'] != 'Android')
	    // {
	    // 	echo json_encode(array('Status'=>'Failed','Error'=>'Please install FreeAsAir app to perform action','id'=>'0'));
    	// 	return;
	    // }

	    
      	
	        $check = $this->loginmodel->checkexist($deviceid,$num_to_sendmsg);
	        
	        if($check['status'] != 'exist')
	        {
	        	$this->load->library('twilio');
						$from = '+14085083733';
						$response = $this->twilio->sms($from, '+'.$num_to_sendmsg, $currentmsg);
						
						if($response->IsError)
						{
							echo json_encode(array('Status'=>'Failed','Error'=>$response->ErrorMessage));
						}
						else
						{
						 
						 	$arr = array('deviceid'=>$deviceid,'simno'=>$num_to_sendmsg);
						
							$id = $this->loginmodel->firstaddusers($arr);
						 
			 				echo json_encode(array('Status'=>'Success','Error'=>'null','id'=>$id));
			 			 	
						}

	        }
	        else
	        {
	        	$this->load->library('twilio');
						$from = '+14085083733';
						$response = $this->twilio->sms($from, '+'.$num_to_sendmsg, $currentmsg);
						
						if($response->IsError)
						{
							echo json_encode(array('Status'=>'Failed','Error'=>$response->ErrorMessage));
						}
						else
						{
			        	echo json_encode(array('Status'=>'Failed','Error'=>'Already Exist','id'=>$check['id']));
			            }
			        }
		    			
	}

	function getrouter()
	{

		if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
	    	$offset = $this->input->get()['index'];
			$date = $this->input->get()['date'];
			$id = $this->input->get()['id'];

	    }
	    else
	    {
	  
        $offset = $this->input->post()['index'];
		$date = $this->input->post()['date'];
		$id = $this->input->post()['id'];

	    }


		if($_SERVER['HTTP_USER_AGENT'] != 'Android')
	    {
	    	echo json_encode(array('Status'=>'Failed','Error'=>'Please install FreeAsAir app to perform action','id'=>'0'));
    		return;
	    }
	   

		$data = $this->routermodel->getrouterapi($offset,$date,$id);

		echo json_encode($data);
	}

	function addusers()
	{
		$firstname = strtolower($this->input->get()['firstname']);
		$lastname = strtolower($this->input->get()['lastname']);
		$email = $this->input->get()['email'];
		$mobileno = $this->input->get()['mobileno'];
		$deviceid = $this->input->get()['deviceid'];
		$gender = strtolower($this->input->get()['gender']);

		$data =   array(
			           'first_name'=>$firstname,
			           'last_name'=>$lastname,
			           'email'=>$email,
			           'gender'=>$gender,
			           'sim_id'=>$mobileno,
			           'device_id'=>$deviceid,
			           'created_at'=> date('Y-m-d H:i:s'),			           
			           'updated_at'=>'0000-00-00 00:00:00'  
			           );
       
        
		$id = $this->loginmodel->addusersapi($data);
		if($id == 'Success')
		{
			$arr = array('Status'=>'Success');
		    echo json_encode($arr);

		}
		else
		{
			$arr = array('Status'=>'Success','inserted_id'=>$id);
		    echo json_encode($arr);
		}
		

	}

	function adduserrouter()
	{

		if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
		$deviceid = $this->input->get()['device_id'];
		$bssid = $this->input->get()['bssid'];
		$disconnect = $this->input->get()['last_disconnect_time'];
	    }
	    else
	    {
	     $deviceid = $this->input->post()['device_id'];
		 $bssid = $this->input->post()['bssid'];
		 $disconnect = $this->input->post()['last_disconnect_time'];

	    }

	    if($disconnect == "0")
	    {
	    	$disconnect = "0000-00-00 00:00:00";
	    }

		$data = array('device_id'=>$deviceid,'bssid'=>$bssid,'connected_at'=>date('Y-m-d H:i:s'),'disconnected_at'=>$disconnect);
           

        $arr = $this->routermodel->adduserrouter($data);
      
		echo json_encode($arr);


	}

	function addlogsvalue()
	{
		$data = $this->input->get();

		$id = $this->loginmodel->addlogs($data);

        $arr = array('Status'=>'Success','inserted_id'=>$id);
		echo json_encode($arr);

	}

	function sharerouters()
	{
				
		if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
		  $data = $this->input->get();

	    }
	    else
	    {
	      $data = $this->input->post();
	    }


	    $output = file_get_contents("http://maps.google.com/maps/api/geocode/json?latlng=".$data['lat'].",".$data['long']."&sensor=true");
        
        $decoded_output = json_decode($output);

        $address = $decoded_output->results[0]->formatted_address ;
		
		$data = array_merge($data,array("wifi_address"=>$address));

		$arr = $this->routermodel->sharerouter($data);

       
		echo json_encode($arr);


	}

	function addlogspost()
	{
		$data = $this->input->post();
		$id = $this->loginmodel->addlogs($data);
        $arr = array('Status'=>'Success','inserted_id'=>$id);
		echo json_encode($arr);

	}

	function getappusers()
	{
		$deviceid = $this->input->get()['deviceid'];
		$mobileno = $this->input->get()['mobileno'];
		$data = $this->routermodel->getappusers($deviceid,$mobileno);
        echo json_encode($data);


	}

	function uploadimg()
	{ 
		if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
		  $data = $this->input->get();

	    }
	    else
	    {
		 $data = $this->input->post(); 
		}
 	   if(isset($data['image']))
	   {
 
	    $img = str_replace('data:image/png;base64,', '', $data['image']);
	    $img = str_replace(' ', '+', $img);
	    $img = base64_decode($img);
	    $unid = uniqid();
	    $file = 'uploads/'. $unid . '.jpeg';
		$success = file_put_contents($file, $img);
		$value = $this->routermodel->uploadimg($data,$file,'image');
		echo json_encode($value);
	    return;
	  }
	  else
	  {
		$file = $data['url'];
	  	$value = $this->routermodel->uploadimg($data,$file,'url');
		echo json_encode($value);
	    return;
	  }
	}

	function uploadimg_test2()
	{ 
		
	if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
		  $data = $this->input->get();
		}
	    else
	    {
			$data = $this->input->post(); 
		}

	   if(isset($data['image']))
	   {
print_r($data['image']); exit;
 
	   $img = str_replace('data:image/png;base64,', '', $data['image']); 
	    $img = str_replace(' ', '+', $img);
	    $img = base64_decode($img);
	  $unid = uniqid(); 
	    $file = 'uploads/'. $unid . '.jpeg';
		$success = file_put_contents($file, $img);
		//compress image
		$info = getimagesize($file); 
		print_r($info); exit;
		if ($info['mime'] == 'image/jpeg' ) 
		{
			$image = imagecreatefromjpeg($file); 				
			
		}
		if(imagejpeg($image,'uploads/'.$unid.'-tumb.jpeg',80))
		{
			echo $file_thumb = 'uploads/'.$unid.'-tumb.jpeg';
			unlink($file);
		}
		$value = $this->routermodel->uploadimg($data,$file_thumb,'image');
		//$value = $this->routermodel->uploadimg($data,$file,'image');
		echo json_encode($value);
	    return;
	  }
	  else
	  {
		$file = $data['url'];
	  	$value = $this->routermodel->uploadimg($data,$file,'url');
		echo json_encode($value);
	    return;
		}
	}

	function addcontact()
	{
		

		if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
		  $data = $this->input->get();
	    }
	    else
	    {
	      $data = $this->input->post();
	    }


		$id = $this->routermodel->addcontact($data);

        $arr = array('Status'=>'Success','inserted_id'=>$id);
		echo json_encode($arr);


	}


	function xlsparser()
	{
		

		return;
		 //require_once '/var/www/msg/application/libraries/excel_reader.php';

		
		 require_once 'excel_reader.php';

		

		 
		 $excel = new PhpExcelReader; 



		// $excel->read('/home/cis/Desktop/ozonewifi1.xls'); 

		 $excel->read('trust3.xls'); 

          $arr = $excel->sheets;

          

        

		//echo '<pre>';
        
        foreach ($arr as  $value) {

        	foreach ($value['cells'] as $data) 
        	{


				$address = str_replace(" ", "+", $data[5] );
				
				$output = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=".$address."&sensor=true");
                $decoded_output = json_decode($output);

        		
        		 if($decoded_output->results)
        	    {
           
      			   	$lat = $decoded_output->results[0]->geometry->location->lat;
	               	$lng = $decoded_output->results[0]->geometry->location->lng;
	        	    
        	        	
        			$dataarray = array('ownerid'=>'-1','is_active'=>'1','lat'=>$lat,'long'=>$lng,'sname'=>$data[3],'ssid'=>$data[3],'wifi_address'=>$data[5],'owner_type'=>'public_users','created_date'=>date('Y-m-d H:i:s'),'updated_date'=>date('Y-m-d H:i:s') );
         	    	
        		
         	    	$this->routermodel->addrouter($dataarray);
             	}

        	}
        	
        	
        }

        echo 'ok';

		
		//echo '</pre>';




	}



}


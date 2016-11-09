<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend extends CI_Controller {

  public function showfront()
  {
  	$data = $this->routermodel->getrouterlimit(0);
    $recentdata = $this->routermodel->getrouter(4);
  	$content = $this->load->view('frontend/wififront',array('data'=>$data,'recentdata'=>$recentdata),true);
    echo $this->load->view('frontend/mainpage',array('content'=>$content));

    // $data['data'] = $this->routermodel->getrouterlimit(0);
    // $data['recentdata'] = $this->routermodel->getrouter(4);
    // $data['content'] = 'frontend/wififront';
    // $this->load->vars($data);
    // $this->load->view('frontend/mainpage');


  }

  public function showimgfront()
  {
    

    $data = array('bssid'=>base64_decode($_GET['id']));
    $value = $this->routermodel->routerimage($data);

   
    

    if($value["image_type"]=='image')
    {
          $content = '<img src="'.$value["imgpath"].'" >';
         echo $this->load->view('frontend/mainmobile',array('content'=>$content));

    }
    else if ($value["image_type"]=='url')
    {
        
        if(!strrpos($value["imgpath"], 'http'))
        {
          echo json_encode(array('path'=>"http://".$value["imgpath"])) ;
        }
        else
        {
          echo json_encode(array('path'=>$value["imgpath"])) ;
        }
     
    }
    else
    {
       $content = '<img id ="defaultid" alt="img/cislogo.jpg" src="img/cislogo.jpg" >';
       echo $this->load->view('frontend/mainmobile',array('content'=>$content));

    }



  }

  public function showlogs()
  {
     
   $data = $this->routermodel->logs();
   $content = $this->load->view('frontend/logs',array('data'=>$data),true);
   echo $this->load->view('frontend/mainpage',array('content'=>$content),true);  

    // $data['data'] = $this->routermodel->logs();
    // $data['content'] = 'frontend/logs';
    // $this->load->vars($data);
    // $this->load->view('frontend/mainpage');



  }

  public function showmap()
  {
  	$lat = $this->input->post()['lat'];
  	$longd = $this->input->post()['longitude'];
    $img = $this->input->post()['img'];
  	echo $this->load->view('frontend/map',array('lat'=>$lat,'longd'=>$longd,'img'=>$img),true);

     // $data['lat'] = $this->input->post()['lat'];
      // $data['longd'] = $this->input->post()['longitude'];
      // $data['img'] = $this->input->post()['img'];
      // $this->load->vars($data);
      // $this->load->view('frontend/map');

  }

   public function endlessdata()
   {
       $pageno = $this->input->post()['page_no'];

       $data = $this->routermodel->getrouterlimit($pageno);
       if($data['num_rows']!='0')
       {
         $content = $this->load->view('frontend/endlesshtml',array('data'=>$data),true);
         echo $content;
       }
       else
       {
        echo 'none';
       }
      

  }
  
  public function addrating()
  {
      $rating = $this->input->post()['rating'];
      $routerid = $this->input->post()['routerid'];

      $data = array('router_id'=>$routerid,'rating'=>$rating);

      $value = $this->routermodel->addrating($data);

      print_r($value);


  }

}

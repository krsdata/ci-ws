<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Routermodel extends CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    
          // function activeuser($id)
          // {
          //   $query = $this->db->query("SELECT * FROM app_users WHERE id = '$id'");
 

          // foreach ($query->result() as $row)
          // {
          //   if($row->deleted_at == NULL){
          //             $query1 = $this->db->query("UPDATE app_users SET deleted_at=NOW() WHERE id = '$id'");
          //             return 1;
          //    }else{
          //          $query1 = $this->db->query("UPDATE app_users SET deleted_at=NULL WHERE id = '$id'");
          //      return 1;
          //    }
          // }

          // }
     function activeuser($id)
    {
      $query = $this->db->query("SELECT * FROM app_users WHERE id = '$id'");
 

foreach ($query->result() as $row)
{
  if($row->deleted_at == NULL){
            $query1 = $this->db->query("UPDATE app_users SET deleted_at=NOW() WHERE id = '$id'");
            return 0;
   }else{
         $query1 = $this->db->query("UPDATE app_users SET deleted_at=NULL WHERE id = '$id'");
     return 1;
   }
}

          }
 function getdeviceuser($device_id)
 {

  $query = $this->db->query("SELECT deleted_at FROM app_users where device_id = '$device_id' order by updated_at desc limit 1 ");

    return  array('results' => $query->row());


 }
   public function addrouter($data)
   {

   	$this->db->insert('routers', $data); 

   	return $this->db->insert_id();
 	
   }
 public function appusers()
   {
      $query = $this->db->query("SELECT * FROM app_users ");
       return  array('num_rows'=> $query->num_rows(),'results' => $query->result());

   }
     public function updaterouter($data,$id)
     {
     
    
     $this->db->where('id', $id);
     $this->db->update('routers', $data);

     return 'ok';
  
     }

   public function getrouter($limit)
   {
   	$query = $this->db->query("SELECT * FROM routers ORDER BY updated_date DESC LIMIT ".$limit."");
	  return  array('num_rows'=> $query->num_rows(),'results' => $query->result());


   }

   public function editrouter($id)
   {
      $query = $this->db->query("SELECT * FROM routers where id = $id");
      return  array('num_rows'=> $query->num_rows(),'results' => $query->row());

   }



   public function getrouterapi($limit,$date,$id)
   {
     
      if($date == '0')
      {
        $date = "0000-00-00";
      }

     $sql = "SELECT * FROM routers 
             where (TIME_TO_SEC(TIMEDIFF( STR_TO_DATE(created_date,'%Y-%m-%d %H:%i:%s'),STR_TO_DATE('$date','%Y-%m-%d %H:%i:%s') )) > 0 ) and id > $id 
             ORDER BY updated_date LIMIT $limit, 50";
    
     $allquery = $this->db->query($sql);

     $query ="SELECT * FROM routers 
              where TIME_TO_SEC(TIMEDIFF(STR_TO_DATE(updated_date,'%Y-%m-%d %H:%i:%s'),STR_TO_DATE('$date','%Y-%m-%d %H:%i:%s') ))> 0 
              and TIME_TO_SEC(TIMEDIFF(STR_TO_DATE(updated_date,'%Y-%m-%d %H:%i:%s'),STR_TO_DATE(created_date,'%Y-%m-%d %H:%i:%s')))>0 and id <= $id ORDER BY updated_date LIMIT $limit, 50";
  
     
     $updatedquery = $this->db->query($query); 
     
     return  array('no_of_wifi'=> $allquery->num_rows(),'wifi_records' => $allquery->result(),'no_of_updated_wifi'=> $updatedquery->num_rows(),'wifi_updated_records'=>$updatedquery->result());


   }


   public function routerimage($data)
   {
    
       $imgsql = "SELECT id,image_url,image_type FROM routers where bssid = '".$data['bssid']."'"; 

       $imgquery = $this->db->query($imgsql); 

       if($imgquery->num_rows() != '0') 
          { 
              
              if($imgquery->row()->image_type=='image')
              {
              $this->db->insert('ads_log',array('router_id'=>$imgquery->row()->id,'created_at'=> date('Y-m-d H:i:s'))); 
              }
              return array("imgpath"=>$imgquery->row()->image_url,'image_type'=>$imgquery->row()->image_type);
          } 
          else
          {
              return array("imgpath"=>"img/cislogo.jpg",'image_type'=>'none');
          }   
   }




   public function adduserrouter($data)
   {

        $sql = "SELECT id,device_id FROM users_routers 
                where device_id = '".$data['device_id']."' ORDER BY `id` DESC LIMIT 1";

         $imgsql = "SELECT image_url,image_type FROM routers where bssid = '".$data['bssid']."'"; 
        
        $imgquery = $this->db->query($imgsql); 

        $query = $this->db->query($sql); 
        $id = '0';

        if ($query->num_rows() == '0')
        {
             $this->db->insert('users_routers', $data); 
             $id =  $this->db->insert_id();

        }
        else
        {
         
          
            $arr = array('device_id' => $data['device_id'],'id'=>$query->row()->id); 
            $seconds = $data['disconnected_at'] / 1000;
            $this->db->where($arr);
            $updata = array('disconnected_at'=>date('Y-m-d H:i:s',$seconds));
            $this->db->update('users_routers',$updata );
            $this->db->insert('users_routers', $data); 
            $id = $this->db->insert_id();

        }  

        if($imgquery->row()->image_type=="url")
        {
             $url = $imgquery->row()->image_url ;

                if(!strrpos($url, 'http'))
                {
                  $url =  "http://".$url ;
                }
               
           //return array('Status'=>'Success','inserted_id'=>$id,"path"=>$url);
           return array('Status'=>'Success','inserted_id'=>$id,'image_type'=>$imgquery->row()->image_type,"path"=>$url);
      
        }
        else
        {
           //return array('Status'=>'Success','inserted_id'=>$id,"path"=>"http://freeasair.org/frontimg?id=".base64_encode($data['bssid']));
          return array('Status'=>'Success','inserted_id'=>$id,'image_type'=>$imgquery->row()->image_type,"path"=>base_url()."frontimg?id=".base64_encode($data['bssid']));
      
        }
       
         
       
   }

   public function sharerouter($data)
   {
      

        $sql = "SELECT id,email,sim_id,first_name,last_name FROM app_users where device_id = '".$data['device_id']."' order by updated_at desc";
        $query = $this->db->query($sql); 
        if($query->row())
        {
        $id = $query->row()->id;
        $email = $query->row()->email;
        $sim_id = $query->row()->sim_id;

        $checksql = "SELECT id FROM users where email = '".$query->row()->email."'";
        $checkquery = $this->db->query($checksql); 
          if(!$checkquery->row())
          {
               $userarr = array(
                'full_name'=>$query->row()->first_name.' '.$query->row()->last_name,
                'email'=>$query->row()->email,'user_name'=>$query->row()->email,
                'pass_word'=>md5($query->row()->sim_id),
                'app_id'=>$id
              
                );
             
               $this->db->insert('users', $userarr);

          }
  
        }
        else
        {
          $id = 0;
        }
       
        unset($data['device_id']);
         
        $sql_check = "SELECT id,ownerid FROM routers where bssid = '".$data['bssid']."'";
        $query_check = $this->db->query($sql_check); 

        if($query_check->num_rows()=='0')
        {
           if(empty($data['pwd']))
            {
              $owner_type="public_users";
            }
            else{
              $owner_type="app_users";
            }

           $arr = array(
              'ownerid'=>$id,'is_active'=>'1',
              'owner_type'=>$owner_type,
              'created_date'=>date('Y-m-d H:i:s'),'updated_date'=>date('Y-m-d H:i:s')
              );

              $orignal_data = array_merge($data,$arr);

              $this->db->insert('routers', $orignal_data); 

             return array('Status'=>'Success','inserted_id'=>$this->db->insert_id(),'email'=>$email,'password'=>$sim_id,"data"=>"created");
              

        }
        else
        {
             if($id == $query_check->row()->ownerid )
             {
                $uparr = array('bssid' => $data['bssid']); 
                $this->db->where($uparr);

                $arr = array(
                'ownerid'=>$id,
                'updated_date'=>date('Y-m-d H:i:s')
                );
                $orignal_data = array_merge($data,$arr);
                          
                $this->db->update('routers',$orignal_data ); 

                return array('Status'=>'Success','inserted_id'=>$id,'email'=>$email,'password'=>$sim_id,"data"=>"updated");
            
            }
            else
            {
               return array('Status'=>'Success','inserted_id'=>$id,'email'=>$email,'password'=>$sim_id,"data"=>"none");
          
            }

        }

   }


   public function getappusers($deviceid,$mobileno)
   {
        $sql = "SELECT * FROM app_users where device_id = '".$deviceid."' and sim_id = '".$mobileno."' ";
        $query = $this->db->query($sql); 
        if($query->num_rows()!='0')
        {
          return  array('status'=> "Success",'records' => $query->row());

        }
        else
        {
          return  array('status'=> "Failed",'records' => "null");

        }
        


   }

   public function getrouterlimit($pageno)
   {
    if($pageno==0)
    {
         $query = $this->db->query("SELECT * FROM routers ORDER BY sname ASC LIMIT 5 OFFSET ".$pageno );
 
    }
    else
    {
         $query = $this->db->query("SELECT * FROM routers ORDER BY sname ASC LIMIT 2 OFFSET ".$pageno );
 
    }
    return  array('num_rows'=> $query->num_rows(),'results' => $query->result());


   }

   public function getallrouter()
   {
   
     $query = $this->db->query("SELECT * FROM routers ");
     return  array('num_rows'=> $query->num_rows(),'results' => $query->result());


   }

   public function addrating($data)
   {
      $this->db->insert('rating_router', $data); 

      $sql = "SELECT 
                ROUND(avg(rating),0) as avg_rating FROM `rating_router` 
                WHERE router_id = ".$data['router_id']." group by router_id";
     
      $query = $this->db->query($sql);
     
      $avg_rating = $query->row()->avg_rating;
        
       $arr = array('rating'=>$avg_rating); 

       $this->db->where('id', $data['router_id']);
       $this->db->update('routers', $arr);

      return 'success';
  
   }

   public function addcontact($data)
   {

    $this->db->insert('contact_us', $data); 

    return $this->db->insert_id();
  
   }

   public function logs()
   {
    $sql = "select logs.*, routers.sname from logs join routers on routers.id = logs.router_id where router_id != 0";
    $query = $this->db->query($sql);
    return  array('results' => $query->result());
   }

   public function getrouterbyowner($id)
   {
   
     $query = $this->db->query("SELECT * FROM routers where ownerid = ".$id);
     return  array('num_rows'=> $query->num_rows(),'results' => $query->result());


   }

    public function addrouterimage($data)
   {

    $this->db->insert('router_image', $data); 

    return $this->db->insert_id();
  
   }

   public function uploadimg($data,$file,$type)
   {
    
            $arr = array('bssid' => $data['bssid']); 
            $this->db->where($arr);
            $updata = array('image_url'=>$file,'image_type'=>$type);


            $this->db->update('routers',$updata );
            return ;

   }

   public function getallfaq()
   {
      $query = $this->db->query("SELECT * FROM FAQ ");
      return  array('num_rows'=> $query->num_rows(),'results' => $query->result());

   }

   public function editfaq($id)
   {
      $query = $this->db->query("SELECT * FROM FAQ where id = $id");
      return  array('num_rows'=> $query->num_rows(),'results' => $query->row());

   }

   public function updatefaq($data,$id)
     {
     
    
     $this->db->where('id', $id);
     $this->db->update('FAQ', $data);

     return 'ok';
  
     }

     public function addfaqdata($data)
     {

      $this->db->insert('FAQ', $data); 
      return $this->db->insert_id();

     }
     
     public function add_visit_user($data)
     {
	$this->db->insert('ad_usage', $data); 
	return $this->db->insert_id();
     }
    
    public function sms_log_insert($data)
     {
	$this->db->insert('sms_log', $data); 
	return $this->db->insert_id();
     }

}
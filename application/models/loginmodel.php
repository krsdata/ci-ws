<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loginmodel extends CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }

   public function userauthentication($username,$pwd)
   {
 
	$query = $this->db->query("SELECT * FROM users where user_name = '$username' and pass_word = '$pwd' ");
	return  array('num_rows'=> $query->num_rows(),'results' => $query->row());

   }

   public function signup($data)
   {

   	$this->db->insert('users', $data); 

   	return $this->db->insert_id();
 	
   }

   public function checksignup()
   {
   	$query = $this->db->query("SELECT * FROM users");
	 return  array('num_rows'=> $query->num_rows());


   }

   public function addusersapi($data)
   {
      $sql = "SELECT * FROM app_users where sim_id = '".$data['sim_id']."' and device_id = '".$data['device_id']."'";
      $query =  $this->db->query($sql);
      if($query->num_rows() == '0')
      {
        $this->db->insert('app_users', $data); 
        return $this->db->insert_id();
      }
      else
      {
        $arr = array('device_id' => $data['device_id'] ,'sim_id'=>$data['sim_id'] ); 
        unset($data['created_at']);
        $updata = array_merge($data,array('updated_at'=>date('Y-m-d H:i:s')));
        
        $this->db->where($arr);
        $this->db->update('app_users',$updata );
        return 'Success';

      }


      
   }

   public function addlogs($data)
   {
       $sql = "SELECT id FROM routers where bssid = '".$data['bssid']."'";
       $query =  $this->db->query($sql);
     
      if($query->num_rows() != '0')
      {
         $router_id = $query->row()->id;
      }
      else
      {
        $router_id = 0;
      }

      $orignal_data = array_merge($data,array('router_id'=>$router_id,'created_date'=>date('Y-m-d H:i:s')));
      $this->db->insert('logs', $orignal_data); 
      return $this->db->insert_id();

   }

   public function firstaddusers($arr)
   {
      /*  $data = array(
                       'sim_id'=>$arr['simno'],'device_id'=>$arr['deviceid'],'IMEI'=>$arr['imei'],'created_at'=>date('Y-m-d H:i:s')
                     );*/
  		$data = array(
                       'sim_id'=>$arr['simno'],'device_id'=>$arr['deviceid'],'IMEI'=>$arr['imei'],'device_os_version'=>$arr['device_os_version'],
		       'device_model'=>$arr['device_model'],'mac_address'=>$arr['mac_address'],'created_at'=>date('Y-m-d H:i:s')
                     ); 

           $this->db->insert('app_users', $data); 
            return $this->db->insert_id();
       
      

   }

   public function checkexist($deviceid,$simno)
   {
     //$sql = "SELECT * FROM app_users where device_id = '".$deviceid."'";

        $sql = "SELECT * FROM app_users where sim_id ='".$simno."' and device_id = '".$deviceid."'";
    
        $query =  $this->db->query($sql);
        if($query->num_rows() == '0')
        {

          return array('status'=>"not_exist");
          

        }
        else
        {
          return array('status'=>"exist",'id'=>$query->row()->id);

        }

   }

    function checkforentry($data)
   {

      $sql = "SELECT (count(id) < 100) as entry FROM log_msg where ip_address ='".$data['ip_address']."' and  created_date = '".$data['created_date']."'"; 
      $query =  $this->db->query($sql);

      if($query->row()->entry)
       {

         $this->db->insert('log_msg', $data); 
         $this->db->insert_id();
         return array('ip_entry'=>$query->row()->entry);

       }
       else
       {
         return array('ip_entry'=>'0');
       }
      
   }

    function checkfornoentry($data)
    {

      $sql = "SELECT (count(id) < 30) as no_entry FROM log_msg where sim_id ='".$data['sim_id']."' and  created_date = '".$data['created_date']."'"; 
      $query =  $this->db->query($sql);
      
      
      if($query->row()->no_entry)
       {

        return array('no_entry'=>$query->row()->no_entry);

       }
       else
       {
         return array('no_entry'=>'0');
       }
      
    }

    function update_existed_users($data,$deviceid,$num_to_sendmsg)
    {	
	$this->db->where('device_id', $deviceid);
	$this->db->where('sim_id',   $num_to_sendmsg);
	$this->db->update('app_users', $data);
	return true;
    }




}

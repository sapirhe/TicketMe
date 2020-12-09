<?php
class Login_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_costumers()
    {
        $query = $this->db->query("select * from costumers");
        return $query->result_array();
    }
    
    public function set_costumer($data)
    {
        $this->db->db_debug = FALSE; 
        $error=NULL;
        if (!$this->db->insert('costumers', $data)){
            $error=$this->db->error();
        }
            
        return $error;
           
    }
        
    public function auth($data)
    {
       $query = $this->db->query("select * from costumers where user='".$data['user']."' and password='".$data['password']."'");
       if($query){   
                return $query->result_array();
        }
        return false; 
    }
    
}


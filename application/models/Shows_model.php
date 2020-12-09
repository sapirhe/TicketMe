<?php

class Shows_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
   
    function get_center_shows(){
       
        $query = $this->db->query("select * from shows inner join position on shows.hall_name=position.hall_name and area='מרכז'  and CURDATE()<date");
       if($query){   
                return $query->result_array();
        }
        return false; 
    }
    
        function get_north_shows(){
       
        $query = $this->db->query("select * from shows inner join position on shows.hall_name=position.hall_name and area='צפון' and CURDATE()<date");
       if($query){   
                return $query->result_array();
        }
        return false; 
    }
    
        function get_south_shows(){
       
        $query = $this->db->query("select * from shows inner join position on shows.hall_name=position.hall_name and area='דרום' and CURDATE()<date");
       if($query){   
                return $query->result_array();
        }
        return false; 
    }
    function get_show_by_id($show_id){
        $query=$this->db->query("select * from shows inner join position on shows.hall_name=position.hall_name and show_id='".$show_id."'");
        if($query){   
                return $query->result_array();
        }
        return false; 
    }
    function set_purchase($data){
         $this->db->db_debug = FALSE; 
         $this->db->insert('costumerinshow', $data);
    }
    function earlierShows($info){
        $query=$this->db->query("select * from costumerinshow inner join shows on costumerinshow.show_id=shows.show_id inner join costumers on costumerinshow.costumer_number=costumers.customer_number where costumers.customer_number='".$info['user'][0]['customer_number']."'");
        if($query){   
                return $query->result_array();
        }
        return false; 
    }
    function getSumOfPurchases($info){
        $query=$this->db->query("select SUM(price) from costumerinshow inner join shows on costumerinshow.show_id=shows.show_id inner join costumers on costumerinshow.costumer_number=costumers.customer_number where costumers.customer_number='".$info['user'][0]['customer_number']."'");
        if($query){   
                return $query->result_array();
        }
        return false;
    }
    function getHotShows(){
            
            $query = $this->db->query("select * from shows where hot_show='1' and CURDATE()<date");
            return $query->result_array();
        }
    function getRecommendedShows($info){
        $age=floor((time()- strtotime($info['user'][0]['date_of_birth'])) / 31556926);
        $rangeMax=$age+3;
        $rangeMin=$age-3;
        $query=$this->db->query("select * from costumerinshow inner join shows on costumerinshow.show_id=shows.show_id inner join costumers on costumerinshow.costumer_number=costumers.customer_number where NOT customer_number=".$info['user'][0]['customer_number'] ." and CURDATE()<date And FLOOR(DATEDIFF(NOW(), date_of_birth)/365) BETWEEN ".$rangeMin . " AND ". $rangeMax ." GROUP BY shows.show_id  LIMIT 4");
        if($query){   
            return $query->result_array();
        }
        return false; 
    }
    function getBenfit($info){
        $query=$this->db->query("select month(date_of_birth) from costumers where user='".$info['user'][0]['user']."'");
        return $result=$query->result_array();
         
    }
}




<?php
class Management_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function set_hall()
        {
            $this->db->db_debug = FALSE; //disable debugging for queries
             $data = array(
                'hall_name' => $this->input->post('hall_name'),
                'address' => $this->input->post('address'),
                'area' => $this->input->post('area'),
                
            );

            $error=NULL;
            if (!$this->db->insert('position', $data)){
                $error=$this->db->error();
            }
            
            return $error;
           
        }
     public function set_show()
        {
            $this->db->db_debug = FALSE; //disable debugging for queries
            $image=$_FILES['fileToUpload']['tmp_name'];
             $data = array(
                'hall_name'=>$this->input->post('hall_name'),
                'artist_name' => $this->input->post('artist_name'),
                'date' => $this->input->post('date'),
                'time' => $this->input->post('time'),
                'price' => $this->input->post('price'),
                'hot_show' => $this->input->post('hot_show'),
                'img' => file_get_contents(addslashes($image)),
                
            );

            $error=NULL;
            if (!$this->db->insert('shows', $data)){
                $error=$this->db->error();
            }
            
            return $error;
           
        }
        
        public function getHallsNames(){
            
            $query = $this->db->query("select hall_name from position");
            return $query->result_array();
        }
        
        function costumersInfo(){
            $query=$this->db->query("select * from costumers");
            if($query){   
                    return $query->result_array();
            }
            return false; 
    }
        function showsInfo(){
            $query=$this->db->query("select * from shows");
            if($query){   
                    return $query->result_array();
            }
            return false; 
    }
        function hallInfo(){
            $query=$this->db->query("select * from position");
            if($query){   
                    return $query->result_array();
            }
            return false; 
    }
        
        function getStatistics(){
            $query=$this->db->query("select COUNT(costumer_number), costumerinshow.show_id, artist_name, hall_name, date, time FROM costumerinshow inner join shows on costumerinshow.show_id=shows.show_id GROUP BY costumerinshow.show_id ORDER BY COUNT(costumer_number) DESC");
            if($query){   
                    return $query->result_array();
            }
            return false; 
    }
}


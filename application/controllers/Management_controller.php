<?php

class Management_controller  extends CI_Controller {
    //put your code here
     public function __construct()
        {
                parent::__construct();
                $this->load->model('Management_model');
                $this->load->model('Shows_model');
                $this->load->helper('url_helper');
                $this->load->helper('form');
                $this->load->library('session');
        }
         public function management(){
            
            $data['halls_names']=$this->Management_model->getHallsNames();
            $data['title'] = 'Management';
            $data['infoShow']=NULL;
            $data['infoHall']=NULL;
            $data['costumersInfo']=$this->Management_model->costumersInfo();
            $data['showsInfo']=$this->Management_model->showsInfo();
            $data['hallInfo']=$this->Management_model->hallInfo();
            $data['showsStatistics']=$this->Management_model->getStatistics();
            $this->load->view('templates/header', $data);
            $this->load->view('management/statistics',$data);
            $this->load->view('management/addHall',$data);
            $this->load->view('management/addShow',$data);
            $this->load->view('management/showCostumers',$data);
            $this->load->view('templates/footer');

    }
    public function addHallNotes(){
            
            $infoHall=$this->Management_model->set_hall();
            if ($infoHall==NULL){
                    $data['infoHall']=array("message"=>"האולם נוסף בהצלחה");
             }
             else{
                $data['infoHall']= array("message"=>"הוספת האולם לא התבצעה. השגיאה".$infoHall["message"]);
           
             }
            $data['costumersInfo']=$this->Management_model->costumersInfo();
            $data['showsInfo']=$this->Management_model->showsInfo();
            $data['hallInfo']=$this->Management_model->hallInfo();
            $data['showsStatistics']=$this->Management_model->getStatistics();
            $data['halls_names']=$this->Management_model->getHallsNames();
            $data['title'] = 'Management';
            $data['infoShow']=null;
            $this->load->view('templates/header', $data);
            $this->load->view('management/statistics',$data);
            $this->load->view('management/addHall',$data);
            $this->load->view('management/addShow',$data);
            $this->load->view('management/showCostumers',$data);
            $this->load->view('templates/footer');

    }
    
        
    public function addShowNotes(){
            
            $infoShow=$this->Management_model->set_show();
            if ($infoShow==NULL){
                $data['infoShow']=array("message"=>"המופע נוסף בהצלחה");
             }
             else{
                $data['infoShow']= array("message"=>"הוספת המופע לא התבצעה. השגיאה".$infoShow["message"]);
           
             }
            $data['costumersInfo']=$this->Management_model->costumersInfo();
            $data['showsInfo']=$this->Management_model->showsInfo();
            $data['hallInfo']=$this->Management_model->hallInfo();
            $data['showsStatistics']=$this->Management_model->getStatistics();
            $data['halls_names']=$this->Management_model->getHallsNames();
            $data['title'] = 'Management';
            $data['infoHall']=null;
            $this->load->view('templates/header', $data);
            $this->load->view('management/statistics',$data);
            $this->load->view('management/addHall',$data);
            $this->load->view('management/addShow',$data);
            $this->load->view('management/showCostumers',$data);
            $this->load->view('templates/footer');
    }
        
}
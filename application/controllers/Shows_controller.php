<?php

class Shows_controller extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->model('Shows_model');
        $this->load->model('Management_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('session');
    }
    
    function HomePage()
    {
            $user=$this->session->all_userdata();
            if(isset($_SESSION['user'])){
                $data['recommendedShows']=$this->Shows_model->getRecommendedShows($user);
                $result=$this->Shows_model->getBenfit($user);
                if($result[0]['month(date_of_birth)']==date('n'))
                {
                    $data['benefit']=true;
                }
                else
                {
                    $data['benefit']=false;
                }
            }
            else{
                $data['recommendedShows']=null;
                $data['benefit']=null;
            }
            $data['title']='TicketMe';
            $data['user']=$this->session->all_userdata();
            $data['hotShows']=$this->Shows_model->getHotShows();
            $this->load->view('templates/header',$data);
            $this->load->view('pages/HomePage',$data);
            $this->load->view('templates/footer',$data); 
    }
    function Shows()
    {
        $data['title']='Shows';
        $data['center']=$this->Shows_model->get_center_shows();
        $data['north']=$this->Shows_model->get_north_shows();
        $data['south']=$this->Shows_model->get_south_shows();
        $this->load->view('templates/header',$data);
        $this->load->view('pages/Shows',$data);
        $this->load->view('templates/footer',$data); 
    }
    function Artists_search_api()
    {
        $data['title']='Artists search';
        $this->load->view('templates/header',$data);
        $this->load->view('pages/Artists_search_api',$data);
        $this->load->view('templates/footer',$data); 
    }
    function purchase(){
        $show_id=$this->input->get('show_id');
        $query=$this->Shows_model->get_show_by_id($show_id);
        $data['title']='Purchase';
        $data['showInfo']=$query;
        $data['user']=$this->session->all_userdata();
        $this->load->view('templates/header',$data);
        $this->load->view('pages/purchase',$data);
        $this->load->view('templates/footer',$data);
    }
    
    function savePurchase(){
        $purchArray=array(
          'show_id' => $this->input->post('show_id'),
          'costumer_number' => $this->input->post('customer_number'),  
        );
        $this->Shows_model->set_purchase($purchArray);
        $data['title']="Succed";
        $this->load->view('templates/header',$data);
        $this->load->view('pages/purchaseMessage',$data);
        $this->load->view('templates/footer',$data);
    }
   
    function personalArea(){
        $user=$this->session->all_userdata();
        $data['title']="Personal Area";
        $data['user']=$this->session->all_userdata();
        $data['earlierShows']=$this->Shows_model->earlierShows($user);
        $data['sumOfPurchases']=$this->Shows_model->getSumOfPurchases($user);
        $this->load->view('templates/header',$data);
        $this->load->view('pages/personalArea',$data);
        $this->load->view('templates/footer',$data);
    }

    
}


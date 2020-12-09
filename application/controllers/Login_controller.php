<?php
class Login_controller  extends CI_Controller {
    
    //put your code here
     public function __construct()
        {
                parent::__construct();
                $this->load->model('Login_model');
                $this->load->model('Shows_model');
                $this->load->helper('url_helper');
                $this->load->helper('form');
                $this->load->library('session');
        }
            
        
         public function logout()
        {
              $data = array(
               'user',
               'password'          
             );
             $this->session->unset_userdata($data);
             redirect("Shows_controller/HomePage");
                         
        }
        public function auth(){
            $data = array(
               'user' => $this->input->post('user'),
               'password' => md5($this->input->post('password')),
             );
            
            $result=$this->Login_model->auth($data);
            
           if ($result==false){
                $data['error']= array("message"=>"המשתמש לא נמצא");
                $data['user']=NULL;
                $data['recommendedShows']=null;
                $data['benefit']=null;
                $data['title']='TicketMe';
                $data['hotShows']=$this->Shows_model->getHotShows();
                $this->load->view('templates/header',$data);
                $this->load->view('pages/HomePage',$data);
                $this->load->view('templates/footer',$data); 
            }
            else{
                $data['user']=$result;
               $this->session->set_userdata($data); 
               redirect('Shows_controller/HomePage');
              
            } 
        }
        
    public function register(){
            
            $data['title'] = 'Registration';
            $data['info']=NULL;
            $data['user']=NULL;
            $this->load->view('templates/header', $data);
            $this->load->view('login/register',$data);
            $this->load->view('templates/footer');

    }
    public function registerNotes(){
        $validate=$this->validate();
        if($validate==""){
             $gotData = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'user' => $this->input->post('user'),
                'password' => md5($this->input->post('password')),
                'passwordConf' => md5($this->input->post('passwordConf')),
                'city' => $this->input->post('city'),
                'date_of_birth' => $this->input->post('date_of_birth'),
            );
            
            $info=$this->Login_model->set_costumer($gotData);
            
            if ($info==NULL){
                    $data['info']=array("message"=>"1");
             }
             else{
                $data['info']= array("message"=>"הרישום לא צלח. השגיאה: ".$info["message"]);
           
             }
            echo $data['info']['message'];
        }
        else{
            echo $validate;
        }
    }
 
     public function validate(){
         if($_POST){
             $error = "";
            if(!$_POST['first_name'] || !$_POST['last_name'] || !$_POST['phone'] || !$_POST['email'] || !$_POST['user'] || !$_POST['password'] 
                     || !$_POST['passwordConf'] || !$_POST['city'] || !$_POST['date_of_birth']){
                $error.="אין להשאיר שדות ריקים".'<br>';
            }
            if ($_POST['email'] && ! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
               $error .= "האימייל אינו תקין".'<br>';
            }
            if(!preg_match("/^[a-zA-Zא-ת ]*$/",$_POST['first_name'])){
                $error.="השם הפרטי יכול להכיל אותיות בלבד".'<br>';
            }
            if(!preg_match("/^[a-zA-Zא-ת ]*$/",$_POST['last_name'])){
                $error.="שם המשפחה יכול להכיל אותיות בלבד".'<br>';
            }
            if(!preg_match("/^[0-9 ]*$/",$_POST['phone'])){
                $error.="מספר הטלפון יכול להכיל מספרים בלבד".'<br>';
            }
            if($_POST['phone']){
                if(strlen($_POST['phone'])!=10){
                    $error.="מספר הטלפון חייב להכיל 10 ספרות".'<br>';
                }
            }
            if(!preg_match("/^[a-zA-Zא-ת ]*$/",$_POST['city'])){
                $error.="שם העיר יכול להכיל אותיות בלבד".'<br>';
            }
        }
        return $error;
     }  
     
}

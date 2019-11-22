<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class email extends CI_Controller{

    function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->load->view('index');
    }

    public function send() {

    $to = $this->input->post('from');  // User email pass here
    $subject = 'Welcome To Mail blabla';

    $from = 'ravaonirinam749@gmail.com';  // Pass here your mail id

    $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#000000;padding-left:3%"><img src="http://codingmantra.co.in/assets/logo/logo.png" width="300px" vspace=10 /></td></tr>';
    $emailContent .='<tr><td style="height:20px"></td></tr>';

  $data = array (
      'Nom'=> 'nom',
      'Email'=> 'mail',
      'Commentaire'=> 'commentaire',
  );
  $dataString = serialize($data);
   $emailContent .= $this->input->post('$dataString');
   
   // var_dump("Hello Thilde");

    //$emailContent .='<tr><td style="height:20px"></td></tr>';
    //$emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://codingmantra.co.in/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.codingmantra.co.in</a></p></td></tr></table></body></html>";
    $localhosts = array(
        '::1',
        '127.0.0.1',
        'localhost'
    );
    
    $protocol = 'mail';
    if (in_array($_SERVER['REMOTE_ADDR'], $localhosts)) {
        $protocol = 'smtp';
    }
               


    $config['protocol']    = $protocol;
    $config['smtp_host']    = 'ssl://smtp.gmail.com';
    $config['smtp_port']    = '587';
    $config['smtp_timeout'] = '60';

    $config['smtp_user']    = 'ravaonirinam749@gmail.com';    //Important
    $config['smtp_pass']    = 'Thilde??1300';  //Important

    $config['charset']    = 'utf-8';
    $config['wordrap']    = TRUE;
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not 

     
    $this->load->library('email', $config);
    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($emailContent);
    $this->email->send();

    $this->session->set_flashdata('msg',"Mail has been sent successfully");
    $this->session->set_flashdata('msg_class','alert-success');
    redirect('index.php');
    }
}

?> 
<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller{

    function __construct() 
    {    
        $CI =& get_instance();
        parent::__construct();    
    }
    function send()
    {
        if($_POST){
        extract($_POST);
        var_dump($_POST['nom']);
    }
       
     
     
     $this->load->library('phpmailer_lib');


      
    $mail = $this->phpmailer_lib->load();
   

    //$mail->IsSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = 'smtp.gmail.com';
    $mail ->SMTPAuth = true; 
    $mail->Username = 'ravaonirinam749@gmail.com';
    $mail->Password = 'Thilde??1300';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 465;

    $mail->setFrom('lucasramalanjaona@gmail.com', 'natana',0);
    //$mail->addReplyTo('thilde@gmail.com');

    $mail->addAddress('lucasramalanjaona@gmail.com', 'natana');
    $mail->addReplyTo("test@example.com", "thilde");
    
    $mail->isHTML(true);
    $mail->Subject = 'Send mail';

    $mailContent = "<h1>haaaaa </h1>";
    $mail->Body = $mailContent;


    if(!$mail->send()){
        echo 'Message non envoyé';
        echo 'Mail Error:' .$mail->ErrorInfo;
    }else{
        echo 'Message envoyé';
    }
    var_dump('hahah');
    }
}

?> 
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller
{

    private $page = "contacts";

    public function index()
    {
        $this->load->helper('form');

        // load the BotDetect Captcha library and set its parameter
        $this->load->library('botdetect/BotDetectCaptcha', array(
            'captchaConfig' => 'ExampleCaptcha'
        ));

        if ($_POST) {
            // validate the user-entered Captcha code when the form is submitted
            $code = $this->input->post('CaptchaCode');
            $isHuman = $this->botdetectcaptcha->Validate($code);

            if (!$isHuman) {
                $_SESSION['msg'] = '<div class="alert alert-danger text-center">réessayer le code du captcha</div>';
                $this->session->mark_as_flash('msg');
            } else {
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    $this->session->set_flashdata('<div class="alert alert-danger text-center">donnez une adresse email valide</div>');
                }else{
                    $this->send();
                }
            }
        }


        // make Captcha Html accessible to View code
        $data['captchaHtml'] = $this->botdetectcaptcha->Html();

        $data['page'] = $this->page;
        $this->load->view('contact-us', $data);
    }


    public function send2(){

        if (isset($_POST) && !empty($_POST)) {


            if (mail("nkaurelien@gmail.com",'Contact sur YAOUNDEIMMOBILIER - '.$_POST['sujet'] , $_POST['message'] ) ) {

                $_SESSION['msg'] = '<div class="alert alert-success text-center">correspondance envoyée</div>';
                $this->session->mark_as_flash('msg');

            } else {
                $_SESSION['msg'] = '<div class="alert alert-danger text-center">correspondance non envoyée</div>';
                $this->session->mark_as_flash('msg');
            }

        }
        unset($_POST);
        redirect('contact');
    }


    public function send()
    {

        if (isset($_POST) && !empty($_POST)) {

            $this->load->library('email');

            $data = $this->input->post(NULL, TRUE);

            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/smtppush -t -i -f info@xn--yaoundimmobilier-gqb.com';//'/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;


            $this->email->from($data['email'], $data['noms']);
            $this->email->to('nkaurelien@gmail.com');
//            $this->email->to('m_ithra@yahoo.fr');
//            $this->email->cc('nkaurelien@gmail.com');
//        $this->email->bcc('them@their-example.com');

            $this->email->subject('Contact sur YAOUNDEIMMOBILIER - '.$data['sujet'] );
            $this->email->message($data['message']);

            $this->email->initialize($config);


                if ($this->email->send()) {

                    $_SESSION['msg'] = '<div class="alert alert-success text-center">correspondance envoyée</div>';
                    $this->session->mark_as_flash('msg');

                } else {
                    $_SESSION['msg'] = '<div class="alert alert-danger text-center">correspondance non envoyée</div>';
                    $this->session->mark_as_flash('msg');
                }



        }
        unset($_POST);
        redirect('contact');
    }

}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/chat_model');
    }

    public function index() {
        redirect('users/chatboard');
    }


    public function logout() {
        if($this->user->logoutUser($this->email)) {
            $this->session->sess_destroy();
            $this->db->cache_delete_all();
            redirect('/');            
        }
    }

    public function change_password() {
        $passArray = array(
            'oldpass' => $this->input->post('old-password'),
            'newpass' => $this->input->post('new-password'),
            'conpass' => $this->input->post('confirm-password')
        );
        $changedPass = $this->user->changePassword($passArray);
        if ($changedPass === 'invalid') {
            $dataMessage = array('status' => 'error', 'message' => 'Wrong Old Password');
        } else if ($changedPass === 'not matched') {
            $dataMessage = array('status' => 'error', 'message' => 'New and Confirm Password does not match');
        } else if ($changedPass === true){
            $dataMessage = array('status' => 'success', 'message' => 'Password Updated');
        }
        echo json_encode($dataMessage);
    }



    public function profile($email=null) {
        if (!$email) {
            redirect('users/chatboard');
        } else {
            $this->data['emailValid'] = $this->user->getUserByEmail($email);
            $this->load_view('pages/profile', 'Profile of '.$email.'');            
        }

    }
    
}

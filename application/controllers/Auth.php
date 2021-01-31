<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_Model');
    }

    public function index()
    {
        if ($this->session->userdata('masuk') == TRUE) {
            redirect(base_url('Dasboard'));
        } else {
            $data['title'] = "Login";
            $this->load->view('login_admin/index', $data);
        }
    }

    public function authentication()
    {
        $username = htmlspecialchars($this->input->post('username'));
        $password = htmlspecialchars(md5($this->input->post('password')));

        $login = $this->Auth_Model->getUser($username, $password);

        if (empty($login)) {
            echo json_encode(array("status" => FALSE));
        } else {

            echo json_encode(array("status" => TRUE));

            $this->session->set_userdata('masuk', TRUE);
            $this->session->set_userdata('ses_user', $login->username);
        }
    }

    public function logout()
    {
        if ($this->session->userdata('masuk') == TRUE) {
            redirect(base_url('Dasboard'));
        } else {
            $this->session->sess_destroy();
            $url = base_url('Auth');
            redirect($url);
        }
        
    }

    public function logoutAdmin() {
        $this->session->sess_destroy();
        $url = base_url();
        redirect($url);
    }
}

<?php
class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function login() {
        $this->load->view('login');
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('login');  // Adjust this if your login route differs
    }

    public function process_login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($this->User_model->validate_user($email, $password)) {
            $this->session->set_userdata('logged_in', true);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('login_error', 'Invalid email or password');
            redirect('auth/login');
        }
    }
}

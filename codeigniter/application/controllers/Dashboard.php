<?php
class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Trip_model');
        // Ensure the user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['users'] = $this->User_model->get_all_users();
        $data['trips'] = $this->Trip_model->get_all_trips();
        $this->load->view('dashboard', $data);
    }

    public function add_user() {
        $data = $this->input->post();
        $this->User_model->add_user($data);
        redirect('dashboard');
    }

    public function update_user($id) {
        $data = $this->input->post();
        $this->User_model->update_user($id, $data);
        redirect('dashboard');
    }

    public function delete_user($id) {
        $this->User_model->delete_user($id);
        redirect('dashboard');
    }

    // Trip methods
    public function add_trip() {
        $data = $this->input->post();
        $this->Trip_model->add_trip($data);
        redirect('dashboard');
    }

    public function update_trip($id) {
        $data = $this->input->post();
        $this->Trip_model->update_trip($id, $data);
        redirect('dashboard');
    }

    public function delete_trip($id) {
        $this->Trip_model->delete_trip($id);
        redirect('dashboard');
    }
}

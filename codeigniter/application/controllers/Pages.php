<?php
class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Trip_model');
    }

    public function index() {
        $data['trips'] = $this->Trip_model->get_all_trips();
        $this->load->view('index', $data);
    }
}

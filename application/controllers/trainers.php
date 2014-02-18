<?php

class Trainers extends CI_Controller {

    public function __construct() {
        parent::__construct();

    }
    
    private function index($data, $page) {  
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }
    
    public function home() {
        $data['title'] = 'Trainer Home';

        $this->index($data, 'trainer_home');
    }
}


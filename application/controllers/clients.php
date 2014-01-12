<?php

class Clients extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('clients_model');
        $this->load->library('encrypt');
        $this->load->helper('string');
        $this->load->helper('form');
        $this->load->library('email');
    }

    public function index($data) {
        $data['title'] = 'Home';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer');
    }

    public function register() {

        $reference = $this->input->post('fname') + random_string('numeric', 5);

        $encriptRef = $this->encrypt->encode($reference);

        $dbData = array(
            'firstName' => $this->input->post('fname'),
            'lastName' => $this->input->post('lname'),
            'address' => $this->input->post('address'),
            'dateOfBirth' => $this->input->post('dateofbirth'),
            'phoneNumber' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'ref' => $encriptRef
        );

        if ($this->clients_model->set_clients($dbData)) {
            $data['register'] = true;
            $this->registerEmail($this->input->post('email'), $reference);
            $this->index($data);
        } else {
            $data['register'] = "Unable to register you please try again.\n" +
                    "If this problem continues please contact an administrator";
            $this->index($data);
        }
    }

    private function registerEmail($clientEmail, $refCode) {
        $this->email->from('admin@plymotion.gov.uk', 'Admin');
        $this->email->to($clientEmail);

        $this->email->subject('Confirmation Email');
        $this->email->message('Hello and welcome to the Plymotion scheme.\n'
                . 'Please follow the link below to confirm your email.\n'
                . '<a href="http://localhost/plymotion">Activate Email</a>'
                . 'Once you have activated your account with the link above you '
                . 'will be able to login using the reference code below\n'
                . $refCode);

        $this->email->send();
    }
}

<?php

class Clients extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $emailConfig = Array(
            'protocol' => 'mail',
            'charset' => "utf-8",
            'mailtype' => 'html',
            'newline' => '\r\n'
        );

        $this->load->model('clients_model');
        $this->load->library('encrypt');
        $this->load->helper('string');
        $this->load->helper('form');
        $this->load->library('email', $emailConfig);
    }

    public function index($data) {
        $data['title'] = 'Home';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer');
    }

    public function register() {

        if ($this->dupeCheck($this->input->post('email'))) {
            $data['register'] = 'false';
            $data['regError'] = 'This email has already been used.\n '
                    . 'Please try again with another email';
            $this->index($data);
        } else {

            $reference = $this->input->post('fname') . random_string('numeric', 5);

            $encriptRef = $this->encrypt->encode($reference);

            $clientData = array(
                'firstName' => $this->input->post('fname'),
                'lastName' => $this->input->post('lname'),
                'address' => $this->input->post('address'),
                'dateOfBirth' => date('Y-m-d', strtotime($this->input->post('dateofbirth'))),
                'phoneNumber' => $this->input->post('phone'),
                'mobileNumber' => $this->input->post('mobile'),
                'email' => $this->input->post('email')
            );

            if ($this->clients_model->set_clients($clientData)) {
                $clientData = $this->clients_model->get_clients_email($this->input->post('email'));
                $loginData = array(
                    'userID' => $clientData->userID,
                    'reference' => $encriptRef
                );
                $this->clients_model->set_clients_login($loginData);

                $data['register'] = 'true';
                $this->registerEmail($this->input->post('email'), $reference, $clientData->userID);
                $this->index($data);
            } else {
                $data['register'] = 'false';
                $data['regError'] = "Unable to register you please try again.\n"
                        . "If this problem continues please contact an administrator";
                $this->index($data);
            }
        }
    }

    public function activateAccount($userID) {
        $clientData = $this->clients_model->get_client_login($userID);

        if ($clientData->verified === '0') {
            $this->clients_model->activate_client($userID);
            $data['activate'] = 'true';
            $this->index($data);
        } else {
            $data['activate'] = 'false';
            $data['actMessage'] = 'Your account is already acctivate.';
            $this->index($data);
        }
    }

    private function dupeCheck($email) {
        $clients = $this->clients_model->get_clients();

        foreach ($clients as $client) {
            if ($client['email'] === $email) {
                return true;
            }
        }

        return false;
    }

    private function registerEmail($clientEmail, $refCode, $clientID) {
        $this->email->from('admin@plymotion.com', 'Admin');
        $this->email->to($clientEmail);

        $this->email->subject('Confirmation Email');
        $this->email->message('Hello and welcome to the Plymotion scheme.<br/>'
                . 'Please follow the link below to confirm your email.<br/>'
                . '<a href="http://localhost/plymotion/activate/' . $clientID . '">Activate Email</a><br/><br/>'
                . 'Once you have activated your account with the link above you '
                . 'will be able to login using the reference code below<br/>'
                . $refCode);

        $this->email->send();
    }

}
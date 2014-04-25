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
        $this->load->model('news_model');
        $this->load->model('courses_model');
        $this->load->model('venues_model');
        $this->load->model('instructors_model');

        $this->load->helper('string');

        $this->load->library('encrypt');
        $this->load->library('email', $emailConfig);
    }

    public function index($data) {
        $data['title'] = 'Home';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer');
    }

    public function userProfile($userID) {
        $user = $this->clients_model->get_clients($userID);
        $data['user'] = $user;

        if ($this->session->userdata('auth') === "user") {
            $data['title'] = 'Your Profile';

            $this->load->view('templates/header', $data);
            $this->load->view('pages/client/client_profile', $data);
            $this->load->view('templates/footer');
        } else if ($this->session->userdata('auth') === "admin") {
            $data['title'] = $user->firstName . " " . $user->lastName . "'s Profile";
            $bookings = $this->courses_model->get_clientBookings($userID);
            $data['bookings'] = $bookings;
            $data['locations'] = $this->venues_model->get_locations();
            $data['venues'] = $this->venues_model->get_venues();
            $data['instructors'] = $this->instructors_model->get_instructors();

            $this->load->view('templates/header', $data);
            $this->load->view('pages/admin/adminAffix');
            $this->load->view('pages/client/client_profile', $data);
            $this->load->view('templates/footer');
        } else {
            $data['title'] = "Home";
            $data['authCheck'] = "false";
            $data['authMessage'] = "You are not authorised to view that page";

            $this->load->view('templates/header', $data);
            $this->load->view('pages/home', $data);
            $this->load->view('templates/footer');
        }
    }
    

    public function viewNews() {
        $data['title'] = 'News';
        $data['news'] = $this->news_model->get_newsTop3();

        $this->load->view('templates/header', $data);
        $this->load->view('pages/news', $data);
        $this->load->view('templates/footer');
    }

    public function userBookings() {
        $data['title'] = 'My Bookings';

        $userID = $this->session->userdata('userID');
        $bookings = $this->courses_model->get_clientBookings($userID);
        $courseID = "0";
        foreach ($bookings as $booking) {
            $courseID = $booking['courseID'];
        }

        if ($courseID != "0") {
            $course = $this->courses_model->get_courses(null, $courseID);
            $data['course'] = $course;
            $data['altVenue'] = $this->courses_model->get_altVenue($course->altVenuID);
        }

        $data['sessions'] = $bookings;

        $this->load->view('templates/header', $data);
        $this->load->view('pages/client/client_bookings', $data);
        $this->load->view('templates/footer');
    }

    public function register() {

        if ($this->dupeCheck($this->input->post('email'))) {
            $data['register'] = 'false';
            $data['regMessage'] = 'This email has already been used.\n '
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
                $data['regMessage'] = "Thank you for registering.\n"
                        . "You will receive an email shortly to allow you to confirm your email.\n"
                        . "This email will also contain your reference code";
                $this->registerEmail($this->input->post('email'), $reference, $clientData->userID);
                $this->index($data);
            } else {
                $data['register'] = 'false';
                $data['regMessage'] = "Unable to register you please try again.\n"
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
            $data['actMessage'] = "Your account is now activated.\n"
                    . "Please login to continue.";
            $this->index($data);
        } else {
            $data['activate'] = 'false';
            $data['actMessage'] = 'Your account is already acctivate.';
            $this->index($data);
        }
    }

    public function retrieveDetails() {
        $email = $this->input->post('email');

        $clientData = $this->clients_model->get_clients_email($email);

        if ($clientData != null) {
            $fullClientData = $this->clients_model->get_client_login($clientData->userID);
            $decodeRef = $this->encrypt->decode($fullClientData->reference);
            $name = $fullClientData->firstName . ' ' . $fullClientData->lastName;
            $this->sendDetails($email, $decodeRef, $name);
            $data['retrieveDetails'] = 'true';
            $data['retMessage'] = 'Your details will be sent out to you by email';
            $this->index($data);
        } else {
            $data['retrieveDetails'] = 'false';
            $data['retMessage'] = 'This email was not found';
            $this->index($data);
        }
    }

    public function resendEmail() {
        $email = $this->input->post('email');

        $clientData = $this->clients_model->get_clients_email($email);

        if ($clientData != null) {
            $fullClientData = $this->clients_model->get_client_login($clientData->userID);
            $decodeRef = $this->encrypt->decode($fullClientData->reference);
            $this->registerEmail($email, $decodeRef, $fullClientData->userID);
            $data['resendEmail'] = 'true';
            $data['reMessage'] = 'Your activation email has been resent to you';
            $this->index($data);
        } else {
            $data['resendEmail'] = 'false';
            $data['reMessage'] = 'This email was not found';
            $this->index($data);
        }
    }

    public function editUserBasic() {
        $userID = $this->input->post('userID');
        $data = array(
            'firstName' => $this->input->post('firstname'),
            'lastName' => $this->input->post('surname'),
            'address' => $this->input->post('address'),
            'dateOfBirth' => date('Y-m-d', strtotime($this->input->post('dob'))),
            'phoneNumber' => $this->input->post('phone'),
            'mobileNumber' => $this->input->post('mobile'),
            'email' => $this->input->post('email')
        );

        $this->clients_model->update_details($data, $userID);

        $this->userProfile($userID);
    }

    public function editUserAdditional() {
        $userID = $this->input->post('userID');
        $user = $this->clients_model->get_clients($userID);
        $data = array(
            'ecName' => $this->input->post('ecname'),
            'ecRelationship' => $this->input->post('ecrelation'),
            'ecMobileNo' => $this->input->post('ecmobile'),
            'ecPhoneNo' => $this->input->post('ecphone'),
            'medicalConditions' => $this->input->post('medCond'),
            'medicalDetails' => $this->input->post('medDetails')
        );

        if ($user->newClient === "1") {
            $this->clients_model->update_additional_details($data, $userID, TRUE);
        } else {
            $this->clients_model->update_additional_details($data, $userID);
        }

        $this->userProfile($userID);
    }

    public function addBooking() {
        $bookingData = array(
            'sessionID' => $this->input->post('optionsRadio'),
            'userID' => $this->input->post('userID')
        );

        $this->courses_model->set_booking($bookingData);

        $this->userProfile($this->input->post('userID'));
    }

    public function newSession() {
        $date = strtotime($this->input->post('date'));
        $start = strtotime($this->input->post('start'));
        $end = strtotime($this->input->post('end'));
        if ($date === false && $start === false && $end === false) {
            $date = date("m-d-Y");
            $start = date("H:i:s");
            $end = date("H:i:s");
        } else {
            $date = date("Y-m-d", $date);
            $start = date("H:i:s", $start);
            $end = date("H:i:s", $end);
        }

        $sessionData = array(
            'locationID' => $this->input->post('venuelocation'),
            'level' => $this->input->post('level'),
            'date' => $date,
            'startTime' => $start,
            'endTime' => $end,
            'instructorID' => $this->input->post('instructor'),
            'assistantID' => $this->input->post('assistant')
        );

        $sessionID = $this->courses_model->set_session($sessionData);

        $this->addBooking2($sessionID, $this->input->post('userID'));

        $this->userProfile($this->input->post('userID'));
    }

    private function addBooking2($sessionID, $userID) {
        $bookingData = array(
            'sessionID' => $sessionID,
            'userID' => $userID
        );

        $this->courses_model->set_booking($bookingData);
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

    private function sendDetails($clientEmail, $refCode, $name) {
        $this->email->from('admin@plymotion.com', 'Admin');
        $this->email->to($clientEmail);

        $this->email->subject('Your Login Details');
        $this->email->message('Hello ' . $name . '<br/><br/>'
                . 'Your reference code is ' . $refCode);

        $this->email->send();
    }

}

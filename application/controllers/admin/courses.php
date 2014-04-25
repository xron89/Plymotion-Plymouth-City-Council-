<?php

class Courses extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('venues_model');
        $this->load->model('courses_model');
        $this->load->model('instructors_model');
        $this->load->model('clients_model');
    }

    public function index($data, $page) {
        if ($this->authCheck()) {
            $data['title'] = "Home";
            $data['authCheck'] = "false";
            $data['authMessage'] = "You are not authorised to view that page";

            $this->load->view('templates/header', $data);
            $this->load->view('pages/home', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('pages/admin/adminAffix');
            $this->load->view('pages/admin/' . $page, $data);
            $this->load->view('templates/footer');
        }
    }

    public function venueManagment($error = null) {
        $data['title'] = 'Venue Managment';
        $data['venues'] = $this->venues_model->get_venues();

        if ($error != null) {
            $data['errorMessage'] = $error;
        }

        $this->index($data, 'venue_managment');
    }

    public function sessionManagment($status = "active", $error = null) {
        $data['title'] = 'Session Managment';
        $data['sessions'] = $this->courses_model->get_sessions($status);
        $data['venues'] = $this->venues_model->get_venues();
        $data['instructors'] = $this->instructors_model->get_instructors();

        if ($error != null) {
            $data['errorMessage'] = $error;
        }

        $this->index($data, 'session_managment');
    }

    public function courseManagment($status = "active", $error = null) {
        $data['title'] = 'Course Managment';
        $data['courses'] = $this->courses_model->get_courses($status);

        if ($error != null) {
            $data['errorMessage'] = $error;
        }

        $this->index($data, 'course_managment');
    }

    public function newVenue() {
        $venueData = array(
            'name' => $this->input->post('name'),
            'opening' => $this->input->post('opening'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'website' => $this->input->post('website', TRUE),
            'mapLink' => $this->input->post('mapLink', TRUE)
        );

        $venueID = $this->venues_model->set_venues($venueData);

        $venueFacilitesData = array(
            'venueID' => $venueID,
            'toilets' => $this->input->post('toilets'),
            'bikePark' => $this->input->post('bikePark'),
            'changing' => $this->input->post('changing'),
            'lockers' => $this->input->post('lockers'),
            'carPark' => $this->input->post('carPark'),
            'refreshments' => $this->input->post('refreshments')
        );

        $this->venues_model->set_venueFacilites($venueFacilitesData);

        $this->venueManagment();
    }

    public function manageVenues() {
        $action = $this->input->post('action');
        $selected = $this->input->post('selected');

        if ($selected == null) {
            $error = "Please select one entry or use the bulk delete option.";
            $this->venueManagment($error);
        } else {
            $venueID = $selected[0];

            if ($action === "edit") {
                $this->venueProfile($venueID, null);
            } else {
                $this->venues_model->delete_venues($venueID);
                $this->venues_model->delete_venueFacilites($venueID);
                $this->venues_model->delete_venueLocations($venueID);

                $this->venueManagment();
            }
        }
    }

    public function editVenue() {
        $venueID = $this->input->post('venueID');

        $venueData = array(
            'name' => $this->input->post('name'),
            'opening' => $this->input->post('opening'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'website' => $this->input->post('website', TRUE),
            'mapLink' => $this->input->post('mapLink', TRUE)
        );

        $this->venues_model->update_venues($venueData, $venueID);

        $venueFacilitesData = array(
            'toilets' => $this->input->post('toilets'),
            'bikePark' => $this->input->post('bikePark'),
            'changing' => $this->input->post('changing'),
            'lockers' => $this->input->post('lockers'),
            'carPark' => $this->input->post('carPark'),
            'refreshments' => $this->input->post('refreshments')
        );

        $this->venues_model->update_venueFacilites($venueFacilitesData, $venueID);

        $this->venueProfile($venueID, null);
    }

    public function addLocation() {
        $locationData = array(
            'venueID' => $this->input->post('venueID'),
            'name' => $this->input->post('name')
        );

        $this->venues_model->set_venueLocations($locationData);

        $this->venueProfile($this->input->post('venueID', null));
    }

    public function deleteLocation() {
        $selected = $this->input->post('selected');
        $venueID = $this->input->post('venueID');

        if (sizeof($selected) > 1) {
            $data['errorMessage'] = "Please select one entry or use the bulk delete option.";
            $this->venueProfile($venueID, $data);
        } else {
            $locationID = $selected[0];
            $this->venues_model->delete_venueLocation($locationID);
            $this->venueProfile($venueID, null);
        }
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

        $this->courses_model->set_session($sessionData);

        $this->sessionManagment();
    }

    public function editSession() {
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

        $this->courses_model->update_session($sessionData, $this->input->post('sessionID'));

        $this->sessionProfile($this->input->post('sessionID'));
    }

    public function venueLocations($venueID) {
        $data = $this->venues_model->get_venueLocations($venueID);
        if (sizeof($data) > 0) {
            foreach ($data as $item) {
                echo "<option value=$item[locationID]>$item[name]</option>";
            }
        } else {
            echo "<option value=0>No Locations</option>";
        }
    }

    public function manageSessions() {
        $action = $this->input->post('action');
        $selected = $this->input->post('selected');

        if ($selected == null) {
            $error = "Please select one entry or use the bulk delete option.";
            $this->sessionManagment("active", $error);
        } else {
            $sessionID = $selected[0];

            if ($action === "edit") {
                $this->sessionProfile($sessionID);
            } else {
                $this->courses_model->delete_session($sessionID);

                $this->sessionManagment();
            }
        }
    }

    public function clientSearch($name) {
        $foundClients = $this->clients_model->get_clientsSearch($name);

        if (sizeof($foundClients) > 0) {
            echo '<table class="table">';
            echo "<tr>";
            echo "<th></th>";
            echo "<th>Name</th>";
            echo "</tr>";
            foreach ($foundClients as $client) {
                echo "<tr>";
                echo '<td><input type="radio" name="optionsRadio" id="optionsRadio' . $client['userID'] . '" value="' . $client['userID'] . '"></td>';
                echo "<td>" . $client['firstName'] . " " . $client['lastName'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No Clients Found";
        }
    }

    public function sessionSearch($firstdate, $seconddate) {
        $firstdate = strtotime($firstdate);
        $seconddate = strtotime($seconddate);

        $firstdate = date("Y-m-d", $firstdate);
        $seconddate = date("Y-m-d", $seconddate);

        $foundSessions = $this->courses_model->sessionSearch($firstdate, $seconddate);

        if (sizeof($foundSessions) > 0) {
            echo '<table class="table">';
            echo "<tr>";
            echo "<th></th>";
            echo "<th>Session No.</th>";
            echo "<th>Location</th>";
            echo "<th>Date.</th>";
            echo "<th>Start Time.</th>";
            echo "<th>End Time.</th>";
            echo "</tr>";
            foreach ($foundSessions as $session) {
                echo "<tr>";
                echo '<td><input type="radio" name="optionsRadio" id="optionsRadio' . $session['sessionID'] . '" value="' . $session['sessionID'] . '"></td>';
                echo "<td>" . $session['sessionID'] . "</td>";
                echo "<td>" . $session['name'] . "</td>";
                echo "<td>" . $session['date'] . "</td>";
                echo "<td>" . $session['startTime'] . "</td>";
                echo "<td>" . $session['endTime'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No Sessions Found </br></br>";
        }
    }

    public function manageBookings() {
        if ($this->input->post('action') === "add") {
            $bookingData = array(
                'userID' => $this->input->post('optionsRadio'),
                'sessionID' => $this->input->post('sessionID')
            );

            $this->courses_model->set_booking($bookingData);
        } else {
            $selected = $this->input->post('selected');
            $userID = $selected[0];
            $sessionID = $this->input->post('sessionID');
            $this->courses_model->delete_booking($userID, $sessionID);
        }

        $this->sessionProfile($this->input->post('sessionID'));
    }

    private function venueProfile($venueID, $data) {
        $data['title'] = 'Edit Venue';
        $data['venue'] = $this->venues_model->get_venues($venueID);
        $data['venueLocations'] = $this->venues_model->get_venueLocations($venueID);

        $this->index($data, 'venue_profile');
    }

    private function sessionProfile($sessionID, $data = null) {
        $data['title'] = 'Edit Session';
        $session = $this->courses_model->get_sessions(null, $sessionID);
        $data['session'] = $session;
        $data['venues'] = $this->venues_model->get_venues();
        $data['venue'] = $this->venues_model->get_venues($session->venueID);
        $data['venuelocations'] = $this->venues_model->get_venueLocations($session->venueID);
        $data['bookings'] = $this->courses_model->get_bookings($session->sessionID);
        $data['instructors'] = $this->instructors_model->get_instructors();

        if ($session->instructorID != "0") {
            $data['instructor'] = $this->instructors_model->get_instructors($session->instructorID);
        }

        if ($session->assistantID != "0") {
            $data['assistant'] = $this->instructors_model->get_instructors($session->instructorID);
        }


        $this->index($data, 'session_profile');
    }

    private function authCheck() {
        if ($this->session->userdata('logged_in')) {
            if ($this->session->userdata('auth') != "admin" || $this->session->userdata('auth') != "instructor") {
                return false;
            }
        }
        return true;
    }

}

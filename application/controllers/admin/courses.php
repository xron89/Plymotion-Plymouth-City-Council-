<?php

class Courses extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('venues_model');
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

    public function venueManagment() {
        $data['title'] = 'Venue Managment';
        $data['venues'] = $this->venues_model->get_venues();

        $this->index($data, 'venue_managment');
    }

    public function newVenue() {
        $data['title'] = 'Venue Managment';
        $page = 'venue_managment';

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

        $data['venues'] = $this->venues_model->get_venues();

        $this->index($data, $page);
    }

    public function manageVenues() {
        $action = $this->input->post('action');
        $selected = $this->input->post('selected');
        $data['title'] = 'Venue Managment';
        $data['venues'] = $this->venues_model->get_venues();

        if (sizeof($selected) > 1) {     
            $data['errorMessage'] = "Please select one entry or use the bulk delete option.";
            $this->index($data, 'venue_managment');
        } else {
            $venueID = $selected[0];
            
            if ($action === "edit") {
                $this->venueProfile($venueID, null);
            } else {
                $this->venues_model->delete_venues($venueID);
                $this->venues_model->delete_venueFacilites($venueID);
                $this->venues_model->delete_venueLocations($venueID);
                
                $this->index($data, 'venue_managment');
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
            $this->venueProfile($this->input->post('venueID'), $data);
        } else {
            $locationID = $selected[0];
            $this->venues_model->delete_venueLocation($locationID);
            $this->venueProfile($this->input->post('venueID'), null);
        }       
    }
    
    private function venueProfile($venueID, $data) {
        $data['title'] = 'Edit Venue';
        $data['venue'] = $this->venues_model->get_venues($venueID);
        $data['venueLocations'] = $this->venues_model->get_venueLocations($venueID);
                
        $this->index($data, 'venue_profile');
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


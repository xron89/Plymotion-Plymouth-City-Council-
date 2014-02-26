<?php

class Venues_Model extends CI_Model {
    public function get_venues($venueID = FALSE) {

        if ($venueID === FALSE) {
            $this->db->select('*');
            $this->db->from('venues');
            $this->db->join('venuefacilites', 'venues.venueID = venuefacilites.venueID');
            $query = $this->db->get();

            return $query->result_array();
        }

        $this->db->select('*');
        $this->db->from('venues');
        $this->db->join('venuefacilites', 'venue.venueID = venuefacilites.venueID');
        $this->db->where('venue.venueID', $venueID);
        $query = $this->db->get();

        return $query->row();
    }
    
    public function get_venueLocations($locationID = FALSE) {
        if ($locationID === FALSE) {
            $this->db->select('*');
            $this->db->from('venuelocations');
            $this->db->join('venues', 'venue.venueID = venuelocations.venueID');
            $query = $this->db->get();

            return $query->result_array();
        }

        $this->db->select('*');
        $this->db->from('venuelocations');
        $this->db->join('venues', 'venue.venueID = venuelocations.venueID');
        $this->db->where('venuelocations.locationID', $locationID);
        $query = $this->db->get();

        return $query->row();
    }
    
    public function set_venues($data) {
        $this->db->insert('venues', $data);
        return $this->db->insert_id();
    }
    
    public function update_venues($data) {
        
    }
    
    
    public function delete_venues($venueID) {
        
    }
    
    public function set_venueFacilites($data) {
        $this->db->insert('venuefacilites', $data);      
        return true;
    }
    
    public function update_venueFacilites($data) {
        
    }
    
    
    public function delete_venueFacilites($venueID) {
        
    }
    
    public function set_venueLocations() {
        $this->db->insert('venuelocations', $data);      
        return true;
    }
    
    public function update_venueLocations($data) {
        
    }
    
    
    public function delete_venueLocations($locationID) {
        
    }
}


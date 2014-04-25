<?php

class Venues_Model extends CI_Model {

    public function get_venues($venueID = FALSE) {

        if ($venueID === FALSE) {
            $this->db->select('*');
            $this->db->from('venues');
            $this->db->join('venuefacilites', 'venues.venueID = venuefacilites.venueID');
            $this->db->order_by("name", "asc");
            $query = $this->db->get();

            return $query->result_array();
        }

        $this->db->select('*');
        $this->db->from('venues');
        $this->db->join('venuefacilites', 'venues.venueID = venuefacilites.venueID');
        $this->db->where('venues.venueID', $venueID);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_venueLocations($venueID) {

        $this->db->select('*');
        $this->db->from('venuelocations');
        $this->db->where('venuelocations.venueID', $venueID);
        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function get_locations() {
        $this->db->select('*');
        $this->db->from('venuelocations');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function count_venues() {
        return $this->db->count_all('venues');
    }

    public function set_venues($data) {
        $this->db->insert('venues', $data);
        return $this->db->insert_id();
    }

    public function update_venues($data, $venueID) {
        $this->db->where('venueID', $venueID);
        $this->db->update('venues', $data);
    }

    public function delete_venues($venueID) {
        $this->db->delete('venues', array('venueID' => $venueID));
    }

    public function set_venueFacilites($data) {
        $this->db->insert('venuefacilites', $data);
        return true;
    }

    public function update_venueFacilites($data, $venueID) {
        $this->db->where('venueID', $venueID);
        $this->db->update('venuefacilites', $data);
    }

    public function delete_venueFacilites($venueID) {
        $this->db->delete('venuefacilites', array('venueID' => $venueID));
    }

    public function set_venueLocations($data) {
        $this->db->insert('venuelocations', $data);
        return true;
    }

    public function update_venueLocations($data, $locationID) {
        $this->db->where('locationID', $locationID);
        $this->db->update('venuelocations', $data);
    }

    public function delete_venueLocation($locationID) {
        $this->db->delete('venuelocations', array('locationID' => $locationID));
    }

    public function delete_venueLocations($venueID) {
        $this->db->delete('venuelocations', array('venueID' => $venueID));
    }

}

<?php

class Courses_Model extends CI_Model {

    public function get_sessions($status, $sessionID = FALSE) {
        $currentDate = date("Y-m-d");

        if ($sessionID === FALSE) {
            if ($status == "active") {
                $this->db->select('*');
                $this->db->from('sessions');
                $this->db->join('sessionplans', 'sessions.sessionID = sessionplans.sessionID');
                $this->db->join('venuelocations', 'sessions.locationID = venuelocations.locationID');
                $this->db->where('sessions.date >=', $currentDate);
                $this->db->order_by("date", "asc");
                $query = $this->db->get();

                return $query->result_array();
            } else {
                $this->db->select('*');
                $this->db->from('sessions');
                $this->db->join('sessionplans', 'sessions.sessionID = sessionplans.sessionID');
                $this->db->join('venuelocations', 'sessions.locationID = venuelocations.locationID');
                $this->db->where('sessions.date <', $currentDate);
                $this->db->order_by("date", "asc");
                $query = $this->db->get();

                return $query->result_array();
            }
        }

        $this->db->select('*');
        $this->db->from('sessions');
        $this->db->join('sessionplans', 'sessions.sessionID = sessionplans.sessionID');
        $this->db->where('sessions.sessionID', $sessionID);
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

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
        $this->db->join('venuelocations', 'sessions.locationID = venuelocations.locationID');
        $this->db->where('sessions.sessionID', $sessionID);
        $query = $this->db->get();

        return $query->row();
    }

    public function set_session($data) {
        $this->db->insert('sessions', $data);
        $sessionID = $this->db->insert_id();
        $planData = array(
            'sessionID' => $sessionID
        );
        $this->db->insert('sessionplans', $planData);
        return true;
    }
    
    public function delete_session($sessionID) {
        $this->db->delete('sessions', array('sessionID' => $sessionID));
        $this->db->delete('sessionplans', array('sessionID' => $sessionID));
    }
}

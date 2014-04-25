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

    public function get_courses($status, $courseID = FALSE) {
        $currentDate = date("Y-m-d");

        if ($courseID === FALSE) {
            if ($status == "active") {
                $this->db->select('*');
                $this->db->from('courses');
                $this->db->join('venues', 'courses.venueID = venues.venueID');
                $this->db->where('courses.endDate >=', $currentDate);
                $this->db->order_by("startDate", "asc");
                $query = $this->db->get();

                return $query->result_array();
            } else {
                $this->db->select('*');
                $this->db->from('courses');
                $this->db->join('venues', 'courses.venueID = venues.venueID');
                $this->db->where('courses.endDate <', $currentDate);
                $this->db->order_by("startDate", "asc");
                $query = $this->db->get();

                return $query->result_array();
            }
        }

        $this->db->select('*');
        $this->db->from('courses');
        $this->db->join('venues', 'courses.venueID = venues.venueID');
        $this->db->where('courses.venueID', $courseID);
        $query = $this->db->get();

        return $query->row();
    }
    
    public function get_altVenue($venueID) {
        $this->db->select('*');
        $this->db->from('venues');
        $this->db->where('venueID', $venueID);     
        $query = $this->db->get();

        return $query->row();
    }

    public function get_top5courses() {
        $currentDate = date("Y-m-d");

        $this->db->select('*');
        $this->db->from('courses');
        $this->db->join('venues', 'courses.venueID = venues.venueID');
        $this->db->where('courses.endDate >=', $currentDate);
        $this->db->order_by("startDate", "asc");
        $this->db->limit(5);
        $query = $this->db->get();

        return $query->result_array();
    }
    
    

    public function get_bookings($sessionID = FALSE, $userID = FALSE) {

        if ($sessionID === FALSE) {
            $this->db->select('*');
            $this->db->from('bookings');
            $this->db->join('sessions', 'bookings.sessionID = sessions.sessionID');
            $query = $this->db->get();

            return $query->result_array();
        } else if ($userID === FALSE) {
            $this->db->select('*');
            $this->db->from('bookings');
            $this->db->join('clients', 'bookings.userID = clients.userID');
            $query = $this->db->get();

            return $query->result_array();
        }

        $this->db->select('*');
        $this->db->from('bookings');
        $this->db->join('clients', 'bookings.userID = clients.userID');
        $this->db->join('sessions', 'bookings.sessionID = sessions.sessionID');
        $this->db->where('bookings.sessionID', $sessionID);
        $this->db->where('bookings.userID', $userID);
        $query = $this->db->get();

        return $query->row();
    }
    
    public function get_clientBookings($userID) {
        $this->db->select('*');
        $this->db->from('bookings');
        $this->db->join('sessions', 'bookings.sessionID = sessions.sessionID');
        $this->db->join('venuelocations', 'sessions.locationID = venuelocations.locationID');
        $this->db->where('bookings.userID', $userID);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function set_session($data) {
        $this->db->insert('sessions', $data);
        $sessionID = $this->db->insert_id();
        $planData = array(
            'sessionID' => $sessionID
        );
        $this->db->insert('sessionplans', $planData);
        return $sessionID;
    }
    
    public function update_session($data, $sessionID) {        
        $this->db->where('sessionID', $sessionID);
        $this->db->update('sessions', $data); 
        return true;
    }

    public function delete_session($sessionID) {
        $this->db->delete('sessions', array('sessionID' => $sessionID));
        $this->db->delete('sessionplans', array('sessionID' => $sessionID));
        $this->db->delete('sessionplanactivitys', array('sessionID' => $sessionID));
    }

    public function set_booking($data) {
        $this->db->insert('bookings', $data);
        return true;
    }
    
    public function delete_booking($userID, $sessionID) {
        $this->db->delete('bookings', array('sessionID' => $sessionID, 'userID' => $userID));
        return true;
    }
    
    public function sessionSearch($firstdate, $seconddate) {
        $this->db->select('*');
        $this->db->from('sessions');
        $this->db->join('venuelocations', 'sessions.locationID = venuelocations.locationID');
        $this->db->where('date >=', $firstdate);
        $this->db->where('date <=', $seconddate);
        $query = $this->db->get();
        
        return $query->result_array();
    }
}

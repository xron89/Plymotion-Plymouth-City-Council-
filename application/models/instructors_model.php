<?php

class Instructors_Model extends CI_Model {

    public function get_instructors($instructorID = FALSE) {

        if ($instructorID === FALSE) {
            $this->db->select('*');
            $this->db->from('instructors');
            //$this->db->join('instructorsinformation', 'instructors.instructorID = instructorsinformation.instructorID');
            $this->db->order_by("name", "asc");
            $query = $this->db->get();

            return $query->result_array();
        }

        $this->db->select('*');
        $this->db->from('instructors');
        //$this->db->join('instructorsinformation', 'instructors.instructorID = instructorsinformation.instructorID');
        $this->db->where('instructors.instructorID', $instructorID);
        $query = $this->db->get();

        return $query->row();
    }

}

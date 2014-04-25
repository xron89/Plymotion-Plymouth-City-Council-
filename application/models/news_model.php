<?php

class News_Model extends CI_Model {

    public function get_news($newsID = FALSE) {
        if ($newsID === FALSE) {
            $this->db->select('*');
            $this->db->from('news');
            $this->db->order_by("date", "asc");
            $query = $this->db->get();

            return $query->result_array();
        }

        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('news.newsID', $newsID);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_newsTop3() {
        $this->db->select('*');
        $this->db->from('news');
        $this->db->order_by("date", "asc");
        $this->db->limit(3);
        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function count_posts() {
        return $this->db->count_all('news');
    }
}

<?php

class Meme_model extends CI_Model{
    private $polls_db;
    
    public function __construct(){
        parent::__construct();
        $this->polls_db = $this->load->database("gmanewspoll_write");
    }

    public function write_user_upload($data){
        $data["status"] = 1;
        $data["insert_timestamp"] = date("Y-m-d H:i:s");
        $this->polls_db->insert("gmanews_eomeme", $data);
        return $this->db->insert_id();
    }

    public function gallery($params){
        $data = array();
        $this->polls_db->select("id");
        $this->polls_db->select("CONCAT(id, '_' ,image_file) as filename", false);
        $this->db->where('status', 1);
        $this->polls_db->order_by("insert_timestamp", "desc");
        $query = $this->polls_db->limit($params["lim"], $params["start"])
                    ->get("gmanews_eomeme");

        if($query->num_rows()){
            $data = $query->result_array();
        }

        return $data;
    }

}
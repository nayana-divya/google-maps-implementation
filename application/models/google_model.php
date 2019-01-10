<?php
class google_model extends CI_Model {
    public function __construct()
    {
     parent::__construct();
     $this->load->database();
    }
    public function getdata(){
        $this->db->select('*');
        $this->db->from('mapspoints');
        $data=$this->db->get();

        return  $data->result_array();
    }
    public function insertData($table,$data){
        if($this->db->insert($table,$data))
        return true;
        else{
          return false;
        }
     }
        public function Count_Data(){
            $this->db->select('count(distinct city)as city,count(distinct country)as country');
            $data=$this->db->get('mapspoints');
            return $data->result_array();
        }
        public function latlng(){
            $this->db->select('latitude as lat,longitude as lng,address');
            $data=$this->db->get('mapspoints');
            return $data->result_array();
        }
}
?>
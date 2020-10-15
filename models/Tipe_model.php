<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Tipe_model extends CI_Model{
 
  public function __construct()
  {
    parent::__construct();
  }
    public function get_tipe ()
    {
        $this->db->select('room.*,tipe.id_tipe AS id_tipe, tipe.nama_tipe');
        $this->db->join('tipe', 'room.id_tipe = tipe.id_tipe');
        $this->db->from('room');
       
        $query = $this->db->get();
        return $query->result_array();
    }
  

}
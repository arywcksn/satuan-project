<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Room_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('room',$data);
    }


}
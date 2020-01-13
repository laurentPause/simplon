<?php
class Attribuer_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

        $this->attribuer = 'attribuer';
    }

    public function get_all()
    {
        $this->db->select();
		
		$query = $this->db->get($this->attribuer);
		
		return $query->result();
    }
}
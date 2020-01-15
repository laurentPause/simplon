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

    public function add($data)
    {
        $this->db->insert($this->attribuer, $data);
    }

    public function delete($data)
    {
        $this->db->delete($this->attribuer, $data);

    }

    public function get_count_by_id($data) 
	{
		$query = $this->db->get_where($this->attribuer, $data);
		return $query->num_rows();
    }
    
    public function update($data) 
	{
        
        $this->db->where('id_user', $data['id_user']);
        $this->db->where('id_poste', $data['id_poste']);
        $this->db->update($this->attribuer, $data);
    }
    

}
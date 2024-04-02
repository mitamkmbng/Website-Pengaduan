<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_petugas extends CI_Model
{
	public function getPetugas()
    {
        return  $this->db->get_where('user', array('role' => 'petugas'))->result_array();
    }

    public function getUser()
    {
        return  $this->db->get_where('user', array('role' => 'petugas'))->result_array();
    }

    public function tambahPetugas($data)
    {
        
       return $this->db->insert('user', $data);
    }

    public function editPetugas($data)
    {
        
        $this->db->where('id', $this->input->post('id'));
      	return $this->db->update('user', $data);
    }

    public function hapusPetugas($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function jumlahPetugas(){
        $this->db->from('user');
        $this->db->where('role', 'petugas');
        $totalRows = $this->db->count_all_results();
        return $totalRows;
    }


}

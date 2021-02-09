<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Bank extends CI_Model
{

	public function __construct()

	{

		parent::__construct();
	}

	function banks_list()
	{
		$this->db->select('*');
		$this->db->from('tbl_banks');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$row = $query->result();
			return $row;
		}
	}
	function save_branches($data)
	{


		if ($this->db->insert('tbl_branches', $data)) {

			return true;
		} else {

			return false;
		}
	}
	function update_branches($data, $id)
	{

		$this->db->where('id', $id);
		$update = $this->db->update('tbl_branches', $data);
		if ($update) {
			return true;
		} else {
			return false;
		}
	}

	function getBranchesList()
	{
		$this->db->select('*');
		$this->db->from('tbl_branches br');
		$this->db->join('tbl_banks b', 'b.bank_id = br.bank_id', 'left');
		$this->db->order_by("br.id", "desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$row = $query->result();
			//	var_dump($row);exit;
			return $row;
		}
	}
	function getBranchDataById($id)
	{

		$this->db->select('*');
		$this->db->from('tbl_branches br');
		$this->db->join('tbl_banks b', 'b.bank_id = br.bank_id', 'left');
		$this->db->where('br.id', $id);
		$this->db->order_by("br.id", "desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$row = $query->result();
			//	var_dump($row);exit;
			return $row;
		}
	}
}

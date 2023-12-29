<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	//function read berfungsi mengambil/read data dari table admin di database
	public function read() {

		//sql read
		$this->db->select('*');
		$this->db->from('admin');
		$query = $this->db->get();

		//$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
	}

	//function read berfungsi mengambil/read data dari table admin di database
	public function read_single($id_admin) {

		//sql read
		$this->db->select('*');
		$this->db->from('admin');

		//$id_admin = id_admin data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai id_admin yang dikirim dari controller
		$this->db->where('id_admin', $id_admin);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
        return $query->row_array();
	}

	//function insert berfungsi menyimpan/create data ke table admin di database
	public function insert($input) {
		//$input = data yang dikirim dari controller
		return $this->db->insert('admin', $input);
	}

	//function update berfungsi merubah data ke table admin di database
	public function update($input, $id_admin) {
		//$id_admin = id_admin data yang dikirim dari controller (sebagai filter data yang diubah)
		//filter data sesuai id_admin yang dikirim dari controller
		$this->db->where('id_admin', $id_admin);

		//$input = data yang dikirim dari controller
		return $this->db->update('admin', $input);
	}

	//function delete berfungsi menghapus data dari table admin di database
	public function delete($id_admin) {
		//$id_admin = id_admin data yang dikirim dari controller (sebagai filter data yang dihapus)
		$this->db->where('id_admin', $id_admin);
		return $this->db->delete('admin');
	}
}
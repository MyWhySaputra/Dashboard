<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model {

	//function read berfungsi mengambil/read data dari table kap di database
	public function read() {

		//sql read
		$this->db->select('*');
		$this->db->from('kap');
		$query = $this->db->get();

		//$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
	}

	//function read berfungsi mengambil/read data dari table kap di database
	public function read_single($nim) {

		//sql read
		$this->db->select('*');
		$this->db->from('kap');

		//$nim = nim data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai nim yang dikirim dari controller
		$this->db->where('nim', $nim);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
        return $query->row_array();
	}

	//function insert berfungsi menyimpan/create data ke table kap di database
	public function insert($input) {
		//$input = data yang dikirim dari controller
		return $this->db->insert('kap', $input);
	}

	//function update berfungsi merubah data ke table kap di database
	public function update($input, $nim) {
		//$nim = nim data yang dikirim dari controller (sebagai filter data yang diubah)
		//filter data sesuai nim yang dikirim dari controller
		$this->db->where('nim', $nim);

		//$input = data yang dikirim dari controller
		return $this->db->update('kap', $input);
	}

	//function delete berfungsi menghapus data dari table kap di database
	public function delete($nim) {
		//$nim = nim data yang dikirim dari controller (sebagai filter data yang dihapus)
		$this->db->where('nim', $nim);
		return $this->db->delete('kap');
	}
}
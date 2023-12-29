<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit_model extends CI_Model {

	//function read berfungsi mengambil/read data dari table penerbit di database
	public function read() {

		//sql read
		$this->db->select('*');
		$this->db->from('penerbit');
		$query = $this->db->get();

		//$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
	}

	//function read berfungsi mengambil/read data dari table penerbit di database
	public function read_single($id_penerbit) {

		//sql read
		$this->db->select('*');
		$this->db->from('penerbit');

		//$id_penerbit = id_penerbit data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai id_penerbit yang dikirim dari controller
		$this->db->where('id_penerbit', $id_penerbit);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
        return $query->row_array();
	}

	//function insert berfungsi menyimpan/create data ke table penerbit di database
	public function insert($input) {
		//$input = data yang dikirim dari controller
		return $this->db->insert('penerbit', $input);
	}

	//function update berfungsi merubah data ke table penerbit di database
	public function update($input, $id_penerbit) {
		//$id_penerbit = id_penerbit data yang dikirim dari controller (sebagai filter data yang diubah)
		//filter data sesuai id_penerbit yang dikirim dari controller
		$this->db->where('id_penerbit', $id_penerbit);

		//$input = data yang dikirim dari controller
		return $this->db->update('penerbit', $input);
	}

	//function delete berfungsi menghapus data dari table penerbit di database
	public function delete($id_penerbit) {
		//$id_penerbit = id_penerbit data yang dikirim dari controller (sebagai filter data yang dihapus)
		$this->db->where('id_penerbit', $id_penerbit);
		return $this->db->delete('penerbit');
	}
}
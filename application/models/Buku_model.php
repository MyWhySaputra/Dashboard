<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

	//function read berfungsi mengambil/read data dari table buku di database
	public function read() {

		//sql read
        $this->db->select('buku.*');
        $this->db->select('penerbit.nama_penerbit AS nama_penerbit');
        $this->db->from('buku');
        $this->db->join('penerbit', 'buku.id_penerbit = penerbit.id_penerbit');
        
		$query = $this->db->get();

		//$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
	}

	//function read berfungsi mengambil/read data dari table buku di database
	public function read_single($kode_buku) {

		//sql read
		$this->db->select('*');
		$this->db->from('buku');

		//$kode = kode data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai kode yang dikirim dari controller
		$this->db->where('kode_buku', $kode_buku);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
        return $query->row_array();
	}

	//function insert berfungsi menyimpan/create data ke table buku di database
	public function insert($input) {
		//$input = data yang dikirim dari controller
		return $this->db->insert('buku', $input);
	}

	//function update berfungsi merubah data ke table buku di database
	public function update($input, $kode_buku) {
		//$kode = kode data yang dikirim dari controller (sebagai filter data yang diubah)
		//filter data sesuai kode yang dikirim dari controller
		$this->db->where('kode_buku', $kode_buku);

		//$input = data yang dikirim dari controller
		return $this->db->update('buku', $input);
	}

	//function delete berfungsi menghapus data dari table buku di database
	public function delete($kode_buku) {
		//$kode = kode data yang dikirim dari controller (sebagai filter data yang dihapus)
		$this->db->where('kode_buku', $kode_buku);
		return $this->db->delete('buku');
	}
}
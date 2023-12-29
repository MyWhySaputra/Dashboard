<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian_model extends CI_Model {

	//function read berfungsi mengambil/read data dari table tr_peminjaman di database
	public function read() {

		//sql read
		$this->db->select('a.*');
		$this->db->select('date_format(tgl_pengembalian, "%e %M %Y") AS tgl_return');
		$this->db->select('b.*');
		$this->db->select('c.nama_admin AS ptgs2');
		$this->db->select('d.nama AS nama_peminjam');
		$this->db->select('e.judul AS judul_buku');
		$this->db->select('x.nama_admin AS ptgs1');
		$this->db->select('date_format((tgl_peminjaman + INTERVAL 14 DAY), "%e %M %Y") AS batas');
		$this->db->select('((telat*1000) + (rusak*30000) + (hilang *100000)) AS denda');
		$this->db->from('tr_pengembalian AS a');
		$this->db->join('tr_peminjaman AS b', 'b.id_peminjaman = a.id_peminjaman');
		$this->db->join('admin AS x', 'x.id_admin = a.id_admin');
		$this->db->join('admin AS c', 'c.id_admin = b.id_admin');
		$this->db->join('kap AS d', 'd.nim = b.nim');
		$this->db->join('buku AS e', 'e.kode_buku = b.kode_buku');

		$query = $this->db->get();

		//$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
	}

	//function read berfungsi mengambil/read data dari table tr_pengembalian di database
	public function read_single($id_pengembalian) {

		//sql read
		$this->db->select('*');
		$this->db->from('tr_pengembalian');

		//$id_pengembalian = id_pengembalian data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai id_pengembalian yang dikirim dari controller
		$this->db->where('id_pengembalian', $id_pengembalian);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
        return $query->row_array();
	}

	//function insert berfungsi menyimpan/create data ke table tr_pengembalian di database
	public function insert($input) {
		//$input = data yang dikirim dari controller
		return $this->db->insert('tr_pengembalian', $input);
	}

	//function update berfungsi merubah data ke table tr_pengembalian di database
	public function update($input, $id_pengembalian) {
		//$id_pengembalian = id_pengembalian data yang dikirim dari controller (sebagai filter data yang diubah)
		//filter data sesuai id_pengembalian yang dikirim dari controller
		$this->db->where('id_pengembalian', $id_pengembalian);

		//$input = data yang dikirim dari controller
		return $this->db->update('tr_pengembalian', $input);
	}

	//function delete berfungsi menghapus data dari table tr_pengembalian di database
	public function delete($id_pengembalian) {
		//$id_pengembalian = id_pengembalian data yang dikirim dari controller (sebagai filter data yang dihapus)
		$this->db->where('id_pengembalian', $id_pengembalian);
		return $this->db->delete('tr_pengembalian');
	}
}
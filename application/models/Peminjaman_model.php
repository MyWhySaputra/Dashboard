<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends CI_Model {

	 var $tabel = 'tr_peminjaman';
	//function read berfungsi mengambil/read data dari table tr_peminjaman di database
	public function read() {

		//sql read
		$this->db->select('tr_peminjaman.*');
		$this->db->select('admin.nama_admin AS nama_admin');
		$this->db->select('kap.nama AS nama_peminjam');
		$this->db->select('buku.judul AS judul_buku');
		$this->db->select('date_format(tgl_peminjaman, "%e %M %Y") AS tgl');
		$this->db->select('date_format((tgl_peminjaman + INTERVAL 14 DAY), "%e %M %Y") AS tgl2');
		$this->db->from('tr_peminjaman');
		$this->db->join('buku', 'buku.kode_buku = tr_peminjaman.kode_buku');
		$this->db->join('admin', 'admin.id_admin = tr_peminjaman.id_admin');
		$this->db->join('kap', 'kap.nim = tr_peminjaman.nim');

		$query = $this->db->get();

		//$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
	}

	//function read berfungsi mengambil/read data dari table tr_peminjaman di database
	public function read_single($id_peminjaman) {

		//sql read
		$this->db->select('*');
		$this->db->from('tr_peminjaman');

		//$id_peminjaman = id_peminjaman data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai id_peminjaman yang dikirim dari controller
		$this->db->where('id_peminjaman', $id_peminjaman);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
        return $query->row_array();
	}

	public function get_allmember()
    {
        $this->db->from('kap');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

   	public function get_allbuku()
    {
        $this->db->from('buku');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function get_bukuPopuler()
    {

        $this->db->select('*, COUNT(*)');
        $this->db->from($this->tabel);
        $this->db->join('buku', 'buku.kode_buku = tr_peminjaman.kode_buku');
        $this->db->group_by('tr_peminjaman.kode_buku');
        $this->db->order_by('COUNT(*) DESC');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

	//function insert berfungsi menyimpan/create data ke table tr_peminjaman di database
	public function insert($input) {
		//$input = data yang dikirim dari controller
		return $this->db->insert('tr_peminjaman', $input);
	}

	//function update berfungsi merubah data ke table tr_peminjaman di database
	public function update($input, $id_peminjaman) {
		//$id_peminjaman = id_peminjaman data yang dikirim dari controller (sebagai filter data yang diubah)
		//filter data sesuai id_peminjaman yang dikirim dari controller
		$this->db->where('id_peminjaman', $id_peminjaman);

		//$input = data yang dikirim dari controller
		return $this->db->update('tr_peminjaman', $input);
	}

	//function delete berfungsi menghapus data dari table tr_peminjaman di database
	public function delete($id_peminjaman) {
		//$id_peminjaman = id_peminjaman data yang dikirim dari controller (sebagai filter data yang dihapus)
		$this->db->where('id_peminjaman', $id_peminjaman);
		return $this->db->delete('tr_peminjaman');
	}
}
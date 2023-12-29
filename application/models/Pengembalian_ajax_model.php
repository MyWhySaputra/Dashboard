<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian_ajax_model extends CI_Model {
 
    //nama tabel dari database
    var $table = 'tr_pengembalian'; 

    //field yang ditampilkan
    var $column_order = array('id','id_pengembalian','nama_peminjam','judul_buku','batas','tgl_return','denda','admin1','admin2'); 

    //field yang diizinkan untuk pencarian 
    var $column_search = array('nama','judul','id_peminjaman'); 

    //field pertama yang diurutkan
    var $order = array('tr_peminjaman.id_peminjaman' => 'asc'); 
 
    public function __construct() {
        parent::__construct();
    }
 
    private function _get_datatables_query() {
         
        $this->db->select('*');
        $this->db->select('date_format(tgl_pengembalian, "%e %M %Y") AS tgl_return');
        $this->db->select('tr_peminjaman.*');
        $this->db->select('admin2.nama_admin AS admin2');
        $this->db->select('d.nama AS nama_peminjam');
        $this->db->select('e.judul AS judul_buku');
        $this->db->select('admin1.nama_admin AS admin1');
        $this->db->select('date_format((tgl_peminjaman + INTERVAL 14 DAY), "%e %M %Y") AS batas');
        $this->db->select('((telat*1000) + (rusak*30000) + (hilang *100000)) AS denda');
        $this->db->from('tr_pengembalian ');
        $this->db->join('tr_peminjaman ', 'tr_peminjaman.id_peminjaman = tr_pengembalian.id_peminjaman');
        $this->db->join('admin AS admin1', 'admin1.id_admin = tr_pengembalian.id_admin');
        $this->db->join('admin AS admin2', 'admin2.id_admin = tr_peminjaman.id_admin');
        $this->db->join('kap AS d', 'd.nim = tr_peminjaman.nim');
        $this->db->join('buku AS e', 'e.kode_buku = tr_peminjaman.kode_buku');
        //$this->db->from($this->table);

        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            $search = $this->input->post('search');
            if($search['value']) 

            // jika datatable mengirimkan pencarian dengan metode POST
            {
                // looping awal 
                if($i===0) {
                    $this->db->group_start(); 
                    $this->db->like($item, $search['value']);
                } else {
                    $this->db->or_like($item, $search['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if($this->input->post('order')) {
            $order = $this->input->post('order');
            $this->db->order_by($this->column_order[$order['0']['column']], $order['0']['dir']);

        } else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    
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

    function get_datatables() {
        $this->_get_datatables_query();
        if($this->input->post('length') != -1)
            $this->db->limit($this->input->post('length'), $this->input->post('start'));

        $query = $this->db->get();
        return $query->result_array();
    }
 
    //menghitung tota data sesuai filter/pagination
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    //menghitung total data di table
    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
}
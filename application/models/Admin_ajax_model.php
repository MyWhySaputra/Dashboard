<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_ajax_model extends CI_Model {
 
    //nama tabel dari database
    var $table = 'admin'; 

    //field yang ditampilkan
    var $column_order = array('id','id_admin','nama_admin','alamat','telepon','jabatan'); 

    //field yang diizinkan untuk pencarian 
    var $column_search = array('admin.nama_admin', 'alamat'); 

    //field pertama yang diurutkan
    var $order = array('admin.id_admin' => 'asc'); 
 
    public function __construct() {
        parent::__construct();
    }
 
    private function _get_datatables_query() {
         
        $this->db->select('*');
        $this->db->select('admin.nama_admin AS nama_admin');
        $this->db->select('admin.alamat AS alamat');
        $this->db->select('admin.telp AS telepon');
        $this->db->select('admin.jabatan AS jabatan');
        //$this->db->select('buku.judul AS judul');
        $this->db->from($this->table);
        //$this->db->join('penerbit', 'buku.id_penerbit = penerbit.id_penerbit');

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
<?php 

class Home_model extends CI_Model {

    var $tmember = "kap";
    var $tbuku = "buku";
    var $tpeminjaman = "tr_peminjaman";

    function __construct() {
        parent:: __construct();
    }

    public function hitung_member() {
        $this->db->from($this->tmember);
        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->num_rows();
        }else {
            return 0;
        }
    }

    public function hitung_buku() {
        $this->db->from($this->tbuku);
        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->num_rows();
        }else {
            return 0;
        }
    }

    public function hitung_tpeminjaman() {
        $this->db->from($this->tpeminjaman);
        //$this->db->where("status = ", "Pinjam");
        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->num_rows();
        }else {
            return 0;
        }
    }
    public function hitung_tpengembalian() {
        $this->db->from($this->tpeminjaman);
        //$this->db->where("status = ", "Kembali");
        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->num_rows();
        }else {
            return 0;
        }
    }
}

?>
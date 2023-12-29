<?php
class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('Home_model','Peminjaman_model','Pengembalian_model'));
        $this->load->helper('form','url'); 
        
    }
    public function index(){
    	
    	$this->hitung_buku();
    	//$this->hitung_member();
    }

    public function hitung_buku() {

       $buku = $this->Home_model->hitung_buku();
       $member = $this->Home_model->hitung_member();
       $peminjaman = $this->Home_model->hitung_tpeminjaman();
       $data_peminjaman = $this->Peminjaman_model->read();
       $data_pengembalian = $this->Pengembalian_model->read();
       $qpopuler = $this->Peminjaman_model->get_bukuPopuler();
       $qbuku = $this->Peminjaman_model->get_allBuku();
       $qmember = $this->Peminjaman_model->get_allMember();
       $output = array(
					'theme_page' => 'home',
					'judul' => 'Dashboard',
					'judulpie' => 'Grafik Peminjaman Buku',
					'buku' => $buku,
					'member' => $member,
					'peminjaman' => $peminjaman,
					'data_peminjaman' => $data_peminjaman,
					'data_pengembalian' => $data_pengembalian,
					'qpopuler' => $qpopuler,
					'qbuku' => $qbuku,
					'qmember' => $qmember
				);
        
        $this->load->view('theme/index',$output);
        

    }



    
}

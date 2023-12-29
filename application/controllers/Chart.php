<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

	public function __construct() {
        parent::__construct();
        //check session user id (jika belum login, dikembalikan ke login)
       // if(empty($this->session->userdata('id'))) {
        //	redirect('user/login');
		//}

        //memanggil model
        $this->load->model(array('peminjaman_model','pengembalian_model'));
    }

    public function index() {
		$this->pie();
		$this->column();
	}

	public function pie() {
		//memanggil function read pada buku model
		//function read berfungsi mengambil/read data dari table buku di database
		$data_peminjaman = $this->peminjaman_model->read();

		//mengirim data ke view
		$output = array(
					'theme_page' => 'chart_pie',
					'judul' => 'Pie Chart',
					'data_peminjaman' => $data_peminjaman
				);

		//memanggil file view
		$this->load->view('theme/index', $output);


	}

	public function column() {
		//memanggil function read pada buku model
		//function read berfungsi mengambil/read data dari table buku di database
		$data_pengembalian = $this->pengembalian_model->read();

		//mengirim data ke view
		$output = array(
					'theme_page' => 'chart_column',
					'judul' => 'Column Chart',
					'data_pengembalian' => $data_pengembalian
				);

		//memanggil file view
		$this->load->view('theme/index', $output);


	}


}
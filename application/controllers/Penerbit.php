<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //check session user id (jika belum login, dikembalikan ke login)
       // if(empty($this->session->userdata('id'))) {
        //	redirect('user/login');
		//}

        //memanggil model
        $this->load->model(array('penerbit_model', 'buku_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada penerbit model
		//function read berfungsi mengambil/read data dari table penerbit di database
		$data_penerbit = $this->penerbit_model->read();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'penerbit_read',
						'judul' => 'Daftar Penerbit',

						//data penerbit dikirim ke view
						'data_penerbit' => $data_penerbit
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {
		//mengambil daftar penerbit dari table penerbit
		$data_penerbit= $this->penerbit_model->read();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'penerbit_insert',
						'judul' => 'Tambah Penerbit',

						//mengirim daftar penerbit ke view
						'data_penerbit' => $data_penerbit,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit() {
		//menangkap data input dari view
		$id_penerbit = $this->input->post('id_penerbit');
		$nama_penerbit = $this->input->post('nama_penerbit');
		

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'id_penerbit' => $id_penerbit,
						'nama_penerbit' => $nama_penerbit,
						
					);

		//memanggil function insert pada penerbit model
		//function insert berfungsi menyimpan/create data ke table penerbit di database
		$data_penerbit = $this->penerbit_model->insert($input);

		//mengembalikan halaman ke function read
		redirect('penerbit_ajax/read');
	}

	public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id_penerbit = $this->uri->segment(3);
		
		//function read berfungsi mengambil 1 data dari table penerbit sesuai id yg dipilih
		$data_penerbit_single = $this->penerbit_model->read_single($id_penerbit);

		//mengambil daftar penerbit dari table penerbit
		$data_penerbit = $this->penerbit_model->read();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'penerbit_update',
						'judul' => 'Ubah Penerbit',

						//mengirim data penerbit yang dipilih ke view
						'data_penerbit_single' => $data_penerbit_single,

						//mengirim daftar penerbit ke view
						'data_penerbit' => $data_penerbit,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$id_penerbit = $this->uri->segment(3);

		//menangkap data input dari view
		$nama_penerbit = $this->input->post('nama_penerbit');
		
		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						
						'nama_penerbit' => $nama_penerbit,
						
					);

		//memanggil function update pada penerbit model
		//function update berfungsi merubah data ke table penerbit di database
		$data_penerbit = $this->penerbit_model->update($input, $id_penerbit);

		//mengembalikan halaman ke function read
		redirect('penerbit_ajax/read');
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$id_penerbit = $this->uri->segment(3);

		//memanggil function delete pada penerbit model
		$data_penerbit = $this->penerbit_model->delete($id_penerbit);

		//mengembalikan halaman ke function read
		redirect('penerbit_ajax/read');
	}

}
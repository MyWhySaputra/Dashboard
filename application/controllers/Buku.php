<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct() {
        parent::__construct();
		//check session user id (jika belum login, dikembalikan ke login)
       // if(empty($this->session->userdata('id'))) {
        //	redirect('user/login');
		//}
        //memanggil model
        $this->load->model(array('Buku_model', 'Penerbit_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada buku model
		//function read berfungsi mengambil/read data dari table buku di database
		$data_buku = $this->Buku_model->read();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'buku_read',
						'judul' => 'Daftar Buku',

						//data buku dikirim ke view
						'data_buku' => $data_buku
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {
		//mengambil daftar penerbit dari table penerbit
		
		$data_penerbit = $this->Penerbit_model->read();
		//mengirim data ke view
		$output = array(
						'theme_page' => 'buku_insert',
						'judul' => 'Tambah Buku',

						//mengirim daftar penerbit ke view
						
						'data_penerbit' => $data_penerbit,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit() {
		//setting library upload
	        $config['upload_path']          = './upload_folder/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 20000;
	        $this->load->library('upload', $config);

	        $kode_buku = $this->input->post('kode_buku');
	        $id_penerbit = $this->input->post('id_penerbit');
			$judul = $this->input->post('judul');
			$pengarang = $this->input->post('pengarang');
	        $uploadfile = $this->upload->do_upload('uploadfile');

	        //jika gagal upload
	        if ( ! $uploadfile) {

	        	//respon alasan kenapa gagal upload
	        	$response = $this->upload->display_errors();

                $output = array(
                				'judul' => 'Tambah Buku',
                				'response' => $response
                			);
                $this->load->view('buku_insert', $output);

            //jika gagal berhasil
	        } else {
	        	
	        	//respon upload berhasil 
	        	$upload_data = $this->upload->data();
	        	$file_name = $upload_data['file_name'];

	        	$response = 'file uploaded successfully, file name : '.$file_name;

                $output = array(
                				'judul' => 'Tambah Buku',
                				'response' => $response
                			);
                $this->load->view('buku_insert', $output);

                $input = array(
                		'kode_buku' => $kode_buku,
						'id_penerbit' => $id_penerbit,
						'judul' => $judul,
						'pengarang' => $pengarang,
						'gambar' => $file_name
					);

                //memanggil function insert pada buku model
				//function insert berfungsi menyimpan/create data ke table buku di database
                $data_buku = $this->Buku_model->insert($input);

                //mengembalikan halaman ke function read
                redirect('buku_ajax/read');
	        }//menangkap data input dari view
	        
	}

	public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$kode_buku = $this->uri->segment(3);
		
		//function read berfungsi mengambil 1 data dari table buku sesuai id yg dipilih
		$data_buku_single = $this->Buku_model->read_single($kode_buku);

		//mengambil daftar penerbit dari table penerbit
		$data_penerbit = $this->Penerbit_model->read();
		//mengirim data ke view
		$output = array(
						'theme_page' => 'buku_update',
						'judul' => 'Ubah Buku',

						//mengirim data buku yang dipilih ke view
						'data_buku_single' => $data_buku_single,

						//mengirim daftar penerbit ke view
						'data_penerbit' => $data_penerbit,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$kode_buku = $this->uri->segment(3);

		//menangkap data input dari view
		$kode_buku = $this->input->post('kode_buku');
	    $id_penerbit = $this->input->post('id_penerbit');
		$judul = $this->input->post('judul');
		$pengarang = $this->input->post('pengarang');
		$gambar = $this->input->post('gambar');

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'kode_buku' => $kode_buku,
						'id_penerbit' => $id_penerbit,
						'judul' => $judul,
						'pengarang' => $pengarang,
						'gambar' => $file_name
					);

		//memanggil function update pada buku model
		//function update berfungsi merubah data ke table buku di database
		$data_buku = $this->Buku_model->update($input, $kode_buku);

		//mengembalikan halaman ke function read
		redirect('buku_ajax/read');
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$kode_buku = $this->uri->segment(3);

		//memanggil function delete pada buku model
		$data_buku = $this->Buku_model->delete($kode_buku);

		//mengembalikan halaman ke function read
		redirect('buku_ajax/read');
	}

	public function export() {
		//function read berfungsi mengambil/read data dari table buku di database

		$data_buku = $this->Buku_model->read();
		
		//load library excel
		$this->load->library('excel');
		$excel = $this->excel;

		//judul sheet excel
		$excel->setActiveSheetIndex(0)->setTitle('Export Data');

		//header table
		$excel->getActiveSheet()->setCellValue( 'A1', 'Kode Buku');
		$excel->getActiveSheet()->setCellValue( 'B1', 'ID Penerbit');
		$excel->getActiveSheet()->setCellValue( 'C1', 'Judul');
		$excel->getActiveSheet()->setCellValue( 'D1', 'Pengarang');

		//baris awal data dimulai baris 2 (baris 1 digunakan header)
		$baris = 2;

		//looping data buku (mengisi data ke excel)
		foreach($data_buku as $data) {

			//mengisi data ke excel per baris
			$excel->getActiveSheet()->setCellValue( 'A'.$baris, $data['kode_buku']);
			$excel->getActiveSheet()->setCellValue( 'B'.$baris, $data['id_penerbit']);
			$excel->getActiveSheet()->setCellValue( 'C'.$baris, $data['judul']);
			$excel->getActiveSheet()->setCellValue( 'D'.$baris, $data['pengarang']);

			//increment baris untuk data selanjutnya
			$baris++;
		}

		//nama file excel
		$filename='export_data_buku.xls';

		//konfigurasi file excel
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
	}

	public function export2() {
		//memanggil function read pada buku model
		//function read berfungsi mengambil/read data dari table buku di database
		$data_buku = $this->Buku_model->read();

		//mengirim data ke view
		$output = array(
						'judul' => 'Daftar Buku',

						//data buku dikirim ke view
						'data_buku' => $data_buku
					);

		//memanggil file view
		$this->load->view('buku_export', $output);
	}

	
}
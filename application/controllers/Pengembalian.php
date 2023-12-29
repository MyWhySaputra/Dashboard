<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

	public function __construct() {
        parent::__construct();

         //check session user id (jika belum login, dikembalikan ke login)
       // if(empty($this->session->userdata('id'))) {
       // 	redirect('user/login');
		//}

        //memanggil model
        $this->load->model(array('Pengembalian_model', 'Admin_model', 'Peminjaman_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada provinsi model
		//function read berfungsi mengambil/read data dari table provinsi di database
		$data_pengembalian = $this->Pengembalian_model->read();

		//mengirim data ke view
		$output = array(
						//memanggil view
						'theme_page' => 'pengembalian_read',
						'judul' => 'Daftar Pengembalian Buku',

						//data provinsi dikirim ke view
						'data_pengembalian' => $data_pengembalian,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {
		//join table
		$data_petugas = $this->Admin_model->read();
		$data_peminjaman = $this->Peminjaman_model->read();
		//$data_admin = $this->Admin_model->read();

		//mengirim data ke view
		$output = array(
                        'theme_page' => 'pengembalian_insert',
						'judul' => 'Tambah Pengembalian',

						//liat data yang di table
						'data_petugas' => $data_petugas,
						'data_peminjaman' => $data_peminjaman,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit(){

        //menangkap data input dari view
        $id_pengembalian_insert = $this->input->post('id_pengembalian_insert');
        $id_peminjaman = $this->input->post('id_peminjaman');
        $id_admin = $this->input->post('id_admin');
		$tgl_pengembalian = $this->input->post('tgl_pengembalian');
		$telat = $this->input->post('telat');
		$hilang = $this->input->post('hilang');
		$rusak = $this->input->post('rusak');

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'id_pengembalian' => $id_pengembalian_insert,
						'id_peminjaman' => $id_peminjaman,
						'id_admin' => $id_admin,
						'tgl_pengembalian' => $tgl_pengembalian,
						'telat' => $telat,
						'hilang' => $hilang,
						'rusak' => $rusak,
						);
		
			$data_pengembalian =$this->Pengembalian_model->insert($input);
			//mengembalikan halaman ke function read
            redirect('pengembalian_ajax/read');
    }
    

    public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id_pengembalian = $this->uri->segment(3);

		//function read berfungsi mengambil 1 data dari table provinsi sesuai id yg dipilih
		$data_pengembalian_single = $this->Pengembalian_model->read_single($id_pengembalian);

		//join table
		$data_admin = $this->Admin_model->read();
		$data_peminjaman = $this->Peminjaman_model->read();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'pengembalian_update',
						'judul' => 'Ubah Pengembalian',

						//mengirim data yang dipilih ke view
						'data_pengembalian_single' => $data_pengembalian_single,
						'data_admin' => $data_admin,
						'data_peminjaman' => $data_peminjaman,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}


	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$id_pengembalian = $this->uri->segment(3);

		//menangkap data input dari view
		$id_peminjaman = $this->input->post('id_peminjaman');
		$tgl_pengembalian = $this->input->post('tgl_pengembalian');
		$telat = $this->input->post('telat');
		$hilang = $this->input->post('hilang');
		$rusak = $this->input->post('rusak');

		//mengirim data ke model
		$input = array(
						'id_peminjaman' => $id_peminjaman,
						'tgl_pengembalian' => $tgl_pengembalian,
						'telat' => $telat,
						'hilang' => $hilang,
						'rusak' => $rusak,
						);

		//memanggil function insert pada provinsi model
		//function insert berfungsi menyimpan/create data ke table provinsi di database
		$data_pengembalian = $this->Pengembalian_model->update($input, $id_pengembalian);

		//mengembalikan halaman ke function read
		redirect('pengembalian/read');
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$id_pengembalian = $this->uri->segment(3);

		//memanggil function delete pada provinsi model
		$data_pengembalian = $this->Pengembalian_model->delete($id_pengembalian);

		//mengembalikan halaman ke function read
		redirect('pengembalian_ajax/read');
	}

	public function export() {
		//function read berfungsi mengambil/read data dari table pengembalian di database

		$data_pengembalian = $this->Pengembalian_model->read();
		
		//load library excel
		$this->load->library('excel');
		$excel = $this->excel;

		//judul sheet excel
		$excel->setActiveSheetIndex(0)->setTitle('Export Data');

		//header table
		$excel->getActiveSheet()->setCellValue( 'A1', 'ID pengembalian');
		$excel->getActiveSheet()->setCellValue( 'B1', 'Nama Peminjam');
		$excel->getActiveSheet()->setCellValue( 'C1', 'Judul Buku');
		$excel->getActiveSheet()->setCellValue( 'D1', 'Batas Kembali');
		$excel->getActiveSheet()->setCellValue( 'E1', 'Tanggal Kembali');
		$excel->getActiveSheet()->setCellValue( 'F1', 'Denda');
		$excel->getActiveSheet()->setCellValue( 'G1', 'Admin Peminjaman');
		$excel->getActiveSheet()->setCellValue( 'H1', 'Admin Pengembalian');

		//baris awal data dimulai baris 2 (baris 1 digunakan header)
		$baris = 2;

		//looping data pengembalian (mengisi data ke excel)
		foreach($data_pengembalian as $data) {

			//mengisi data ke excel per baris
			$excel->getActiveSheet()->setCellValue( 'A'.$baris, $data['id_pengembalian']);
			$excel->getActiveSheet()->setCellValue( 'B'.$baris, $data['nama_peminjam']);
			$excel->getActiveSheet()->setCellValue( 'C'.$baris, $data['judul_buku']);
			$excel->getActiveSheet()->setCellValue( 'D'.$baris, $data['batas']);
			$excel->getActiveSheet()->setCellValue( 'E'.$baris, $data['tgl_return']);
			$excel->getActiveSheet()->setCellValue( 'F'.$baris, $data['denda']);
			$excel->getActiveSheet()->setCellValue( 'G'.$baris, $data['ptgs2']);
			$excel->getActiveSheet()->setCellValue( 'H'.$baris, $data['ptgs1']);

			//increment baris untuk data selanjutnya
			$baris++;
		}

		//nama file excel
		$filename='export_data_pengembalian.xls';

		//konfigurasi file excel
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
	}

	public function export2() {
		//memanggil function read pada pengembalian model
		//function read berfungsi mengambil/read data dari table pengembalian di database
		$data_pengembalian = $this->Pengembalian_model->read();

		//mengirim data ke view
		$output = array(
						'judul' => 'Daftar pengembalian',

						//data pengembalian dikirim ke view
						'data_pengembalian' => $data_pengembalian
					);

		//memanggil file view
		$this->load->view('pengembalian_export', $output);
	}

	
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	public function __construct() {
        parent::__construct();

         //check session user id (jika belum login, dikembalikan ke login)
       // if(empty($this->session->userdata('id'))) {
        //	redirect('user/login');
		//}

        //memanggil model
        $this->load->model(array('Peminjaman_model', 'Buku_model', 'Anggota_model', 'Admin_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada provinsi model
		//function read berfungsi mengambil/read data dari table provinsi di database
		$data_peminjaman = $this->Peminjaman_model->read();

		//mengirim data ke view
		$output = array(
						//memanggil view
						'theme_page' => 'peminjaman_read',
						'judul' => 'Daftar Peminjaman Buku',

						//data provinsi dikirim ke view
						'data_peminjaman' => $data_peminjaman,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {
		//join table
		$data_kap = $this->Anggota_model->read();
		$data_petugas = $this->Admin_model->read();
		$data_buku = $this->Buku_model->read();

		//mengirim data ke view
		$output = array(
                        'theme_page' => 'peminjaman_insert',
						'judul' => 'Tambah Peminjaman',

						//liat data yang di table
						'data_kap' => $data_kap,
						'data_petugas' => $data_petugas,
						'data_buku' => $data_buku,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit(){

        //menangkap data input dari view
        $id_peminjaman_insert = $this->input->post('id_peminjaman_insert');
		$nama_mhs = $this->input->post('nama_mhs');
		$nama_ptgs = $this->input->post('id_admin');
		$judul = $this->input->post('judul');
		$tgl_peminjaman = $this->input->post('tgl_peminjaman');

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'id_peminjaman' => $id_peminjaman_insert,
						'nim' => $nama_mhs,
						'id_admin' => $nama_ptgs,
						'kode_buku' => $judul,
						'tgl_peminjaman' => $tgl_peminjaman,
						);
		
			$data_peminjaman =$this->Peminjaman_model->insert($input);
			//mengembalikan halaman ke function read
            redirect('peminjaman_ajax/read');
    }
    

    public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id_peminjaman = $this->uri->segment(3);

		//function read berfungsi mengambil 1 data dari table provinsi sesuai id yg dipilih
		$data_peminjaman_single = $this->Peminjaman_model->read_single($id_peminjaman);

		//join table
		$data_kap = $this->Anggota_model->read();
		$data_buku = $this->Buku_model->read();
		$data_petugas = $this->Admin_model->read();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'peminjaman_update',
						'judul' => 'Ubah Peminjaman',

						//mengirim data yang dipilih ke view
						'data_peminjaman_single' => $data_peminjaman_single,
						'data_petugas' => $data_petugas,
						'data_kap' => $data_kap,
						'data_buku' => $data_buku,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}


	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$id_peminjaman = $this->uri->segment(3);

		//menangkap data input dari view
		$nama_mhs = $this->input->post('nama_mhs');
		$nama_ptgs = $this->input->post('nama_ptgs');
		$judul = $this->input->post('judul');
		$tgl_peminjaman = $this->input->post('tgl_peminjaman');

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'nim' => $nama_mhs,
						'id_admin' => $nama_ptgs,
						'kode_buku' => $judul,
						'tgl_peminjaman' => $tgl_peminjaman,
						);

		//memanggil function insert pada provinsi model
		//function insert berfungsi menyimpan/create data ke table provinsi di database
		$data_peminjaman = $this->Peminjaman_model->update($input, $id_peminjaman);

		//mengembalikan halaman ke function read
		redirect('peminjaman_ajax/read');
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$id_peminjaman = $this->uri->segment(3);

		//memanggil function delete pada provinsi model
		$data_peminjaman = $this->Peminjaman_model->delete($id_peminjaman);

		//mengembalikan halaman ke function read
		redirect('peminjaman_ajax/read');
	}

	public function export() {
		//function read berfungsi mengambil/read data dari table peminjaman di database

		$data_peminjaman = $this->Peminjaman_model->read();
		
		//load library excel
		$this->load->library('excel');
		$excel = $this->excel;

		//judul sheet excel
		$excel->setActiveSheetIndex(0)->setTitle('Export Data');

		//header table
		$excel->getActiveSheet()->setCellValue( 'A1', 'ID Peminjaman');
		$excel->getActiveSheet()->setCellValue( 'B1', 'Nama Peminjam');
		$excel->getActiveSheet()->setCellValue( 'C1', 'Nama Petugas');
		$excel->getActiveSheet()->setCellValue( 'D1', 'Judul Buku');
		$excel->getActiveSheet()->setCellValue( 'E1', 'Tanggal Peminjaman');
		$excel->getActiveSheet()->setCellValue( 'F1', 'Batas');

		//baris awal data dimulai baris 2 (baris 1 digunakan header)
		$baris = 2;

		//looping data peminjaman (mengisi data ke excel)
		foreach($data_peminjaman as $data) {

			//mengisi data ke excel per baris
			$excel->getActiveSheet()->setCellValue( 'A'.$baris, $data['id_peminjaman']);
			$excel->getActiveSheet()->setCellValue( 'B'.$baris, $data['nama_peminjam']);
			$excel->getActiveSheet()->setCellValue( 'C'.$baris, $data['nama_admin']);
			$excel->getActiveSheet()->setCellValue( 'D'.$baris, $data['judul_buku']);
			$excel->getActiveSheet()->setCellValue( 'E'.$baris, $data['tgl']);
			$excel->getActiveSheet()->setCellValue( 'F'.$baris, $data['tgl2']);

			//increment baris untuk data selanjutnya
			$baris++;
		}

		//nama file excel
		$filename='export_data_peminjaman.xls';

		//konfigurasi file excel
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
	}

	public function export2() {
		//memanggil function read pada peminjaman model
		//function read berfungsi mengambil/read data dari table peminjaman di database
		$data_peminjaman = $this->Peminjaman_model->read();

		//mengirim data ke view
		$output = array(
						'judul' => 'Daftar peminjaman',

						//data peminjaman dikirim ke view
						'data_peminjaman' => $data_peminjaman
					);

		//memanggil file view
		$this->load->view('peminjaman_export', $output);
	}

}
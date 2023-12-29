<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //check session user id (jika belum login, dikembalikan ke login)
       // if(empty($this->session->userdata('id'))) {
        //	redirect('user/login');
		//}

        //memanggil model
        $this->load->model(array('anggota_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada provinsi model
		//function read berfungsi mengambil/read data dari table provinsi di database
		$data_anggota = $this->anggota_model->read();

		//mengirim data ke view
		$output = array(
						//memanggil view
						'theme_page' => 'anggota_read',
						'judul' => 'Daftar Anggota',

						//data provinsi dikirim ke view
						'data_anggota' => $data_anggota
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {
		//mengirim data ke view
		$output = array(
                        'theme_page' => 'anggota_insert',
						'judul' => 'Tambah Anggota',
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit()
    {
        //menangkap data input dari view
        $nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$prodi = $this->input->post('prodi');

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'nim' => $nim,
						'nama' => $nama,
						'prodi' => $prodi,
						);
			$data_anggota=$this->anggota_model->insert($input);
			//mengembalikan halaman ke function read
            redirect('anggota_ajax/read');
        
    }

    public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$nim = $this->uri->segment(3);

		//function read berfungsi mengambil 1 data dari table provinsi sesuai id yg dipilih
		$data_anggota_single = $this->anggota_model->read_single($nim);

		//mengirim data ke view
		$output = array(
						'theme_page' => 'anggota_update',
						'judul' => 'Ubah Anggota',

						//mengirim data provinsi yang dipilih ke view
						'data_anggota_single' => $data_anggota_single,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}


	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$nim = $this->uri->segment(3);

		//menangkap data input dari view
		$nama = $this->input->post('nama');
        $prodi = $this->input->post('prodi');
		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'nama' => $nama,
						'prodi' => $prodi,
					);

		//memanggil function insert pada provinsi model
		//function insert berfungsi menyimpan/create data ke table provinsi di database
		$data_anggota = $this->anggota_model->update($input, $nim);

		//mengembalikan halaman ke function read
		redirect('anggota_ajax/read');
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$nim = $this->uri->segment(3);

		//memanggil function delete pada provinsi model
		$data_anggota = $this->anggota_model->delete($nim);

		//mengembalikan halaman ke function read
		redirect('anggota_ajax/read');
	}


	public function export() {
		//function read berfungsi mengambil/read data dari table provinsi di database
		$data_anggota = $this->anggota_model->read();
		
		//load library excel
		$this->load->library('excel');
		$excel = $this->excel;

		//judul sheet excel
		$excel->setActiveSheetIndex(0)->setTitle('Export Data');

		//header table
		$excel->getActiveSheet()->setCellValue( 'A1', 'NIM');
		$excel->getActiveSheet()->setCellValue( 'B1', 'Nama');
		$excel->getActiveSheet()->setCellValue( 'C1', 'Prodi');

		//baris awal data dimulai baris 2 (baris 1 digunakan header)
		$baris = 2;

		//looping data provinsi (mengisi data ke excel)
		foreach($data_anggota as $data) {

			//mengisi data ke excel per baris
			$excel->getActiveSheet()->setCellValue( 'A'.$baris, $data['nim']);
			$excel->getActiveSheet()->setCellValue( 'B'.$baris, $data['nama']);
            $excel->getActiveSheet()->setCellValue( 'C'.$baris, $data['prodi']);


			//increment baris untuk data selanjutnya
			$baris++;
		}

		//nama file excel
		$filename='export_data_anggota.xls';

		//konfigurasi file excel
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save('php://output');
	}

	

	public function export2() {
		//memanggil function read pada provinsi model
		//function read berfungsi mengambil/read data dari table provinsi di database
		$data_anggota = $this->anggota_model->read();

		//mengirim data ke view
		$output = array(
						'judul' => 'Daftar Anggota',

						//data provinsi dikirim ke view
						'data_anggota' => $data_anggota
					);

		//memanggil file view
		$this->load->view('anggota_export', $output);
	}

	public function export_peminjaman() {
		//menangkap id data yg dipilih dari view (parameter get)
		$nim = $this->uri->segment(3);

		//function read berfungsi mengambil/read data dari table kota di database
		$this->load->model('peminjaman_model');
		$data_peminjaman = $this->peminjaman_model->read($nim);

		//mengirim data ke view
		$output = array(
						'judul' => 'Daftar Peminjaman',

						//data provinsi dikirim ke view
						'data_peminjaman' => $data_peminjaman
					);

		//memanggil file view
		$this->load->view('anggota_peminjaman_export', $output);
	}
}

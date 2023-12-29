<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
        parent::__construct();

         //check session user id (jika belum login, dikembalikan ke login
        if(empty($this->session->userdata('id'))) {
        	redirect('user/login');
		}

        //memanggil model
        $this->load->model('Admin_model');
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada provinsi model
		//function read berfungsi mengambil/read data dari table provinsi di database
		$data_admin = $this->Admin_model->read();

		//mengirim data ke view
		$output = array(
						//memanggil view
						'theme_page' => 'admin_read',
						'judul' => 'Daftar Admin',

						//data provinsi dikirim ke view
						'data_admin' => $data_admin
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {
		//mengirim data ke view
		$output = array(
                        'theme_page' => 'admin_insert',
						'judul' => 'Tambah admin',
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit()
    {
        //menangkap data input dari view
        $id_admin = $this->input->post('id_admin');
		$nama_admin = $this->input->post('nama_admin');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$jabatan = $this->input->post('jabatan');

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'id_admin' => $id_admin,
						'nama_admin' => $nama_admin,
						'alamat' => $alamat,
						'telp' => $telp,
						'jabatan' => $jabatan,
						);
		
			$data_admin =$this->Admin_model->insert($input);
			//mengembalikan halaman ke function read
            redirect('admin_ajax/read');
        
    }

    public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id_admin = $this->uri->segment(3);

		//function read berfungsi mengambil 1 data dari table provinsi sesuai id yg dipilih
		$data_admin_single = $this->Admin_model->read_single($id_admin);

		//mengirim data ke view
		$output = array(
						'theme_page' => 'admin_update',
						'judul' => 'Ubah admin',

						//mengirim data provinsi yang dipilih ke view
						'data_admin_single' => $data_admin_single,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}


	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$id_admin = $this->uri->segment(3);

		//menangkap data input dari view
		$nama_admin = $this->input->post('nama_admin');
        $alamat = $this->input->post('alamat');
        $telp = $this->input->post('telp');
        $jabatan = $this->input->post('jabatan');
		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'nama_admin' => $nama_admin,
						'alamat' => $alamat,
						'telp' => $telp,
						'jabatan' => $jabatan,
					);

		//memanggil function insert pada provinsi model
		//function insert berfungsi menyimpan/create data ke table provinsi di database
		$data_admin = $this->Admin_model->update($input, $id_admin);

		//mengembalikan halaman ke function read
		redirect('admin_ajax/read');
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$id_admin = $this->uri->segment(3);

		//memanggil function delete pada provinsi model
		$data_admin = $this->Admin_model->delete($id_admin);

		//mengembalikan halaman ke function read
		redirect('admin_ajax/read');
	}


	public function export() {
		//function read berfungsi mengambil/read data dari table provinsi di database
		$data_admin = $this->Admin_model->read();
		
		//load library excel
		$this->load->library('excel');
		$excel = $this->excel;

		//judul sheet excel
		$excel->setActiveSheetIndex(0)->setTitle('Export Data');

		//header table
		$excel->getActiveSheet()->setCellValue( 'A1', 'id_admin');
		$excel->getActiveSheet()->setCellValue( 'B1', 'nama_admin');
		$excel->getActiveSheet()->setCellValue( 'C1', 'Alamat');
		$excel->getActiveSheet()->setCellValue( 'D1', 'Telepon');
		$excel->getActiveSheet()->setCellValue( 'E1', 'Jabatan');

		//baris awal data dimulai baris 2 (baris 1 digunakan header)
		$baris = 2;

		//looping data provinsi (mengisi data ke excel)
		foreach($data_admin as $data) {

			//mengisi data ke excel per baris
			$excel->getActiveSheet()->setCellValue( 'A'.$baris, $data['id_admin']);
			$excel->getActiveSheet()->setCellValue( 'B'.$baris, $data['nama_admin']);
            $excel->getActiveSheet()->setCellValue( 'C'.$baris, $data['alamat']);
            $excel->getActiveSheet()->setCellValue( 'D'.$baris, $data['telp']);
            $excel->getActiveSheet()->setCellValue( 'E'.$baris, $data['jabatan']);


			//increment baris untuk data selanjutnya
			$baris++;
		}

		//nama file excel
		$filename='export_data_admin.xls';

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
		$data_admin = $this->Admin_model->read();

		//mengirim data ke view
		$output = array(
						'judul' => 'Daftar admin',

						//data provinsi dikirim ke view
						'data_admin' => $data_admin
					);

		//memanggil file view
		$this->load->view('admin_export', $output);
	}

	public function export_peminjaman() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id_admin = $this->uri->segment(3);

		//function read berfungsi mengambil/read data dari table kota di database
		$this->load->model('peminjaman_model');
		$data_peminjaman = $this->peminjaman_model->read($id_admin);

		//mengirim data ke view
		$output = array(
						'judul' => 'Daftar Peminjaman',

						//data provinsi dikirim ke view
						'data_peminjaman' => $data_peminjaman
					);

		//memanggil file view
		$this->load->view('admin_peminjaman_export', $output);
	}

	public function export3() {
		//memanggil function read pada provinsi model
		//function read berfungsi mengambil/read data dari table provinsi di database
		$data_admin = $this->Admin_model->read();

		//mengirim data ke view
		$output = array(
						'judul' => 'Daftar admin',

						//data provinsi dikirim ke view
						'data_admin' => $data_admin
					);

		//memanggil file view
		$this->load->view('admin_export', $output);
	}

	public function export_pengembalian() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id_admin = $this->uri->segment(3);

		//function read berfungsi mengambil/read data dari table kota di database
		$this->load->model('pengembalian_model');
		$data_pengembalian = $this->pengembalian_model->read($id_admin);

		//mengirim data ke view
		$output = array(
						'judul' => 'Daftar Pengembalian',

						//data provinsi dikirim ke view
						'data_pengembalian' => $data_pengembalian
					);

		//memanggil file view
		$this->load->view('admin_pengembalian_export', $output);
	}
}

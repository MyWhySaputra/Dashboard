<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_ajax extends CI_Controller {

    public function __construct() {
        parent::__construct();

        //memanggil model
        $this->load->model(array('Buku_ajax_model','Penerbit_model'));
    }

    public function index() {
        //mengarahkan ke function read
        $this->read();
    }

    public function read() {
        $data_buku = $this->Buku_ajax_model->read();
        //mengirim data ke view
        $output = array(
                        'theme_page' => 'buku_ajax_read',
                        'judul' => 'Daftar Buku',
                        'data_buku' => $data_buku

                    );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    //fungsi menampilkan data dalam bentuk json
    public function datatables() {
        //menunda loading (bisa dihapus, hanya untuk menampilkan pesan processing)
        //sleep(2);

        //memanggil fungsi model datatables
        $list = $this->Buku_ajax_model->get_datatables();
        $data = array();
        $no = $this->input->post('start');

        //mencetak data json
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field['kode_buku'];
            $row[] = $field['nama_penerbit'];
            $row[] = $field['judul'];
            $row[] = $field['pengarang'];
            $row[] = "<img height=100px src='". base_url() . "upload_folder/" . $field['gambar'] . "'/>";
            $row[] = '<a href=" '.site_url('buku/update/'.$field['kode_buku']).'">Edit</a>';
            $row[] = '<a href=" '.site_url('buku/delete/'.$field['kode_buku']).'">Delete</a>';
            
            
            $data[] = $row;
        }
    
        //mengirim data json
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->Buku_ajax_model->count_all(),
            "recordsFiltered" => $this->Buku_ajax_model->count_filtered(),
            "data" => $data,
        );

        //output dalam format JSON
        echo json_encode($output);
    }

    public function update() {
        //menangkap id data yg dipilih dari view (parameter get)
        $kode_buku = $this->uri->segment(3);
        
        //function read berfungsi mengambil 1 data dari table buku sesuai id yg dipilih
        $data_buku_single = $this->Buku_ajax_model->read_single($kode_buku);

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
        $file_name = $this->input->post('gambar');

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
        $data_buku = $this->Buku_ajax_model->update($input, $kode_buku);

        //mengembalikan halaman ke function read
        redirect('buku_ajax/read');
    }

    public function delete() {
        //menangkap id data yg dipilih dari view
        $kode_buku = $this->uri->segment(3);

        //memanggil function delete pada buku model
        $data_buku = $this->Buku_ajax_model->delete($kode_buku);

        //mengembalikan halaman ke function read
        redirect('buku_ajax/read');
    }

    public function insert() {
        //mengambil daftar penerbit dari table penerbit
        
        $data_penerbit = $this->Penerbit_model->read();
        //mengirim data ke view
        $output = array(
                        'theme_page' => 'buku_ajax_insert',
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
                $this->load->view('buku_ajax_insert', $output);

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
                $this->load->view('buku_ajax_insert', $output);

                $input = array(
                        'kode_buku' => $kode_buku,
                        'id_penerbit' => $id_penerbit,
                        'judul' => $judul,
                        'pengarang' => $pengarang,
                        'gambar' => $file_name
                    );

                //memanggil function insert pada buku model
                //function insert berfungsi menyimpan/create data ke table buku di database
                $data_buku = $this->Buku_ajax_model->insert($input);

                //mengembalikan halaman ke function read
                redirect('buku_ajax/read');
            }//menangkap data input dari view
            
    }
}
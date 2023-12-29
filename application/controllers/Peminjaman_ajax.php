<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_ajax extends CI_Controller {

    public function __construct() {
        parent::__construct();

        //memanggil model
        $this->load->model(array('Peminjaman_ajax_model'));
    }

    public function index() {
        //mengarahkan ke function read
        $this->read();
    }

    public function read() {
        $data_admin = $this->Peminjaman_ajax_model->read();
        //mengirim data ke view
        $output = array(
                        'theme_page' => 'peminjaman_ajax_read',
                        'judul' => 'Data Peminjaman',
                        //'data_admin' => $data_admin

                    );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    //fungsi menampilkan data dalam bentuk json
    public function datatables() {
        //menunda loading (bisa dihapus, hanya untuk menampilkan pesan processing)
        //sleep(2);

        //memanggil fungsi model datatables
        $list = $this->Peminjaman_ajax_model->get_datatables();
        $data = array();
        $no = $this->input->post('start');

        //mencetak data json
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field['id_peminjaman'];
            $row[] = $field['nama_peminjam'];
            $row[] = $field['nama_admin'];
            $row[] = $field['judul_buku'];
            $row[] = $field['tgl'];
            $row[] = $field['tgl2'];
            $row[] = '<a href=" '.site_url('peminjaman/update/'.$field['id_peminjaman']).'">Edit</a>';
            $row[] = '<a href=" '.site_url('peminjaman/delete/'.$field['id_peminjaman']).'">Delete</a>';
            
            
            $data[] = $row;
        }
    
        //mengirim data json
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->Peminjaman_ajax_model->count_all(),
            "recordsFiltered" => $this->Peminjaman_ajax_model->count_filtered(),
            "data" => $data,
        );

        //output dalam format JSON
        echo json_encode($output);
    }
}
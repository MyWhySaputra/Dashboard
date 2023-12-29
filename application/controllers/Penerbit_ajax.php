<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit_ajax extends CI_Controller {

    public function __construct() {
        parent::__construct();

        //memanggil model
        $this->load->model(array('Penerbit_ajax_model'));
    }

    public function index() {
        //mengarahkan ke function read
        $this->read();
    }

    public function read() {
        $data_admin = $this->Penerbit_ajax_model->read();
        //mengirim data ke view
        $output = array(
                        'theme_page' => 'penerbit_ajax_read',
                        'judul' => 'Data Penerbit',
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
        $list = $this->Penerbit_ajax_model->get_datatables();
        $data = array();
        $no = $this->input->post('start');

        //mencetak data json
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field['id_penerbit'];
            $row[] = $field['nama'];
            $row[] = '<a href=" '.site_url('penerbit/update/'.$field['id_penerbit']).'">Edit</a>';
            $row[] = '<a href=" '.site_url('penerbit/delete/'.$field['id_penerbit']).'">Delete</a>';
            
            
            $data[] = $row;
        }
    
        //mengirim data json
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->Penerbit_ajax_model->count_all(),
            "recordsFiltered" => $this->Penerbit_ajax_model->count_filtered(),
            "data" => $data,
        );

        //output dalam format JSON
        echo json_encode($output);
    }
}
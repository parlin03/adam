<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php'; //if error -> cli -> composer require phpmailer/phpmailer

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Jaringbedahrumah extends MY_Controller
{

    /*
    |-------------------------------------------------------------------
    | Construct
    |-------------------------------------------------------------------
    | 
    */
    function __construct()
    {
        parent::__construct();
        $this->load->model('Import_model', 'import_model');
    }

    /*
    |-------------------------------------------------------------------
    | Index
    |-------------------------------------------------------------------
    |
    */
    function index()
    {
        $data['title'] = 'Jaring Program Bedah Rumah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $data['table_list'] = $this->import_model->fetch_jaringbedahrumah();


        $this->load->helper('url');       //pointer sidebar
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('import/jaringbedahrumah/content', $data);
        $this->load->view('templates/footer');
    }

    /*
    |-------------------------------------------------------------------
    | Import Excel
    |-------------------------------------------------------------------
    |
    */
    function import_excel()
    {
        $this->load->helper('file');

        /* Allowed MIME(s) File */
        $file_mimes = array(
            'application/octet-stream',
            'application/vnd.ms-excel',
            'application/x-csv',
            'text/x-csv',
            'text/csv',
            'application/csv',
            'application/excel',
            'application/vnd.msexcel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );

        if (isset($_FILES['uploadFile']['name']) && in_array($_FILES['uploadFile']['type'], $file_mimes)) {

            $array_file = explode('.', $_FILES['uploadFile']['name']);
            $extension  = end($array_file);

            if ('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($_FILES['uploadFile']['tmp_name']);
            $sheet_data  = $spreadsheet->getActiveSheet(0)->toArray();
            $array_data  = [];

            for ($i = 1; $i < count($sheet_data); $i++) {
                $data = array(
                    'nik'           => $sheet_data[$i]['1'],
                    'nama'          => $sheet_data[$i]['2'],
                    'tempat_lahir'  => $sheet_data[$i]['3'],
                    'tanggal_lahir' => $sheet_data[$i]['4'],
                    'status'        => $sheet_data[$i]['5'],
                    'jenis_kelamin' => $sheet_data[$i]['6'],
                    'alamat'        => $sheet_data[$i]['7'],
                    'rt'            => $sheet_data[$i]['8'],
                    'rw'            => $sheet_data[$i]['9'],
                    'tps'           => $sheet_data[$i]['10'],
                    'kecamatan'     => $sheet_data[$i]['11'],
                    'kelurahan'     => $sheet_data[$i]['12'],
                    'nohp'          => $sheet_data[$i]['13'],
                    'periode'       => $sheet_data[$i]['14']
                );
                $array_data[] = $data;
            }

            if ($array_data != '') {
                $this->import_model->insert_jaringbedahrumah_batch($array_data);
            }
            $this->modal_feedback('success', 'Success', 'Data Imported', 'OK');
        } else {
            $this->modal_feedback('error', 'Error', 'Import failed', 'Try again');
        }
        redirect('/import/jaringbedahrumah');
    }
}

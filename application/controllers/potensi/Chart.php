<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Chart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Potensi_model', 'chart');
    }

    public function Index()
    {
        $data['title'] = 'Chart Potensi Jaring Program';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris
        $data['potensi'] = $this->chart->getDataPotensi();
        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('potensi/index', $data);
        $this->load->view('templates/footer');
    }

    public function Index_list()
    {


        $dpt = $this->chart->getDataPotensi();
        // $categories = array();
        // $categories['name'] = '';
        $rows = array();
        foreach ($dpt as $d) {
            // $rows = array($d->tanggapan, $d->total);
            // $categories['categories'][] = $d->namakec;
            // $row[] = $d->tanggapan;
            // $row[] = $d->total;
            array_push($rows, array($d->tanggapan, $d->total));
        }
        // array_push($rows, $row);
        // array_push($result, $rows); 
        print json_encode($rows, JSON_NUMERIC_CHECK);
    }
}

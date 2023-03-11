<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Chart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function Index()
    {
        $data['title'] = 'Chart Potensi Jaring Program';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris
        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('program/index', $data);
        $this->load->view('templates/footer');
    }

    public function Index_list()
    {
        $this->load->model('Potensi_model', 'chart');

        $dpt = $this->chart->getDataPotensi();
        // $categories = array();
        // $categories['name'] = '';
        $rows = array();
        foreach ($dpt as $r) {
            // $categories['categories'][] = $d->namakec;
            // $rows['data'][] = $d->total;
            $row[0] = $r[0];
            $row[1] = $r[1];
            array_push($rows, $row);
        }
        // array_push($result, $rows); 
        print json_encode($rows, JSON_NUMERIC_CHECK);
    }
}

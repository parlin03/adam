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
        $data['title'] = 'Jaring Program Makassar B';
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
        $this->load->model('Jaring_model', 'jaring');

        $dpt = $this->jaring->getDataDpt();
        // $categories = array();
        // $categories['name'] = '';
        $rows = array();
        $rows['name'] = 'Total DPT';
        $rows['type'] = 'column';
        foreach ($dpt as $d) {
            // $categories['categories'][] = $d->namakec;
            $rows['data'][] = $d->total;
        }
        $target = $this->jaring->getDataTarget();
        $rows0 = array();
        $rows0['name'] = 'Target Suara';
        $rows0['type'] = 'column';
        foreach ($target as $t) {
            $rows0['data'][] =  $t->total;
        }
        $result = array();

        $pip = $this->jaring->getDataPip();
        $rows1 = array();
        $rows1['name'] = 'Beasiswa PIP';
        $rows1['type'] = 'pie';
        foreach ($pip as $p) {
            $rows1['data'][] =  $p->total;
        }
        $kip = $this->jaring->getDataKip();
        $rows2 = array();
        $rows2['name'] = 'Beasiswa KIP';
        $rows2['type'] = 'column';
        foreach ($kip as $k) {
            $rows2['data'][] =  $k->total;
        }
        $bpum = $this->jaring->getDataBpum();
        $rows3 = array();
        $rows3['name'] = 'BPUM';
        $rows3['type'] = 'column';
        foreach ($bpum as $b) {
            $rows3['data'][] = $b->total;
        }
        $rumah = $this->jaring->getDataBedahrumah();
        $rows4 = array();
        $rows4['name'] = 'Bedah Rumah';
        $rows4['type'] = 'column';
        foreach ($rumah as $r) {
            $rows4['data'][] = $r->total;
        }
        // array_push($result, $categories);
        array_push($result, $rows);
        array_push($result, $rows0);
        array_push($result, $rows1);
        array_push($result, $rows2);
        array_push($result, $rows3);
        array_push($result, $rows4);

        print json_encode($result, JSON_NUMERIC_CHECK);
    }
}

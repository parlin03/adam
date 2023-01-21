<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jaring extends CI_Controller
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

        $target = $this->jaring->getDataPip();
        $rows1 = array();
        $rows1['name'] = 'Beasiswa PIP';
        $rows1['type'] = 'column';
        foreach ($target as $t) {
            $rows1['data'][] =  $t->total;
        }
        $tercapai = $this->jaring->getDataKip();
        $rows2 = array();
        $rows2['name'] = 'Beasiswa KIP';
        $rows2['type'] = 'column';
        foreach ($tercapai as $c) {
            $rows2['data'][] =  $c->total;
        }
        $ragu = $this->jaring->getDataBpum();
        $rows3 = array();
        $rows3['name'] = 'BPUM';
        $rows3['type'] = 'column';
        foreach ($ragu as $r) {
            $rows3['data'][] = $r->total;
        }
        $target = $this->jaring->getDataTarget();
        $rows4 = array();
        $rows4['name'] = 'Target';
        $rows4['type'] = 'column';
        foreach ($target as $t) {
            $rows4['data'][] =  $t->total;
        }
        $result = array();
        // array_push($result, $categories);
        array_push($result, $rows);
        array_push($result, $rows4);
        array_push($result, $rows1);
        array_push($result, $rows2);
        array_push($result, $rows3);

        print json_encode($result, JSON_NUMERIC_CHECK);
    }
}

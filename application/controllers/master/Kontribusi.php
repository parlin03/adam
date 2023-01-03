<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kontribusi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function Index()
    {
        $data['title'] = 'Kontribusi Pemilih Makassar B';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris
        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kontribusi/index', $data);
        $this->load->view('templates/footer');
    }

    public function Index_list()
    {
        $this->load->model('Kontribusi_model', 'kontribusi');

        $dpt = $this->kontribusi->getDataDpt();
        // $categories = array();
        // $categories['name'] = '';
        $rows = array();
        $rows['name'] = 'Total DPT';
        $rows['type'] = 'column';
        foreach ($dpt as $d) {
            // $categories['categories'][] = $d->namakec;
            $rows['data'][] = $d->total;
        }

        $target = $this->kontribusi->getDataTarget();
        $rows1 = array();
        $rows1['name'] = 'Target';
        $rows1['type'] = 'column';
        foreach ($target as $t) {
            $rows1['data'][] =  $t->total;
        }
        $tercapai = $this->kontribusi->getDataTercapai();
        $rows2 = array();
        $rows2['name'] = 'Tercapai';
        $rows2['type'] = 'line';
        foreach ($tercapai as $c) {
            $rows2['data'][] =  $c->total;
        }
        $ragu = $this->kontribusi->getDataRagu();
        $rows3 = array();
        $rows3['name'] = 'Ragu-Ragu';
        $rows3['type'] = 'line';
        foreach ($ragu as $r) {
            $rows3['data'][] = $r->total;
        }
        $result = array();
        // array_push($result, $categories);
        array_push($result, $rows);
        array_push($result, $rows1);
        array_push($result, $rows2);
        array_push($result, $rows3);

        print json_encode($result, JSON_NUMERIC_CHECK);
    }
    public function Categorys()
    {
        $this->load->model('Kontribusi_model', 'kontribusi');

        $dpt = $this->kontribusi->getDataDpt();
        $categories = array();
        foreach ($dpt as $d) {
            $categories['categories'][] = $d->namakec;
        }
        $result = array();

        array_push($result, $categories);
        print json_encode($categories);
    }

    public function Panakukkang()
    {
        $data['title'] = 'Kontribusi Pemilih Kec. Panakkukang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kontribusi/panakukkang', $data);
        $this->load->view('templates/footer');
    }

    public function Panakukkang_list()
    {
        $namakec = 'panakukkang';
        $this->load->model('Kontribusi_model', 'kontribusi');
        $dpt = $this->kontribusi->getDataDptKec($namakec);
        // $categories = array();
        // $categories['name'] = '';
        $rows = array();
        $rows['name'] = 'Total DPT';
        $rows['type'] = 'column';
        foreach ($dpt as $d) {
            // $categories['categories'][] = $d->namakec;
            // $rows['kel'][] = $d->namakel;
            $rows['data'][] = $d->total;
        }

        $target = $this->kontribusi->getDataTargetKec($namakec);
        $rows1 = array();
        $rows1['name'] = 'Target';
        $rows1['type'] = 'column';
        foreach ($target as $t) {
            $rows1['data'][] =  $t->total;
        }
        $tercapai = $this->kontribusi->getDataTercapaiKec($namakec);
        $rows2 = array();
        $rows2['name'] = 'Tercapai';
        $rows2['type'] = 'line';
        foreach ($tercapai as $c) {
            $rows2['data'][] =  $c->total;
        }
        $ragu = $this->kontribusi->getDataRaguKec($namakec);
        $rows3 = array();
        $rows3['name'] = 'Ragu-Ragu';
        $rows3['type'] = 'line';
        foreach ($ragu as $r) {
            $rows3['data'][] = $r->total;
        }
        $result = array();
        // array_push($result, $categories);
        array_push($result, $rows);
        array_push($result, $rows1);
        array_push($result, $rows2);
        array_push($result, $rows3);

        print json_encode($result, JSON_NUMERIC_CHECK);
    }

    public function Manggala()
    {
        $data['title'] = 'Kontribusi Pemilih Kec. Manggala';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kontribusi/manggala', $data);
        $this->load->view('templates/footer');
    }

    public function Manggala_list()
    {
        $namakec = 'manggala';
        $this->load->model('Kontribusi_model', 'kontribusi');
        $dpt = $this->kontribusi->getDataDptKec($namakec);
        $rows = array();
        $rows['name'] = 'Total DPT';
        $rows['type'] = 'column';
        foreach ($dpt as $d) {
            // $categories['categories'][] = $d->namakec;
            // $rows['kel'][] = $d->namakel;
            $rows['data'][] = $d->total;
        }

        $target = $this->kontribusi->getDataTargetKec($namakec);
        $rows1 = array();
        $rows1['name'] = 'Target';
        $rows1['type'] = 'column';
        foreach ($target as $t) {
            $rows1['data'][] =  $t->total;
        }
        $tercapai = $this->kontribusi->getDataTercapaiKec($namakec);
        $rows2 = array();
        $rows2['name'] = 'Tercapai';
        $rows2['type'] = 'line';
        foreach ($tercapai as $c) {
            $rows2['data'][] =  $c->total;
        }
        $ragu = $this->kontribusi->getDataRaguKec($namakec);
        $rows3 = array();
        $rows3['name'] = 'Ragu-Ragu';
        $rows3['type'] = 'line';
        foreach ($ragu as $r) {
            $rows3['data'][] = $r->total;
        }
        $result = array();
        // array_push($result, $categories);
        array_push($result, $rows);
        array_push($result, $rows1);
        array_push($result, $rows2);
        array_push($result, $rows3);

        print json_encode($result, JSON_NUMERIC_CHECK);
    }

    public function Biringkanaya()
    {
        $data['title'] = 'Kontribusi Pemilih Kec. Biringkanaya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kontribusi/biringkanaya', $data);
        $this->load->view('templates/footer');
    }

    public function Biringkanaya_list()
    {
        $namakec = 'biringkanaya';
        $this->load->model('Kontribusi_model', 'kontribusi');
        $dpt = $this->kontribusi->getDataDptKec($namakec);
        $rows = array();
        $rows['name'] = 'Total DPT';
        $rows['type'] = 'column';
        foreach ($dpt as $d) {
            // $categories['categories'][] = $d->namakec;
            // $rows['kel'][] = $d->namakel;
            $rows['data'][] = $d->total;
        }

        $target = $this->kontribusi->getDataTargetKec($namakec);
        $rows1 = array();
        $rows1['name'] = 'Target';
        $rows1['type'] = 'column';
        foreach ($target as $t) {
            $rows1['data'][] =  $t->total;
        }
        $tercapai = $this->kontribusi->getDataTercapaiKec($namakec);
        $rows2 = array();
        $rows2['name'] = 'Tercapai';
        $rows2['type'] = 'line';
        foreach ($tercapai as $c) {
            $rows2['data'][] =  $c->total;
        }
        $ragu = $this->kontribusi->getDataRaguKec($namakec);
        $rows3 = array();
        $rows3['name'] = 'Ragu-Ragu';
        $rows3['type'] = 'line';
        foreach ($ragu as $r) {
            $rows3['data'][] = $r->total;
        }
        $result = array();
        // array_push($result, $categories);
        array_push($result, $rows);
        array_push($result, $rows1);
        array_push($result, $rows2);
        array_push($result, $rows3);

        print json_encode($result, JSON_NUMERIC_CHECK);
    }

    public function Tamalanrea()
    {
        $data['title'] = 'Kontribusi Pemilih Kec. Tamalanrea';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kontribusi/tamalanrea', $data);
        $this->load->view('templates/footer');
    }

    public function Tamalanrea_list()
    {
        $namakec = 'tamalanrea';
        $this->load->model('Kontribusi_model', 'kontribusi');
        $dpt = $this->kontribusi->getDataDptKec($namakec);
        $rows = array();
        $rows['name'] = 'Total DPT';
        $rows['type'] = 'column';
        foreach ($dpt as $d) {
            // $categories['categories'][] = $d->namakec;
            // $rows['kel'][] = $d->namakel;
            $rows['data'][] = $d->total;
        }

        $target = $this->kontribusi->getDataTargetKec($namakec);
        $rows1 = array();
        $rows1['name'] = 'Target';
        $rows1['type'] = 'column';
        foreach ($target as $t) {
            $rows1['data'][] =  $t->total;
        }
        $tercapai = $this->kontribusi->getDataTercapaiKec($namakec);
        $rows2 = array();
        $rows2['name'] = 'Tercapai';
        $rows2['type'] = 'line';
        foreach ($tercapai as $c) {
            $rows2['data'][] =  $c->total;
        }
        $ragu = $this->kontribusi->getDataRaguKec($namakec);
        $rows3 = array();
        $rows3['name'] = 'Ragu-Ragu';
        $rows3['type'] = 'line';
        foreach ($ragu as $r) {
            $rows3['data'][] = $r->total;
        }
        $result = array();
        // array_push($result, $categories);
        array_push($result, $rows);
        array_push($result, $rows1);
        array_push($result, $rows2);
        array_push($result, $rows3);

        print json_encode($result, JSON_NUMERIC_CHECK);
    }
}

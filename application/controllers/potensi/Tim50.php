<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Tim50 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Tim50_model', 'tim50_m');
    }

    public function index()
    {
        $data['title'] = 'TIM 50';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris


        $data['pencapaian'] = $this->tim50_m->getPencapaian(); //array banyak
        $data['pencapaiantim'] = $this->tim50_m->getPencapaianTim(); //array banyak
        $data['export'] = $this->tim50_m->getTim50Export();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('potensi/tim50/index', $data);
        $this->load->view('templates/footer');
    }

    public function export()
    {
        $data['title'] = 'Potensi Suara Terdaftar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris


        $data['pencapaian'] = $this->tim50_m->getPencapaian(); //array banyak
        $data['pencapaiantim'] = $this->tim50_m->getPencapaianTim(); //array banyak
        // load library pagination
        $data['export'] = $this->tim50_m->getTim50Export();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('potensi/tim50/export', $data);
        $this->load->view('templates/footer');
    }
    public function list()
    {
        $this->load->model('Tim50_model', 'tim50_model');
        // $target = $this->tim50_model->getDataTarget();
        $rows = array();
        $rows['name'] = 'Target';
        $rows['type'] = 'column';
        $rows['data'] =  [5500, 5500, 4500, 4500];

        $Capaian = $this->tim50_model->getDataCapaian();
        $rows1 = array();
        $rows1['name'] = 'Capaian';
        $rows1['type'] = 'line';
        foreach ($Capaian as $c) {
            $rows1['data'][] =  $c->total;
        }

        $result = array();

        array_push($result, $rows);
        array_push($result, $rows1);

        print json_encode($result, JSON_NUMERIC_CHECK);
    }

    public function Pie_list()
    {
        $graph = $this->tim50_m->getDataPie();

        $rows = array();
        foreach ($graph as $d) {
            array_push($rows, array($d->status, $d->jml_status));
        }

        print json_encode($rows, JSON_NUMERIC_CHECK);
    }
    public function kec()
    {
        $data['title'] = 'Pasukan Timur';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $data['kec'] = $this->uri->segment(4);
        $data['kelurahan'] = $this->tim50_m->getKelurahan($data['kec']);
        $data['PencapaianKec'] = $this->tim50_m->getPencapaianKec($data['kec']); //array banyak

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('potensi/tim50/kec', $data);
        $this->load->view('templates/footer');
    }

    public function capaian()
    {
        $data['title'] = 'Verifikasi Potensi Jaring Program';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $data['program'] = $this->tim50_m->getDataCapaianGraph();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('potensi/tim50/capaian', $data);
        $this->load->view('templates/footer');
    }

    public function Capaian_list()
    {


        $graph = $this->tim50_m->getDataCapaianGraph();
        // $categories = array();
        // $categories['name'] = '';
        $rows = array();
        foreach ($graph as $d) {
            // $rows = array($d->tanggapan, $d->total);
            // $categories['categories'][] = $d->namakec;
            // $row[] = $d->tanggapan;
            // $row[] = $d->total;
            if ($d->program == "") {
                $d->program = "Lain-Lain";
            }
            array_push($rows, array($d->program, $d->total));
        }
        // array_push($rows, $row);
        // array_push($result, $rows); 
        print json_encode($rows, JSON_NUMERIC_CHECK);
    }

    public function tps()
    {
        $data['title'] = 'Pasukan Timur';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $data['kec'] = $this->uri->segment(4);
        $data['kel'] = preg_replace('/%20/', ' ', $this->uri->segment(5));
        $data['tps'] = $this->uri->segment(6);
        $data['PencapaianTps'] = $this->tim50_m->getPencapaianTps($data['kec'], $data['kel'], $data['tps']); //array banyak

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('potensi/tim50/tps', $data);
        $this->load->view('templates/footer');
    }
    public function team()
    {
        $data['title'] = 'Pasukan Timur';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $data['uid'] = $this->uri->segment(4);
        $data['grafik'] = $this->tim50_m->getTeamGraph($data['uid']);
        $data['TotalDaftar'] = $this->tim50_m->getTotalDaftar($data['uid']); //single array
        $data['TotalDpt'] = $this->tim50_m->getTotalDpt(); //array banyak
        $data['pencapaian'] = $this->tim50_m->getTeamPencapaian($data['uid']); //array banyak
        // $data['tim50'] = $this->tim50->getLksTim50(); //array banyak
        $data['pencapaiantimall'] = $this->tim50_m->getPencapaianTimAll(); //array banyak

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('potensi/tim50/team', $data);
        $this->load->view('templates/footer');
    }
}

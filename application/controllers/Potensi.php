<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Potensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Potensi_model', 'chart');
        $this->load->model('Dtdc_model', 'dtdc');
        $this->load->model('Verifikasi_model', 'verifikasi');
    }

    public function verifikasi()
    {
        $data['title'] = 'Verifikasi Potensi Jaring Program';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $data['potensi'] = $this->chart->getDataPotensi();
        // load library pagination
        $this->load->helper('url');
        $this->load->library('pagination');

        // ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']); //simpan pencarian di session
        } else {
            $data['keyword'] =  $this->session->userdata('keyword');
        }

        // config pagination
        $config['base_url'] = base_url('potensi/verifikasi/');
        $config['total_rows'] = $this->verifikasi->countAll($data['keyword']);
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        // initialize pagination
        $this->pagination->initialize($config);

        // echo $this->pagination->create_links();
        $data['start'] = $this->uri->segment(3);
        $data['verifikasi'] = $this->verifikasi->getVerifikasi($config['per_page'], $data['start'], $data['keyword']);
        var_dump($data['start']);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('potensi/vjp', $data);
        $this->load->view('templates/footer');
    }

    public function Verifikasi_list()
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

    public function capaian()
    {
        $data['title'] = 'Data Pencapaian Program';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris
        $data['capaian'] = $this->chart->getDataCapaian();
        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('potensi/capaian', $data);
        $this->load->view('templates/footer');
    }

    ###############DTDC####################################################################################################################

    public function dtdc()
    {
        $data['title'] = 'DTDC Potensi Jaring Program';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris


        $data['pencapaian'] = $this->dtdc->getPencapaian(); //array banyak
        $data['pencapaiantim'] = $this->dtdc->getPencapaianTim(); //array banyak
        // load library pagination
        $this->load->library('pagination');

        // ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']); //simpan pencarian di session
        } else {
            $data['keyword'] =  $this->session->userdata('keyword');
        }

        // config pagination
        $config['base_url'] = base_url('potensi/dtdc/');
        $config['total_rows'] = $this->dtdc->countAll($data['keyword']);
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        // initialize pagination
        $this->pagination->initialize($config);

        // echo $this->pagination->create_links();
        $data['start'] = $this->uri->segment(3);
        $data['dtdc'] = $this->dtdc->getDtdc($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('potensi/dtdc', $data);
        $this->load->view('templates/footer');
    }
    public function Dtdc_list()
    {

        $target = $this->dtdc->getDataTarget();
        $rows1 = array();
        $rows1['name'] = 'Target';
        $rows1['type'] = 'column';
        foreach ($target as $t) {
            $rows1['data'][] =  $t->total;
        }
        $Capaian = $this->dtdc->getDataCapaian();
        $rows2 = array();
        $rows2['name'] = 'Capaian';
        $rows2['type'] = 'line';
        foreach ($Capaian as $c) {
            $rows2['data'][] =  $c->total;
        }

        $result = array();

        array_push($result, $rows1);
        array_push($result, $rows2);

        print json_encode($result, JSON_NUMERIC_CHECK);
    }
    public function kec()
    {
        $data['title'] = 'Pasukan Timur';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $data['kec'] = $this->uri->segment(3);
        $data['kelurahan'] = $this->dtdc->getKelurahan($data['kec']);
        $data['PencapaianKec'] = $this->dtdc->getPencapaianKec($data['kec']); //array banyak

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('potensi/dtdc/kec', $data);
        $this->load->view('templates/footer');
    }
    public function tps()
    {
        $data['title'] = 'Pasukan Timur';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $data['kec'] = $this->uri->segment(3);
        $data['kel'] = preg_replace('/%20/', ' ', $this->uri->segment(4));
        $data['tps'] = $this->uri->segment(5);
        $data['PencapaianTps'] = $this->dtdc->getPencapaianTps($data['kec'], $data['kel'], $data['tps']); //array banyak

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('potensi/dtdc/tps', $data);
        $this->load->view('templates/footer');
    }
    public function team()
    {
        $data['title'] = 'Pasukan Timur';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $data['pencapaiantimall'] = $this->dtdc->getPencapaianTimAll(); //array banyak

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('potensi/dtdc/team', $data);
        $this->load->view('templates/footer');
    }
}

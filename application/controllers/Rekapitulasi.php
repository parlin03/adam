<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Rekapitulasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('session');
        $this->load->model('Rekapitulasi_model', 'rekapitulasi');

        $this->load->model('Bedahrumah_model', 'bedahrumah');
    }


    public function Index()
    {
        $data['menu'] = 'Rekapitulasi ';
        $data['title'] = 'Perhitungan Suara';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        // $data['head'] = 'Kecamatan';
        $data['kel'] = $this->input->get('kel');
        $data['kec'] = $this->input->get('kec');
        if ($data['kec'] && $data['kel']) {
            $data['head'] = 'TPS';
            $data['link'] =  $data['kec'] . '&kel=' . $data['kec'] . '&tps=';
            $data['back'] =  '?kec=' . $data['kec'];
            $data['report'] =  'Kecamatan ' . ucfirst($data['kec']) . ' Kelurahan ' . ucwords($data['kel']);
        } elseif ($data['kec']) {
            $data['head'] = 'Kelurahan';
            $data['link'] =  $data['kec'] . '&kel=';
            $data['back'] =  '';
            $data['report'] =  'Kecamatan ' . ucfirst($data['kec']);
        } else {
            $data['head'] = 'Kecamatan';
            $data['link'] = '';
            $data['back'] = '';
            $data['report'] = 'Makassar B Dapil II Sulsel';
        }
        $data['summary'] = $this->rekapitulasi->getDataGraph();
        $data['hasil'] = $this->rekapitulasi->getDataHasil($data['kec'], $data['kel']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rekapitulasi', $data);
        $this->load->view('templates/footer');
    }

    public function Graph_list()
    {
        $graph = $this->rekapitulasi->getDataGraph();

        $rows = array();
        foreach ($graph as $d) {
            array_push($rows, array($d->nama_calon, $d->jml_suara));
        }

        print json_encode($rows, JSON_NUMERIC_CHECK);
    }
}

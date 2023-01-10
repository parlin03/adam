<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_Filter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->database();
    }

    public function Index($id = '')
    {
        $data['title'] = "Test Cetak";
        $data['kecamatan'] = $this->db->get('kec')->result();
        $data['id'] = $id;
        $this->load->view('laporan/filter', $data);
    }
    public function filter($id)
    {
        if ($id == 0) {
            $dt = $this->db->get('dpt')->result();
        } else {
            $dt = $this->db->get_where('dpt', ['idkec' => $id], $limit = 10000)->result();
        }
        $data['dpt'] = $dt;
        $this->load->view('laporan/result', $data);
    }
    public function cetak($id)
    {
        var_dump($id);
        die;
        if ($id == 0) {
            $dt = $this->db->get('dpt')->result();
        } else {
            $dt = $this->db->get_where('dpt', ['idkec' => $id], $limit = 10000)->result();
        }
        $data['dpt'] = $dt;
        $this->load->view('laporan/cetak', $data);
    }
}

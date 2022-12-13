<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function Index()
    {
        $data['title'] = 'Data Kartu Keluarga Makassar B';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $this->load->model('Kk_Model', 'kk');
        $data['kk'] = $this->kk->makassar();

        $this->load->helper('url');       //pointer sidebar
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kk/index', $data);
        $this->load->view('templates/footer');
    }
    public function Panakukkang()
    {
        $namakec = 'panakukkang';
        // $this->kk_Model->$namakec;
        $data['title'] = 'Data Jenis Kelamin Kec. Panakukkang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris
        $this->load->model('Kk_Model', 'kk');
        $data['kk'] = $this->kk->kecamatan($namakec);

        $this->load->helper('url');       //pointer sidebar
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kk/panakukkang', $data);
        $this->load->view('templates/footer');
    }
    public function Manggala()
    {
        $namakec = 'manggala';
        $data['title'] = 'Data Jenis Kelamin Kec. Manggala';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $this->load->model('Kk_Model', 'kk');
        $data['kk'] = $this->kk->kecamatan($namakec);

        $this->load->helper('url');       //pointer sidebar
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kk/manggala', $data);
        $this->load->view('templates/footer');
    }
    public function Biringkanaya()
    {
        $namakec = 'biringkanaya';
        $data['title'] = 'Data Jenis Kelamin Kec. Biringkanaya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $this->load->model('Kk_Model', 'kk');
        $data['kk'] = $this->kk->kecamatan($namakec);

        $this->load->helper('url');       //pointer sidebar
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kk/biringkanaya', $data);
        $this->load->view('templates/footer');
    }
    public function Tamalanrea()
    {
        $namakec = 'tamalanrea';
        $data['title'] = 'Data Jenis Kelamin Kec. Tamalanrea';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $this->load->model('Kk_Model', 'kk');
        $data['kk'] = $this->kk->kecamatan($namakec);

        $this->load->helper('url');       //pointer sidebar
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kk/tamalanrea', $data);
        $this->load->view('templates/footer');
    }
}

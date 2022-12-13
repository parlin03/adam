<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Soa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function Panakkukang()
    {
        $namakec = 'panakkukang';
        $data['title'] = 'Data Team SoA Kec. ' . ucfirst($namakec);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $data['soa'] = $this->db->get_where('soa', ['namakec' => $namakec])->result();

        $this->load->helper('url');       //pointer sidebar
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('team/soa/index', $data);
        $this->load->view('templates/footer');
    }
    public function Manggala()
    {
        $namakec = 'manggala';
        $data['title'] = 'Data Team SoA Kec. ' . ucfirst($namakec);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $data['soa'] = $this->db->get_where('soa', ['namakec' => $namakec])->result();

        $this->load->helper('url');       //pointer sidebar
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('team/soa/index', $data);
        $this->load->view('templates/footer');
    }
    public function Biringkanaya()
    {
        $namakec = 'biringkanaya';
        $data['title'] = 'Data Team SoA Kec. ' . ucfirst($namakec);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $data['soa'] = $this->db->get_where('soa', ['namakec' => $namakec])->result();

        $this->load->helper('url');       //pointer sidebar
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('team/soa/index', $data);
        $this->load->view('templates/footer');
    }
    public function Tamalanrea()
    {
        $namakec = 'tamalanrea';
        $data['title'] = 'Data Team SoA Kec. ' . ucfirst($namakec);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $data['soa'] = $this->db->get_where('soa', ['namakec' => $namakec])->result();

        $this->load->helper('url');       //pointer sidebar
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('team/soa/index', $data);
        $this->load->view('templates/footer');
    }
}

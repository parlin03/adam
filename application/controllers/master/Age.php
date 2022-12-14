<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Age extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function Makassar()
    {
        $data['title'] = 'Data Umur Makassar B';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $this->load->model('Age_Model', 'age');
        $data['age'] = $this->age->age_kecamatan();

        $this->load->helper('url');       //pointer sidebar
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('age/makassar', $data);
        $this->load->view('templates/footer');
    }
    public function Panakukkang()
    {
        $data['title'] = 'Data Umur Kec. Panakukkang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $this->load->model('Age_Model', 'age');
        $data['age'] = $this->age->age_panakukkang();

        $this->load->helper('url');       //pointer sidebar
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('age/panakukkang', $data);
        $this->load->view('templates/footer');
    }
    public function Manggala()
    {
        $data['title'] = 'Data Umur Kec. Manggala';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $this->load->model('Age_Model', 'age');
        $data['age'] = $this->age->age_manggala();

        $this->load->helper('url');       //pointer sidebar
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('age/manggala', $data);
        $this->load->view('templates/footer');
    }
    public function Biringkanaya()
    {
        $data['title'] = 'Data Umur Kec. Biringkanaya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $this->load->model('Age_Model', 'age');
        $data['age'] = $this->age->age_biringkanaya();

        $this->load->helper('url');       //pointer sidebar
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('age/biringkanaya', $data);
        $this->load->view('templates/footer');
    }
    public function Tamalanrea()
    {
        $data['title'] = 'Data Umur Kec. Tamalanrea';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $this->load->model('Age_Model', 'age');
        $data['age'] = $this->age->age_tamalanrea();

        $this->load->helper('url');       //pointer sidebar
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('age/tamalanrea', $data);
        $this->load->view('templates/footer');
    }
}

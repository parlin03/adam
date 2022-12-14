<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gender extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function Index()
    {
        $data['title'] = 'Data Jenis Kelamin Makassar B';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $this->load->model('Gender_Model', 'gender');
        $data['gender'] = $this->gender->makassar();

        $this->load->helper('url');       //pointer sidebar
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('gender/index', $data);
        $this->load->view('templates/footer');
    }
    public function Panakukkang()
    {
        $data['title'] = 'Data Jenis Kelamin Kec. Panakukkang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $this->load->model('Gender_Model', 'gender');
        $data['gender'] = $this->gender->panakukkang();

        $this->load->helper('url');       //pointer sidebar
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('gender/panakukkang', $data);
        $this->load->view('templates/footer');
    }
    public function Manggala()
    {
        $data['title'] = 'Data Jenis Kelamin Kec. Manggala';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $this->load->model('Gender_Model', 'gender');
        $data['gender'] = $this->gender->manggala();

        $this->load->helper('url');       //pointer sidebar
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('gender/manggala', $data);
        $this->load->view('templates/footer');
    }
    public function Biringkanaya()
    {
        $data['title'] = 'Data Jenis Kelamin Kec. Biringkanaya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $this->load->model('Gender_Model', 'gender');
        $data['gender'] = $this->gender->biringkanaya();

        $this->load->helper('url');       //pointer sidebar
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('gender/biringkanaya', $data);
        $this->load->view('templates/footer');
    }
    public function Tamalanrea()
    {
        $data['title'] = 'Data Jenis Kelamin Kec. Tamalanrea';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $this->load->model('Gender_Model', 'gender');
        $data['gender'] = $this->gender->tamalanrea();

        $this->load->helper('url');       //pointer sidebar
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('gender/tamalanrea', $data);
        $this->load->view('templates/footer');
    }
}

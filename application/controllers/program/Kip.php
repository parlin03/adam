<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Kip extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Kip_model', 'kip');
    }

    public function Panakkukang()
    {
        $data['namakec'] = 'panakkukang';
        $data['title'] = 'Jaring Program Beasiswa KIP Kec. ' . ucfirst($data['namakec']);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

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
        $config['base_url'] = base_url('program/kip/' . $data['namakec']);
        $config['total_rows'] = $this->kip->countAllKip($data['namakec'], $data['keyword']);
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 6;

        // initialize pagination
        $this->pagination->initialize($config);

        // echo $this->pagination->create_links();
        $data['start'] = $this->uri->segment(4);
        $data['kip'] = $this->kip->getKipKecamatan($config['per_page'], $data['start'], $data['namakec'], $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('program/kip/index', $data);
        $this->load->view('templates/footer');
    }

    public function Manggala()
    {
        $data['namakec'] = 'manggala';
        $data['title'] = 'Jaring Program Beasiswa KIP Kec. ' . ucfirst($data['namakec']);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

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
        $config['base_url'] = base_url('program/kip/' . $data['namakec']);
        $config['total_rows'] = $this->kip->countAllKip($data['namakec'], $data['keyword']);
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 6;

        // initialize pagination
        $this->pagination->initialize($config);

        // echo $this->pagination->create_links();
        $data['start'] = $this->uri->segment(4);
        $data['kip'] = $this->kip->getKipKecamatan($config['per_page'], $data['start'], $data['namakec'], $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('program/kip/index', $data);
        $this->load->view('templates/footer');
    }

    public function Biringkanaya()
    {
        $data['namakec'] = 'biringkanaya';
        $data['title'] = 'Jaring Program Beasiswa KIP Kec. ' . ucfirst($data['namakec']);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

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
        $config['base_url'] = base_url('program/kip/' . $data['namakec']);
        $config['total_rows'] = $this->kip->countAllKip($data['namakec'], $data['keyword']);
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 6;

        // initialize pagination
        $this->pagination->initialize($config);

        // echo $this->pagination->create_links();
        $data['start'] = $this->uri->segment(4);
        $data['kip'] = $this->kip->getKipKecamatan($config['per_page'], $data['start'], $data['namakec'], $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('program/kip/index', $data);
        $this->load->view('templates/footer');
    }

    public function Tamalanrea()
    {
        $data['namakec'] = 'tamalanrea';
        $data['title'] = 'Jaring Program Beasiswa KIP Kec. ' . ucfirst($data['namakec']);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

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
        $config['base_url'] = base_url('program/kip/' . $data['namakec']);
        $config['total_rows'] = $this->kip->countAllKip($data['namakec'], $data['keyword']);
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 6;

        // initialize pagination
        $this->pagination->initialize($config);

        // echo $this->pagination->create_links();
        $data['start'] = $this->uri->segment(4);
        $data['kip'] = $this->kip->getKipKecamatan($config['per_page'], $data['start'], $data['namakec'], $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('program/kip/index', $data);
        $this->load->view('templates/footer');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pip_model extends CI_Model
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     // $this->load->database();
    //     // $namakec = 'panakukkang';
    // }

    public function getDataGraph()
    {
        $this->db->select('kec_siswa, count(id) as total');
        $this->db->from('tbl_pip');
        $this->db->group_by('kec_siswa');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataSummary()
    {
        $this->db->select('kec_siswa, count(id) as total');
        $this->db->from('tbl_pip');
        $this->db->join('kec', 'kec.namakec=tbl_pip.kec_siswa');
        $this->db->group_by('kec_siswa');
        $this->db->order_by('idkec');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataExport()
    {

        return $this->db->get('tbl_pip')->result_array();
    }

    ####################################################################
    public function getPipKecamatan($limit, $start, $namakec, $keyword = null)
    {
        $this->db->where('kec_siswa', $namakec);

        if ($keyword) {
            $this->db->like('nama_siswa', $keyword);
            $this->db->or_like('nama_sekolah', $keyword);
        }

        return $this->db->get('tbl_pip', $limit, $start)->result_array();
    }

    public function countAllPip($namakec, $keyword = null)
    {
        $this->db->where('kec_siswa', $namakec);

        if ($keyword) {
            $this->db->like('nama_siswa', $keyword);
            $this->db->or_like('nama_sekolah', $keyword);
        }

        return $this->db->count_all_results('tbl_pip');
    }
}

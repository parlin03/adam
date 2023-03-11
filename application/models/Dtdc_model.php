<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dtdc_model extends CI_Model
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     // $this->load->database();
    //     // $namakec = 'panakukkang';
    // }
    public function getDtdc($limit, $start, $keyword = null)
    {
        // if ($namakec == 'panakkukang') {
        //     $this->db->where('kecamatan', $namakec);
        //     $this->db->or_where('kecamatan', 'panakukkang');
        // } else {

        //     $this->db->where('kecamatan', $namakec);
        // }

        $this->db->join('user', 'lks_dtdc.user_id = user.id');


        if ($keyword) {
            $this->db->like('nama', $keyword);
            // $this->db->or_like('noktp', $keyword);
        }

        return $this->db->get('lks_dtdc', $limit, $start)->result_array();
    }

    public function countAll($keyword = null)
    {
        // $this->db->where('kecamatan', $namakec);
        // if ($namakec == 'panakkukang') {
        //     $this->db->where('kecamatan', $namakec);
        //     $this->db->or_where('kecamatan', 'panakukkang');
        // } else {

        //     $this->db->where('kecamatan', $namakec);
        // }

        if ($keyword) {
            $this->db->like('nama', $keyword);
            // $this->db->or_like('noktp', $keyword);
        }

        return $this->db->count_all_results('lks_dtdc');
    }
}

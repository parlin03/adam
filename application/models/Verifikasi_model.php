<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verifikasi_model extends CI_Model
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     // $this->load->database();
    //     // $namakec = 'panakukkang';
    // }
    public function getVerifikasi($limit, $start, $keyword = null)
    {
        // if ($namakec == 'panakkukang') {
        //     $this->db->where('kecamatan', $namakec);
        //     $this->db->or_where('kecamatan', 'panakukkang');
        // } else {

        //     $this->db->where('kecamatan', $namakec);
        // }

        $this->db->join('kec', 'lks_vjp.namakec = kec.idkec');
        $this->db->join('user', 'lks_vjp.user_id = user.id');


        if ($keyword) {
            $this->db->like('nama', $keyword);
            // $this->db->or_like('noktp', $keyword);
        }

        $query = $this->db->get('lks_vjp', $limit, $start);
        // var_dump($query);
        // die;
        return $query->result_array();
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

        return $this->db->count_all_results('lks_vjp');
    }
}

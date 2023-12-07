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

    public function getDataTarget()
    {
        $this->db->select('dpt.namakec, round((count(*)*8)/100,0) as total');
        $this->db->from('dpt');
        $this->db->join('kec', 'kec.namakec = dpt.namakec');
        $this->db->group_by('namakec');
        $this->db->order_by('kec.idkec', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataCapaian()
    {
        $this->db->select('dpt.namakec, count(lks_dtdc.id) as total');
        $this->db->from('dpt');
        $this->db->join('lks_dtdc', 'lks_dtdc.dpt_id = dpt.id');
        $this->db->join('kec', 'kec.namakec = dpt.namakec');
        $this->db->group_by('dpt.namakec');
        $this->db->order_by('kec.idkec', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }



    public function getPencapaian()
    {
        $this->db->select('dpt.namakec, count(lks_dtdc.noktp) as total, , totaldpt');
        $this->db->from('dpt');
        $this->db->join('lks_dtdc', 'lks_dtdc.dpt_id = dpt.id');
        $this->db->join('kec', 'kec.namakec = dpt.namakec');
        $this->db->join('(select dpt.namakec, count(dpt.id) as totaldpt from dpt group by namakec) as a', 'a.namakec = dpt.namakec');
        $this->db->group_by('namakec');
        $this->db->order_by('kec.idkec', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPencapaianTim()
    {
        $this->db->select('user.name, count(lks_dtdc.id) as total');
        $this->db->from('lks_dtdc');
        $this->db->join('user', 'lks_dtdc.user_id = user.id');
        $this->db->group_by('user.id');
        $this->db->order_by('total', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDtdc($limit, $start, $keyword = null)
    {
        $this->db->select('lks_dtdc.id, dpt.noktp, dpt.nama, dpt.alamat, namakel, namakec, rt, rw, tps, lks_dtdc.nohp, user.name, lks_dtdc.image');
        $this->db->join('dpt', 'lks_dtdc.dpt_id = dpt.id');
        $this->db->join('user', 'lks_dtdc.user_id = user.id');


        if ($keyword) {
            // $this->db->like('nama', $keyword);
            $this->db->or_like('lks_dtdc.noktp', $keyword);
        }




        return $this->db->get('lks_dtdc', $limit, $start)->result_array();
    }

    public function countAll($keyword = null)
    {
        if ($keyword) {
            // $this->db->like('dpt.nama', $keyword);
            $this->db->or_like('lks_dtdc.noktp', $keyword);
        }

        return $this->db->count_all_results('lks_dtdc');
    }
}

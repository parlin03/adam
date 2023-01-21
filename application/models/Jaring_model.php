<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');
class Jaring_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getDataDpt()
    {
        $this->db->select('namakec, count(*) as total');
        $this->db->from('dpt');
        $this->db->group_by('namakec');
        $this->db->order_by('namakec', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataKip()
    {
        $this->db->select('namakec, count(*) as total');
        $this->db->from('tbl_kip');
        $this->db->group_by('namakec');
        $this->db->order_by('namakec', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataPip()
    {
        $this->db->select('kec_siswa, count(*) as total');
        $this->db->from('tbl_pip');
        $this->db->group_by('kec_siswa');
        $this->db->order_by('kec_siswa', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataBpum()
    {
        $this->db->select('kecamatan, count(*) as total');
        $this->db->from('tbl_bpum');
        $this->db->group_by('kecamatan');
        $this->db->order_by('kecamatan', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function getDataTarget()
    {
        $this->db->select('namakec, round((count(*)*8)/100,0) as total');
        $this->db->from('dpt');
        $this->db->group_by('namakec');
        $this->db->order_by('namakec', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataDptKec($namakec)
    {
        $this->db->select('namakel, count(*) as total');
        $this->db->from('dpt');
        $this->db->where('namakec', $namakec);
        $this->db->group_by('namakel');
        $this->db->order_by('iddesa');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataTargetKec($namakec)
    {
        $this->db->select('namakec, round((count(*)*8)/100,0) as total');
        $this->db->from('dpt');
        $this->db->where('namakec', $namakec);
        $this->db->group_by('namakel');
        $this->db->order_by('iddesa');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataTercapaiKec($namakec)
    {
        $this->db->select('namakel, round(count(*)/3) as total');
        $this->db->from('dpt');
        $this->db->where('namakec', $namakec);
        $this->db->group_by('namakel');
        $this->db->order_by('iddesa');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataRaguKec($namakec)
    {
        $this->db->select('namakel, round(count(*)/5) as total');
        $this->db->from('dpt');
        $this->db->where('namakec', $namakec);
        $this->db->group_by('namakel');
        $this->db->order_by('iddesa');
        $query = $this->db->get();
        return $query->result();
    }
}

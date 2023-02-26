<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');
class m_Dashboard extends CI_Model
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
        $this->db->order_by('iddesa');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataTeam()
    {
        $this->db->select('namakec, count(*) as total');
        $this->db->from('soa');
        $this->db->group_by('namakec');
        $this->db->order_by('iddesa');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataPotensi()
    {
        $this->db->select('namakec, round((count(*)*8)/100,0) as total');
        $this->db->from('dpt');
        $this->db->group_by('namakec');
        $this->db->order_by('iddesa');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataSaksi()
    {
        $this->db->select('namakec, sum(rekap) as total');
        $this->db->from('rekap2019');
        $this->db->join('kel', 'kel.namakel = rekap2019.namakel');
        $this->db->group_by('namakec');
        $this->db->order_by('kel.iddesa');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataRps()
    {
        $this->db->select('namakec, round(((count(*)*6)/100)) as total');
        $this->db->from('dpt');
        $this->db->group_by('namakec');
        $this->db->order_by('iddesa');
        $query = $this->db->get();
        return $query->result();
    }
}

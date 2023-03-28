<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard_model extends CI_Model
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
        $query = $this->db->query("SELECT a.namakec, a.idkec, IFNULL(b.total,0)+IFNULL(c.total,0)+IFNULL(d.total,0) AS total
        FROM kec a 
        left   JOIN (select namakec, count(*) as total from organik group by namakec) b
             ON b.namakec = a.namakec
        left   JOIN (select namakec, count(*) as total from soa group by namakec) c
             ON c.namakec=a.namakec
        left   JOIN (select namakec, count(*) as total from simpul group by namakec) d
             ON d.namakec=a.namakec
         group by namakec order by a.idkec");
        return $query->result();
    }

    public function getDataPotensi()
    {
        $this->db->select('idkec, sum(if(`tanggapan`="Bersedia",1, 0)) AS total');
        $this->db->from('kec');
        $this->db->join('lks_vjp', 'kec.namakec = lks_vjp.namakec', 'left');
        $this->db->group_by('kec.namakec');
        $this->db->order_by('idkec');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataSaksi()
    {
        $this->db->select('saksi.namakec, count(*) as total');
        $this->db->from('saksi');
        $this->db->join('kec', 'kec.namakec = saksi.namakec');
        $this->db->group_by('saksi.namakec');
        $this->db->order_by('idkec');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataRps()
    {
        $this->db->select('saksi.namakec, count(*) as total');
        $this->db->from('saksi');
        $this->db->join('kec', 'kec.namakec = saksi.namakec');
        $this->db->group_by('saksi.namakec');
        $this->db->order_by('idkec');
        $query = $this->db->get();
        return $query->result();
    }
}

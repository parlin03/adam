<?php

use LDAP\Result;
use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');
class Potensi_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getDataPotensi()
    {
        $this->db->select('tanggapan, count(tanggapan) as total');
        $this->db->from('lks_vjp');
        $this->db->group_by('tanggapan');
        $query = $this->db->get();
        return $query->result();
    }
}

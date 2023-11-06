<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Import_model extends CI_Model
{
    var $tbl_dtdcpip = 'lks_dtdc_pip';
    var $tbl_dtdckip = 'lks_dtdc_kip';

    /*
    |-------------------------------------------------------------------
    | Fetch All pip Data
    |-------------------------------------------------------------------
    | 
    */
    public function fetch_dtdcpip()
    {
        /* Filter */
        $filter = $this->input->post('filter');
        if ($filter == 1) {
            $fsek = $this->input->post('filter-sekolah');
            $this->db->where('sekolah', $fsek);
        }
        /* Query */
        //    $this->db->select("*, (price*qty) as total");

        $query = $this->db->get($this->tbl_dtdcpip);
        return $query->result_array();
    }

    /*
    |-------------------------------------------------------------------
    | Insert Batch pip Data
    |-------------------------------------------------------------------
    |
    | @param $data  pips Array Data
    |
    */
    function insert_dtdcpip_batch($data)
    {
        $this->db->insert_on_duplicate_update_batch($this->tbl_dtdcpip, $data);
        //$this->db->insert_batch($this->tbl_pip, $data);

    }
    public function fetch_dtdckip()
    {
        /* Filter */
        $filter = $this->input->post('filter');
        if ($filter == 1) {
            $fsek = $this->input->post('filter-sekolah');
            $this->db->where('sekolah', $fsek);
        }
        /* Query */
        //    $this->db->select("*, (price*qty) as total");

        $query = $this->db->get($this->tbl_dtdckip);
        return $query->result_array();
    }

    /*
    |-------------------------------------------------------------------
    | Insert Batch pip Data
    |-------------------------------------------------------------------
    |
    | @param $data  pips Array Data
    |
    */
    function insert_dtdckip_batch($data)
    {
        $this->db->insert_on_duplicate_update_batch($this->tbl_dtdckip, $data);
        //$this->db->insert_batch($this->tbl_pip, $data);
    }
}

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
        $this->db->select('dpt.namakec, count(lks_dtdc.noktp) as total, totaldpt');
        $this->db->from('dpt');
        $this->db->join('lks_dtdc', 'lks_dtdc.dpt_id = dpt.id');
        $this->db->join('kec', 'kec.namakec = dpt.namakec');
        $this->db->join('(select dpt.namakec, count(dpt.id) as totaldpt from dpt group by namakec) as a', 'a.namakec = dpt.namakec');
        $this->db->group_by('namakec');
        $this->db->order_by('kec.idkec', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getKelurahan($kec)
    {
        $query = "SELECT namakel FROM `kel` join kec on kec.idkec = kel.idkec WHERE namakec = '$kec'";
        return  $this->db->query($query)->result_array();
    }
    public function getPencapaianKec($kec)
    {

        if ($kec == 'PANAKKUKANG') {
            $query = "select tps, 
                count(if(dummy_table.namakel= 'Karuwisi',dtdcktp,NULL)) AS 'C0', 
                count(if(dummy_table.namakel= 'Panaikang',dtdcktp,NULL)) AS 'C1', 
                count(if(dummy_table.namakel= 'Tello Baru',dtdcktp,NULL)) AS 'C2',
                count(if(dummy_table.namakel= 'Pampang',dtdcktp,NULL)) AS 'C3',
                count(if(dummy_table.namakel= 'Karampuang',dtdcktp,NULL)) AS 'C4', 
                count(if(dummy_table.namakel= 'Tamamaung',dtdcktp,NULL)) AS 'C5',
                count(if(dummy_table.namakel= 'Masale',dtdcktp,NULL)) AS 'C6',
                count(if(dummy_table.namakel= 'Pandang',dtdcktp,NULL)) AS 'C7',
                count(if(dummy_table.namakel= 'Karuwisi Utara',dtdcktp,NULL)) AS 'C8',
                count(if(dummy_table.namakel= 'Sinrijala',dtdcktp,NULL)) AS 'C9',
                count(if(dummy_table.namakel= 'Paropo',dtdcktp,NULL)) AS 'C10'
                FROM(SELECT kel.iddesa as idkel, dpt.namakel, dpt.namakec, dpt.tps, lks_dtdc.noktp as dtdcktp 
                FROM `dpt` LEFT join lks_dtdc on lks_dtdc.noktp = dpt.noktp join kel on kel.namakel = dpt.namakel) 
                as dummy_table WHERE namakec ='Panakkukang' group by dummy_table.tps ORDER by tps asc";
        }
        if ($kec == 'BIRINGKANAYA') {
            $query = "select tps, 
        count(if(dummy_table.namakel= 'Paccerakkang',dtdcktp,NULL)) AS 'C0', 
        count(if(dummy_table.namakel= 'Daya',dtdcktp,NULL)) AS 'C1', 
        count(if(dummy_table.namakel= 'Pai',dtdcktp,NULL)) AS 'C2',
        count(if(dummy_table.namakel= 'Bulurokeng',dtdcktp,NULL)) AS 'C3',
        count(if(dummy_table.namakel= 'Sudiang',dtdcktp,NULL)) AS 'C4', 
        count(if(dummy_table.namakel= 'Sudiang Raya',dtdcktp,NULL)) AS 'C5',
        count(if(dummy_table.namakel= 'Untia',dtdcktp,NULL)) AS 'C6',
        count(if(dummy_table.namakel= 'Laikang',dtdcktp,NULL)) AS 'C7',
        count(if(dummy_table.namakel= 'Berua',dtdcktp,NULL)) AS 'C8',
        count(if(dummy_table.namakel= 'Katimbang',dtdcktp,NULL)) AS 'C9',
        count(if(dummy_table.namakel= 'Bakung',dtdcktp,NULL)) AS 'C10'
        FROM(SELECT kel.iddesa as idkel, dpt.namakel, dpt.namakec, dpt.tps, lks_dtdc.noktp as dtdcktp 
        FROM `dpt` LEFT join lks_dtdc on lks_dtdc.noktp = dpt.noktp join kel on kel.namakel = dpt.namakel) 
        as dummy_table WHERE namakec ='BIRINGKANAYA' group by dummy_table.tps ORDER by tps asc";
        }
        if ($kec == 'MANGGALA') {
            $query = "select tps, 
        count(if(dummy_table.namakel= 'Manggala',dtdcktp,NULL)) AS 'C0', 
        count(if(dummy_table.namakel= 'Bangkala',dtdcktp,NULL)) AS 'C1', 
        count(if(dummy_table.namakel= 'Tamangapa',dtdcktp,NULL)) AS 'C2',
        count(if(dummy_table.namakel= 'Antang',dtdcktp,NULL)) AS 'C3',
        count(if(dummy_table.namakel= 'Batua',dtdcktp,NULL)) AS 'C4', 
        count(if(dummy_table.namakel= 'Borong',dtdcktp,NULL)) AS 'C5',
        count(if(dummy_table.namakel= 'Biring Romang',dtdcktp,NULL)) AS 'C6',
        count(if(dummy_table.namakel= 'Bitowa',dtdcktp,NULL)) AS 'C7'
        FROM(SELECT kel.iddesa as idkel, dpt.namakel, dpt.namakec, dpt.tps, lks_dtdc.noktp as dtdcktp 
        FROM `dpt` LEFT join lks_dtdc on lks_dtdc.noktp = dpt.noktp join kel on kel.namakel = dpt.namakel) 
        as dummy_table WHERE namakec ='MANGGALA' group by dummy_table.tps ORDER by tps asc";
        }
        if ($kec == 'TAMALANREA') {
            $query = "select tps, 
        count(if(dummy_table.namakel= 'Tamalanrea',dtdcktp,NULL)) AS 'C0', 
        count(if(dummy_table.namakel= 'Kapasa',dtdcktp,NULL)) AS 'C1', 
        count(if(dummy_table.namakel= 'Tamalanrea Indah',dtdcktp,NULL)) AS 'C2',
        count(if(dummy_table.namakel= 'Parang Loe',dtdcktp,NULL)) AS 'C3',
        count(if(dummy_table.namakel= 'Bira',dtdcktp,NULL)) AS 'C4', 
        count(if(dummy_table.namakel= 'Tamalanrea Jaya',dtdcktp,NULL)) AS 'C5',
        count(if(dummy_table.namakel= 'Buntusu',dtdcktp,NULL)) AS 'C6',
        count(if(dummy_table.namakel= 'Kapasa Raya',dtdcktp,NULL)) AS 'C7'
        FROM(SELECT kel.iddesa as idkel, dpt.namakel, dpt.namakec, dpt.tps, lks_dtdc.noktp as dtdcktp 
        FROM `dpt` LEFT join lks_dtdc on lks_dtdc.noktp = dpt.noktp join kel on kel.namakel = dpt.namakel) 
        as dummy_table WHERE namakec ='tamalanrea' group by dummy_table.tps ORDER by tps asc";
        }
        return  $this->db->query($query)->result_array();
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

    public function getPencapaianTimAll()
    {
        $this->db->select('user.name, count(lks_dtdc.id) as total');
        $this->db->from('lks_dtdc');
        $this->db->join('user', 'lks_dtdc.user_id = user.id');
        $this->db->group_by('user.id');
        $this->db->order_by('total', 'DESC');
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

        $this->db->order_by('lks_dtdc.id', 'DESC');


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

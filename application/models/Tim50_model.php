<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Tim50_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function getDataTarget()
    {
        $this->db->select('dpt.namakec, if(namakec=panakkukang or namakec=biringkanaya, 5500, 4500) as total');
        // $this->db->select('dpt.namakec, count(id) as total');
        $this->db->from('dpt');
        // $this->db->join('kec', 'kec.namakec = dpt.namakec');
        $this->db->group_by('namakec');
        $this->db->order_by('idkec', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataCapaian()
    {
        $this->db->select('lks_tim50.namakec, count(lks_tim50.id) as total');
        $this->db->from('lks_tim50');
        $this->db->join('kec', 'kec.namakec = lks_tim50.namakec');
        // $this->db->join('kec', 'kec.namakec = dpt.namakec');
        $this->db->group_by('kec.namakec');
        $this->db->order_by('idkec', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataCapaianGraph()
    {
        $this->db->select('program, count(program) as total');
        $this->db->from('lks_tim50');
        $this->db->group_by('program');
        $query = $this->db->get();
        return $query->result();
    }
    public function getDataPie()
    {
        $this->db->select('status, count(status) as jml_status');
        $this->db->from('lks_tim50');
        $this->db->group_by('status');
        $query = $this->db->get();
        return $query->result();
    }

    public function getPencapaian()
    {
        $this->db->select('lks_tim50.namakec, count(lks_tim50.noktp) as total, totaldpt');
        $this->db->from('lks_tim50');
        $this->db->join('kec', 'kec.namakec = lks_tim50.namakec');
        $this->db->join('(select namakec, count(dpt.id) as totaldpt from dpt group by namakec) as a', 'a.namakec = lks_tim50.namakec');
        $this->db->group_by('namakec');
        $this->db->order_by('kec.idkec', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getKelurahan($kec)
    {
        // $query = "SELECT namakel FROM `kel` join kec on kec.idkec = kel.idkec WHERE namakec = '$kec'";
        $query = "SELECT namakel, count(DISTINCT(tps)) as jtps FROM `dpt` WHERE namakec = '$kec' GROUP by namakel order by iddesa";
        return  $this->db->query($query)->result_array();
    }
    public function getPencapaianKec($kec)
    {

        if ($kec == 'panakkukang') {
            $query = "select tps, 
                count(if(dummy_table.namakel= 'Karuwisi',tim50ktp,NULL)) AS 'C0', 
                count(if(dummy_table.namakel= 'Panaikang',tim50ktp,NULL)) AS 'C1', 
                count(if(dummy_table.namakel= 'Tello Baru',tim50ktp,NULL)) AS 'C2',
                count(if(dummy_table.namakel= 'Pampang',tim50ktp,NULL)) AS 'C3',
                count(if(dummy_table.namakel= 'Karampuang',tim50ktp,NULL)) AS 'C4', 
                count(if(dummy_table.namakel= 'Tamamaung',tim50ktp,NULL)) AS 'C5',
                count(if(dummy_table.namakel= 'Masale',tim50ktp,NULL)) AS 'C6',
                count(if(dummy_table.namakel= 'Pandang',tim50ktp,NULL)) AS 'C7',
                count(if(dummy_table.namakel= 'Karuwisi Utara',tim50ktp,NULL)) AS 'C8',
                count(if(dummy_table.namakel= 'Sinrijala',tim50ktp,NULL)) AS 'C9',
                count(if(dummy_table.namakel= 'Paropo',tim50ktp,NULL)) AS 'C10'
                FROM(SELECT dpt.namakel, dpt.namakec, dpt.tps, lks_tim50.noktp as tim50ktp 
                FROM `dpt` LEFT join lks_tim50 on lks_tim50.noktp = dpt.noktp ) 
                as dummy_table WHERE namakec ='Panakkukang' group by dummy_table.tps ORDER by tps asc";
        }
        if ($kec == 'biringkanaya') {
            $query = "select tps, 
        count(if(dummy_table.namakel= 'Paccerakkang',tim50ktp,NULL)) AS 'C0', 
        count(if(dummy_table.namakel= 'Daya',tim50ktp,NULL)) AS 'C1', 
        count(if(dummy_table.namakel= 'Pai',tim50ktp,NULL)) AS 'C2',
        count(if(dummy_table.namakel= 'Bulurokeng',tim50ktp,NULL)) AS 'C3',
        count(if(dummy_table.namakel= 'Sudiang',tim50ktp,NULL)) AS 'C4', 
        count(if(dummy_table.namakel= 'Sudiang Raya',tim50ktp,NULL)) AS 'C5',
        count(if(dummy_table.namakel= 'Untia',tim50ktp,NULL)) AS 'C6',
        count(if(dummy_table.namakel= 'Laikang',tim50ktp,NULL)) AS 'C7',
        count(if(dummy_table.namakel= 'Berua',tim50ktp,NULL)) AS 'C8',
        count(if(dummy_table.namakel= 'Katimbang',tim50ktp,NULL)) AS 'C9',
        count(if(dummy_table.namakel= 'Bakung',tim50ktp,NULL)) AS 'C10'
        FROM(SELECT dpt.namakel, dpt.namakec, dpt.tps, lks_tim50.noktp as tim50ktp 
        FROM `dpt` LEFT join lks_tim50 on lks_tim50.noktp = dpt.noktp) 
        as dummy_table WHERE namakec ='BIRINGKANAYA' group by dummy_table.tps ORDER by tps asc";
        }
        if ($kec == 'manggala') {
            $query = "select tps, 
        count(if(dummy_table.namakel= 'Manggala',tim50ktp,NULL)) AS 'C0', 
        count(if(dummy_table.namakel= 'Bangkala',tim50ktp,NULL)) AS 'C1', 
        count(if(dummy_table.namakel= 'Tamangapa',tim50ktp,NULL)) AS 'C2',
        count(if(dummy_table.namakel= 'Antang',tim50ktp,NULL)) AS 'C3',
        count(if(dummy_table.namakel= 'Batua',tim50ktp,NULL)) AS 'C4', 
        count(if(dummy_table.namakel= 'Borong',tim50ktp,NULL)) AS 'C5',
        count(if(dummy_table.namakel= 'Biring Romang',tim50ktp,NULL)) AS 'C6',
        count(if(dummy_table.namakel= 'Bitowa',tim50ktp,NULL)) AS 'C7'
        FROM(SELECT dpt.namakel, dpt.namakec, dpt.tps, lks_tim50.noktp as tim50ktp 
        FROM `dpt` LEFT join lks_tim50 on lks_tim50.noktp = dpt.noktp) 
        as dummy_table WHERE namakec ='MANGGALA' group by dummy_table.tps ORDER by tps asc";
        }
        if ($kec == 'tamalanrea') {
            $query = "select tps, 
        count(if(dummy_table.namakel= 'Tamalanrea',tim50ktp,NULL)) AS 'C0', 
        count(if(dummy_table.namakel= 'Kapasa',tim50ktp,NULL)) AS 'C1', 
        count(if(dummy_table.namakel= 'Tamalanrea Indah',tim50ktp,NULL)) AS 'C2',
        count(if(dummy_table.namakel= 'Parang Loe',tim50ktp,NULL)) AS 'C3',
        count(if(dummy_table.namakel= 'Bira',tim50ktp,NULL)) AS 'C4', 
        count(if(dummy_table.namakel= 'Tamalanrea Jaya',tim50ktp,NULL)) AS 'C5',
        count(if(dummy_table.namakel= 'Buntusu',tim50ktp,NULL)) AS 'C6',
        count(if(dummy_table.namakel= 'Kapasa Raya',tim50ktp,NULL)) AS 'C7'
        FROM(SELECT dpt.namakel, dpt.namakec, dpt.tps, lks_tim50.noktp as tim50ktp 
        FROM `dpt` LEFT join lks_tim50 on lks_tim50.noktp = dpt.noktp) 
        as dummy_table WHERE namakec ='tamalanrea' group by dummy_table.tps ORDER by tps asc";
        }
        return  $this->db->query($query)->result_array();
    }

    public function getPencapaianTps($kec, $kel, $tps)
    {
        $this->db->select('lks_tim50.id, noktp, nama, alamat, namakel, namakec, rt, rw, tps, lks_tim50.nohp, user.name');
        $this->db->from('lks_tim50');
        $this->db->join('user', 'lks_tim50.user_id = user.id');
        $this->db->where(array('namakec' => $kec, 'namakel' => $kel, 'tps' => $tps));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPencapaianTim()
    {
        $this->db->select('user.name, count(lks_tim50.id) as total');
        $this->db->from('lks_tim50');
        $this->db->join('user', 'lks_tim50.user_id = user.id');
        $this->db->group_by('user.id');
        $this->db->order_by('total', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTeamGraph($uid)
    {
        $this->db->select('user.name,count(lks_tim50.id) as total, lks_tim50.date_created');
        $this->db->from('lks_tim50');
        $this->db->join('user', 'lks_tim50.user_id = user.id');
        if (!empty($uid)) {
            $this->db->where('lks_tim50.user_id', $uid);
        }
        $this->db->group_by('date_created');
        $this->db->order_by('date_created', 'ASC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    public function getTotalDaftar($uid)
    {
        $this->db->select('count(lks_tim50.noktp) as totaldaftar');
        $this->db->from('lks_tim50');
        if (!empty($uid)) {
            $this->db->where('lks_tim50.user_id', $uid);
        }

        $query = $this->db->get();
        return $query->result_array();
    }
    public function getTotalDpt()
    {
        $this->db->select('count(dpt.id) as totaldpt');
        $this->db->from('dpt');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTeamPencapaian($uid)
    {
        $this->db->select('lks_tim50.id, noktp, nama, alamat, namakel, namakec, rt, rw, tps, count(lks_tim50.noktp) as total');
        $this->db->from('lks_tim50');
        if (!empty($uid)) {
            $this->db->where('lks_tim50.user_id', $uid);
        }
        $this->db->group_by('namakec');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getLksTim50()
    {
        $this->db->select('lks_tim50.id, noktp, nama, alamat, namakel, namakec, rt, rw, tps, nohp');
        $this->db->from('lks_tim50');
        // $this->db->where('lks_tim50.user_id', $this->session->userdata('user_id'));
        $this->db->order_by('lks_tim50.id', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getPencapaianTimAll()
    {
        $this->db->select('user.id,user.name, count(lks_tim50.id) as total');
        $this->db->from('lks_tim50');
        $this->db->join('user', 'lks_tim50.user_id = user.id');
        $this->db->group_by('user.id');
        $this->db->order_by('total', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTim50($limit, $start, $keyword = null)
    {
        $this->db->select('lks_tim50.id, noktp, nama, alamat, namakel, namakec, rt, rw, tps, lks_tim50.nohp, user.name  ');
        $this->db->join('user', 'lks_tim50.user_id = user.id');


        if ($keyword) {
            // $this->db->like('nama', $keyword);
            $this->db->or_like('lks_tim50.noktp', $keyword);
        }

        $this->db->order_by('lks_tim50.id', 'DESC');


        return $this->db->get('lks_tim50', $limit, $start)->result_array();
    }

    public function countAll($keyword = null)
    {
        if ($keyword) {
            // $this->db->like('dpt.nama', $keyword);
            $this->db->or_like('lks_tim50.noktp', $keyword);
        }

        return $this->db->count_all_results('lks_tim50');
    }

    public function getTim50Export()
    {
        $this->db->select('lks_tim50.id, noktp, nama, alamat, namakel, namakec, rt, rw, tps,  lks_tim50.nohp, user.name, status');

        $this->db->join('user', 'lks_tim50.user_id = user.id');


        $this->db->order_by('lks_tim50.id', 'DESC');


        return $this->db->get('lks_tim50')->result_array();
    }
}

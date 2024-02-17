<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekapitulasi_model extends CI_Model
{

    public function getDataGraph()
    {
        $this->db->select('no_urut,nama_calon, (select sum(rekap_suara.jml_suara) from rekap_suara WHERE rekap_suara.no_urut_calon=tbl_calon.no_urut ) as jml_suara');
        $this->db->from('tbl_calon');
        // $this->db->group_by('kecamatan');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataHasil($kec = null, $kel = null)
    {
        if ($kec && $kel) {
            $head = '(select distinct(id_tps) from rekap_suara where rekap_suara.id_tps = tbl_tps.id_tps) as id_tps , jml_sah,  tps as head, ';
            $group = 'id_tps';
            $this->db->where('namakel', $kel);
            $this->db->where('namakec', $kec);
        } elseif ($kec) {
            $head = 'namakel as head, ';
            $group = 'iddesa';
            $this->db->where('namakec', $kec);
        } else {
            $head = 'namakec as head, ';
            $group = 'idkec';
        }
        $this->db->select($head . 'sum(jml_dpt) as jml_dpt, (select sum(rekap_suara.jml_suara) from rekap_suara where rekap_suara.' . $group . '=tbl_tps.' . $group . ' and rekap_suara.no_urut_calon=00) as jml_suara_00, (select sum(rekap_suara.jml_suara) from rekap_suara where rekap_suara.' . $group . '=tbl_tps.' . $group . ' and rekap_suara.no_urut_calon=01) as jml_suara_01, (select sum(rekap_suara.jml_suara) from rekap_suara where rekap_suara.' . $group . '=tbl_tps.' . $group . ' and rekap_suara.no_urut_calon=02) as jml_suara_02, (select sum(rekap_suara.jml_suara) from rekap_suara where rekap_suara.' . $group . '=tbl_tps.' . $group . ' and rekap_suara.no_urut_calon=03) as jml_suara_03, (select sum(rekap_suara.jml_suara) from rekap_suara where rekap_suara.' . $group . '=tbl_tps.' . $group . ' and rekap_suara.no_urut_calon=04) as jml_suara_04, (select sum(rekap_suara.jml_suara) from rekap_suara where rekap_suara.' . $group . '=tbl_tps.' . $group . ' and rekap_suara.no_urut_calon=05) as jml_suara_05, (select sum(rekap_suara.jml_suara) from rekap_suara where rekap_suara.' . $group . '=tbl_tps.' . $group . ' and rekap_suara.no_urut_calon=06) as jml_suara_06, (select sum(rekap_suara.jml_suara) from rekap_suara where rekap_suara.' . $group . '=tbl_tps.' . $group . ') as jml_suara');
        $this->db->from('tbl_tps');
        $this->db->group_by($group);
        $this->db->order_by($group, 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataTps($id_tps = null)
    {

        $this->db->select('tps, namakel, namakec, (select distinct(id_tps) from rekap_suara where rekap_suara.id_tps = tbl_tps.id_tps) as id_tps, (select rekap_suara.jml_suara from rekap_suara where rekap_suara.id_tps=tbl_tps.id_tps and rekap_suara.no_urut_calon=00) as jml_suara_00, (select sum(rekap_suara.jml_suara) from rekap_suara where rekap_suara.id_tps=tbl_tps.id_tps and rekap_suara.no_urut_calon=01) as jml_suara_01, (select sum(rekap_suara.jml_suara) from rekap_suara where rekap_suara.id_tps=tbl_tps.id_tps and rekap_suara.no_urut_calon=02) as jml_suara_02, (select sum(rekap_suara.jml_suara) from rekap_suara where rekap_suara.id_tps=tbl_tps.id_tps and rekap_suara.no_urut_calon=03) as jml_suara_03, (select sum(rekap_suara.jml_suara) from rekap_suara where rekap_suara.id_tps=tbl_tps.id_tps and rekap_suara.no_urut_calon=04) as jml_suara_04, (select sum(rekap_suara.jml_suara) from rekap_suara where rekap_suara.id_tps=tbl_tps.id_tps and rekap_suara.no_urut_calon=05) as jml_suara_05, (select sum(rekap_suara.jml_suara) from rekap_suara where rekap_suara.id_tps=tbl_tps.id_tps and rekap_suara.no_urut_calon=06) as jml_suara_06, (select sum(rekap_suara.jml_suara) from rekap_suara where rekap_suara.id_tps=tbl_tps.id_tps) as jml_suara');
        $this->db->from('tbl_tps');
        $this->db->where('id_tps', $id_tps);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataTpsBlank()
    {
        //$this->db->SELECT('tps, namakel, namakec, jml_sah');
       // $this->db->FROM('tbl_tps');

        // $this->db->where('jml_sah <', 1);
  //$this->db->order_by('tbl_tps.id_tps');
      //  $this->db->having('jml_sah', '');
       // $query = $this->db->get();
$query = "SELECT namakec, namakel, tps FROM `tbl_tps` where id_tps not in (SELECT id_tps from rekap_suara)";
        return $query->result_array();
    }

    public function getKelurahan($kec)
    {
        // $query = "SELECT namakel FROM `kel` join kec on kec.idkec = kel.idkec WHERE namakec = '$kec'";
        $query = "SELECT namakel, count(DISTINCT(tps)) as jtps FROM `dpt` WHERE namakec = '$kec' GROUP by namakel order by iddesa";
        return  $this->db->query($query)->result_array();
    }

    public function getSebaranPartai($kec)
    {
        if ($kec == 'panakkukang') {
            $query = "select dummy_table.tps, 
        SUM(if(dummy_table.namakel= 'Karuwisi',jml_suara,NULL)) AS 'C0', 
        SUM(if(dummy_table.namakel= 'Panaikang',jml_suara,NULL)) AS 'C1', 
        SUM(if(dummy_table.namakel= 'Tello Baru',jml_suara,NULL)) AS 'C2',
        SUM(if(dummy_table.namakel= 'Pampang',jml_suara,NULL)) AS 'C3',
        SUM(if(dummy_table.namakel= 'Karampuang',jml_suara,NULL)) AS 'C4', 
        SUM(if(dummy_table.namakel= 'Tamamaung',jml_suara,NULL)) AS 'C5',
        SUM(if(dummy_table.namakel= 'Masale',jml_suara,NULL)) AS 'C6',
        SUM(if(dummy_table.namakel= 'Pandang',jml_suara,NULL)) AS 'C7',
        SUM(if(dummy_table.namakel= 'Karuwisi Utara',jml_suara,NULL)) AS 'C8',
        SUM(if(dummy_table.namakel= 'Sinrijala',jml_suara,NULL)) AS 'C9',
        SUM(if(dummy_table.namakel= 'Paropo',jml_suara,NULL)) AS 'C10'
        FROM(SELECT namakel,namakec, tps, jml_suara FROM `rekap_suara` RIGHT join tbl_tps on rekap_suara.id_tps=tbl_tps.id_tps ORDER BY `tbl_tps`.`tps`) 
        as dummy_table WHERE namakec ='Panakkukang'  GROUP by tps ORDER BY `dummy_table`.`tps`+0 ASC;";
        }

        if ($kec == 'biringkanaya') {
            $query = "select tps, 
            SUM(if(dummy_table.namakel= 'Paccerakkang',jml_suara,NULL)) AS 'C0', 
            SUM(if(dummy_table.namakel= 'Daya',jml_suara,NULL)) AS 'C1', 
            SUM(if(dummy_table.namakel= 'Pai',jml_suara,NULL)) AS 'C2',
            SUM(if(dummy_table.namakel= 'Bulurokeng',jml_suara,NULL)) AS 'C3',
            SUM(if(dummy_table.namakel= 'Sudiang',jml_suara,NULL)) AS 'C4', 
            SUM(if(dummy_table.namakel= 'Sudiang Raya',jml_suara,NULL)) AS 'C5',
            SUM(if(dummy_table.namakel= 'Untia',jml_suara,NULL)) AS 'C6',
            SUM(if(dummy_table.namakel= 'Laikang',jml_suara,NULL)) AS 'C7',
            SUM(if(dummy_table.namakel= 'Berua',jml_suara,NULL)) AS 'C8',
            SUM(if(dummy_table.namakel= 'Katimbang',jml_suara,NULL)) AS 'C9',
            SUM(if(dummy_table.namakel= 'Bakung',jml_suara,NULL)) AS 'C10'
            FROM(SELECT namakel,namakec, tps, jml_suara FROM `rekap_suara` RIGHT join tbl_tps on rekap_suara.id_tps=tbl_tps.id_tps ORDER BY `tbl_tps`.`tps`) 
            as dummy_table WHERE namakec ='BIRINGKANAYA' group by dummy_table.tps ORDER BY `dummy_table`.`tps`+0 asc";
        }

        if ($kec == 'manggala') {
            $query = "select tps, 
            SUM(if(dummy_table.namakel= 'Manggala',jml_suara,NULL)) AS 'C0', 
            SUM(if(dummy_table.namakel= 'Bangkala',jml_suara,NULL)) AS 'C1', 
            SUM(if(dummy_table.namakel= 'Tamangapa',jml_suara,NULL)) AS 'C2',
            SUM(if(dummy_table.namakel= 'Antang',jml_suara,NULL)) AS 'C3',
            SUM(if(dummy_table.namakel= 'Batua',jml_suara,NULL)) AS 'C4', 
            SUM(if(dummy_table.namakel= 'Borong',jml_suara,NULL)) AS 'C5',
            SUM(if(dummy_table.namakel= 'Biring Romang',jml_suara,NULL)) AS 'C6',
            SUM(if(dummy_table.namakel= 'Bitowa',jml_suara,NULL)) AS 'C7'
            FROM(SELECT namakel,namakec, tps, jml_suara FROM `rekap_suara` RIGHT join tbl_tps on rekap_suara.id_tps=tbl_tps.id_tps ORDER BY `tbl_tps`.`tps`) 
            as dummy_table WHERE namakec ='MANGGALA' group by dummy_table.tps ORDER BY `dummy_table`.`tps`+0 asc";
        }

        if ($kec == 'tamalanrea') {
            $query = "select tps, 
            SUM(if(dummy_table.namakel= 'Tamalanrea',jml_suara,NULL)) AS 'C0', 
            SUM(if(dummy_table.namakel= 'Kapasa',jml_suara,NULL)) AS 'C1', 
            SUM(if(dummy_table.namakel= 'Tamalanrea Indah',jml_suara,NULL)) AS 'C2',
            SUM(if(dummy_table.namakel= 'Parang Loe',jml_suara,NULL)) AS 'C3',
            SUM(if(dummy_table.namakel= 'Bira',jml_suara,NULL)) AS 'C4', 
            SUM(if(dummy_table.namakel= 'Tamalanrea Jaya',jml_suara,NULL)) AS 'C5',
            SUM(if(dummy_table.namakel= 'Buntusu',jml_suara,NULL)) AS 'C6',
            SUM(if(dummy_table.namakel= 'Kapasa Raya',jml_suara,NULL)) AS 'C7'
            FROM(SELECT namakel,namakec, tps, jml_suara FROM `rekap_suara` RIGHT join tbl_tps on rekap_suara.id_tps=tbl_tps.id_tps ORDER BY `tbl_tps`.`tps`) 
            as dummy_table WHERE namakec ='tamalanrea' group by dummy_table.tps ORDER BY `dummy_table`.`tps`+0 asc";
        }

        return  $this->db->query($query)->result_array();
    }

    public function getSebaranAdam($kec)
    {
        if ($kec == 'panakkukang') {
            $query = "select dummy_table.tps, 
        SUM(if(dummy_table.namakel= 'Karuwisi',jml_suara,NULL)) AS 'C0', 
        SUM(if(dummy_table.namakel= 'Panaikang',jml_suara,NULL)) AS 'C1', 
        SUM(if(dummy_table.namakel= 'Tello Baru',jml_suara,NULL)) AS 'C2',
        SUM(if(dummy_table.namakel= 'Pampang',jml_suara,NULL)) AS 'C3',
        SUM(if(dummy_table.namakel= 'Karampuang',jml_suara,NULL)) AS 'C4', 
        SUM(if(dummy_table.namakel= 'Tamamaung',jml_suara,NULL)) AS 'C5',
        SUM(if(dummy_table.namakel= 'Masale',jml_suara,NULL)) AS 'C6',
        SUM(if(dummy_table.namakel= 'Pandang',jml_suara,NULL)) AS 'C7',
        SUM(if(dummy_table.namakel= 'Karuwisi Utara',jml_suara,NULL)) AS 'C8',
        SUM(if(dummy_table.namakel= 'Sinrijala',jml_suara,NULL)) AS 'C9',
        SUM(if(dummy_table.namakel= 'Paropo',jml_suara,NULL)) AS 'C10'
        FROM(SELECT namakel,namakec, tps, jml_suara FROM `rekap_suara` RIGHT join tbl_tps on rekap_suara.id_tps=tbl_tps.id_tps WHERE no_urut_calon= '01' ORDER BY `tbl_tps`.`tps`) 
        as dummy_table WHERE namakec ='Panakkukang'  GROUP by tps ORDER BY `dummy_table`.`tps`+0 ASC;";
        }

        if ($kec == 'biringkanaya') {
            $query = "select tps, 
            SUM(if(dummy_table.namakel= 'Paccerakkang',jml_suara,NULL)) AS 'C0', 
            SUM(if(dummy_table.namakel= 'Daya',jml_suara,NULL)) AS 'C1', 
            SUM(if(dummy_table.namakel= 'Pai',jml_suara,NULL)) AS 'C2',
            SUM(if(dummy_table.namakel= 'Bulurokeng',jml_suara,NULL)) AS 'C3',
            SUM(if(dummy_table.namakel= 'Sudiang',jml_suara,NULL)) AS 'C4', 
            SUM(if(dummy_table.namakel= 'Sudiang Raya',jml_suara,NULL)) AS 'C5',
            SUM(if(dummy_table.namakel= 'Untia',jml_suara,NULL)) AS 'C6',
            SUM(if(dummy_table.namakel= 'Laikang',jml_suara,NULL)) AS 'C7',
            SUM(if(dummy_table.namakel= 'Berua',jml_suara,NULL)) AS 'C8',
            SUM(if(dummy_table.namakel= 'Katimbang',jml_suara,NULL)) AS 'C9',
            SUM(if(dummy_table.namakel= 'Bakung',jml_suara,NULL)) AS 'C10'
            FROM(SELECT namakel,namakec, tps, jml_suara FROM `rekap_suara` RIGHT join tbl_tps on rekap_suara.id_tps=tbl_tps.id_tps WHERE no_urut_calon= '01' ORDER BY `tbl_tps`.`tps`) 
            as dummy_table WHERE namakec ='BIRINGKANAYA' group by dummy_table.tps ORDER BY `dummy_table`.`tps`+0 asc";
        }

        if ($kec == 'manggala') {
            $query = "select tps, 
            SUM(if(dummy_table.namakel= 'Manggala',jml_suara,NULL)) AS 'C0', 
            SUM(if(dummy_table.namakel= 'Bangkala',jml_suara,NULL)) AS 'C1', 
            SUM(if(dummy_table.namakel= 'Tamangapa',jml_suara,NULL)) AS 'C2',
            SUM(if(dummy_table.namakel= 'Antang',jml_suara,NULL)) AS 'C3',
            SUM(if(dummy_table.namakel= 'Batua',jml_suara,NULL)) AS 'C4', 
            SUM(if(dummy_table.namakel= 'Borong',jml_suara,NULL)) AS 'C5',
            SUM(if(dummy_table.namakel= 'Biring Romang',jml_suara,NULL)) AS 'C6',
            SUM(if(dummy_table.namakel= 'Bitowa',jml_suara,NULL)) AS 'C7'
            FROM(SELECT namakel,namakec, tps, jml_suara FROM `rekap_suara` RIGHT join tbl_tps on rekap_suara.id_tps=tbl_tps.id_tps WHERE no_urut_calon= '01' ORDER BY `tbl_tps`.`tps`) 
            as dummy_table WHERE namakec ='MANGGALA' group by dummy_table.tps ORDER BY `dummy_table`.`tps`+0 asc";
        }

        if ($kec == 'tamalanrea') {
            $query = "select tps, 
            SUM(if(dummy_table.namakel= 'Tamalanrea',jml_suara,NULL)) AS 'C0', 
            SUM(if(dummy_table.namakel= 'Kapasa',jml_suara,NULL)) AS 'C1', 
            SUM(if(dummy_table.namakel= 'Tamalanrea Indah',jml_suara,NULL)) AS 'C2',
            SUM(if(dummy_table.namakel= 'Parang Loe',jml_suara,NULL)) AS 'C3',
            SUM(if(dummy_table.namakel= 'Bira',jml_suara,NULL)) AS 'C4', 
            SUM(if(dummy_table.namakel= 'Tamalanrea Jaya',jml_suara,NULL)) AS 'C5',
            SUM(if(dummy_table.namakel= 'Buntusu',jml_suara,NULL)) AS 'C6',
            SUM(if(dummy_table.namakel= 'Kapasa Raya',jml_suara,NULL)) AS 'C7'
            FROM(SELECT namakel,namakec, tps, jml_suara FROM `rekap_suara` RIGHT join tbl_tps on rekap_suara.id_tps=tbl_tps.id_tps WHERE no_urut_calon= '01' ORDER BY `tbl_tps`.`tps`) 
            as dummy_table WHERE namakec ='tamalanrea' group by dummy_table.tps ORDER BY `dummy_table`.`tps`+0 asc";
        }

        return  $this->db->query($query)->result_array();
    }
}

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
        $this->db->SELECT('tps, namakel, namakec');
        $this->db->FROM('tbl_tps');

        $this->db->where('jml_sah !=', 0);

        $this->db->order_by('tbl_tps.id_tps');
        $query = $this->db->get();
        return $query->result_array();
    }
}

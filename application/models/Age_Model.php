<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Age_model extends CI_Model
{

    public function age_kecamatan()
    {
        $query = "SELECT namakec, count(DISTINCT concat(namakel,rw)) as jrw, 
        count(DISTINCT concat( namakel,rw,rt)) as jrt,
        COUNT(umur)as 'total', 
         COUNT(IF(umur < 17,1,NULL)) AS 'age0',
         COUNT(IF(umur BETWEEN 17 and 25,1,NULL)) AS 'age1',
         COUNT(IF(umur BETWEEN 26 and 35,1,NULL)) AS 'age2',
         COUNT(IF(umur BETWEEN 36 and 45,1,NULL)) AS 'age3',
         COUNT(IF(umur BETWEEN 46 and 55,1,NULL)) AS 'age4',
         COUNT(IF(umur >= 56,1,NULL)) AS 'age5'
         FROM (select idkec,namakec,namakel, rw, rt, tgl_lahir, 
         TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) AS umur from dpt)
          as dummy_table  GROUP by namakec
        ";
      //  return  $this->db->query($query)->result_array();
      //  return $query->result();
        return  $this->db->query($query)->result();
    }
    public function age_panakukkang()
    {
        $query = "SELECT namakec, namakel, count(DISTINCT rw) as jrw, 
        count(DISTINCT concat( namakel,rw,rt)) as jrt,
        COUNT(umur)as 'total', 
         COUNT(IF(umur < 17,1,NULL)) AS 'age0',
         COUNT(IF(umur BETWEEN 17 and 25,1,NULL)) AS 'age1',
         COUNT(IF(umur BETWEEN 26 and 35,1,NULL)) AS 'age2',
         COUNT(IF(umur BETWEEN 36 and 45,1,NULL)) AS 'age3',
         COUNT(IF(umur BETWEEN 46 and 55,1,NULL)) AS 'age4',
         COUNT(IF(umur >= 56,1,NULL)) AS 'age5'
         FROM (select idkec,namakec,namakel, rw, rt, tgl_lahir, 
         TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) AS umur from dpt)
          as dummy_table  where namakec = 'panakukkang' GROUP by namakel
        ";
        return  $this->db->query($query)->result();
    }
    public function age_manggala()
    {
        $query = "SELECT namakec, namakel, count(DISTINCT rw) as jrw, 
        count(DISTINCT concat( namakel,rw,rt)) as jrt,
        COUNT(umur)as 'total', 
         COUNT(IF(umur < 17,1,NULL)) AS 'age0',
         COUNT(IF(umur BETWEEN 17 and 25,1,NULL)) AS 'age1',
         COUNT(IF(umur BETWEEN 26 and 35,1,NULL)) AS 'age2',
         COUNT(IF(umur BETWEEN 36 and 45,1,NULL)) AS 'age3',
         COUNT(IF(umur BETWEEN 46 and 55,1,NULL)) AS 'age4',
         COUNT(IF(umur >= 56,1,NULL)) AS 'age5'
         FROM (select idkec,namakec,namakel, rw, rt, tgl_lahir, 
         TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) AS umur from dpt)
          as dummy_table  where namakec = 'manggala' GROUP by namakel
        ";
        return  $this->db->query($query)->result();
    }
    public function age_biringkanaya()
    {
        $query = "SELECT namakec, namakel, count(DISTINCT rw) as jrw, 
        count(DISTINCT concat( namakel,rw,rt)) as jrt,
        COUNT(umur)as 'total', 
         COUNT(IF(umur < 17,1,NULL)) AS 'age0',
         COUNT(IF(umur BETWEEN 17 and 25,1,NULL)) AS 'age1',
         COUNT(IF(umur BETWEEN 26 and 35,1,NULL)) AS 'age2',
         COUNT(IF(umur BETWEEN 36 and 45,1,NULL)) AS 'age3',
         COUNT(IF(umur BETWEEN 46 and 55,1,NULL)) AS 'age4',
         COUNT(IF(umur >= 56,1,NULL)) AS 'age5'
         FROM (select idkec,namakec,namakel, rw, rt, tgl_lahir, 
         TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) AS umur from dpt)
          as dummy_table  where namakec = 'biringkanaya' GROUP by namakel
        ";
        return  $this->db->query($query)->result();
    }
    public function age_tamalanrea()
    {
        $query = "SELECT namakec, namakel, count(DISTINCT rw) as jrw, 
        count(DISTINCT concat( namakel,rw,rt)) as jrt,
        COUNT(umur)as 'total', 
         COUNT(IF(umur < 17,1,NULL)) AS 'age0',
         COUNT(IF(umur BETWEEN 17 and 25,1,NULL)) AS 'age1',
         COUNT(IF(umur BETWEEN 26 and 35,1,NULL)) AS 'age2',
         COUNT(IF(umur BETWEEN 36 and 45,1,NULL)) AS 'age3',
         COUNT(IF(umur BETWEEN 46 and 55,1,NULL)) AS 'age4',
         COUNT(IF(umur >= 56,1,NULL)) AS 'age5'
         FROM (select idkec,namakec,namakel, rw, rt, tgl_lahir, 
         TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) AS umur from dpt)
          as dummy_table  where namakec = 'tamalanrea' GROUP by namakel
        ";
        return  $this->db->query($query)->result();
    }
}



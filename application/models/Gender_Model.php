<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Gender_model extends CI_Model
{

    public function makassar()
    {
        $query = "SELECT namakec, count(DISTINCT concat(namakel,rw)) as jrw, 
        count(DISTINCT concat( namakel,rw,rt)) as jrt,
        COUNT(sex)as 'total', 
         COUNT(IF(sex = 'Lk',1,NULL)) AS 'Pria',
         COUNT(IF(sex = 'Pr',1,NULL)) AS 'Wanita'
         FROM (select idkec,namakec,namakel, rw, rt, sex from dpt)
          as dummy_table  GROUP by namakec
        ";
      //  return  $this->db->query($query)->result_array();
      //  return $query->result();
        return  $this->db->query($query)->result();
    }
    public function panakukkang()
    {
        $query = "SELECT namakec, namakel, count(DISTINCT rw) as jrw, 
        count(DISTINCT concat( namakel,rw,rt)) as jrt,
        COUNT(sex)as 'total', 
         COUNT(IF(sex = 'Lk',1,NULL)) AS 'Pria',
         COUNT(IF(sex = 'Pr',1,NULL)) AS 'Wanita'
         FROM (select idkec,namakec,namakel, rw, rt, sex from dpt)
          as dummy_table  where namakec = 'panakukkang' GROUP by namakel
        ";
        return  $this->db->query($query)->result();
    }
    public function manggala()
    {
        $query = "SELECT namakec, namakel, count(DISTINCT rw) as jrw, 
        count(DISTINCT concat( namakel,rw,rt)) as jrt,
        COUNT(sex)as 'total', 
         COUNT(IF(sex = 'Lk',1,NULL)) AS 'Pria',
         COUNT(IF(sex = 'Pr',1,NULL)) AS 'Wanita'
         FROM (select idkec,namakec,namakel, rw, rt, sex from dpt)
          as dummy_table  where namakec = 'manggala' GROUP by namakel
        ";
        return  $this->db->query($query)->result();
    }
    public function biringkanaya()
    {
        $query = "SELECT namakec, namakel, count(DISTINCT rw) as jrw, 
        count(DISTINCT concat( namakel,rw,rt)) as jrt,
        COUNT(sex)as 'total', 
         COUNT(IF(sex = 'Lk',1,NULL)) AS 'Pria',
         COUNT(IF(sex = 'Pr',1,NULL)) AS 'Wanita'
         FROM (select idkec,namakec,namakel, rw, rt, sex from dpt)
          as dummy_table  where namakec = 'biringkanaya' GROUP by namakel
        ";
        return  $this->db->query($query)->result();
    }
    public function tamalanrea()
    {
        $query = "SELECT namakec, namakel, count(DISTINCT rw) as jrw, 
        count(DISTINCT concat( namakel,rw,rt)) as jrt,
        COUNT(sex)as 'total', 
         COUNT(IF(sex = 'Lk',1,NULL)) AS 'Pria',
         COUNT(IF(sex = 'Pr',1,NULL)) AS 'Wanita'
         FROM (select idkec,namakec,namakel, rw, rt, sex from dpt)
          as dummy_table  where namakec = 'tamalanrea' GROUP by namakel
        ";
        return  $this->db->query($query)->result();
    }
}



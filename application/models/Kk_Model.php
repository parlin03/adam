<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Kk_model extends CI_Model
{

    public function makassar()
    {
        $query = "SELECT *
        FROM (select idkec,namakec, 
        count(DISTINCT concat(namakel)) as jkel, 
        COUNT(*)as 'total' from dpt GROUP by namakec
        ) A
         JOIN (SELECT namakec,
            COUNT(jnokk) AS 'tjnokk',
             COUNT(IF(jnokk = 1,1,NULL)) AS 'kk1',
             COUNT(IF(jnokk = 2,1,NULL)) AS 'kk2',
             COUNT(IF(jnokk = 3,1,NULL)) AS 'kk3',
             COUNT(IF(jnokk = 4,1,NULL)) AS 'kk4',
             COUNT(IF(jnokk = 5,1,NULL)) AS 'kk5',
             COUNT(IF(jnokk > 5,1,NULL)) AS 'kk6'
             FROM (select idkec,namakec,
             count(DISTINCT concat( namakel,rw,rt)) as jnokk from dpt GROUP by nokk)
              as dummy_table  GROUP by namakec) B WHERE A.namakec = B.namakec
        ";
        //  return  $this->db->query($query)->result_array();
        //  return $query->result();
        return  $this->db->query($query)->result();
    }
    public function kecamatan($namakec)
    {

        $query = "SELECT *
        FROM (select namakel, 
        count(DISTINCT rw) as jrw, 
        count(DISTINCT concat( namakel,rw,rt)) as jrt,
        COUNT(*)as 'total' from dpt  where namakec = '$namakec' GROUP by namakel
        ) A
         JOIN (SELECT namakel,
            COUNT(jnokk) AS 'tjnokk',
             COUNT(IF(jnokk = 1,1,NULL)) AS 'kk1',
             COUNT(IF(jnokk = 2,1,NULL)) AS 'kk2',
             COUNT(IF(jnokk = 3,1,NULL)) AS 'kk3',
             COUNT(IF(jnokk = 4,1,NULL)) AS 'kk4',
             COUNT(IF(jnokk = 5,1,NULL)) AS 'kk5',
             COUNT(IF(jnokk > 5,1,NULL)) AS 'kk6'
             FROM (select namakec, namakel,
             count(DISTINCT concat( namakel,rw,rt)) as jnokk from dpt GROUP by nokk)
              as dummy_table  where namakec = '$namakec' GROUP by namakel) B WHERE A.namakel = B.namakel
        ";
        return  $this->db->query($query)->result();
    }
}

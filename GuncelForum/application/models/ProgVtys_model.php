<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProgVtys_model extends CI_Model {
    
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function getProgdil() 
    {
        $getProgdil = $this->db->query('Select *from progdil where vtyst_mi = 0')->result();
        return array_filter($getProgdil);
    }

        public function ProgVtysEkle($progDil)
    {
        if ($this->isimKontrol($progDil["prog_dil_adi"]) == 0) {
            $kayit = $this->db->insert('progdil', $progDil);
            if ($kayit) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    
    public function isimKontrol($progAd)
    {
        $this->db->select('*');
        $this->db->where('LOWER(prog_dil_adi)',mb_strtolower($progAd));
        $sorgu = $this->db->get("progdil");
        $progdil = $sorgu->result();
        $yprogdil = array_filter($progdil);
        if (empty($yprogdil)) {
            return 0;
        } else {
            return 1;
        }
    }
    
}
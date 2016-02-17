<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kullanici_model extends CI_Model {
    
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function kullaniciEkle($kullanici = array())
    {
        $kullanici["sifre"] = $this->sifreleme($kullanici["sifre"]);
        if ($this->kullaniciVarmi($kullanici["kulad"], $kullanici["email"]) == 0) {
            $kayit = $this->db->insert('kullanicilar', $kullanici);
            if ($kayit) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
        
    }
    
    public function sifreleme($sifre)
    {
        $yeniSifre = md5(sha1(md5($sifre)));
        return $yeniSifre;
    }
    
    public function kullaniciVarmi($kulad, $email)
    {
        $kosul = "kulad='$kulad' or email='$email'";
        $this->db->select('*');
        $this->db->where($kosul);
        $sorgu = $this->db->get('kullanicilar');
        $kullanici = $sorgu->result();
        $kul = array_filter($kullanici);
        if (empty($kul)) {
            return 0;
        } else {
            return 1;
        }
    }
    
    public function kullaniciAdKontrol($kulad)
    {
        $this->db->select('*');
        $this->db->where('kulad', $kulad);
        $sorgu = $this->db->get('kullanicilar');
        $kullanici = $sorgu->result();
        $kul = array_filter($kullanici);
        if (empty($kul)) {
            return 0;
        } else {
            return 1;
        }
        
    }
    
    public function kullaniciEmailKontrol($email)
    {
        $this->db->select('*');
        $this->db->where('email', $email);
        $sorgu = $this->db->get('kullanicilar');
        $kullanici = $sorgu->result();
        $kul = array_filter($kullanici);
        if (empty($kul)) {
            return 0;
        } else {
            return 1;
        }
        
    }
    
    public function kullaniciGirisKontrol($kulad, $sifre)
    {
        $ysifre = $this->sifreleme($sifre);
        $this->db->select('*');
        $this->db->where('kulad', $kulad);
        $this->db->where('sifre', $ysifre);
        $sorgu = $this->db->get('kullanicilar');
        $kullanici = $sorgu->result();
        $kul = array_filter($kullanici);
        if (empty($kul)) {
            return 0;
        } else {
            return 1;
        }
    }
    
    public function getYetkiId($kulad)
    {
        $query = $this->db->get_where('kullanicilar',array('kulad'=>$kulad));
        return $query->row()->yetkiId;	

    }
    
}
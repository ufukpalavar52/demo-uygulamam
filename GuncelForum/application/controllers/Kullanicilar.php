<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kullanicilar extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function kullaniciOlustur()
    {
        if ($this->session->userdata('guvKod') == $this->input->post("guv")) {
            $kullanici = array(
                "kulad" => $this->input->post("kulad"),
                "ad" => $this->input->post("ad"),
                "soyad" => $this->input->post("soyad"),
                "email" => $this->input->post("email"),
                "dogumTarihi" => $this->input->post("tarih"),
                "yetkiId" => $this->input->post("tip"),
                "sifre" => $this->input->post("sifre"),
                "ip" => $this->input->ip_address()
            );
            if ($this->Kullanici_model->kullaniciEkle($kullanici)) {
                $this->session->set_flashdata("kayitDurum", 1);
            } else {
                $this->session->set_flashdata("kayitDurum", 2);
            }
        } else {
            $this->session->set_flashdata("kayitDurum", 2);
        }
        redirect(base_url('uye-ol'));
    }
    
    public function kuladKontrol()
    {
        echo $this->Kullanici_model->kullaniciAdKontrol($this->input->post("kulad"));   
    }
    
    public function emailKontrol()
    {
        echo $this->Kullanici_model->kullaniciEmailKontrol($this->input->post('email'));   
    }
    
}

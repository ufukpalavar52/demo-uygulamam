<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
    function loginKontrol()
    {
        $kulad = $this->input->post("kulad");
        $sifre = $this->input->post("sifre");
        if ($this->Kullanici_model->kullaniciGirisKontrol($kulad, $sifre) == 1) {
            $yetki = $this->Kullanici_model->getYetkiId($kulad);
            $this->session->set_userdata("kulad",$kulad);
            $this->session->set_userdata("yetkiId",$yetki);
            redirect(base_url('/'));
        } else {
            $this->session->set_flashdata("HataGiris", 1);
            redirect(base_url('giris'));
        }
    }
    
    function logOut()
    {
        $this->session->unset_userdata("kulad");
        $this->session->unset_userdata("yetkiId");
        redirect(base_url('giris'));
        
    }
}

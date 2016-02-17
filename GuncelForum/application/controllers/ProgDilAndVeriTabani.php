<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProgDilAndVeriTabani extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function progDilEkleForm()
    {
        $this->load->view('yazar/progDilEkle',array("title"=>"Programlama Dili Ekle"));
    }
    
    public function progDilEkle()
    {
        $ekle = $this->ProgVtys_model->ProgVtysEkle(array("prog_dil_adi"=>trim($this->input->post("progAd")),"vtyst_mi" => 0));
        if ($ekle == 1) {
            $this->session->set_flashdata("kayitDurum",1);
        } else {
            $this->session->set_flashdata("kayitDurum",0);
        }
        redirect(base_url('programlama-dili/ekle'));
    }
    
    public function progDilKontrol() 
    {
        $sonuc = $this->ProgVtys_model->isimKontrol(trim($this->input->post("progdil")));
        if ($sonuc == 1) {
            echo 1;
        } else {
            echo 0;
        }
    }
    
}

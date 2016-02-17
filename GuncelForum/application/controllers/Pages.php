<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index()
	{
           $this->load->view('pages/index',array("title" => "Anasayfa"));
	}
        
        public function hakkimizda()
        {
            $this->load->view('pages/hakkimizda',array("title" => "Hakkımızda"));
        }
        
        public function yazarlar()
        {
            $this->load->view('pages/yazarlar',array("title" => "Hakkımızda"));
        }
        
        public function iletisim()
        {
            $this->load->view('pages/iletisim',array("title" => "iletisim"));
        }
        
        public function yazi()
        {
            $this->load->view('yazar/yaziEkle',array("title" => "Yazı Ekle"));
        }
        
        
        
        public function login()
        {
            $this->load->view('pages/giris',array("title" => "Giriş"));
        }
        
        public function uyeOl()
        {
            $this->load->view('pages/uyeOl',array("title" => "Üye Ol"));
        }
        
        public function guvenlikKodu() 
        {
            $kod = substr(md5(rand(0, 999999999999)), -6);
            if ($kod) {
                $this->session->set_userdata("guvKod", $kod);
                $width = 100;
                $height = 30;
                $resim = ImageCreate($width, $height);
                $beyaz = ImageColorAllocate($resim, 255, 255, 255);
                $rand = ImageColorAllocate($resim, rand(0, 255), rand(0, 255), rand(0, 255));
                ImageFill($resim, 0, 0, $rand);
                ImageString($resim, 5, 24, 7, $this->session->userdata("guvKod"), $beyaz);
                ImageLine($resim, 100, 19, 0, 19, $beyaz);
                header("Content,type:image/png");
                ImagePng($resim);
                ImageDestroy($resim);
                $this->session->set_userdata("guvKod2",$this->session->userdata("guvKod"));
            }
       }
       
       

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SessionKontrol extends CI_Controller 
{
    function guvenliKodKontrol()
    {
        if ($this->input->post("session") == $this->session->userdata("guvKod")) {
            echo 1; 
        } else {
            echo 0;
        }
    }
}

<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>
    
    <link href="<?= base_url()?>public/visitor/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?= base_url()?>public/visitor/css/heroic-features.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url()?>public/cssmenu/styles.css"/>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="<?= base_url()?>public/cssmenu/script.js"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="<?= base_url() ?>public/tinymce/init/init.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/kontrol/kontrol.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>

<body style="padding-top: 0px;">
   <?php
   if ($this->session->userdata("kulad") != null) {
       $margintop = 'margin-top: 15px;';
   } else {
       $margintop = '';
   }
   ?>
   
    <nav class="navbar navbar-inverse " role="navigation" style="margin: 0px; background: blue;border: none;">
        <div class="container">
            <!-- Brand and toggle get g rouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#ustMenu">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <a class="navbar-brand" href="#" style="<?= $margintop ?>color: white; font-size: 25px;margin-right: 10px;">Güncel Forum</a>
            </div>
            
                
                
           
            
            <?php 
            $fontsize = "18px;";
            $fontfamily = "helvetica";
            
            
            ?>
            <div class="collapse navbar-collapse" id="ustMenu" style="margin-top: 0 ">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?= base_url("/") ?>"  style="<?= $margintop ?>color: white; font-size: <?= $fontsize ?>;padding-left: 15px;">Anasayfa</a>
                    </li>
                    <li>
                        <a href="<?= base_url("hakkimizda") ?>"  style="<?= $margintop ?>color: white; font-size: <?= $fontsize ?>;padding-left: 15px;">Hakkımızda</a>
                    </li>
                    <li>
                        <a href="<?= base_url("yazarlar") ?>" style="<?= $margintop ?>color: white; font-size: <?= $fontsize ?>;padding-left: 15px;">Yazarlarımız</a>
                    </li>
                    <li>
                        <a href="<?= base_url("iletisim") ?>" style="<?= $margintop ?> color: white; font-size: <?= $fontsize ?>;padding-left: 15px;">İletişim</a>
                    </li>
                </ul>
                <?php if($this->session->userdata("kulad") == null) { ?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?= base_url('uye-ol') ?>"  style="color: white; font-size: <?= $fontsize ?>;padding-left: 15px;">Üye Ol</a>
                    </li>
                    <li>
                        <a href="<?= base_url('giris') ?>"  style="color: white; font-size: <?= $fontsize ?>;padding-left: 15px;">Giriş</a>
                    </li>
                </ul>
                <?php } else {
                    $kulad = $this->session->userdata("kulad");
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown" style="">
                        <a href="#" class="dropdown-toggle" style="color: white; font-size: <?= $fontsize ?>;" data-toggle="dropdown"><img class="icon img-circle" src="<?= base_url('public/profilResimleri/ufuk.png') ?>" alt="" style="width:70px;height: 50px; "/></a>
                        
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profil Ayarları</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?= base_url("Login/logOut") ?>"><i class="fa fa-fw fa-power-off"></i> Çıkış</a>
                        </li>
                    </ul>
                </li>
                    
                </ul>
                <?php
                } ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

  

<?php
$this->load->view('layouts/yanMenu/yanMenu');
?>
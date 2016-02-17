<?php
$this->load->view("layouts/pages/header");
?>

<div class="container" style="margin-top: 51px;">
        <div class="row">
            <?php
            if ($this->session->has_userdata("kayitDurum")) {
                if ($this->session->flashdata("kayitDurum") == 0) {
                    ?>
                    <div class="col-md-4 col-md-offset-4" >
                        <div class="alert alert-danger alert-dismissable" style="background-color:red;">
                            <button type="button" class="close" data-dismiss="alert"  aria-hidden="true">&times;</button>  
                            <p style="color: white;">Hata Oluştu </p>
                        </div>
                    </div>
                    <?php
                } else if ($this->session->flashdata("kayitDurum") == 1) {
                    ?>
                    <div class="col-md-4 col-md-offset-4" >
                        <div class="alert alert-success alert-dismissable" >
                            <button type="button" class="close" data-dismiss="alert"  aria-hidden="true">&times;</button>  
                            <p style="color: white;">Programla Dili Başarıyla Eklendi</p>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
            <div class="col-md-4 col-md-offset-4" >
                <div class="login-panel panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Programlama Dili Ekleme</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" id="progDilEkle_kontrol" action="<?= base_url(); ?>ProgDilAndVeriTabani/progDilEkle">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Programlam Dili Adı" name="progAd" type="text" value="" id="progAd"  autofocus />
                                    <p id="ktext" style="color: red;"></p>
                                </div>
                                <?= '<input  value="1" type="text" class="hidden" id="pKontrol"/>' ?>
                                <input type="submit"  class="btn btn-lg btn-success btn-block" value="Ekle"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
$this->load->view("layouts/pages/footer");

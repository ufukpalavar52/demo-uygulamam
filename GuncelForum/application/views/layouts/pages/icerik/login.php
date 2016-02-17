


<div class="container" style="margin-top: 51px;">
        <div class="row">
            <?php
               if ($this->session->flashdata("HataGiris")) {
                   if ($this->session->flashdata("HataGiris") == 1) {
                   ?>
                      <div class="col-md-4 col-md-offset-4" >
                             <div class="alert alert-danger alert-dismissable" style="background-color:red;">
                                    <button type="button" class="close" data-dismiss="alert"  aria-hidden="true">&times;</button>  
                                    <p style="color: white;">Kullanıcı Adı veya Şifre Hatalı</p>
                             </div>
                       </div>
               <?php 
                    }
                } ?>
            <div class="col-md-4 col-md-offset-4" >
                <div class="login-panel panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Giriş Yapınız</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" id="giris_kontrol" action="<?= base_url(); ?>Login/loginKontrol">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Kullanıcı Adı" name="kulad" type="text" value="" id="kulad"  autofocus />
                                    <p id="ktext" style="color: red; display: none;"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Şifre" name="sifre" type="password" id="sifre" value="" />
                                    <p id="stext" style="color: red; display: none;"></p>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="hatirla" type="checkbox" value="0">Beni Hatırla
                                    </label>
                                </div>
                                <?php
                                /* Güvenlik kodu yolu */
                                $guvenlikKoduYol = base_url('pages/guvenlikKodu');
                    
                                ?>
                                <div class="form-group">
                                    <img src="<?= $guvenlikKoduYol ?>"  style="float: left;width: 100px;height: 34px;border-radius: 4px;margin-right: 4px;" id="guvImg"/>
                                    <span class=" text-center" title="yenile" style="cursor: pointer; float: left;margin-right: 13px;margin-top: 4px;" id="guvRefresh"><i class="fa fa-refresh bigicon"></i></span>
                                    <input class="form-control" placeholder="Güvenlik Kodu" name="guv" type="text" style="width:140px;" id="guv" value="" />
                                    
                                </div><br>
                                <input type="text" name="kontrol" id="kontrol" value="1" class="hidden"/>
                                <input type="submit"  class="btn btn-lg btn-success btn-block" value="Giriş"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
   
    .bigicon {
        font-size: 25px;
        color: #36A0FF;
    }
</style>
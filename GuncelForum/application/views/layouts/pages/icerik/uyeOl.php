<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet"/>  
<script src="<?= base_url() ?>public/kontrol/datepicker.js" type="text/javascript"></script>

<div class="container" style="margin-top: 51px;">
    
           
          
           <div class="row">
               <?php
               if ($this->session->has_userdata("kayitDurum")) {
                   if ($this->session->flashdata("kayitDurum") == 1) {
                       $divclass = 'alert alert-success alert-dismissable';
                       $mesaj = '<p>Kayıdınız Başarıyla Oluşturuldu</p>';
                       $style = null;
                   } else {
                       $divclass = 'alert alert-danger alert-dismissable';
                       $mesaj = '<p style="color: white;">Hata Oluştu! Tekrar Deneyin</p>';
                       $style = 'style="background-color:red;"';
                   }
                   ?>
                      <div class="col-md-4 col-md-offset-4" >
                             <div class="<?= $divclass ?>" <?= $style ?>>
                                    <button type="button" class="close" data-dismiss="alert"  aria-hidden="true">&times;</button>  
                                     <?= $mesaj ?>
                             </div>
                       </div>
               <?php } ?>
            <div class="col-md-4 col-md-offset-4">
                
                <div class="login-panel panel panel-danger">
                    
                    <div class="panel-heading" >
                        <h3 class="panel-title" style="text-align: center;">Üye Ol</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" id="uye_kontrol" action="<?= base_url("Kullanicilar/kullaniciOlustur") ?>">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Kullanıcı Adınız" name="kulad" type="text" value="" id="kulad"  autofocus />
                                    <p id="ktext" style="color: red; display: none;">&nbsp;Kulanıcı Adı en az 4 karakter olmalı!</p>
                                    <p id="k2text" style="color: red; display: none;">&nbsp;Bu alanda özel karakterler kullanmayın!</p>
                                    <p id="k3text" style="color: red;"></p>
                                </div>
                                
                                <div class="form-group">
                                    <input class="form-control" placeholder="Adınız" name="ad" type="text" value="" id="ad"  autofocus />
                                    <p id="atext" style="color: red; display: none;">&nbsp;Adınız en az 3 karakterli olmalı!</p>
                                    <p id="a2text" style="color: red; display: none;">&nbsp;Bu alanda sayı ve özel karakter kullanmayın!</p>
                                </div>
                                
                                <div class="form-group">
                                    <input class="form-control" placeholder="Soyadınız" name="soyad" type="text" value="" id="soyad"  autofocus />
                                    <p id="sotext" style="color: red; display: none;">&nbsp;Soyadınız en az 3 karakterli olmalı!</p>
                                    <p id="s2text" style="color: red; display: none;">&nbsp;Bu alanda sayı ve özel karakter kullanmayın!</p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Doğum Tarihiniz" name="tarih" type="text" value="" id="date"  autofocus />
                                    <p id="dtext" style="color: red; display: none;">&nbsp;Lütfen geçerli bir tarih giriniz.</p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Eposta adresiniz." name="email" type="text" value="" id="email"   />
                                    <p id="etext" style="color: red; display: none;">Lütfen geçerli eposta giriniz!</p>
                                    <p id="e1text" style="color: red;"></p>
                                </div>
                                <div class="form-group">
                                    Normal Kullanıcı
                                    <label>
                                        <input name="tip" type="radio" checked value="0"/>
                                    </label>
                                    &nbsp;&nbsp;Yazar
                                    <label>
                                        <input name="tip" type="radio"  value="1"/>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Şifre" name="sifre" type="password" id="sifre" MAXLENGTH="20" value="" size="20"/>
                                    <p id="stext" style="color: red; display: none;">Şifre en az 6 karakterli olmalı</p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Şifre Tekrar" name="sifre1" MAXLENGTH="20" type="password" id="sifre2" value="" />
                                    <p id="s1text" style="color: red; display: none;">Şifreniz eşleşmiyor</p>
                                </div>
                                
                                <div class="checkbox" >
                                    <label >
                                        <input name="sozlesme" id="sozlesme"  type="checkbox"  value=""/><a href="#">Sözleşmeyi okudum.</a>
                                        <i id="check" style="display: none;border:2px solid red;">Bu alanı işaretlemelisiniz</i>
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
                                <input type="text" id="kontrol" value="1" class="hidden" />
                                <input type="submit" id="sButton"  class="btn btn-lg btn-primary btn-block" value="Üye Ol"/>
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
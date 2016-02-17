(function ( $ ){
    var base_url = 'http://localhost/GuncelForum/';
    $(document).ready(function() {
        $('#giris_kontrol').submit(function(){
            var kulad = $('#kulad').val();
            var sifre = $('#sifre').val();
            var guv = $("#guv").val();
            if (kulad === "" || sifre === "" || kulad.length < 4 || sifre.length < 6 ||guv === "" /*||guv.length > 6 ||guv.length < 6*/) {
                if (kulad === "" ) {
                    $("#kulad").css("border" , "2px solid red" ).attr("placeholder","Kullanıc Adını boş bırakmayın...");
                } 
                if(sifre === "") {
                    $("#sifre").css("border" , "2px solid red" ).attr("placeholder","Sifreyi boş bırakmayın...");
                }
                if (kulad.length < 4 && kulad !== "") {
                    document.getElementById("ktext").innerHTML = '&nbsp;Kullanıcı Adı en az 4 karakter olmalı!';
                    $("#ktext").fadeIn(1000);
                    $("#kulad").css("border" , "2px solid red" );
                }
                
                if (sifre.length < 6 && sifre !== "") {
                    document.getElementById("stext").innerHTML = '&nbsp;Şifre en az 6 karakter olmalı!';
                    $("#stext").fadeIn(1000);
                    $("#sifre").css("border" , "2px solid red" );
                }
                
                if (guv === "") {
                    $("#guv").css("border","2px solid red");
                } else if (guv !== "") {
                    $.ajax({
                        type: "POST",
                        data: 'session=' + guv,
                        url: base_url + 'SessionKontrol/guvenliKodKontrol',
                        success: function (res) {
                            if (res == 1) {
                                $("#guv").css("border", "");
                            } else {
                                $("#guv").css("border", "2px solid red");
                                
                            }
                        }
                    });

                }
                
                return false;
            } else {
                if (guv !== "") {
                    $.ajax({
                        async: false,
                        type: "POST",
                        data: 'session=' + guv,
                        url: base_url + 'SessionKontrol/guvenliKodKontrol',
                        success: function (res) {
                            if (res == 1) {
                                $("#guv").css("border", "");
                                document.getElementById("kontrol").value = "1";
                            } else {
                                $("#guv").css("border", "2px solid red");
                                document.getElementById("kontrol").value = "";
                            }
                        }
                    });
                }
                if (document.getElementById("kontrol").value !== "") {
                    return true;
                } else {
                    return false;
                }
                   
            } 
        });
        $('#giris_kontrol').keyup(function(){
            var kulad = $('#kulad').val();
            var sifre = $('#sifre').val();
            if (kulad !== "") {
                $("#kulad").css("border" , "" );
            } 
            
            if(sifre !== "") {
                $("#sifre").css("border" , "" );
            }
            
            if (kulad.length >= 4) {
                $("#ktext").fadeOut(500);
                $("#kulad").css("border", "");
            }
            
            if (sifre.length >= 6) {
                $("#stext").fadeOut(500);
                $("#sifre").css("border", "");
            }
            
        });
        $('#uye_kontrol').submit(function(){
               var kulad = $("#kulad").val(), guv = $("#guv").val();
               var ad = $("#ad").val();
               var soyad = $("#soyad").val();
               var email = $("#email").val();
               var tarih = $("#date").val();
               var sif1 = $("#sifre").val();
               var sif2 = $("#sifre2").val();
               var kuladregxep = /^[a-zA-Z0-9]{4,15}$/;
               var adregxep = /^[a-zA-ZıİçÇöÖşŞüÜğĞ]{3,15}$/;
               var dateregxep = /^(19|20)\d\d([- /.])(0[1-9]|1[012])\2(0[1-9]|[12][0-9]|3[01])$/;
               var emailregxep = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
               if (kulad === ""||ad === ""||soyad === ""||email === ""||tarih === ""||$("#sozlesme").is(":checked") === false||sif1 === ""||sif2 === "" || guv === "") {
                   if (kulad === "") {
                       $("#kulad").css("border" , "2px solid red" ).attr("placeholder","Kullanıcı Adınızı boş bırakmayın!");
                   } else if (kulad !== "" && kulad.length < 4 ) {
                       $("#kulad").css("border" , "2px solid red" );
                       $("#ktext").fadeIn(1000);                      
                   } else if (kulad.length >= 4 && kuladregxep.test(kulad) === false){
                       $("#kulad").css("border" , "2px solid red" );
                       $("#k2text").fadeIn(1000);
                   }
                   
                   if (ad === "") {
                       $("#ad").css("border" , "2px solid red" ).attr("placeholder","Adınızı boş bırakmayın!");
                   } else if (ad !== "" && ad.length < 3 ) {
                       $("#atext").fadeIn(1000);                      
                   } else if (ad.length > 2 && adregxep.test(ad) === false){
                       $("#ad").css("border" , "2px solid red" );
                       $("#a2text").fadeIn(1000); 
                   }
                   
                   if (soyad === "") {
                       $("#soyad").css("border" , "2px solid red" ).attr("placeholder","Soyadınızı boş bırakmayın!");
                   } else if (soyad !== "" && soyad.length < 3 ) {
                       $("#sotext").fadeIn(1000);                      
                   } else if (soyad.length > 2 && adregxep.test(soyad) === false){
                       $("#soyad").css("border" , "2px solid red" );
                       $("#s2text").fadeIn(1000); 
                   }
                   
                   if (tarih === "") {
                       $("#date").css("border" , "2px solid red" ).attr("placeholder","Doğum tarihinizi boş bırakmayın!");
                   } else if (dateregxep.test(tarih) === false){
                       $("#date").css("border" , "2px solid red" );
                       $("#dtext").fadeIn(1000); 
                   }
                   
                   if (email === "") {
                       $("#email").css("border" , "2px solid red" ).attr("placeholder","Email adresinizi boş bırakmayın!");
                   } else if (emailregxep.test(email) === false){
                       $("#email").css("border" , "2px solid red" );
                       $("#etext").fadeIn(1000); 
                   }
                   
                   if (sif1 === "") {
                       $("#sifre").css("border" , "2px solid red" ).attr("placeholder","Lütfen şifre giriniz!");
                   } else if (sif1 !== "" && sif1.length < 6 ) {
                       $("#stext").fadeIn(1000);                      
                   }
                   
                   if (sif2 === "") {
                       $("#sifre2").css("border" , "2px solid red" ).attr("placeholder","Lütfen bu alanı doldurunuz!");
                   } else if (sif1 !== sif2  ) {
                       $("#s1text").fadeIn(1000);                      
                   }
                   
                   if (guv === "") {
                       $("#guv").css("border","2px solid red");
                   } else if (guv !== "") {
                        $.ajax({
                           type: "POST",
                           data: 'session='+guv ,
                           url: base_url+'SessionKontrol/guvenliKodKontrol',
                           success: function (res) {
                                if (res == 1) {
                                    $("#guv").css("border","");
                                } else {
                                    $("#guv").css("border","2px solid red");
                                    
                                }
                            }
                        });
                    } 
                   
                   if ($("#sozlesme").is(":checked") === false) {
                       $("#check").fadeIn(1000);
                       
                   } 
                   
                   return false;
                } else {
                    if (kulad.length >= 4 && kuladregxep.test(kulad) === false){
                       $("#kulad").css("border" , "2px solid red" );
                       $("#k2text").fadeIn(1000);
                       //return false
                       document.getElementById("kontrol").value = 0;
                    } else if (kuladregxep.test(kulad) === true) {
                        $.ajax({
                            async: false,
                            type: "POST",
                            data: "kulad=" + kulad,
                            url: base_url + "/Kullanicilar/kuladKontrol",
                            cache: false,
                            success: function (res) {
                                if (res == 1) {
                                    document.getElementById("k3text").innerHTML = '&nbsp;Bu kullanıcı adı kullanılmaktadır <i class="fa fa-times"></i>';
                                    //return false; 
                                    document.getElementById("kontrol").value = "";
                                } else {
                                    document.getElementById("k3text").innerHTML = '';
                                    $("#kulad").css("border", "");
                                }
                                
                             }
                        });
                    }
                    
                    if (ad.length > 2 && adregxep.test(ad) === false){
                       $("#ad").css("border" , "2px solid red" );
                       $("#a2text").fadeIn(1000);
                       //return false;
                       document.getElementById("kontrol").value = 0;
                    }  else if (ad !== "" && ad.length < 3 ) {
                       $("#atext").fadeIn(1000);
                       //return false;
                       document.getElementById("kontrol").value = "";
                    }
                    
                    if (soyad !== "" && soyad.length < 3 ) {
                       $("#sotext").fadeIn(1000);
                       //return false;
                       document.getElementById("kontrol").value = 0;
                    } else if (soyad.length > 2 && adregxep.test(soyad) === false){
                       $("#soyad").css("border" , "2px solid red" );
                       $("#s2text").fadeIn(1000);
                       //return false;
                       document.getElementById("kontrol").value = "";
                    }
                    
                    if (email !== "" && emailregxep.test(email) === false){
                       $("#email").css("border" , "2px solid red" );
                       $("#etext").fadeIn(1000);
                       //return false;
                       document.getElementById("kontrol").value = 0;
                    } else if (emailregxep.test(email) === true){
                       $.ajax({
                           async: false,
                           type: "POST",
                           data: "email="+email,
                           url: base_url+"/Kullanicilar/emailKontrol",
                           cache: false,
                           success: function (res) {
                               if (res == 1) {
                                   document.getElementById("e1text").innerHTML = '&nbsp;Bu eposta kullanılmaktadır <i class="fa fa-times"></i>';
                                   //return false;
                                   document.getElementById("kontrol").value = "";
                                } else {
                                   document.getElementById("e1text").innerHTML = '';        
                                }
                                
                            }
                        });
                    }
                    if (tarih !== "" && dateregxep.test(tarih) === false){
                       $("#date").css("border" , "2px solid red" );
                       $("#dtext").fadeIn(1000);
                       //return false;
                       document.getElementById("kontrol").value = "";
                    }
                    if (sif1 !== "" && sif1.length < 6 ) {
                       $("#stext").fadeIn(1000);
                       //return false;
                       document.getElementById("kontrol").value = "";
                    }
                   
                    if (sif1 !== sif2  ) {
                       $("#s1text").fadeIn(1000);
                       //return false;
                       document.getElementById("kontrol").value = "";
                    }
                    
                    if (guv !== "") {
                        $.ajax({
                           async: false,
                           type: "POST",
                           data: 'session='+guv ,
                           url: base_url+'SessionKontrol/guvenliKodKontrol',
                           success: function (res) {
                                if (res == 1) {
                                    $("#guv").css("border","");
                                } else {
                                    $("#guv").css("border","2px solid red");
                                    //return false;
                                   document.getElementById("kontrol").value = "";
                                    
                                }
                                
                            }
                        });
                    }
                    
                   if (document.getElementById("kontrol").value !== "") {
                      return true;    
                   } else {
                       document.getElementById("kontrol").value = "1";
                       return false;
                   }
                }
                return false;
                
                
        });
        $('#uye_kontrol').keyup(function(){
               var kulad = $("#kulad").val();
               var ad = $("#ad").val();
               var soyad = $("#soyad").val();
               var email = $("#email").val();
               var tarih = $("#date").val();
               var sif1 = $("#sifre").val();
               var sif2 = $("#sifre2").val();
               var kuladregxep = /^[a-zA-Z0-9]{4,15}$/;
               var adregxep = /^[a-zA-ZıİöÖşŞüÜğĞ]{3,15}$/;
               var dateregxep = /^(19|20)\d\d([- /.])(0[1-9]|1[012])\2(0[1-9]|[12][0-9]|3[01])$/;
               var emailregxep = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
               
            if (kulad.length >= 4 && kuladregxep.test(kulad) === true) {
               $.ajax({
                type: "POST",
                data: "kulad="+kulad,
                url: base_url+"/Kullanicilar/kuladKontrol",
                cache: false,
                success: function (res) {
                    if (res == 1) {
                        document.getElementById("k3text").innerHTML = '&nbsp;Bu kullanıcı adı kullanılmaktadır <i class="fa fa-times"></i>';

                    } else {
                        document.getElementById("k3text").innerHTML = '';
                        $("#kulad").css("border", "");
                        $("#ktext").fadeOut(1000);
                        $("#k2text").fadeOut(1000);
                    }
                }
                });
                
            } 

            if (ad.length >= 3 && adregxep.test(ad) === true) {
                $("#ad").css("border", "");
                $("#atext").fadeOut(1000);
                $("#a2text").fadeOut(1000);
            }

            if (soyad.length >= 3 && adregxep.test(soyad) === true) {
                $("#soyad").css("border", "");
                $("#sotext").fadeOut(1000);
                $("#s2text").fadeOut(1000);
            } 

            if (dateregxep.test(tarih) === true) {
                $("#date").css("border", "");
                $("#dtext").fadeOut(1000);
            }

            if (emailregxep.test(email) === true) {
                $.ajax({
                type: "POST",
                data: "email="+email,
                url: base_url+"/Kullanicilar/emailKontrol",
                cache: false,
                success: function (res) {
                    if (res == 1) {
                        document.getElementById("e1text").innerHTML = '&nbsp;Bu eposta kullanılmaktadır <i class="fa fa-times"></i>';
                    } else {
                        document.getElementById("e1text").innerHTML = '';
                        $("#email").css("border", "");
                        $("#etext").fadeOut(1000);
                    }
                }
                });   
            }
            
            

            if (sif1.length >= 6) {
                $('#sifre').css("border", "");
                $("#stext").fadeOut(1000);
            }

            if (sif1 === sif2) {
                $("#s1text").fadeOut(1000);
                $('#sifre2').css("border","");
            }

            
        });
        $("#sozlesme").on('change',function(){
            if ($("#sozlesme").is(":checked") === true) {
                $("#check").fadeOut(1000);
            }
        });
        $("#guvRefresh").click(function(){
            $("#guvImg").attr("src", base_url+'pages/guvenlikKodu');
        });
        /*
        $("#guvRefresh").click(function(){
            $.ajax({
                type: "POST",
                url: $("#kodYolSession").val(),
                success: function (res) {
                   $("#guvImg").attr("src", $("#kodYol").val());
                   $("#session").val(res);
                }
            });
        });*/
    });
    
    
    $(document).ready(function () {
        var i = 0;
        $('#gizle').click(function () {
            $("#yanmenu").slideToggle(1000);
            if (i % 2 == 0) {
                //document.getElementById("gizle").className = 'btn btn-success btn-block';
                document.getElementById("gizle").title = 'Göster';
                document.getElementById("gizle").innerHTML = 'İçerik <i class="glyphicon glyphicon-plus-sign"></i>'
            } else {
                //document.getElementById("gizle").className = 'btn btn-danger btn-block';
                document.getElementById("gizle").title = 'Gizle';
                document.getElementById("gizle").innerHTML = 'İçerik  <i class="glyphicon glyphicon-minus-sign"></i>'
            }
            i++;
        });
    });
    $(document).ready(function (){
        $("#progDilEkle_kontrol").submit(function (){
            var progDil = $("#progAd").val();
            
            if (progDil === "") {
                $("#progAd").css("border","2px solid red").attr("placeholder","Programlama Dilini Giriniz");
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    data: "progDil="+progDil,
                    url: base_url+"ProgDilAndVeriTabani/progDilKontrol",
                    cache: false,
                    success: function (response) {
                        if (response == 1) {
                            document.getElementById("pKontrol").value = "";
                        } else {
                            document.getElementById("pKontrol").value = "1";
                        }
                    }
                });
                
                
                if (document.getElementById("pKontrol").value !== "") {
                    return true;
                } else {
                    return false;
                }
                
            }
        });
        $("#progDilEkle_kontrol").keyup(function () {
            var progDil = $("#progAd").val();
            $.ajax({
                type: "POST",
                data: "progdil=" + progDil,
                url: base_url + "ProgDilAndVeriTabani/progDilKontrol",
                cache: false,
                success: function (response) {
                    if (response == 1) {
                        document.getElementById("ktext").innerHTML = 'Bu dil daha önce oluşturulmuş.';
                    } else {
                        document.getElementById("ktext").innerHTML = '';
                    }
                }
            });
        });
    });
    
    
})( jQuery );
(function($) {
$( document ).ready(function(){
    $("#date").datepicker({
        changeMonth: true,
        changeYear: true,
        color: "black",
        dayNames: [ "Pazar", "Pazaretesi", "Salı", "Çarşamba", "Perşembe", "Cuma", "Cumartesi" ],
        dayNamesMin: [ "Pzr", "Pzrt", "Sa", "Çar", "Per", "Cm", "Cmt" ],
        monthNamesShort: [ "Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık" ],
        yearRange: "-80:-12",
        dateFormat: 'yy-mm-dd',
        
    });
});
})(jQuery);


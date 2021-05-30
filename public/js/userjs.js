$(document).ready(function (){
    function tambahBarang(val) {
        var current = parseInt($("input[name='jumlah_barang']").val());
        if(val == -1 && current <= 0) return;
        $("input[name='jumlah_barang']").val(current+val);
        $("input[name='jumlah_barang']").change();
    };
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ".");
    };
    $("#barang-minus").click(function(){
        tambahBarang(-1);
    });
    $("#barang-plus").click(function(){
        tambahBarang(1);
    });
    $("input[name='jumlah_barang']").change(function(){
        var current = parseInt($("input[name='jumlah_barang']").val()) * harga;
        current = numberWithCommas(current);
        $("#total").text(current);
    });
    $("#popOpen").click(function(){
        $(".popup-overlay, .popup-content").addClass("active");
    });
    $("#popClose").click(function(){
        $(".popup-content, .popup-overlay").removeClass("active");
    });

    $("#descArrow").click(function(){
        if($("#arrow").hasClass("fa-chevron-down")){
            $("#arrow").removeClass("fa-chevron-down");
            $("#arrow").addClass("fa-chevron-up");
            $('#deskripsi').addClass("d-none");
        }else{
            $("#arrow").addClass("fa-chevron-down");
            $("#arrow").removeClass("fa-chevron-up");
            $('#deskripsi').removeClass("d-none");
        }
    });
});

$(document).ready(function (){
    function tambahBarang(val) {
        var current = parseInt($("input[name='jumlah_barang']").val());
        if(val == -1 && current <= 0) return;
        $("input[name='jumlah_barang']").val(current+val);
        $("input[name='jumlah_barang']").change();
    };
    $("#barang-minus").click(function(){
        tambahBarang(-1);
    });
    $("#barang-plus").click(function(){
        tambahBarang(1);
    });
    $("input[name='jumlah_barang']").change(function(){
        var current = parseInt($("input[name='jumlah_barang']").val());
        $("input[name='total_harga']").val(harga * current);
    });
});

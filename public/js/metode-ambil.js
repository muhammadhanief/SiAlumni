$(document).ready(function() {
    $("#alamat-pengiriman").slideUp();
    $("#email_pengambilan").attr('required', true);
    $("#surat_kuasa").slideUp();

});


$('#metodePengambilan').change(function() {
    val = $(this).val();
    // kirim ke email
    if (val == 1) {
        $("#alamat-pengiriman").slideUp();
        $("#email-pengiriman").slideDown();

        $("#alamat_pengambilan").removeAttr("required");
        $("#email_pengambilan").attr("required", true);

        $("#alamat_pengambilan").val("");

        $("#surat_kuasa").slideUp();
        $("#formFileKuasa").val("");
    }
    // diambil di kampus
    else if (val == 2) {
        $("#alamat-pengiriman").slideUp();
        $("#email-pengiriman").slideUp();

        $("#alamat_pengambilan").removeAttr("required");
        $("#email_pengambilan").removeAttr("required");

        $("#alamat_pengambilan").val("");
        $("#email_pengambilan").val("");

        $("#surat_kuasa").slideUp();
        $("#formFileKuasa").val("");

    }
    // diambil di kampus oleh orang lain
    else if (val == 3) {
        $("#alamat-pengiriman").slideUp();
        $("#email-pengiriman").slideUp();

        $("#alamat_pengambilan").removeAttr("required");
        $("#email_pengambilan").removeAttr("required");

        $("#alamat_pengambilan").val("");
        $("#email_pengambilan").val("");

        $("#surat_kuasa").slideDown();
    }
    // dikirimkan via pos
    else if (val == 4) {
        $("#alamat-pengiriman").slideDown();
        $("#email-pengiriman").slideUp();

        $("#alamat_pengambilan").attr("required", true);
        $("#email_pengambilan").removeAttr("required");

        $("#email_pengambilan").val("");

        $("#surat_kuasa").slideUp();
        $("#formFileKuasa").val("");

    }
});
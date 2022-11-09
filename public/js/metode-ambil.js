$(document).ready(function() {
    $("#alamat-pengiriman").hide();
    $("#email_pengambilan").attr('required', true);
    $("#surat_kuasa").hide();
});


$('#metodePengambilan').change(function() {
    val = $(this).val();
    // kirim ke email
    if (val == 1) {
        $("#alamat-pengiriman").hide();
        $("#email-pengiriman").show();

        $("#alamat_pengambilan").removeAttr("required");
        $("#email_pengambilan").attr("required", true);

        $("#alamat_pengambilan").val("");

        $("#surat_kuasa").hide();
        $("#formFileKuasa").val("");
    }
    // diambil di kampus
    else if (val == 2) {
        $("#alamat-pengiriman").hide();
        $("#email-pengiriman").hide();

        $("#alamat_pengambilan").removeAttr("required");
        $("#email_pengambilan").removeAttr("required");

        $("#alamat_pengambilan").val("");
        $("#email_pengambilan").val("");

        $("#surat_kuasa").hide();
        $("#formFileKuasa").val("");

    }
    // diambil di kampus oleh orang lain
    else if (val == 3) {
        $("#alamat-pengiriman").hide();
        $("#email-pengiriman").hide();

        $("#alamat_pengambilan").removeAttr("required");
        $("#email_pengambilan").removeAttr("required");

        $("#alamat_pengambilan").val("");
        $("#email_pengambilan").val("");

        $("#surat_kuasa").show();
    }
    // dikirimkan via pos
    else if (val == 4) {
        $("#alamat-pengiriman").show();
        $("#email-pengiriman").hide();

        $("#alamat_pengambilan").attr("required", true);
        $("#email_pengambilan").removeAttr("required");

        $("#email_pengambilan").val("");

        $("#surat_kuasa").hide();
        $("#formFileKuasa").val("");

    }
});
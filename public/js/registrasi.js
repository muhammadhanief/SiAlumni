// nip
// skbps
// sktmpt

// skatasan
// instansi
// sklunas

function showNonBPS() {
    $('#skatasan').slideDown();
    $('#instansi').slideDown();
    $('#sklunas').slideDown();

    $('#skatasan-inp').attr("required", true);
    $('#instansi-inp').attr("required", true);
    $('#sklunas-inp').attr("required", true);
}

function hideNonBPS() {
    $('#skatasan').slideUp();
    $('#instansi').slideUp();
    $('#sklunas').slideUp();

    $('#skatasan-inp').removeAttr("required");
    $('#instansi-inp').removeAttr("required");
    $('#sklunas-inp').removeAttr("required");
}

function showBPS() {
    $('#nip').slideDown();
    $('#skbps').slideDown();
    $('#sktmpt').slideDown();

    $('#nip-inp').attr("required", true);
    $('#skbps-inp').attr("required", true);
    $('#sktmpt-inp').attr("required", true);
}

function hideBPS() {
    $('#nip').slideUp();
    $('#skbps').slideUp();
    $('#sktmpt').slideUp();

    $('#nip-inp').removeAttr("required");
    $('#skbps-inp').removeAttr("required");
    $('#sktmpt-inp').removeAttr("required");
}

$(document).ready(function() {
    hideNonBPS();

    $("input[type='radio']").click(function() {
        var radioValue = $("input[name='options']:checked").val();
        if (radioValue == "bps") {
            hideNonBPS();
            setTimeout(showBPS, 500);

        } else if (radioValue == "nonbps") {
            hideBPS();
            setTimeout(showNonBPS, 500);
        }

    });
});
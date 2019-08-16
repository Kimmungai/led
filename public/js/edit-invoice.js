function edit_invoice_field(t) {
    var e = $("#" + t).text();
    $("#" + t + "-input").val(e), $("#" + t).addClass("hidden"), $("#" + t + "-input").removeClass("hidden")
}
function save_invoice_field(t, e, d, v, o) {
    //e = $("#" + t + "-input").val();
    $("#" + t).text(e), $("#" + t).removeClass("hidden");
    $("#" + t + "-input").addClass("hidden");
    update_invoice(e, d, v, o);
}

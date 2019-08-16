function edit_ireport_field(t) {
    var e = $("#" + t).text();
    $("#" + t + "-input").val(e), $("#" + t).addClass("hidden"), $("#" + t + "-input").removeClass("hidden")
}
function save_ireport_field(t, e, d, v, o) {
    //e = $("#" + t + "-input").val();
    $("#" + t).text(e), $("#" + t).removeClass("hidden");
    $("#" + t + "-input").addClass("hidden");
    update_ireport(e, d, v, o);
}

function update_ireport(t, e, d, o) {
    $.post("/update-ireport", {
        value: t,
        field: e,
        id: d,
        sales: o,
        _token: $('meta[name="csrf-token"]').attr("content")
    }, function(t, e) {})
}

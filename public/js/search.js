function search_product(t, e) {
    t.length > 2 && get_prods_from_server(t, e)
}

function get_prods_from_server(t, e) {
    $.post("/search-products", {
        prod_cod: t,
        _token: $('meta[name="csrf-token"]').attr("content")
    }, function(t, d) {
        update_results_box(t, e)
    })
}

function update_results_box(t, e) {
    if ($("#results-panel-list").html(""), t.length)
        for (var d = 0; d < t.length; d++) $("#results-panel-list").append('<li onclick="update_a_table(' + t[d].id + ",'" + e + "')\" >" + t[d].name + "</li>");
    else $("#results-panel-list").append("<li>No results found</li>");
    $(".results-panel").removeClass("hidden")
}

function update_a_table(t, e, d = 1) {
    $.post("/get-product", {
        id: t,
        _token: $('meta[name="csrf-token"]').attr("content")
    }, function(t, o) {
        var a = get_specific_table_row(t, e, d);
        a ? ($("#" + e).append(a), calc_table_sum(e), hide_search_results(), save_product_list(e)) : alert("Item already in list!")
    }), $("#prod-id-holder").append('<input id="prod-id-field-' + t + '" type="hidden" name="product_id[]" value="' + t + '">')
}

function hide_search_results() {
    $(".results-panel").addClass("hidden"), $(".search-input").val("")
}

function remove_row(t, e) {
    $("#" + t).remove(), calc_table_sum(e), save_product_list(e)
}

function remove_row_and_submit(t, e) {
    confirm("Are you sure you want to proceed?") && ($("#" + t).remove(), $("#" + e).submit())
}

function get_specific_table_row(t, e, d) {
    if ("purchased-prods" == e) {
        if (!$("#purchased-product-" + t.id).length) {
            var o = '<tr data-id="' + t.id + '" id="purchased-product-' + t.id + '">';
            return o += '<td data-label="Name" data-name="' + t.name + '" id="name-prod-' + t.id + '" ><span class="fas fa-times-circle pointer" onclick="remove_row(\'purchased-product-' + t.id + "','" + e + "')\"></span> " + t.name + "</td>", o += '<td data-label="Supply price" ><input class="form-control1"  id="cost-prod-' + t.id + '" type="number" value="' + t.salePrice + '" onchange="save_product_list(\'purchased-prods\')"/></td>', o += '<td data-label="Supplied (Kg)"><input class="form-control1" id="qty-prod-' + t.id + '" type="number" value="' + d + '" onchange="save_product_list(\'purchased-prods\')"/></td>', o += "</tr>"
        }
        return 0
    }
    if ("sold-prods" == e) {
        if (!$("#sold-product-" + t.id).length) {
            o = '<tr data-id="' + t.id + '" id="sold-product-' + t.id + '">';
            return o += '<td data-label="Name" data-name="' + t.name + '" id="name-prod-' + t.id + '" ><span class="fas fa-times-circle pointer" onclick="remove_row(\'sold-product-' + t.id + "','" + e + "')\"></span> " + t.name + "</td>", o += '<td data-label="Sale price"><input class="form-control1"  id="cost-prod-' + t.id + '" type="number" value="' + t.salePrice + '" onchange="save_product_list(\'sold-prods\')"/></td>', o += '<td data-label="Sold (Kg)"><input class="form-control1" id="qty-prod-' + t.id + '" type="number" value="1" onchange="save_product_list(\'sold-prods\')"/></td>', o += "</tr>"
        }
    } else if ("quote-table-body" == e) {
        if (!$("#quote-table-body-row-" + t.id).length) {
            o = '<tr data-id="' + t.id + '" id="quote-table-body-row-' + t.id + '">';
            return o += '<td data-label="Item code"><span class="fas fa-times-circle" onclick="remove_table_row(\'quote-table-body-row-' + t.id + "','quote-table-body')\"></span>", o += '<strong id="quote-table-body-row-' + t.id + '-td-1" onclick="">' + t.id + "</strong>", o += '<input id="quote-table-body-row-' + t.id + '-td-1-input" type="text" class="hidden" name="prod_id[]" value="'+ t.id +'" onfocusout="save_doc_field(\'quote-table-body-row-' + t.id + "-td-1',this.value)\">", o += "</td>", o += "<td data-label='Description'>", o += '<strong id="quote-table-body-row-' + t.id + '-td-2" onclick="edit_doc_field(\'quote-table-body-row-'+t.id+'-td-2\')">' + t.name + "</strong>", o += '<input id="quote-table-body-row-' + t.id + '-td-2-input" type="text" class="form-control1 hidden" name="prod_name[]" value="'+ t.name +'" onfocusout="save_doc_field(\'quote-table-body-row-' + t.id + "-td-2',this.value)\">", o += "</td>", o += "<td data-label='Unit cost'>", o += '<strong id="quote-table-body-row-' + t.id + '-td-3" onclick="edit_doc_field(\'quote-table-body-row-'+t.id+'-td-3\')">' + t.salePrice + "</strong>", o += '<input id="quote-table-body-row-' + t.id + '-td-3-input" type="text" class="form-control1 hidden" name="sale_price[]" value="'+t.salePrice+'" onfocusout="save_doc_field(\'quote-table-body-row-' + t.id + "-td-3',this.value)\">", o += "</td>", o += "</tr>"
        }
        return 0
    }
}

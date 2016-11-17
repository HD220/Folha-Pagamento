
function pesquisar(control, check) {
    var ativo;
    if ($("#" + check).is(":checked")) {
        ativo = "S";
    } else {
        ativo = "N";
    }
   
    $.post("/" + control + "/listar", {flativo: ativo,texto:$("#text_search").val(),idempresa:$("#empresa_search").val()})
            .done(function (data) {
                $("#table-content").html(data);
            });
}

function editar(control, id, modal) {
   
    $.get(control + "/editar/" + id).done(function (data) {
        $("#" + modal).html(data);
    });

}


function novo(control, modal) {

    $.get(control + "/novo").done(function (data) {
        $("#" + modal).html(data);
    });
}
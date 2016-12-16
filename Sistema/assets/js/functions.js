$(document).ready(function () {
    $('#mesano_search').mask('AB/CCCC', {'translation': {
            A: {pattern: /[0-1]/},
            B: {pattern: /[0-2]/},
            C: {pattern: /[0-9]/}
        }
    });
    $('#semana_search').mask('Y', {'translation': {
            Y: {pattern: /[1-6]/}
        }
    });
});

function pesquisar_escala() {
    
    var semana,mesano;
    
    semana = $("#semana_search").val();
    mesano = $("#mesano_search").val();
    

    $.post("/escala/listar", {semana: semana, mesano: mesano,jquery:'s'})
            .done(function (data) {
                $("#anchor_print").attr("href","escala/imprimir/"+semana+"/"+mesano)
                $("#table-content").html(data);
            });
}

function pesquisar(control, check) {
    var ativo;
    if ($("#" + check).is(":checked")) {
        ativo = "S";
    } else {
        ativo = "N";
    }

    $.post("/" + control + "/listar", {flativo: ativo, texto: $("#text_search").val()})
            .done(function (data) {
                $("#table-content").html(data);
            });
}

function editar(control, id, modal) {
    $.get(control + "/editar/" + id).done(function (data) {
        $("#" + modal).html(data);
    });
}

function deletar(control, id, element, modal) {
    var r = confirm("Deseja realmente deletar o registro?");
    if (r === true) {

        $.get(control + "/deletar/" + id).done(function (data) {
            $("#" + element).remove();
        });
    }

}


function novo(control, modal) {

    $.get(control + "/novo/").done(function (data) {
        $("#" + modal).html(data);
    });
}

function novo_escala(date, modal) {

    $.get("escala/novo/" + date).done(function (data) {
        $("#" + modal).html(data);
    });
}


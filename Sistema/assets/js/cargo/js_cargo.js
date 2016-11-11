var count = 0;
function add_register(){
    var element = "";
    count++;
    $("#no-register").hide();
    //inicia a tag
    element = "<tr>\n\
                <td class='text-info text-center'>Novo*</td>\n\
                <td><input type='text' class='form-control input-table' name='novo["+count+"][NOME]' maxlength='50' required /></td>\n\
                <td class='hidden-xs'><input type='text' class='form-control input-table' name='novo["+count+"][DESCRICAO]' maxlength='150' /></td>\n\
                <td><input type='number' steps='.01' class='form-control input-table' name='novo["+count+"][VLSALARIO]' max='99999.00' /></td>\n\
                <td><input type='checkbox' class='checkbox_lista center-block input-table' name='novo["+count+"][FLATIVO]' value='S' checked/></td>\n\
               </tr>";
    
    $("#table-edit").append(element);
}

function enviar(element) {
    $("#" + element).submit();
}

function pesquisar() {
    var ativo;
    if($("#inativo_search").is( ":checked" )){
        ativo = $("#inativo_search").val();
    }else{
        ativo = "S";
    }
    
    $.post("/cargo/lista/true", {texto: $("#nome_search").val(),flativo: ativo})
            .done(function (data) {
                $("#table-content").html(data);
            });
}
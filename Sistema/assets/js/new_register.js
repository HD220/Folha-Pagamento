count_user = 0;
function add_register_usuario(){
    var element = "";
    count_user++;
    $("#no-register").hide();
    //inicia a tag
    element = "<tr>\n\
                <td class='text-info text-center'>Novo*</td>\n\
                <td><input type='text' class='form-control input-table' name='novo["+count_user+"][NOME]' maxlength='50' required/></td>\n\
                <td><input type='text' class='form-control input-table' name='novo["+count_user+"][USUARIO]' maxlength='50' required/></td>\n\
                <td><input type='password' class='form-control input-table' name='novo["+count_user+"][SENHA]' maxlength='100' required/></td>\n\
                <td><select name='nome["+count_user+"'][NIVEL]' class='form-control input-table'>\n\
                        <option value='1'>Administrador</option>\n\
                        <option value='2'>Funcionario</option>\n\
                    </select></td>\n\
                <td><input type='checkbox' class='checkbox_lista center-block input-table' name='novo["+count_user+"][FLATIVO]' value='S' checked/></td>\n\
               </tr>";
    
    $("#table-edit").append(element);
}

function add_register_empresa(){
    var element = "";
    count_user++;
    $("#no-register").hide();
    //inicia a tag
    element = "<tr>\n\
                <td class='text-info text-center'>Novo*</td>\n\
                <td><input type='text' class='form-control input-table' name='novo["+count_user+"][NOME]' maxlength='50' required/></td>\n\
                <td><input type='text' class='form-control input-table' name='novo["+count_user+"][NOMECURTO]' maxlength='150' required/></td>\n\
                <td><input type='checkbox' class='checkbox_lista center-block input-table' name='novo["+count_user+"][FLATIVO]' value='S' checked/></td>\n\
               </tr>";
    
    $("#table-edit").append(element);
}

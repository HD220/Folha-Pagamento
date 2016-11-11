<div class="col-lg-12">
    <?= form_open("/usuario/salvar") ?>
    <div class="panel panel-default panel-table" style="box-shadow: 0px 11px 33px -17px #000;">
        <!--<div class="panel-heading">
            Listagem de paramêtros
        </div>-->
        <div class="panel-body" style="background: #fbfbfb; "> 
            <?php
            $data = array(
                "salvar" => array(
                    'value' => 'Salvar',
                    'class' => 'btn btn-sm btn-success pull-right'
                ),
                "voltar" => array(
                    'class' => 'btn btn-sm btn-primary pull-left'
                ),
                "novo" => array(
                    'class' => 'btn btn-sm btn-info pull-left',
                    'style' => 'margin-left:5px;',
                    'onClick' => "add_register_usuario()"
                )
            );
            echo anchor("/", "Voltar", $data['voltar']);
            echo anchor("usuario#", "Novo", $data['novo']);
            echo form_submit($data['salvar']);
            ?>
        </div>
        <div id="table-content">
            <table style="min-width: 650px" class="table table-bordered table-hover" id="table-edit">
            <tr style="background: #f5f5f5;">
                <th style="width: 50px" class="text-center">#</th>
                <th>Nome</th>
                <th>Usuário</th>
                <th>Senha</th>
                <th>Acesso</th>
                <th style="width: 50px" class="text-center">Ativo</th>
            </tr>
            <?php
            if (count($usuarios) > 0) {
                foreach ($usuarios as $usuario) {
                    $inputs = array(
                        "ID" => array(
                            "usuario[" . $usuario['ID'] . "][ID]" => $usuario['ID'],
                        ),
                        'NOME' => array(
                            'type' => 'text',
                            'class' => 'form-control input-table',
                            'name' => "usuario[" . $usuario['ID'] . "][NOME]",
                            'value' => $usuario['NOME'],
                            'maxlength' => '50',
                            'required' => TRUE
                        ),
                        'USUARIO' => array(
                            'type' => 'text',
                            'class' => "form-control input-table",
                            'name' => "usuario[" . $usuario['ID'] . "][USUARIO]",
                            'value' => $usuario['USUARIO'],
                            'maxlength' => '50',
                            'required' => TRUE
                        ),
                        'SENHA' => array(
                            'type' => 'password',
                            'class' => "form-control input-table",
                            'name' => "usuario[" . $usuario['ID'] . "][SENHA]",
                            'value' => $usuario['SENHA'],
                            'maxlength' => '100',
                            'required' => TRUE
                        ),
                        'NIVEL' => array(
                            'class' => "class='form-control input-table'",
                            'name' => "usuario[" . $usuario['ID'] . "][NIVEL]",
                            'value' => $usuario['NIVEL']
                        ),
                        'FLATIVO' => array(
                            'class' => 'checkbox_lista center-block input-table',
                            'name' => "usuario[" . $usuario['ID'] . "][FLATIVO]",
                            'value' => 'S',
                            'checked' => ($usuario['FLATIVO'] == 'S')?true:false
                        )
                    );
                    
                    ?>
                    <tr>
                        <td class="text-center"><?php
                            echo $usuario['ID'];
                            echo form_hidden($inputs['ID']);
                            ?>
                        </td>
                        <td><?= form_input($inputs['NOME']) ?></td>
                        <td><?= form_input($inputs['USUARIO']) ?></td>
                        <td><?= form_input($inputs['SENHA']) ?></td>
                        <td>
                            <?=form_dropdown($inputs['NIVEL']['name'],['1'=>"Administrador","2" => "Funcionario"],$inputs['NIVEL']['value'],$inputs['NIVEL']['class'])?>
                        </td>
                        <td><?= form_checkbox($inputs['FLATIVO']) ?></td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan='7' class="text-center" id="no-register">Não existe registros a serem exibidos</td>
                </tr>
                <?php
            }
            ?>
        </table>
        </div>
        <div class="panel-body" style="background: #fbfbfb;min-height: 30px"> 
            <?php
            $erros = ($this->session->flashdata('erros'))?$this->session->flashdata('erros'):array();
            foreach ($erros as $value) {
                ?>
                <div class='alert alert-warning' role='alert'><?= $value ?></div>
                <?php
            }
            ?>
        </div>
    </div>
    <?= form_close() ?>
</div>
<script src="/assets/js/new_register.js"></script>


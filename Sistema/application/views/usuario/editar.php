<?= form_open("/usuario/salvar", ['class' => 'form-horizontal']) ?>
<div class="form-group">
    <label class="col-sm-3 control-label">Código:</label>
    <div class="col-sm-9">
        <?= form_hidden('ID', $usuario['ID']) ?>
        <p class="form-control-static" ><?= $usuario['ID'] ?>
            <?php
            $check = array(
                'class' => 'checkbox_lista input-table',
                'name' => "FLATIVO",
                'value' => 'S',
                'checked' => ($usuario['FLATIVO'] == 'S') ? true : false
                    )
            ?>
            <label for="flativo" class="pull-right"><?= form_checkbox($check) ?> Ativo</label>
        </p>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label" for="nome">Nome:</label>
    <div class="col-sm-9">
        <?= form_input('NOME', $usuario['NOME'], ['class' => 'form-control',"required" => TRUE]) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label" for="usuario">Usuário:</label>
    <div class="col-sm-9">
        <p class="form-control-static" >
            <?=$usuario['USUARIO']?>
        </p>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label" for="senha">Senha:</label>
    <div class="col-sm-9">
        <?= form_password('SENHA', '', ['class' => 'form-control', 'placeholder' => "(Inalterada)"]) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label" for="usuario">Nível de acesso:</label>
    <div class="col-sm-9">
        <?= form_dropdown('NIVEL', ['1' => 'Administrador', '2' => 'Funcionário'], $usuario['NIVEL'], ['class' => 'form-control']) ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?= form_submit('form', 'Salvar', ['class' => 'btn btn-primary pull-right']) ?>
    </div>
</div>


<?= form_close() ?>
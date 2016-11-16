<?= form_open("/usuario/salvar", ['class' => 'form-horizontal']) ?>
<div class="form-group">
    <label class="col-sm-3 control-label" for="nome">Nome:</label>
    <div class="col-sm-9">
        <?= form_input('NOME', '', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label" for="usuario">Usuário:</label>
    <div class="col-sm-9">
        <?= form_input('USUARIO', '', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label" for="senha">Senha:</label>
    <div class="col-sm-9">
        <?= form_password('SENHA', '', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label" for="usuario">Nível de acesso:</label>
    <div class="col-sm-9">
        <?= form_dropdown('NIVEL', ['1' => 'Administrador', '2' => 'Funcionário'], '2', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?= form_submit('form', 'Criar', ['class' => 'btn btn-primary pull-right']) ?>
    </div>
</div>


<?= form_close() ?>
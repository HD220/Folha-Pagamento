<?= form_open("/empresa/salvar", ['class' => 'form-horizontal']) ?>
<div class="form-group">
    <label class="col-sm-3 control-label" for="nome">Nome:</label>
    <div class="col-sm-9">
        <?= form_input('NOME', '', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label" for="usuario">Nome curto:</label>
    <div class="col-sm-9">
        <?= form_input('NOMECURTO', '', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?= form_submit('form', 'Criar', ['class' => 'btn btn-primary pull-right']) ?>
    </div>
</div>


<?= form_close() ?>
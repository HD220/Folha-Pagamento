<?= form_open("/cargo/salvar", ['class' => 'form-horizontal']) ?>

<div class="form-group">
    <label class="col-sm-3 control-label">Empresa:</label>
    <div class="col-sm-9">
        <p class="form-control-static" ><?= $this->session->userdata('empresa')['NOMECURTO'] ?></p>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label" for="nome">Nome:</label>
    <div class="col-sm-9">
        <?= form_input('NOME', '', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label" for="usuario">Descrição:</label>
    <div class="col-sm-9">
        <?= form_textarea('DESCRICAO', '', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label" for="usuario">Valor do adicional:</label>
    <div class="col-sm-9">
        <?= form_number('VLADICIONAL', '', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?= form_submit('form', 'Criar', ['class' => 'btn btn-primary pull-right']) ?>
    </div>
</div>


<?= form_close() ?>
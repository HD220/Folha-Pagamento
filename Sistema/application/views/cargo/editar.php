<?= form_open("/cargo/salvar", ['class' => 'form-horizontal']) ?>
<div class="form-group">
    <label class="col-sm-3 control-label">Código:</label>
    <div class="col-sm-9">
        <?= form_hidden('ID', $cargo['ID']) ?>
        <p class="form-control-static" ><?= $cargo['ID'] ?>
            <?php
            $check = array(
                'class' => 'checkbox_lista input-table',
                'name' => "FLATIVO",
                'value' => 'S',
                'checked' => ($cargo['FLATIVO'] == 'S') ? true : false
                    )
            ?>
            <label for="flativo" class="pull-right"><?= form_checkbox($check) ?> Ativo</label>
        </p>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Empresa:</label>
    <div class="col-sm-9">
        <p class="form-control-static" ><?= $cargo['NMEMPRESA'] ?></p>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label" for="nome">Nome:</label>
    <div class="col-sm-9">
        <?= form_input('NOME', $cargo['NOME'], ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label" for="descricao">Descrição:</label>
    <div class="col-sm-9">
        <?= form_textarea('DESCRICAO', $cargo['DESCRICAO'], ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label" for="vladicional">Valor do adicional:</label>
    <div class="col-sm-9">
        <?= form_number('VLADICIONAL', $cargo['VLADICIONAL'], ['class' => 'form-control']) ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?= form_submit('form', 'Salvar', ['class' => 'btn btn-primary pull-right']) ?>
    </div>
</div>


<?= form_close() ?>
<?= form_open("/empresa/salvar", ['class' => 'form-horizontal']) ?>
<div class="form-group">
    <label class="col-sm-3 control-label">Código:</label>
    <div class="col-sm-9">
        <?= form_hidden('ID', $empresa['ID']) ?>
        <p class="form-control-static" ><?= $empresa['ID'] ?>
            <?php
            $check = array(
                'class' => 'checkbox_lista input-table',
                'name' => "FLATIVO",
                'value' => 'S',
                'checked' => ($empresa['FLATIVO'] == 'S') ? true : false
                    )
            ?>
            <label for="flativo" class="pull-right"><?= form_checkbox($check) ?> Ativo</label>
        </p>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label" for="nome">Nome:</label>
    <div class="col-sm-9">
        <?= form_input('NOME', $empresa['NOME'], ['class' => 'form-control',"required" => TRUE]) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label" for="usuario">Nome curto:</label>
    <div class="col-sm-9">
        <?= form_input('NOMECURTO', $empresa['NOMECURTO'], ['class' => 'form-control',"required" => TRUE]) ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?= form_submit('form', 'Salvar', ['class' => 'btn btn-primary pull-right']) ?>
    </div>
</div>


<?= form_close() ?>
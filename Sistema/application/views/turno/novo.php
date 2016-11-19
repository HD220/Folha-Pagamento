<?= form_open("/turno/salvar", ['class' => 'form-horizontal']) ?>

<div class="form-group">
    <label class="col-sm-4 control-label">Empresa:</label>
    <div class="col-sm-8">
        <p class="form-control-static" ><?= $this->session->userdata('empresa')['NOMECURTO'] ?>
        <?php
            $check = array(
                'class' => 'checkbox_lista input-table',
                'name' => "FLPICO",
                'value' => 'S',
                'checked' => FALSE
                    )
            ?>
            <label for="flativo" class="pull-right"><?= form_checkbox($check) ?> Pico</label>
        </p>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Nome:</label>
    <div class="col-sm-8">
        <?= form_input('NOME', '', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Entrada turno:</label>
    <div class="col-sm-8">
        <?= form_time('HORAUM', '', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Entrada intervalo:</label>
    <div class="col-sm-8">
        <?= form_time('HORADOIS', '', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Saida intervalo:</label>
    <div class="col-sm-8">
        <?= form_time('HORATRES', '', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Saida turno:</label>
    <div class="col-sm-8">
        <?= form_time('HORAQUATRO', '', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?= form_submit('form', 'Criar', ['class' => 'btn btn-primary pull-right']) ?>
    </div>
</div>


<?= form_close() ?>
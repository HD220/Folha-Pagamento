<?= form_open("/turno/salvar", ['class' => 'form-horizontal']) ?>
<div class="form-group">
    <label class="col-sm-4 control-label">Código:</label>
    <div class="col-sm-8">
        <?= form_hidden('ID', $turno['ID']) ?>
        <p class="form-control-static" ><?= $turno['ID'] ?>
            <?php
            $check = array(
                'class' => 'checkbox_lista input-table',
                'name' => "FLATIVO",
                'value' => 'S',
                'checked' => ($turno['FLATIVO'] == 'S') ? true : false
                    )
            ?>
            <label for="flativo" class="pull-right"><?= form_checkbox($check) ?> Ativo</label>
        </p>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Empresa:</label>
    <div class="col-sm-8">
        <p class="form-control-static" ><?= $turno['NMEMPRESA'] ?>
            <?php
            $check = array(
                'class' => 'checkbox_lista input-table',
                'name' => "FLPICO",
                'value' => 'S',
                'checked' => ($turno['FLPICO'] == 'S') ? true : false
                    )
            ?>
            <label for="flativo" class="pull-right"><?= form_checkbox($check) ?> Pico</label>
        </p>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Nome:</label>
    <div class="col-sm-8">
        <?= form_input('NOME', $turno['NOME'], ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Entrada turno:</label>
    <div class="col-sm-8">
        <?= form_time('HORAUM', $turno['HORAUM'], ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Entrada intervalo:</label>
    <div class="col-sm-8">
        <?= form_time('HORADOIS', $turno['HORADOIS'], ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Saida intervalo:</label>
    <div class="col-sm-8">
        <?= form_time('HORATRES', $turno['HORATRES'], ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Saida turno:</label>
    <div class="col-sm-8">
        <?= form_time('HORAQUATRO', $turno['HORAQUATRO'], ['class' => 'form-control']) ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?= form_submit('form', 'Salvar', ['class' => 'btn btn-primary pull-right']) ?>
    </div>
</div>


<?= form_close() ?>
<?= form_open("/escala/salvar", ['class' => 'form-horizontal']) ?>
<div class="form-group">
    <label class="col-sm-3 control-label">Empresa:</label>
    <div class="col-sm-9">
        <p class="form-control-static" ><?= $this->session->userdata('empresa')['NOMECURTO'] ?></p>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Data Folga:</label>
    <div class="col-sm-9">
        <?=  form_date("DATA",$escala['DATA'],['class' => 'form-control','disabled'=>TRUE])?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label" for="nome">Folgante:</label>
    <div class="col-sm-9">
        <?= form_dropdown('IDFOLGANTE', $funcionarios , $escala['IDFOLGANTE'], ['class' => 'form-control','disabled'=>TRUE]) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label" for="usuario">Folguista:</label>
    <div class="col-sm-9">
        <?= form_dropdown('IDFOLGUISTA',$funcionarios, $escala['IDFOLGUISTA'], ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label" for="usuario">Observação:</label>
    <div class="col-sm-9">
        <?= form_textarea('OBSERVACAO', $escala['OBSERVACAO'], ['class' => 'form-control']) ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?= form_submit('form', 'Salvar', ['class' => 'btn btn-primary pull-right']) ?>
    </div>
</div>


<?= form_close() ?>
<?= form_open("/funcionario/salvar", ['class' => 'form-horizontal']) ?>

<div class="form-group">
    <label class="col-sm-3 control-label">Empresa:</label>
    <div class="col-sm-9">
        <p class="form-control-static" ><?= $this->session->userdata('empresa')['NOMECURTO'] ?></p>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Nome:</label>
    <div class="col-sm-9">
        <?= form_input('NOME', '', ['class' => 'form-control', "required" => TRUE]) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Apelido:</label>
    <div class="col-sm-9">
        <?= form_input('APELIDO', '', ['class' => 'form-control', "required" => TRUE]) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Turno:</label>
    <div class="col-sm-9">
        <?= form_dropdown('IDTURNO', $turnos, '', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Cargo:</label>
    <div class="col-sm-9">
        <?= form_dropdown('IDCARGO', $cargos, '', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">RG:</label>
    <div class="col-sm-9">
        <?= form_input('NURG', '', ['class' => 'form-control', "required" => TRUE]) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">CPF:</label>
    <div class="col-sm-9">
        <?= form_input('NUCPF', '', ['class' => 'form-control', "required" => TRUE]) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">CEP:</label>
    <div class="col-sm-9">
        <?= form_input('ENDERECO[CEP]', '', ['class' => 'form-control', "required" => TRUE]) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Logradouro:</label>
    <div class="col-sm-9">
        <?= form_input('ENDERECO[LOGRADOURO]', '', ['class' => 'form-control', "required" => TRUE]) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Complemento:</label>
    <div class="col-sm-9">
        <?= form_input('ENDERECO[COMPLEMENTO]', '', ['class' => 'form-control', "required" => TRUE]) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Nº:</label>
    <div class="col-sm-9">
        <?= form_input('ENDERECO[NUMERO]', '', ['class' => 'form-control', "required" => TRUE]) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Bairro:</label>
    <div class="col-sm-9">
        <?= form_input('ENDERECO[BAIRRO]', '', ['class' => 'form-control', "required" => TRUE]) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Cidade:</label>
    <div class="col-sm-9">
        <?= form_input('ENDERECO[CIDADE]', '', ['class' => 'form-control', "required" => TRUE]) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">UF:</label>
    <div class="col-sm-9">
        <?= form_input('ENDERECO[UF]', '', ['class' => 'form-control', "required" => TRUE]) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Celular:</label>
    <div class="col-sm-9">
        <?= form_input('NUCELULAR', '', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Fone fixo:</label>
    <div class="col-sm-9">
        <?= form_input('NUTELEFONE', '', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">E-Mail:</label>
    <div class="col-sm-9">
        <?= form_email('DSEMAIL', '', ['class' => 'form-control']) ?>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">Registro:</label>
    <div class="col-sm-9">
        <?= form_date('DTREGISTRO', '', ['class' => 'form-control', "required" => TRUE]) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Adimissão:</label>
    <div class="col-sm-9">
        <?= form_date('DTADMISSAO', '', ['class' => 'form-control', "required" => TRUE]) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Nascimento:</label>
    <div class="col-sm-9">
        <?= form_date('DTNASCIMENTO', '', ['class' => 'form-control', "required" => TRUE]) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Cart. saúde:</label>
    <div class="col-sm-9">
        <?= form_date('DTCARTSAUDE', '', ['class' => 'form-control', "required" => TRUE]) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Demissão:</label>
    <div class="col-sm-9">
        <?= form_date('DTDEMISSAO', '', ['class' => 'form-control']) ?>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">Usuário Pantera:</label>
    <div class="col-sm-9">
        <?= form_input('USUARIOPANTERA', '', ['class' => 'form-control', "required" => TRUE]) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Senha Pantera:</label>
    <div class="col-sm-9">
        <?= form_input('SENHAPANTERA', '', ['class' => 'form-control', "required" => TRUE]) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Nº Dependentes:</label>
    <div class="col-sm-9">
        <?= form_input('NUDEPENDENTE', '', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Adicional:</label>
    <div class="col-sm-9">
        <?= form_number('VLADICIONAL', '', ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Pref folga:</label>
    <div class="col-sm-9">
        <div class="input-group" style="margin-top: 5px;">
            <span class="input-group-btn">
                <?= form_checkbox('PREFFOLGA[DOM]', 'S', TRUE, ['class' => 'checkbox_lista input-table']) ?> Dom
            </span>
            <span class="input-group-btn">
                <?= form_checkbox('PREFFOLGA[SEG]', 'S', TRUE, ['class' => 'checkbox_lista input-table']) ?> Seg
            </span>
            <span class="input-group-btn">
                <?= form_checkbox('PREFFOLGA[TER]', 'S', TRUE, ['class' => 'checkbox_lista input-table']) ?> Ter
            </span>
            <span class="input-group-btn">
                <?= form_checkbox('PREFFOLGA[QUA]', 'S', TRUE, ['class' => 'checkbox_lista input-table']) ?> Qua
            </span>
            <span class="input-group-btn">
                <?= form_checkbox('PREFFOLGA[QUI]', 'S', TRUE, ['class' => 'checkbox_lista input-table']) ?> Qui
            </span>
            <span class="input-group-btn">
                <?= form_checkbox('PREFFOLGA[SEX]', 'S', TRUE, ['class' => 'checkbox_lista input-table']) ?> Sex
            </span>
            <span class="input-group-btn">
                <?= form_checkbox('PREFFOLGA[SAB]', 'S', TRUE, ['class' => 'checkbox_lista input-table']) ?> Sab
            </span>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-3">
        <p class="form-control-static pull-right" >
            <?php
            $check = array(
                'class' => 'checkbox_lista input-tablet',
                'name' => "FLCNH",
                'value' => 'S',
                'checked' => FALSE
                    )
            ?>
            <label ><?= form_checkbox($check) ?> </label>
        </p>
    </div>
    <label class="col-sm-9 control-label  text-left">CNH</label>
</div>
<div class="form-group">
    <div class="col-sm-3">
        <p class="form-control-static pull-right" >
            <?php
            $check = array(
                'class' => 'checkbox_lista input-table',
                'name' => "FLFOLGUISTA",
                'value' => 'S',
                'checked' => FALSE
                    )
            ?>
            <label><?= form_checkbox($check) ?> </label>
        </p>
    </div>
    <label class="col-sm-9 control-label text-left">Folguista</label>
</div>
<div class="form-group">
    <div class="col-sm-3">
        <p class="form-control-static pull-right" >
            <?php
            $check = array(
                'class' => 'checkbox_lista input-table',
                'name' => "FLVALETRANSPORTE",
                'value' => 'S',
                'checked' => FALSE
                    )
            ?>
            <label><?= form_checkbox($check) ?> </label>
        </p>
    </div>
    <label class="col-sm-9 control-label text-left">Vale transporte</label>
</div>
<div class="row">
    <div class="col-sm-12">
        <?= form_submit('form', 'Criar', ['class' => 'btn btn-primary pull-right']) ?>
    </div>
</div>


<?= form_close() ?>
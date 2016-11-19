<?= form_open("/funcionario/salvar", ['class' => 'form-horizontal']) ?>
<div class="form-group">
    <label class="col-sm-3 control-label">Código:</label>
    <div class="col-sm-9">
        <?= form_hidden('ID', $funcionario['ID']) ?>
        <p class="form-control-static" ><?= $funcionario['ID'] ?></p>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Empresa:</label>
    <div class="col-sm-9">
        <p class="form-control-static" ><?= $funcionario['NMEMPRESA'] ?></p>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Nome:</label>
    <div class="col-sm-9">
        <?= form_input('NOME', $funcionario['NOME'], ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Apelido:</label>
    <div class="col-sm-9">
        <?= form_input('APELIDO', $funcionario['APELIDO'], ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Turno:</label>
    <div class="col-sm-9">
        <?= form_dropdown('IDTURNO', $turnos, $funcionario['IDTURNO'], ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">Cargo:</label>
    <div class="col-sm-9">
        <?= form_dropdown('IDCARGO', $cargos, $funcionario['IDCARGO'], ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">RG:</label>
    <div class="col-sm-9">
        <?= form_input('NURG', $funcionario['NURG'], ['class' => 'form-control']) ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">CPF:</label>
    <div class="col-sm-9">
        <?= form_input('NUCPF', $funcionario['NUCPF'], ['class' => 'form-control']) ?>
    </div>
</div>
<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active">
            <a href="#endereco" aria-controls="endereco" role="tab" data-toggle="tab">Endereço</a>
        </li>
        <li>
            <a href="#contato" aria-controls="contato" role="tab" data-toggle="tab">Contato</a>
        </li>
        <li>
            <a href="#datas" aria-controls="datas" role="tab" data-toggle="tab">Datas</a>
        </li>
        <li>
            <a href="#config" aria-controls="config" role="tab" data-toggle="tab">Outros</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="endereco">
            <div class="form-group">
                <label class="col-sm-3 control-label">CEP:</label>
                <div class="col-sm-9">
                    <?= form_input('ENDERECO[CEP]', $funcionario['ENDERECO']['CEP'], ['class' => 'form-control']) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Logradouro:</label>
                <div class="col-sm-9">
                    <?= form_input('ENDERECO[LOGRADOURO]', $funcionario['ENDERECO']['LOGRADOURO'], ['class' => 'form-control']) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Complemento:</label>
                <div class="col-sm-9">
                    <?= form_input('ENDERECO[COMPLEMENTO]', $funcionario['ENDERECO']['COMPLEMENTO'], ['class' => 'form-control']) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Nº:</label>
                <div class="col-sm-9">
                    <?= form_input('ENDERECO[NUMERO]', $funcionario['ENDERECO']['NUMERO'], ['class' => 'form-control']) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Bairro:</label>
                <div class="col-sm-9">
                    <?= form_input('ENDERECO[BAIRRO]', $funcionario['ENDERECO']['BAIRRO'], ['class' => 'form-control']) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Cidade:</label>
                <div class="col-sm-9">
                    <?= form_input('ENDERECO[CIDADE]', $funcionario['ENDERECO']['CIDADE'], ['class' => 'form-control']) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">UF:</label>
                <div class="col-sm-9">
                    <?= form_input('ENDERECO[UF]', $funcionario['ENDERECO']['UF'], ['class' => 'form-control']) ?>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="contato" >
            <div class="form-group">
                <label class="col-sm-3 control-label">Celular:</label>
                <div class="col-sm-9">
                    <?= form_input('NUCELULAR', $funcionario['NUCELULAR'], ['class' => 'form-control']) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Fone fixo:</label>
                <div class="col-sm-9">
                    <?= form_input('NUTELEFONE', $funcionario['NUTELEFONE'], ['class' => 'form-control']) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">E-Mail:</label>
                <div class="col-sm-9">
                    <?= form_email('DSEMAIL', $funcionario['DSEMAIL'], ['class' => 'form-control']) ?>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="datas">
            <div class="form-group">
                <label class="col-sm-3 control-label">Registro:</label>
                <div class="col-sm-9">
                    <?= form_date('DTREGISTRO', $funcionario['DTREGISTRO'], ['class' => 'form-control']) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Adimissão:</label>
                <div class="col-sm-9">
                    <?= form_date('DTADMISSAO', $funcionario['DTADMISSAO'], ['class' => 'form-control']) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Nascimento:</label>
                <div class="col-sm-9">
                    <?= form_date('DTNASCIMENTO', $funcionario['DTNASCIMENTO'], ['class' => 'form-control']) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Cart. saúde:</label>
                <div class="col-sm-9">
                    <?= form_date('DTCARTSAUDE', $funcionario['DTCARTSAUDE'], ['class' => 'form-control']) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Demissão:</label>
                <div class="col-sm-9">
                    <?= form_date('DTDEMISSAO', $funcionario['DTDEMISSAO'], ['class' => 'form-control']) ?>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="config">
            <div class="form-group">
                <label class="col-sm-3 control-label">Usuário Pantera:</label>
                <div class="col-sm-9">
                    <?= form_input('USUARIOPANTERA', $funcionario['USUARIOPANTERA'], ['class' => 'form-control']) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Senha Pantera:</label>
                <div class="col-sm-9">
                    <?= form_input('SENHAPANTERA', $funcionario['SENHAPANTERA'], ['class' => 'form-control']) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Nº Dependentes:</label>
                <div class="col-sm-9">
                    <?= form_input('NUDEPENDENTE', $funcionario['NUDEPENDENTE'], ['class' => 'form-control']) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Adicional:</label>
                <div class="col-sm-9">
                    <?= form_number('VLADICIONAL', $funcionario['VLADICIONAL'], ['class' => 'form-control']) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Pref folga:</label>
                <div class="col-sm-9">
                    <div class="input-group" style="margin-top: 5px;">
                        <span class="input-group-btn">
                            <?= form_checkbox('PREFFOLGA[DOM]', 'S', ($funcionario['PREFFOLGA']['DOM']=='S')?TRUE:FALSE, ['class' => 'checkbox_lista input-table']) ?> Dom
                        </span>
                        <span class="input-group-btn">
                            <?= form_checkbox('PREFFOLGA[SEG]', 'S', ($funcionario['PREFFOLGA']['SEG']=='S')?TRUE:FALSE, ['class' => 'checkbox_lista input-table']) ?> Seg
                        </span>
                        <span class="input-group-btn">
                            <?= form_checkbox('PREFFOLGA[TER]', 'S', ($funcionario['PREFFOLGA']['TER']=='S')?TRUE:FALSE, ['class' => 'checkbox_lista input-table']) ?> Ter
                        </span>
                        <span class="input-group-btn">
                            <?= form_checkbox('PREFFOLGA[QUA]', 'S', ($funcionario['PREFFOLGA']['QUA']=='S')?TRUE:FALSE, ['class' => 'checkbox_lista input-table']) ?> Qua
                        </span>
                        <span class="input-group-btn">
                            <?= form_checkbox('PREFFOLGA[QUI]', 'S', ($funcionario['PREFFOLGA']['QUI']=='S')?TRUE:FALSE, ['class' => 'checkbox_lista input-table']) ?> Qui
                        </span>
                        <span class="input-group-btn">
                            <?= form_checkbox('PREFFOLGA[SEX]', 'S', ($funcionario['PREFFOLGA']['SEX']=='S')?TRUE:FALSE, ['class' => 'checkbox_lista input-table']) ?> Sex
                        </span>
                        <span class="input-group-btn">
                            <?= form_checkbox('PREFFOLGA[SAB]', 'S', ($funcionario['PREFFOLGA']['SAB']=='S')?TRUE:FALSE, ['class' => 'checkbox_lista input-table']) ?> Sab
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
                            'checked' => ($funcionario['FLCNH']=='S')?TRUE:FALSE
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
                            'checked' => ($funcionario['FLFOLGUISTA']=='S')?TRUE:FALSE
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
                            'checked' => ($funcionario['FLVALETRANSPORTE']=='S')?TRUE:FALSE
                                )
                        ?>
                        <label><?= form_checkbox($check) ?> </label>
                    </p>
                </div>
                <label class="col-sm-9 control-label text-left">Vale transporte</label>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?= form_submit('form', 'Salvar', ['class' => 'btn btn-primary pull-right']) ?>
    </div>
</div>

<?= form_close() ?>
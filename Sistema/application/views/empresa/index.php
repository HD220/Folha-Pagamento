<div class="col-lg-12">
    <?= form_open("/empresa/salvar") ?>
    <div class="panel panel-default panel-table" style="box-shadow: 0px 11px 33px -17px #000;">
        <!--<div class="panel-heading">
            Listagem de paramêtros
        </div>-->
        <div class="panel-body" style="background: #fbfbfb; "> 
            <?php
            $data = array(
                "salvar" => array(
                    'value' => 'Salvar',
                    'class' => 'btn btn-sm btn-success pull-right'
                ),
                "voltar" => array(
                    'class' => 'btn btn-sm btn-primary pull-left'
                ),
                "novo" => array(
                    'class' => 'btn btn-sm btn-info pull-left',
                    'style' => 'margin-left:5px;',
                    'onClick' => "add_register_empresa()"
                )
            );
            echo anchor("/", "Voltar", $data['voltar']);
            echo anchor("empresa#", "Novo", $data['novo']);
            echo form_submit($data['salvar']);
            ?>
        </div>
        <div id="table-content">
            <table style="min-width: 650px" class="table table-bordered table-hover" id="table-edit">
            <tr style="background: #f5f5f5;">
                <th style="width: 50px" class="text-center">#</th>
                <th>Nome</th>
                <th>Nome curto</th>
              <th style="width: 50px" class="text-center">Ativo</th>
            </tr>
            <?php
            if (count($dados) > 0) {
                foreach ($dados as $linha) {
                    $inputs = array(
                        "ID" => array(
                            "dados[" . $linha['ID'] . "][ID]" => $linha['ID'],
                        ),
                        'NOME' => array(
                            'type' => 'text',
                            'class' => 'form-control input-table',
                            'name' => "dados[" . $linha['ID'] . "][NOME]",
                            'value' => $linha['NOME'],
                            'maxlength' => '150',
                            'required' => TRUE
                        ),
                        'NOMECURTO' => array(
                            'type' => 'text',
                            'class' => 'form-control input-table',
                            'name' => "dados[" . $linha['ID'] . "][NOMECURTO]",
                            'value' => $linha['NOMECURTO'],
                            'maxlength' => '50',
                            'required' => TRUE
                        ),
                        'FLATIVO' => array(
                            'class' => 'checkbox_lista center-block input-table',
                            'name' => "dados[" . $linha['ID'] . "][FLATIVO]",
                            'value' => 'S',
                            'checked' => ($linha['FLATIVO'] == 'S')?true:false
                        )
                    );
                    
                    ?>
                    <tr>
                        <td class="text-center"><?php
                            echo $linha['ID'];
                            echo form_hidden($inputs['ID']);
                            ?>
                        </td>
                        <td><?= form_input($inputs['NOME']) ?></td>
                        <td><?= form_input($inputs['NOMECURTO']) ?></td>
                        <td><?= form_checkbox($inputs['FLATIVO']) ?></td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan='6' class="text-center" id="no-register">Não existe registros a serem exibidos</td>
                </tr>
                <?php
            }
            ?>
        </table>
        </div>
        <div class="panel-body" style="background: #fbfbfb;min-height: 30px"> 
            <?php
            $erros = ($this->session->flashdata('erros'))?$this->session->flashdata('erros'):array();
            foreach ($erros as $value) {
                ?>
                <div class='alert alert-warning' role='alert'><?= $value ?></div>
                <?php
            }
            ?>
        </div>
    </div>
    <?= form_close() ?>
</div>
<script src="/assets/js/new_register.js"></script>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
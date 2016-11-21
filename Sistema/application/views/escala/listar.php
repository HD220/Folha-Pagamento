<div class="col-lg-12">
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
                    'onClick' => "novo('Escala','modal')",
                    'data-toggle' => "modal",
                    'data-target' => "#myModal"
                )
            );
            echo anchor("/", "Voltar", $data['voltar']);
            echo anchor("escala#", "Novo", $data['novo']);
            ?>
            <div class="row">
                <div class="col-xs-12" style="margin-top: 15px">
                    <input type="text" id="text_search" onchange="pesquisar('escala', 'ativo_search')" class="form-control input-sm pull-left" style="margin-left: 5px;max-width: 200px;" placeholder="Procurar"/>
                    <div class="checkbox-inline">
                        <label style="margin-top: 3px;margin-bottom: 0;">
                            <input type="checkbox" id="ativo_search" onchange="pesquisar('escala', 'ativo_search')" class="checkbox_lista input-table"  value="S" checked style="position: initial;float: left;"> Somente ativos
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div id="table-content">
            <?= $calendario ?>
        </div>
    </div>
    <div class="panel-body" style="background: #fbfbfb;min-height: 30px"> 
        <?= $this->session->flashdata('error') ?>
    </div>
</div>
</div>
<script src="/assets/js/functions.js"></script>

<div class="modal fade" tabindex="-1" role="dialog" id="modelEscala">
    <div class="modal-dialog modal-lg" role="document">
        <div  class="panel panel-primary modal-content">
            <div class="modal-header panel-heading" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-title">Escala</h4>
            </div>
            <div class="modal-body" id="modal">

            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
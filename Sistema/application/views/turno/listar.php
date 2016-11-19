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
                    'onClick' => "novo('Turno','modal')",
                    'data-toggle' => "modal",
                    'data-target' => "#myModal"
                )
            );
            echo anchor("/", "Voltar", $data['voltar']);
            echo anchor("turno#", "Novo", $data['novo']);
            ?>
            <div class="row">
                <div class="col-xs-12" style="margin-top: 15px">
                    <input type="text" id="text_search" onchange="pesquisar('turno', 'ativo_search')" class="form-control input-sm pull-left" style="margin-left: 5px;max-width: 200px;" placeholder="Procurar"/>
                    <div class="checkbox-inline">
                        <label style="margin-top: 3px;margin-bottom: 0;">
                            <input type="checkbox" id="ativo_search" onchange="pesquisar('turno', 'ativo_search')" class="checkbox_lista input-table"  value="S" checked style="position: initial;float: left;"> Somente ativos
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div id="table-content">
            <table style="min-width: 650px" class="table table-bordered table-hover" id="table-edit">
                <tr style="background: #f5f5f5;">
                    <th style="width: 50px" class="text-center">#</th>
                    <th>Nome</th>
                    <th>Ent. Turno</th>
                    <th>Sai. Turno</th>
                    <th style="width: 50px" class="text-center">Pico</th>
                    <th style="width: 50px" class="text-center">Ativo</th>
                    <th style="width: 50px" class="text-center">Editar</th>
                </tr>
                <?php
                if (count($dados) > 0) {
                    foreach ($dados as $linha) {
                        ?>
                        <tr>
                            <td class="text-center"><?= $linha['ID']; ?></td>
                            <td><?= $linha['NOME'] ?></td>
                            <td><?= $linha['HORAUM'] ?></td>
                            <td><?= $linha['HORAQUATRO'] ?></td>
                            <td class="text-center"><?= ($linha['FLPICO'] == 'S') ? 'Sim' : 'Não' ?></td>
                            <td class="text-center"><?= ($linha['FLATIVO'] == 'S') ? 'Sim' : 'Não' ?></td>
                            <td class="text-center">
                                <a href="turno#" class="center-block" 
                                   data-toggle="modal" data-target="#myModal"
                                   onclick="editar('turno','<?= $linha['ID'].'/'.$linha['IDEMPRESA'] ?>', 'modal')">
                                    <span class='glyphicon glyphicon-edit'></span>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan='7' class="text-center" id="no-register">Não existe registros a serem exibidos</td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <div class="panel-body" style="background: #fbfbfb;min-height: 30px"> 
            <?= $this->session->flashdata('error') ?>
        </div>
    </div>
</div>
<script src="/assets/js/functions.js"></script>

<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
        <div  class="panel panel-primary modal-content">
            <div class="modal-header panel-heading" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-title">Turno</h4>
            </div>
            <div class="modal-body" id="modal">

            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
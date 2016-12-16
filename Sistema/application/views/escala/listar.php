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
            
            $semana_mes_atual = strftime("%U", strtotime(date("Y-m-d")));
            $semana_mes_inicial = strftime("%U", strtotime(date("Y-m"). "-01"));
            $semana = ($semana_mes_atual - $semana_mes_inicial) + 1;
            
            echo anchor('/escala/imprimir/'.$semana.'/'.date("m/Y"), "<span class='glyphicon glyphicon-print'></span>", ["id"=>"anchor_print","target" => "_blank","class"=>"btn btn-sm btn-primary",'style' => 'margin-left:5px;']);
            
            ?>
            <div class="row">
                <div class="col-xs-12" style="margin-top: 15px">
                    <label>
                        <input type="number" value="<?=$semana?>" min="1" max="6" id="semana_search" onchange="pesquisar_escala()" class="form-control input-sm"  style="margin-left: 5px;max-width: 200px;"> Semana do mês
                    </label>
                    <label>
                        <input type="text" value="<?=date("m/Y")?>"id="mesano_search" onChange="pesquisar_escala()" class="form-control input-sm"  style="margin-left: 5px;max-width: 200px;"> Mes/Ano
                    </label>
                </div>
            </div>
        </div>
        <div class="panel-body" style="background: #fbfbfb;min-height: 30px"> 
            <?= $this->session->flashdata('error') ?>
        </div>
        <div id="table-content">
            <div class="col-xs-8">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php
                    foreach ($dados as $key => $value) {
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading<?= $key ?>">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $key ?>" aria-expanded="true" aria-controls="collapse<?= $key ?>">
                                    <h4 class="panel-title">
                                        <?= date("d/m/Y", strtotime($key)) . " - " . dia_semana(date("N", strtotime($key))) ?>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapse<?= $key ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $key ?>">
                                <div class="panel-body">
                                    <button
                                        data-toggle="modal" data-target="#myModal"
                                        onclick="novo_escala('<?= date("Y-m-d", strtotime($key)) ?>', 'modal')"
                                        class="btn btn-sm btn-info pull-right">Novo</button>
                                </div>
                                <div id="table-content">
                                    <table style="min-width: 650px" class="table table-bordered table-hover" id="table-edit">
                                        <tr>
                                            <th>Folgante</th>
                                            <th>Folgista</th>
                                            <th>Observação</th>
                                            <th style="width: 120px">Folga semana</th>
                                            <th style="width: 120px">Folga domingo</th>
                                            <th colspan="2">Ações</th>
                                        </tr>
                                        <?php
                                        if (count($value) > 0) {
                                            foreach ($value as $row) {
                                                ?>
                                                <tr id="<?= $row['IDFOLGANTE']."_".$row['IDFOLGUISTA'] . "_" . str_replace("-", "_", $row['DATA']) ?>">
                                                    <td><?= $row['NMFOLGANTE'] ?></td>
                                                    <td><?= $row['NMFOLGUISTA'] ?></td>
                                                    <td><?= $row['OBSERVACAO'] ?></td>
                                                    <td class="text-center"><?= ($row['FLFOLGASEMANA'])?"<span class='glyphicon glyphicon-remove'></span>":"<span class='glyphicon glyphicon-ok'></span>"?></td>
                                                    <td class="text-center"><?= ($row['FLFOLGADOMINGO'])?"<span class='glyphicon glyphicon-remove'></span>":"<span class='glyphicon glyphicon-ok'></span>"?></td>
                                                    <td class="text-center">
                                                        <a href="escala#" class="center-block" 
                                                           data-toggle="modal" data-target="#myModal"
                                                           onclick="editar('Escala','<?= $row['IDFOLGANTE'] . "/" . $row['IDFOLGUISTA'] . "/" . str_replace("-", "_", $row['DATA']) ?>', 'modal')">
                                                            <span class='glyphicon glyphicon-edit'></span>
                                                        </a>
                                                        
                                                    </td>
                                                    <td  class="text-center">
                                                        <a href="escala#" class="center-block" 
                                                           onclick="deletar('Escala','<?= $row['IDFOLGANTE'] . "/" . $row['IDFOLGUISTA'] . "/" . str_replace("-", "_", $row['DATA']) ?>','<?= $row['IDFOLGANTE']."_".$row['IDFOLGUISTA'] . "_" . str_replace("-", "_", $row['DATA']) ?>', 'modal')">
                                                            <span class='glyphicon glyphicon-remove'></span>
                                                        </a>
                                                        
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan='5' class="text-center" id="no-register">Não existe registros a serem exibidos</td>
                                            </tr>  
                                            <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>  
            </div>
            <div class="col-xs-2">
                <table class="table table-bordered table-hover" id="table-edit">
                    <tr>
                        <th>Folga Semana</th>

                    </tr>
                    <?php
                    if (count($folga['SEMANA']) > 0) {
                        foreach ($folga['SEMANA'] as $idfuncionario => $nome) {
                            ?>
                            <tr>
                                <td><?= $nome ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td>Nenhum restante</td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <div class="col-xs-2">
                <table class="table table-bordered table-hover" id="table-edit">
                    <tr>
                        <th>Folga Domingo</th>

                    </tr>
                    <?php
                    if (count($folga['DOMINGO']) > 0) {
                        foreach ($folga['DOMINGO'] as $idfuncionario => $nome) {
                            ?>
                            <tr>
                                <td><?= $nome ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td>Nenhum restante</td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
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
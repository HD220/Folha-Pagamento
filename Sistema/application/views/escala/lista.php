
<div class="col-xs-8">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php
        if (count($dados) == 0) {
            ?>
            <div class='alert alert-danger' role='alert'>
                Semana não encontrada para o mês.
            </div>
            <?php
        }

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
                                    <tr id="<?= $row['IDFOLGANTE'] . "_" . $row['IDFOLGUISTA'] . "_" . str_replace("-", "_", $row['DATA']) ?>">
                                        <td><?= $row['NMFOLGANTE'] ?></td>
                                        <td><?= $row['NMFOLGUISTA'] ?></td>
                                        <td><?= $row['OBSERVACAO'] ?></td>
                                        <td class="text-center"><?= ($row['FLFOLGASEMANA']) ? "<span class='glyphicon glyphicon-remove'></span>" : "<span class='glyphicon glyphicon-ok'></span>" ?></td>
                                        <td class="text-center"><?= ($row['FLFOLGADOMINGO']) ? "<span class='glyphicon glyphicon-remove'></span>" : "<span class='glyphicon glyphicon-ok'></span>" ?></td>
                                        <td class="text-center">
                                            <a href="escala#" class="center-block" 
                                               data-toggle="modal" data-target="#myModal"
                                               onclick="editar('Escala', '<?= $row['IDFOLGANTE'] . "/" . $row['IDFOLGUISTA'] . "/" . str_replace("-", "_", $row['DATA']) ?>', 'modal')">
                                                <span class='glyphicon glyphicon-edit'></span>
                                            </a>

                                        </td>
                                        <td  class="text-center">
                                            <a href="escala#" class="center-block" 
                                               onclick="deletar('Escala', '<?= $row['IDFOLGANTE'] . "/" . $row['IDFOLGUISTA'] . "/" . str_replace("-", "_", $row['DATA']) ?>', '<?= $row['IDFOLGANTE'] . "_" . $row['IDFOLGUISTA'] . "_" . str_replace("-", "_", $row['DATA']) ?>', 'modal')">
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
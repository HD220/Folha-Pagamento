<table style="min-width: 650px" class="table table-bordered table-hover" id="table-edit">
    <tr style="background: #f5f5f5;">
        <th style="width: 50px" class="text-center">#</th>
        <th>Apelido</th>
        <th>Cargo</th>
        <th>Turno</th>
        <th>Telefones</th>
        <th style="width: 50px" class="text-center">Ativo</th>
        <th style="width: 50px" class="text-center">Editar</th>
    </tr>
    <?php
    if (count($dados) > 0) {
        foreach ($dados as $linha) {
            ?>
            <tr>
                <td class="text-center"><?= $linha['ID']; ?></td>
                <td><?= $linha['APELIDO'] ?></td>
                <td><?= $linha['NMCARGO'] ?></td>
                <td><?= $linha['NMTURNO'] ?></td>
                <td><?= $linha['NUCELULAR'] . "/" . $linha['NUTELEFONE'] ?></td>
                <td class="text-center"><?= ($linha['DTDEMISSAO'] == '0000-00-00') ? 'Sin' : 'Não' ?></td>
                <td class="text-center">
                    <a href="funcionario#" class="center-block" 
                       data-toggle="modal" data-target="#myModal"
                       onclick="editar('funcionario', '<?= $linha['ID'] . '/' . $linha['IDEMPRESA'] ?>', 'modal')">
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
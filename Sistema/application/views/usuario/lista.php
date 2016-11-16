<table style="min-width: 650px" class="table table-bordered table-hover" id="table-edit">
    <tr style="background: #f5f5f5;">
        <th style="width: 50px" class="text-center">#</th>
        <th>Nome</th>
        <th>Usuário</th>
        <th style="width: 50px" class="text-center">Acesso</th>
        <th style="width: 50px" class="text-center">Ativo</th>
        <th style="width: 50px" class="text-center">Editar</th>
    </tr>
    <?php
    if (count($usuarios) > 0) {
        foreach ($usuarios as $usuario) {
            ?>
            <tr>
                <td class="text-center"><?= $usuario['ID'] ?></td>
                <td><?= $usuario['NOME'] ?></td>
                <td><?= $usuario['USUARIO'] ?></td>
                <td class="text-center">
                    <?= ($usuario['NIVEL'] == '1') ? 'Adm.' : 'Func.' ?>
                </td>
                <td class="text-center"><?= ($usuario['FLATIVO'] == 'S') ? 'Sim' : 'Não' ?></td>
                <td class="text-center">
                    <a href="usuario#" 
                       class="center-block" 
                       data-toggle="modal" data-target="#myModal"
                       onclick="editar('Usuario',<?= $usuario['ID'] ?>, 'modal')">
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
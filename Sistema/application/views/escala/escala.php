<style type="text/css" media="print">
  @page { size: landscape; }
</style>
<table style="min-width: 650px" class="table table-bordered table-hover" id="table-edit">
    <tr style="background: #f5f5f5;">
        <th style="width: 12.5%;text-align: center;">Apelido</th>
        <?php
        foreach ($escala['diassemana'] as $dia) {
            ?>
            <th style="width: 12.5%;text-align: center;"><?= date("d", strtotime($dia)) . " - " . dia_semana(date("N", strtotime($dia))) ?></th>
            <?php
        }
        ?>
    </tr>
    <?php
    foreach ($escala['folgas'] as $funcionario => $semana) {
        ?>
        <tr >
            <td style="padding:30px;text-align: center;"><?=$funcionario?></td>
            <?php
            foreach ($semana as $dia => $folgante) {
                ?>
                <td style="padding:30px;text-align: center;"><?= $folgante ?></td>
                <?php
            }
            ?>
        </tr>
        <?php
    }
    ?>
</table>

<script type="text/javascript">
    window.print();
</script>
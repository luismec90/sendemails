</nav>
<form class="form-submit" action="<?= base_url() ?>emails/enviarEmailsCheckOut" method="POST" autocomplete="off">
    <div id="contenedor" class="container">
        <div class="row">
            <br>
            <ul class="nav nav-tabs">
                <li class=""><a href="<?= base_url() ?>ruta/<?= $ruta[0]->id ?>/<?= $origen ?>">Check-in</a></li>
                <li class="active"><a>Check-out</a></li>
                    <button type="submit" class="btn btn-success pull-right">Enviar e-mails</button>
            </ul>
        </div>
        <div class="row">
            <table id="tabla-principal" class="table table-hover sortable-theme-bootstrap" data-sortable>
                <thead>
                    <tr id="header-tabla-estudiantes">

                        <th id="criterio-apellidos" data-sorted="true" data-sorted-direction="ascending"><span class="cursor-pointer">Apellidos</span></th>
                        <th><span class="cursor-pointer">Nombres</span></th>
                        <th class="centrar"><span class="cursor-pointer">Arrivó</span></th>
                    </tr>
                </thead>
                <tbody id="tabla-estudiantes">  



                    <?php
                    foreach ($estudiantes as $row) {
                        1
                        ?>
                        <tr class="<?= ($row->arrivo || $destino == "colegio") ? "success" : "warning"; ?> fila-<?= $row->id ?>">
                            <td><?= $row->apellidos ?></td>
                            <td><?= $row->nombres ?></td>
                            <td class="centrar <?= ($row->arrivo) ? "" : "seleccionable" ?>  <?= ($destino == "colegio") ? "check" : ""; ?>" data-value="<?php
                            if ($row->arrivo == "si")
                                echo "2";
                            else if ($row->arrivo == "no")
                                echo "1";
                            else
                                echo "0";
                            ?>">
                                    <?php if ($row->arrivo == "si") { ?>
                                    <span class="glyphicon glyphicon-envelope"></span>
                                <?php } else if (!$row->arrivo) { ?>
                                    <input type="radio" class="abordo" name="estudiante[<?= $row->id ?>]" value="arrivo"  <?= ($destino == "colegio") ? "checked" : ""; ?>> 
                                <?php } ?>
                            </td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <input type="hidden" name="ruta" value="<?= $ruta[0]->id ?>" readonly="" required="">
            <input type="hidden" name="destino" value="<?= $destino ?>" readonly="" required="">
            <button type="submit" class="btn btn-success pull-right">Enviar e-mails</button>
        </div>
        <div class="row">
            <hr>
        </div>
    </div>
</form>
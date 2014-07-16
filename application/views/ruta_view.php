
<div id="menu-2" class="row">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-4">
                    <input id="apellidos" type="text" class="form-control" placeholder="Apellidos del estudiante">
                </div>
                <div class="col-xs-4">

                    <input id="nombres" type="text" class="form-control" placeholder="Nombres del estudiante">
                </div>
                <div class="col-xs-4"> 
                    <input id="acudiente" type="text" class="form-control" placeholder="Nombres o apellidos del acudiente">
                </div>
            </div>


        </div>
    </div>
</div>
<!-- /.container -->
</nav>

<form class="form-submit" action="<?= base_url() ?>emails/enviarEmails" method="POST" autocomplete="off">
    <div id="contenedor" class="container">
        <div class="row">
            <br>
            <ul class="nav nav-tabs">
                <li class="active"><a>Check-in</a></li>
                <li class=""><a href="<?= base_url() ?>ruta/checkout/<?= $ruta[0]->id ?>/<?= $origen ?>">Check-out</a></li>
                    <button type="submit" class="btn btn-success pull-right">Enviar e-mails</button>
            </ul>
        </div>
        <div class="row">
            <table id="tabla-principal" class="table table-hover sortable-theme-bootstrap" data-sortable>
                <thead>
                    <tr id="header-tabla-estudiantes">

                        <th id="criterio-apellidos" data-sorted="true" data-sorted-direction="ascending"><span class="cursor-pointer">Apellidos</span></th>
                        <th><span class="cursor-pointer">Nombres</span></th>
                        <th class="abordo"><span class="cursor-pointer">Abordó</span></th>
                        <th class="noabordo"><span class="cursor-pointer">No abordó</span></th>
                    </tr>
                </thead>
                <tbody id="tabla-estudiantes">  
                    <?php foreach ($estudiantes as $row) { ?>
                        <tr class="<?= ($row->destino) ? "success" : "warning"; ?> <?= ($row->abordo == "no") ? "danger" : ""; ?> fila-<?= $row->id ?>">
                            <td><?= $row->apellidos ?></td>
                            <td><?= $row->nombres ?></td>
                            <td class="abordo <?= ($row->abordo) ? "" : "seleccionable" ?>" data-value="<?php
                            if ($row->abordo == "si")
                                echo "2";
                            else if ($row->abordo == "no")
                                echo "1";
                            else
                                echo "0";
                            ?>">
                                    <?php if ($row->abordo == "si") { ?>
                                    <span class="glyphicon glyphicon-envelope"></span>
                                <?php } else if (!$row->abordo) { ?>
                                    <input type="radio" class="abordo" name="estudiante[<?= $row->id ?>]" value="abordo" > 

                                <?php } else { ?>
                                    <input type="radio" disabled> 
                                <?php } ?>
                            </td>
                            <td  class="noabordo <?= ($row->abordo) ? "" : "seleccionable" ?>" data-value="<?php
                            if ($row->abordo == "no")
                                echo "2";
                            else if ($row->abordo == "si")
                                echo "1";
                            else
                                echo "0";
                            ?>">
                                     <?php if ($row->abordo == "no") { ?>
                                    <span class="glyphicon glyphicon-envelope"></span>
                                <?php } else if (!$row->abordo) { ?>
                                    <input type="radio" class="noabordo" name="estudiante[<?= $row->id ?>]" value="noabordo" >
                                <?php } else { ?>
                                    <input type="radio" disabled> 
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
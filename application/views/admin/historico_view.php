</nav>
<div id="contenedor" class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2>Informe de servicios  <small>(<?= $cantidadRegistros ?> <?= ($cantidadRegistros == 1) ? "registro encontrado" : "registros encontrados" ?>)</small> </h2>
            <hr>
            <div id="criterios">
                <div class="row">
                    <div class="col-sm-2">
                        <input id="estudiante" value="<?= (isset($_GET["estudiante"])) ? $_GET["estudiante"] : ""; ?>" type="text" class="form-control" placeholder="Estudiante" autocomplete="off">
                    </div>
                    <div class="col-sm-2">
                        <input id="ruta" value="<?= (isset($_GET["ruta"])) ? $_GET["ruta"] : ""; ?>" type="text" class="form-control" placeholder="Ruta" autocomplete="off">
                    </div>
                    <div class="col-sm-2">
                        <input id="bus" value="<?= (isset($_GET["bus"])) ? $_GET["bus"] : ""; ?>" type="text" class="form-control" placeholder="Bus" autocomplete="off">
                    </div>
                    <div class="col-sm-2">
                        <select id="destino" class="form-control" autocomplete="off">
                            <option value="">Destino...</option>
                            <option value="casa" <?= (isset($_GET["destino"]) && $_GET["destino"] == "casa") ? "selected" : ""; ?>>Casa</option>
                            <option value="colegio" <?= (isset($_GET["destino"]) && $_GET["destino"] == "colegio") ? "selected" : ""; ?>>Colegio</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select id="abordo" class="form-control" autocomplete="off">
                            <option value="">Abordó...</option>
                            <option value="si" <?= (isset($_GET["abordo"]) && $_GET["abordo"] == "si") ? "selected" : ""; ?>>Si</option>
                            <option value="no" <?= (isset($_GET["abordo"]) && $_GET["abordo"] == "no") ? "selected" : ""; ?>>No</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <button id="buscar" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                        <a href="<?= base_url() ?>historico" class="btn btn-default"><span class="glyphicon glyphicon-refresh"></span></a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-2">
                        <input id="desde" value="<?= (isset($_GET["desde"])) ? $_GET["desde"] : ""; ?>" type="text" class="form-control" placeholder="Desde" autocomplete="off">
                    </div>
                    <div class="col-sm-2">
                        <input id="hasta" value="<?= (isset($_GET["hasta"])) ? $_GET["hasta"] : ""; ?>" type="text" class="form-control" placeholder="Hasta" autocomplete="off">
                    </div>
                    <div class="col-sm-2">
                        <input id="guia" value="<?= (isset($_GET["guia"])) ? $_GET["guia"] : ""; ?>" type="text" class="form-control" placeholder="Guia" autocomplete="off">
                    </div>
                    <div class="col-sm-2">
                        <a class="btn btn-primary" href="<?= base_url() ?>historico/toexcel?<?= (isset($_GET["estudiante"]) ? "estudiante=" . $_GET["estudiante"] : "") ?><?= (isset($_GET["ruta"]) ? "&ruta=" . $_GET["ruta"] : "") ?> <?= (isset($_GET["bus"]) ? "&bus=" . $_GET["bus"] : "") ?><?= (isset($_GET["destino"]) ? "&destino=" . $_GET["destino"] : "") ?><?= (isset($_GET["abordo"]) ? "&abordo=" . $_GET["abordo"] : "") ?><?= (isset($_GET["desde"]) ? "&desde=" . $_GET["desde"] : "") ?><?= (isset($_GET["hasta"]) ? "&hasta=" . $_GET["hasta"] : "") ?><?= (isset($_GET["guia"]) ? "&guia=" . $_GET["guia"] : "") ?>"
                           >Exportar a Excel</a>
                    </div>

                </div>
            </div>
            <hr>
            <table id="tabla-estudiantes" class="table table-hover table-striped">
                <thead>
                <th>Estudiante</th>
                <th>Ruta</th>
                <th>Bus</th>
                <th>Destino</th>
                <th>Abordo</th>
                <th>Fecha de check-in</th>
                <th>Fecha de check-out</th>
                <th>Guia</th>
                </thead>
                <?php foreach ($historico as $row) { ?>
                    <tr>
                        <td><?= $row->estudiante ?></td>
                        <td><?= $row->ruta ?></td>
                        <td><?= $row->bus ?></td>
                        <td><?= $row->destino ?></td>
                        <td><?= $row->abordo ?></td>
                        <td><?= $row->fecha_abordo ?></td>
                        <td><?= $row->fecha_arrivo ?></td>
                        <td><?= $row->guia ?></td>
                    </tr>
                <?php } ?>
            </table>
            <div class="row-fluid">
                <ul id="paginacion" class="pagination pull-right"
                    data-estudiante="<?php if (!empty($_GET["estudiante"])) echo $_GET["estudiante"]; ?>"
                    data-ruta="<?php if (!empty($_GET["ruta"])) echo $_GET["ruta"]; ?>"
                    data-bus="<?php if (!empty($_GET["bus"])) echo $_GET["bus"]; ?>"
                    data-destino="<?php if (!empty($_GET["destino"])) echo $_GET["destino"]; ?>"
                    data-abordo="<?php if (!empty($_GET["abordo"])) echo $_GET["abordo"]; ?>"
                    data-desde="<?php if (!empty($_GET["desde"])) echo $_GET["desde"]; ?>"
                    data-hasta="<?php if (!empty($_GET["hasta"])) echo $_GET["hasta"]; ?>"
                    data-guia="<?php if (!empty($_GET["guia"])) echo $_GET["guia"]; ?>"
                    >
                    <li class="<?php
                    if ($paginaActiva == 1)
                        echo "active";
                    else
                        echo "noActive";
                    ?>"><a  data-page="1">1</a></li>
                        <?php for ($i = 2; $i <= $cantidadPaginas; $i++) { ?>
                        <li class="<?php
                        if ($paginaActiva == $i)
                            echo "active";
                        else
                            echo "noActive";
                        ?>"><a data-page="<?= $i ?>"><?= $i ?></a></li>
                        <?php } ?>
                </ul> 
            </div>
        </div>
    </div>
</div>

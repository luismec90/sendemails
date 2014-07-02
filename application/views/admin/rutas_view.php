</nav>
<div id="contenedor" class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2>Rutas <small>(<?= $t = sizeof($rutas) ?> <?= ($t == 1) ? "ruta encontrada" : "rutas encontradas" ?>)</small><button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-crear-ruta"><span class="glyphicon glyphicon-plus"></span> Crear ruta</button></h2>
            <hr>
            <div id="criterios" class="row">
                <div class="col-sm-4">
                    <input id="conductor" value="<?= (isset($_GET["conductor"])) ? $_GET["conductor"] : ""; ?>" type="text" class="form-control" placeholder="Nombre del conductor" autocomplete="off">
                </div>
                <div class="col-sm-3">
                    <input id="ruta" value="<?= (isset($_GET["ruta"])) ? $_GET["ruta"] : ""; ?>" type="text" class="form-control" placeholder="Nombre de la ruta" autocomplete="off">
                </div>
                <div class="col-sm-3">
                    <input id="bus" value="<?= (isset($_GET["bus"])) ? $_GET["bus"] : ""; ?>" type="text" class="form-control" placeholder="Placa de bus" autocomplete="off">
                </div>
                <div class="col-sm-2">
                    <button id="buscar" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                    <a href="<?= base_url() ?>rutas" class="btn btn-default"><span class="glyphicon glyphicon-refresh"></span></a>
                </div>
                <div class="col-xs-4"></div>
                <div class="col-xs-4"></div>
            </div>
            <hr>
            <table id="tabla-rutas" class="table table-hover table-striped">
                <thead>
                <th>Nombre</th>
                <th>Bus</th>
                <th>Capacidad</th>
                <th>Conductor</th>
                <th>Opciones</th>
                </thead>
                <?php foreach ($rutas as $row) { ?>
                    <tr>
                        <td><?= $row->nombre ?></td>
                        <td><?= $row->bus ?></td>
                        <td><?= $row->capacidad ?></td>
                        <td><?= $row->nombres . " " . $row->apellidos ?></td>
                        <td>
                            <button class="boton-editar-ruta btn btn-primary "
                                    data-id-ruta="<?= $row->id ?>"
                                    data-conductor="<?= $row->id_conductor ?>"
                                    data-nombre="<?= $row->nombre ?>"
                                    data-bus="<?= $row->bus ?>"
                                    data-capacidad="<?= $row->capacidad ?>"
                                    title="Editar" ><span class="glyphicon glyphicon-edit"></span> </button>
                            <button class="boton-eliminar-ruta btn btn-danger "
                                    data-id-ruta="<?= $row->id ?>"
                                    data-nombre="<?= $row->nombre ?>"
                                    title="Eliminar"> <span class="glyphicon glyphicon-trash"></span> </button> 
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<!-- Modal crear ruta -->
<div class="modal fade" id="modal-crear-ruta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>rutas/crear" method="POST" class="form-submit" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Crear ruta</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Conductor: <em class="text-danger">*</em></label>
                            <select name="conductor" class="form-control" required> 
                                <option value="">Seleccionar...</option>
                                <?php foreach ($conductores as $row) { ?>
                                    <option value="<?= $row->id ?>"><?= $row->nombres . " " . $row->apellidos ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Nombre de la ruta: <em class="text-danger">*</em></label>
                            <input name="nombre" class="form-control"  type="text" required maxlength="45">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Placa del bus: <em class="text-danger">*</em></label>
                            <input name="bus" class="form-control"  type="text" required maxlength="10">

                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Capacidad: <em class="text-danger">*</em></label>
                            <input name="capacidad" class="form-control"  type="number" required maxlength="3">
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <label class="pull-left"> <em class="text-danger">*</em> Campos obligatorios</label>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal editar ruta -->
<div class="modal fade" id="modal-editar-ruta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>rutas/editar" method="POST" class="form-submit">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Editar ruta</h4>
                </div>
                <div class="modal-body">
                    <input id="editar-id-ruta" type="hidden" name="idRuta" readonly="">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Conductor: <em class="text-danger">*</em></label>
                            <select id="editar-conductor" name="conductor" class="form-control" required> 
                                <option value="">Seleccionar...</option>
                                <?php foreach ($conductores as $row) { ?>
                                    <option value="<?= $row->id ?>"><?= $row->nombres . " " . $row->apellidos ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Nombre de la ruta: <em class="text-danger">*</em></label>
                            <input id="editar-nombre" name="nombre" class="form-control"  type="text" required maxlength="45">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Placa del bus: <em class="text-danger">*</em></label>
                            <input id="editar-bus" name="bus" class="form-control"  type="text" required  maxlength="10">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Capacidad: <em class="text-danger">*</em></label>
                            <input id="editar-capacidad" name="capacidad" class="form-control"  type="number" required maxlength="3">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <label class="pull-left"> <em class="text-danger">*</em> Campos obligatorios</label>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal eliminar ruta -->
<div class="modal fade" id="modal-eliminar-ruta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>rutas/eliminar" method="POST" class="form-submit">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Eliminar ruta</h4>
                </div>
                <div class="modal-body">
                    <input id="eliminar-id-ruta" type="hidden" name="idRuta" readonly="">
                    <div class="row">
                        <div class="col-xs-12">
                            ¿Realmente desea eliminar la ruta: <em id="eliminar-nombre" class="text-info"></em> ?
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </form>
    </div>
</div>
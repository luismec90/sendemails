</nav>
<div id="contenedor" class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2>Condutores <small>(<?= $t = sizeof($conductores) ?> <?= ($t == 1) ? "conductor encontrado" : "conductores encontrados" ?>)</small> <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-crear-condutor"><span class="glyphicon glyphicon-plus"></span> Crear conductor</button></h2>
            <hr>
            <div id="criterios" class="row">
                <div class="col-sm-2">
                    <input id="apellidos" value="<?= (isset($_GET["apellidos"])) ? $_GET["apellidos"] : ""; ?>" type="text" class="form-control" placeholder="Apellidos" autocomplete="off">
                </div>
                <div class="col-sm-2">
                    <input id="nombres" value="<?= (isset($_GET["nombres"])) ? $_GET["nombres"] : ""; ?>" type="text" class="form-control" placeholder="Nombres" autocomplete="off">
                </div>
                <div class="col-sm-2">
                    <input id="cedula" value="<?= (isset($_GET["cedula"])) ? $_GET["cedula"] : ""; ?>" type="text" class="form-control" placeholder="Cédula" autocomplete="off">
                </div>
                <div class="col-sm-2">
                    <input id="celular" value="<?= (isset($_GET["celular"])) ? $_GET["celular"] : ""; ?>" type="text" class="form-control" placeholder="Celular" autocomplete="off">
                </div>
                <div class="col-sm-2">
                    <input id="email" value="<?= (isset($_GET["email"])) ? $_GET["email"] : ""; ?>" type="text" class="form-control" placeholder="E-mail" autocomplete="off">
                </div>
                <div class="col-sm-2">
                    <button id="buscar" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                    <a href="<?= base_url() ?>conductores" class="btn btn-default"><span class="glyphicon glyphicon-refresh"></span></a>
                </div>
                <div class="col-xs-4"></div>
                <div class="col-xs-4"></div>
            </div>
            <hr>
            <table id="tabla-conductores" class="table table-hover table-striped">
                <thead>
                <th>Apellidos</th>
                <th>Nombres</th>
                <th>Cédula</th>
                <th>Teléfono</th>
                <th>Celular</th>
                <th>E-mail</th>
                <th>Opciones</th>
                </thead>
                <?php foreach ($conductores as $row) { ?>
                    <tr>
                        <td><?= $row->apellidos ?></td>
                        <td><?= $row->nombres ?></td>
                        <td><?= $row->cedula ?></td>
                        <td><?= $row->telefono_casa ?></td>
                        <td><?= $row->celular ?></td>
                        <td><?= $row->email ?></td>
                        <td>
                            <button class="boton-editar-conductor btn btn-primary "
                                    data-id-conductor="<?= $row->id ?>"
                                    data-nombres="<?= $row->nombres ?>"
                                    data-cedula="<?= $row->cedula ?>"
                                    data-apellidos="<?= $row->apellidos ?>"
                                    data-sexo="<?= $row->sexo ?>"
                                    data-fecha-nacimiento="<?= $row->fecha_nacimiento ?>"
                                    data-telefono="<?= $row->telefono_casa ?>"
                                    data-celular="<?= $row->celular ?>"
                                    data-email="<?= $row->email ?>"
                                    title="Editar" ><span class="glyphicon glyphicon-edit"></span> </button>
                            <button class="boton-eliminar-conductor btn btn-danger "
                                    data-id-conductor="<?= $row->id ?>"
                                    data-nombres="<?= $row->nombres ?>"
                                    data-apellidos="<?= $row->apellidos ?>"
                                    title="Eliminar"> <span class="glyphicon glyphicon-trash"></span> </button> 
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<!-- Modal crear conductor -->
<div class="modal fade" id="modal-crear-condutor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>conductores/crear" method="POST" class="form-submit" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Crear condutor</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Nombres: <em class="text-danger">*</em></label>
                            <input name="nombres" class="form-control" type="text" required>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Apellidos: <em class="text-danger">*</em></label>
                            <input name="apellidos" class="form-control"  type="text" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Cédula: <em class="text-danger">*</em></label>
                            <input name="cedula" class="form-control"  type="text" required>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Sexo: <em class="text-danger">*</em></label>
                            <select name="sexo" class="form-control" required> 
                                <option value="">Seleccionar...</option>
                                <option value="femenino">Femenino</option>
                                <option value="masculino">Masculino</option>
                            </select>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Fecha de nacimiento: </label>
                            <input name="fechaNacimiento" class="form-control date-picker"  type="text" readonly="">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Teléfono del domicilio: </label>
                            <input name="telefono" class="form-control"  type="text">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Celular: </label>
                            <input name="celular" class="form-control"  type="text">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> E-mail: </label>
                            <input name="email" class="form-control"  type="email">
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

<!-- Modal editar conductor -->
<div class="modal fade" id="modal-editar-condutor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>conductores/editar" method="POST" class="form-submit">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Editar condutor</h4>
                </div>
                <div class="modal-body">
                    <input id="editar-id-conductor" type="hidden" name="idConductor" readonly="">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Nombres: <em class="text-danger">*</em></label>
                            <input id="editar-nombres" name="nombres" class="form-control" type="text" required>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Apellidos: <em class="text-danger">*</em></label>
                            <input id="editar-apellidos" name="apellidos" class="form-control"  type="text" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Cédula: <em class="text-danger">*</em></label>
                            <input id="editar-cedula" name="cedula" class="form-control"  type="text" required>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Sexo: <em class="text-danger">*</em></label>
                            <select id="editar-sexo" name="sexo" class="form-control" required> 
                                <option value="">Seleccionar...</option>
                                <option value="femenino">Femenino</option>
                                <option value="masculino">Masculino</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Fecha de nacimiento: </label>
                            <input id="editar-fecha-nacimiento"  name="fechaNacimiento" class="form-control date-picker"  type="text" readonly="">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Teléfono del domicilio: </label>
                            <input id="editar-telefono" name="telefono" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Celular: </label>
                            <input id="editar-celular"  name="celular" class="form-control"  type="text">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> E-mail: </label>
                            <input id="editar-email" name="email" class="form-control"  type="email">
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

<!-- Modal eliminar conductor -->
<div class="modal fade" id="modal-eliminar-condutor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>conductores/eliminar" method="POST" class="form-submit">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Eliminar condutor</h4>
                </div>
                <div class="modal-body">
                    <input id="eliminar-id-conductor" type="hidden" name="idConductor" readonly="">
                    <div class="row">
                        <div class="col-xs-12">
                            ¿Realmente desea eliminar a: <em id="eliminar-nombre-completo" class="text-info"></em> ?
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
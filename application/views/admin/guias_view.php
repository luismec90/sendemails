</nav>
<div id="contenedor" class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2>Guías <small>(<?= $t = sizeof($guias) ?> <?= ($t == 1) ? "guía encontrada" : "guías encontrados" ?>)</small> <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-crear-guia"><span class="glyphicon glyphicon-plus"></span> Crear guía</button></h2>
            <hr>
            <div id="criterios" class="row">
                <div class="col-sm-2">
                    <input id="apellidos" value="<?= (isset($_GET["apellidos"])) ? $_GET["apellidos"] : ""; ?>" type="text" class="form-control" placeholder="Apellidos" autocomplete="off">
                </div>
                <div class="col-sm-2">
                    <input id="nombres" value="<?= (isset($_GET["nombres"])) ? $_GET["nombres"] : ""; ?>" type="text" class="form-control" placeholder="Nombres" autocomplete="off">
                </div>
                <div class="col-sm-2">
                    <input id="usuario" value="<?= (isset($_GET["usuario"])) ? $_GET["usuario"] : ""; ?>" type="text" class="form-control" placeholder="Usuario" autocomplete="off">
                </div>
                <div class="col-sm-2">
                    <input id="celular" value="<?= (isset($_GET["celular"])) ? $_GET["celular"] : ""; ?>" type="text" class="form-control" placeholder="Celular" autocomplete="off">
                </div>
                <div class="col-sm-2">
                    <input id="email" value="<?= (isset($_GET["email"])) ? $_GET["email"] : ""; ?>" type="text" class="form-control" placeholder="E-mail" autocomplete="off">
                </div>
                <div class="col-sm-2">
                    <button id="buscar" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                    <a href="<?= base_url() ?>guias" class="btn btn-default"><span class="glyphicon glyphicon-refresh"></span></a>
                </div>
                <div class="col-xs-4"></div>
                <div class="col-xs-4"></div>
            </div>
            <hr>
            <table id="tabla-guias" class="table table-hover table-striped">
                <thead>
                <th>Apellidos</th>
                <th>Nombres</th>
                <th>Usuario</th>
                <th>Celular</th>
                <th>E-mail</th>
                <th>Opciones</th>
                </thead>
                <?php foreach ($guias as $row) { ?>
                    <tr>
                        <td><?= $row->apellidos ?></td>
                        <td><?= $row->nombres ?></td>
                        <td><?= $row->usuario ?></td>
                        <td><?= $row->celular ?></td>
                        <td><?= $row->email ?></td>
                        <td>
                            <button class="boton-editar-guia btn btn-primary "
                                    data-id-guia="<?= $row->id ?>"
                                    data-nombres="<?= $row->nombres ?>"
                                    data-apellidos="<?= $row->apellidos ?>"
                                    data-sexo="<?= $row->sexo ?>"
                                    data-fecha-nacimiento="<?= $row->fecha_nacimiento ?>"
                                    data-usuario="<?= $row->usuario ?>"
                                    data-celular="<?= $row->celular ?>"
                                    data-email="<?= $row->email ?>"
                                    title="Editar" ><span class="glyphicon glyphicon-edit"></span> </button>
                            <button class="boton-eliminar-guia btn btn-danger "
                                    data-id-guia="<?= $row->id ?>"
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
<!-- Modal crear guia -->
<div class="modal fade" id="modal-crear-guia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>guias/crear" method="POST" class="form-submit" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Crear guía</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Nombres: <em class="text-danger">*</em></label>
                            <input name="nombres" class="form-control" type="text" required  maxlength="30">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Apellidos: <em class="text-danger">*</em></label>
                            <input name="apellidos" class="form-control"  type="text" required  maxlength="30">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Sexo: <em class="text-danger">*</em></label>
                            <select name="sexo" class="form-control" required> 
                                <option value="">Seleccionar...</option>
                                <option value="femenino">Femenino</option>
                                <option value="masculino">Masculino</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Fecha de nacimiento: </label>
                            <input name="fechaNacimiento" class="form-control date-picker"  type="text" readonly=""  maxlength="10">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-12 col-sm-6">
                            <label> Usuario: <em class="text-danger">*</em></label>
                            <input name="usuario" class="form-control"  type="text" required  maxlength="45">
                        </div>

                        <div class="col-xs-12 col-sm-6">
                            <label> Password: <em class="text-danger">*</em></label>
                            <input name="password" class="form-control"  type="text" required  maxlength="45">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Celular: <em class="text-danger">*</em></label>
                            <input name="celular" class="form-control"  type="text" required maxlength="10">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> E-mail: <em class="text-danger">*</em></label>
                            <input name="email" class="form-control"  type="email" required maxlength="80">
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

<!-- Modal editar guia -->
<div class="modal fade" id="modal-editar-guia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>guias/editar" method="POST" class="form-submit">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Editar guía</h4>
                </div>
                <div class="modal-body">
                    <input id="editar-id-guia" type="hidden" name="idGuia" readonly="">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Nombres: <em class="text-danger">*</em></label>
                            <input id="editar-nombres" name="nombres" class="form-control" type="text" required maxlength="30">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Apellidos: <em class="text-danger">*</em></label>
                            <input id="editar-apellidos" name="apellidos" class="form-control"  type="text" required maxlength="30">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Sexo: <em class="text-danger">*</em></label>
                            <select id="editar-sexo" name="sexo" class="form-control" required> 
                                <option value="">Seleccionar...</option>
                                <option value="femenino">Femenino</option>
                                <option value="masculino">Masculino</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Fecha de nacimiento: </label>
                            <input id="editar-fecha-nacimiento" name="fechaNacimiento" class="form-control date-picker"  type="text" readonly="" maxlength="10">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-12 col-sm-6">
                            <label> Usuario: <em class="text-danger">*</em></label>
                            <input id="editar-usuario" name="usuario" class="form-control"  type="text" required  maxlength="45">
                        </div>

                        <div class="col-xs-12 col-sm-6">
                            <label> Password:</label>
                            <input name="password" class="form-control"  type="text"  maxlength="45">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Celular: <em class="text-danger">*</em></label>
                            <input id="editar-celular" name="celular" class="form-control"  type="text" required  maxlength="45">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> E-mail: <em class="text-danger">*</em></label>
                            <input id="editar-email" name="email" class="form-control"  type="email" required maxlength="80">
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

<!-- Modal eliminar guia -->
<div class="modal fade" id="modal-eliminar-guia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>guias/eliminar" method="POST" class="form-submit">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Eliminar guía</h4>
                </div>
                <div class="modal-body">
                    <input id="eliminar-id-guia" type="hidden" name="idGuia" readonly="">
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
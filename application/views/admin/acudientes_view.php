</nav>
<div id="contenedor" class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2>Acudientes <small>(<?= $cantidadRegistros ?> <?= ($cantidadRegistros == 1) ? "acudiente encontrado" : "acudientes encontrados" ?>)</small> <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-crear-acudiente"><span class="glyphicon glyphicon-plus"></span> Crear acudiente</button></h2>
            <hr>
            <div id="criterios" class="row">
                <div class="col-sm-2">
                    <input id="apellidos" value="<?= (isset($_GET["apellidos"])) ? $_GET["apellidos"] : ""; ?>" type="text" class="form-control" placeholder="Apellidos" autocomplete="off">
                </div>
                <div class="col-sm-2">
                    <input id="nombres" value="<?= (isset($_GET["nombres"])) ? $_GET["nombres"] : ""; ?>" type="text" class="form-control" placeholder="Nombres" autocomplete="off">
                </div>
                <div class="col-sm-2">
                    <input id="telefono" value="<?= (isset($_GET["telefono"])) ? $_GET["telefono"] : ""; ?>" type="text" class="form-control" placeholder="Teléfono" autocomplete="off">
                </div>
                <div class="col-sm-2">
                    <input id="celular" value="<?= (isset($_GET["celular"])) ? $_GET["celular"] : ""; ?>" type="text" class="form-control" placeholder="Celular" autocomplete="off">
                </div>
                <div class="col-sm-2">
                    <input id="email" value="<?= (isset($_GET["email"])) ? $_GET["email"] : ""; ?>" type="text" class="form-control" placeholder="E-mail" autocomplete="off">
                </div>
                <div class="col-sm-2">
                    <button id="buscar" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                    <a href="<?= base_url() ?>acudientes" class="btn btn-default"><span class="glyphicon glyphicon-refresh"></span></a>
                </div>
                <div class="col-xs-4"></div>
                <div class="col-xs-4"></div>
            </div>
            <hr>
            <table id="tabla-acudientes" class="table table-hover table-striped">
                <thead>
                <th>Apellidos</th>
                <th>Nombres</th>
                <th>Teléfono</th>
                <th>Celular</th>
                <th>E-mail</th>
                <th>Opciones</th>
                </thead>
                <?php foreach ($acudientes as $row) { ?>
                    <tr>
                        <td><?= $row->apellidos ?></td>
                        <td><?= $row->nombres ?></td>
                        <td><?= $row->telefono1 ?></td>
                        <td><?= $row->telefono3 ?></td>
                        <td><?= $row->email ?></td>
                        <td>
                            <button class="boton-editar-acudiente btn btn-primary"
                                    data-id-acudiente="<?= $row->id ?>"
                                    data-nombres="<?= $row->nombres ?>"
                                    data-apellidos="<?= $row->apellidos ?>"
                                    data-sexo="<?= $row->sexo ?>"   
                                    data-telefono1="<?= $row->telefono1 ?>"
                                    data-telefono2="<?= $row->telefono2 ?>"
                                    data-telefono3="<?= $row->telefono3 ?>"
                                    data-direccion-domicilio="<?= $row->direccion_casa ?>"
                                    data-direccion-laboral="<?= $row->direccion_oficina ?>"   
                                    data-email="<?= $row->email ?>"
                                    data-recibir-emails="<?= $row->recibir_emails ?>"
                                    title="Editar" ><span class="glyphicon glyphicon-edit"></span> </button>
                            <button class="boton-eliminar-acudiente btn btn-danger"
                                    data-id-acudiente="<?= $row->id ?>"
                                    data-nombre="<?= $row->nombres . " " . $row->apellidos ?>"
                                    title="Eliminar"> <span class="glyphicon glyphicon-trash"></span> </button> 
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <div class="row-fluid">
                <ul id="paginacion" class="pagination pull-right"
                    data-apellidos="<?php if (!empty($_GET["apellidos"])) echo $_GET["apellidos"]; ?>"
                    data-nombres="<?php if (!empty($_GET["nombres"])) echo $_GET["nombres"]; ?>"
                    data-telefono="<?php if (!empty($_GET["telefono"])) echo $_GET["telefono"]; ?>"
                    data-celular="<?php if (!empty($_GET["celular"])) echo $_GET["celular"]; ?>"
                    data-email="<?php if (!empty($_GET["email"])) echo $_GET["email"]; ?>"
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
<!-- Modal crear acudiente -->
<div class="modal fade" id="modal-crear-acudiente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>acudientes/crear" method="POST" class="form-submit" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Crear acudiente</h4>
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
                            <label> Sexo: <em class="text-danger">*</em></label>
                            <select name="sexo" class="form-control" required> 
                                <option value="">Seleccionar...</option>
                                <option value="femenino">Femenino</option>
                                <option value="masculino">Masculino</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> E-mail: <em class="text-danger">*</em></label>
                            <input name="email" class="form-control"  type="email" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Teléfono del domicilio:<em class="text-danger">*</em></label>
                            <input name="telefono1" class="form-control"  type="text" required="">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Teléfono laboral: </label>
                            <input name="telefono2" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Celular: </label>
                            <input name="telefono3" class="form-control"  type="text">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Dirección del domicilio: </label>
                            <input name="direccionDomocilio" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Dirección laboral: </label>
                            <input name="direccionLaboral" class="form-control"  type="text">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <br>
                            <div class="checkbox">
                                <label>
                                    <input name="envioEmails" value="1" type="checkbox" checked=""> Acepta envio de e-mails
                                </label>
                            </div>
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

<!-- Modal editar acudiente -->
<div class="modal fade" id="modal-editar-acudiente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>acudientes/editar" method="POST" class="form-submit">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Editar acudiente</h4>
                </div>
                <div class="modal-body">
                    <input id="editar-id-acudiente" type="hidden" name="idAcudiente" readonly="">
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
                            <label> Sexo: <em class="text-danger">*</em></label>
                            <select id="editar-sexo" name="sexo" class="form-control" required> 
                                <option value="">Seleccionar...</option>
                                <option value="femenino">Femenino</option>
                                <option value="masculino">Masculino</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> E-mail: <em class="text-danger">*</em></label>
                            <input id="editar-email" name="email" class="form-control"  type="email" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Teléfono del domicilio:<em class="text-danger">*</em></label>
                            <input id="editar-telefono1" name="telefono1" class="form-control"  type="text" required="">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Teléfono laboral: </label>
                            <input id="editar-telefono2" name="telefono2" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Celular: </label>
                            <input id="editar-telefono3" name="telefono3" class="form-control"  type="text">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Dirección del domicilio: </label>
                            <input id="editar-direccion-domicilio" name="direccionDomocilio" class="form-control"  type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Dirección laboral: </label>
                            <input id="editar-direccion-laboral" name="direccionLaboral" class="form-control"  type="text">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <br>
                            <div class="checkbox">
                                <label>
                                    <input id="editar-recibir-emails" name="envioEmails" value="1" type="checkbox"> Acepta envio de e-mails
                                </label>
                            </div>
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

<!-- Modal eliminar acudiente -->
<div class="modal fade" id="modal-eliminar-acudiente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>acudientes/eliminar" method="POST" class="form-submit">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Eliminar acudiente</h4>
                </div>
                <div class="modal-body">
                    <input id="eliminar-id-acudiente" type="hidden" name="idAcudiente" readonly="">
                    <div class="row">
                        <div class="col-xs-12">
                            ¿Realmente desea eliminar al acudiente: <em id="eliminar-nombre" class="text-info"></em> ?
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
</nav>
<div id="contenedor" class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2>Estudiantes  <small>(<?= $cantidadRegistros ?> <?= ($cantidadRegistros == 1) ? "estudiante encontrado" : "estudiantes encontrados" ?>)</small> <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-crear-estudiante"><span class="glyphicon glyphicon-plus"></span> Crear estudiante</button></h2>
            <hr>
            <div id="criterios" class="row">
                <div class="col-sm-2">
                    <input id="apellidos" value="<?= (isset($_GET["apellidos"])) ? $_GET["apellidos"] : ""; ?>" type="text" class="form-control" placeholder="Apellidos" autocomplete="off">
                </div>
                <div class="col-sm-2">
                    <input id="nombres" value="<?= (isset($_GET["nombres"])) ? $_GET["nombres"] : ""; ?>" type="text" class="form-control" placeholder="Nombres" autocomplete="off">
                </div>
                <div class="col-sm-2">
                    <input id="grado" value="<?= (isset($_GET["grado"])) ? $_GET["grado"] : ""; ?>" type="text" class="form-control" placeholder="Grado" autocomplete="off">
                </div>
                <div class="col-sm-2">
                    <input id="curso" value="<?= (isset($_GET["curso"])) ? $_GET["curso"] : ""; ?>" type="text" class="form-control" placeholder="Curso" autocomplete="off">
                </div>
                <div class="col-sm-2">
                    <select id="ruta" class="form-control"> 
                        <option value="">Rutas...</option>
                        <?php foreach ($rutas as $row) { ?>
                            <option value="<?= $row->id ?>" <?= (isset($_GET["ruta"]) && $_GET["ruta"] == $row->id) ? "selected" : ""; ?>><?= $row->nombre ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <button id="buscar" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                    <a href="<?= base_url() ?>estudiantes" class="btn btn-default"><span class="glyphicon glyphicon-refresh"></span></a>
                </div>
                <div class="col-xs-4"></div>
                <div class="col-xs-4"></div>
            </div>
            <hr>
            <table id="tabla-estudiantes" class="table table-hover table-striped">
                <thead>
                <th>Apellidos</th>
                <th>Nombres</th>
                <th>Grado</th>
                <th>Curso</th>
                <th>Teléfono</th>
                <th>Ruta</th>
                <th>Opciones</th>
                </thead>
                <?php foreach ($estudiantes as $row) { ?>
                    <tr>
                        <td><?= $row->apellidos ?></td>
                        <td><?= $row->nombres ?></td>
                        <td><?= $row->grado ?></td>
                        <td><?= $row->curso ?></td>
                        <td><?= $row->telefono_casa ?></td>
                        <td><?= $row->nombre_ruta ?></td>
                        <td> <button class="boton-asignar-acudiente btn btn-info" 
                                     data-id-estudiante="<?= $row->id ?>"
                                     data-nombre="<?= $row->nombres . " " . $row->apellidos ?>"
                                     title="Asignar acudiente"><span class="glyphicon glyphicon-user"></span></button>
                            <button class="boton-cambiar-destino btn btn-info"
                                    data-id-estudiante="<?= $row->id ?>"
                                    data-nombre="<?= $row->nombres . " " . $row->apellidos ?>"
                                    data-fecha-inicio="<?= $row->fecha_inicio_cambio_ruta ?>"
                                    data-fecha-fin="<?= $row->fecha_fin_cambio_ruta ?>"
                                    data-direccion="<?= $row->direccion_cambio_ruta ?>"
                                    title="Cambiar destino"> <span class="glyphicon glyphicon-flag"></span></button> 
                            <button class="boton-editar-estudiante btn btn-primary"
                                    data-id-estudiante="<?= $row->id ?>"
                                    data-id-ruta="<?= $row->id_ruta ?>"
                                    data-nombres="<?= $row->nombres ?>"
                                    data-apellidos="<?= $row->apellidos ?>"
                                    data-sexo="<?= $row->sexo ?>"   
                                    data-grado="<?= $row->grado ?>"
                                    data-fecha-nacimiento="<?= $row->fecha_nacimiento ?>"
                                    data-curso="<?= $row->curso ?>"
                                    data-direccion="<?= $row->direccion ?>"
                                    data-telefono="<?= $row->telefono_casa ?>"   
                                    data-celular="<?= $row->celular ?>"
                                    title="Editar" ><span class="glyphicon glyphicon-edit"></span> </button>
                            <button class="boton-eliminar-estudiante btn btn-danger"
                                    data-id-estudiante="<?= $row->id ?>"
                                    data-nombre="<?= $row->nombres . " " . $row->apellidos ?>"
                                    title="Eliminar"> <span class="glyphicon glyphicon-trash"></span></button> 

                        </td>
                    </tr>
                <?php } ?>
            </table>
            <div class="row-fluid">
                <ul id="paginacion" class="pagination pull-right"
                    data-apellidos="<?php if (!empty($_GET["apellidos"])) echo $_GET["apellidos"]; ?>"
                    data-nombres="<?php if (!empty($_GET["nombres"])) echo $_GET["nombres"]; ?>"
                    data-grado="<?php if (!empty($_GET["grado"])) echo $_GET["grado"]; ?>"
                    data-curso="<?php if (!empty($_GET["curso"])) echo $_GET["curso"]; ?>"
                    data-ruta="<?php if (!empty($_GET["ruta"])) echo $_GET["ruta"]; ?>"
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
<!-- Modal crear estudiante -->
<div class="modal fade" id="modal-crear-estudiante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>estudiantes/crear" method="POST" class="form-submit" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Crear estudiante</h4>
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
                            <label> Ruta: <em class="text-danger">*</em></label>
                            <select name="ruta" class="form-control" required> 
                                <option value="">Seleccionar...</option>
                                <?php foreach ($rutas as $row) { ?>
                                    <option value="<?= $row->id ?>"><?= $row->nombre ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Grado: <em class="text-danger">*</em></label>
                            <input name="grado" class="form-control"  type="text" required="">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Curso: <em class="text-danger">*</em></label>
                            <input name="curso" class="form-control"  type="text" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Dirección: <em class="text-danger">*</em></label>
                            <input name="direccion" class="form-control"  type="text" required="">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Fecha de nacimiento: </label>
                            <input name="fechaNacimiento" class="form-control date-picker"  type="text">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Teléfono del domicilio: </label>
                            <input name="telefonoDomocilio" class="form-control"  type="text">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Celular: </label>
                            <input name="celular" class="form-control"  type="text">
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

<!-- Modal editar estudiante -->
<div class="modal fade" id="modal-editar-estudiante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>estudiantes/editar" method="POST" class="form-submit">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Editar estudiante</h4>
                </div>
                <div class="modal-body">
                    <input id="editar-id-estudiante" type="hidden" name="idEstudiante" readonly="">
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
                            <select id="editar-sexo"  name="sexo" class="form-control" required> 
                                <option value="">Seleccionar...</option>
                                <option value="femenino">Femenino</option>
                                <option value="masculino">Masculino</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Ruta: <em class="text-danger">*</em></label>
                            <select id="editar-ruta" name="ruta" class="form-control" required> 
                                <option value="">Seleccionar...</option>
                                <?php foreach ($rutas as $row) { ?>
                                    <option value="<?= $row->id ?>"><?= $row->nombre ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Grado: <em class="text-danger">*</em></label>
                            <input id="editar-grado"  name="grado" class="form-control"  type="text" required="">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Curso: <em class="text-danger">*</em></label>
                            <input id="editar-curso"  name="curso" class="form-control"  type="text" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Dirección: <em class="text-danger">*</em></label>
                            <input id="editar-direccion"  name="direccion" class="form-control"  type="text" required="">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Fecha de nacimiento: </label>
                            <input id="editar-fecha-nacimiento" name="fechaNacimiento" class="form-control date-picker"  type="text">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Teléfono del domicilio: </label>
                            <input id="editar-telefono-domocilio" name="telefonoDomocilio" class="form-control"  type="text">
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Celular: </label>
                            <input id="editar-celular" name="celular" class="form-control"  type="text">
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

<!-- Modal eliminar estudiante -->
<div class="modal fade" id="modal-eliminar-estudiante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>estudiantes/eliminar" method="POST" class="form-submit">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Eliminar estudiante</h4>
                </div>
                <div class="modal-body">
                    <input id="eliminar-id-estudiante" type="hidden" name="idEstudiante" readonly="">
                    <div class="row">
                        <div class="col-xs-12">
                            ¿Realmente desea eliminar al estudiante: <em id="eliminar-nombre" class="text-info"></em> ?
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


<!-- Modal asignar acudiente -->
<div class="modal fade" id="modal-asignar-acudiente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>estudiantes/establecerAcudientes" method="POST" class="form-submit">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Asignar acudiente </h4>
                </div>
                <div class="modal-body">
                    <input id="asignar-id-estudiante" type="hidden" name="idEstudiante" readonly="">
                    <div class="row">
                        <div class="col-xs-12  col-sm-6">
                            Estudiante: <br><em id="asignar-nombre-estudiante" class="text-info"></em>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <input id="acudiente" type="text" class="form-control" placeholder="Buscar acudientes">
                        </div>
                    </div>
                    <div class="row">
                        <hr>
                        <div id="tabla-asignar-acudientes" class="col-xs-12 ">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Modal cambiar destino -->
<div class="modal fade" id="modal-cambiar-destino" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>estudiantes/cambiarDestino" method="POST" class="form-submit">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Cambiar destino</h4>
                </div>
                <div class="modal-body">
                    <input id="destino-id-estudiante" type="hidden" name="idEstudiante" readonly="">
                    <div class="row">
                        <div class="col-xs-12">
                            Estudiante: <em id="destino-nombre-estudiante" class="text-info"></em>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> Fecha de inicio: <em class="text-danger">*</em></label>
                            <input id="destino-fecha-inicial" name="fechaInicial" class="form-control" type="text" required >
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label> Fecha final: <em class="text-danger">*</em></label>
                            <input id="destino-fecha-final" name="fechaFinal" class="form-control"  type="text" required >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label> Dirección: <em class="text-danger">*</em></label>
                            <textarea id="destino-direccion" name="direccion" class="form-control" required></textarea>
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
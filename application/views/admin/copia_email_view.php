</nav>
<div id="contenedor" class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2>Enviar copia de los e-mails <small>(<?= $t = sizeof($emails) ?> <?= ($t == 1) ? "e-mail encontrado" : "e-mails encontrados" ?>)</small> <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-crear-email"><span class="glyphicon glyphicon-plus"></span> Crear e-mail</button></h2>
            <hr>
            <table id="tabla-emails" class="table table-hover table-striped">
                <thead>
                <th>E-mail</th>
                <th>Opciones</th>
                </thead>
                <?php foreach ($emails as $row) { ?>
                    <tr>
                        <td><?= $row->email ?></td>
                        <td>
                            <button class="boton-editar-email btn btn-primary "
                                    data-id-email="<?= $row->id ?>"
                                    data-email="<?= $row->email ?>"
                                    title="Editar" ><span class="glyphicon glyphicon-edit"></span> </button>
                            <button class="boton-eliminar-email btn btn-danger "
                                    data-id-email="<?= $row->id ?>"
                                    data-email="<?= $row->email ?>"
                                    title="Eliminar"> <span class="glyphicon glyphicon-trash"></span> </button> 
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<!-- Modal crear email -->
<div class="modal fade" id="modal-crear-email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>copia_email/crear" method="POST" class="form-submit" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Crear e-mail</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> E-mail: <em class="text-danger">*</em></label>
                            <input name="email" class="form-control" type="email" required>
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
<div class="modal fade" id="modal-editar-email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>copia_email/editar" method="POST" class="form-submit">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Editar e-mail</h4>
                </div>
                <div class="modal-body">
                    <input id="editar-id-email" type="hidden" name="idEmail" readonly="">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label> E-mail: <em class="text-danger">*</em></label>
                            <input id="editar-email" name="email" class="form-control" type="email" required>
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
<div class="modal fade" id="modal-eliminar-email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url() ?>copia_email/eliminar" method="POST" class="form-submit">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Eliminar e-mail</h4>
                </div>
                <div class="modal-body">
                    <input id="eliminar-id-email" type="hidden" name="idEmail" readonly="">
                    <div class="row">
                        <div class="col-xs-12">
                            ¿Realmente desea eliminar el e-mail: <em id="eliminar-nombre-email" class="text-info"></em> ?
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
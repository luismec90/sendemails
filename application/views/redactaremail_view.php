</nav>
<div id="contenedor" class="container">
    <br>
    <div class="row">
        <fieldset>
            <legend class="col-lg-8 col-lg-offset-2">Redactar e-mail</legend>
            <form role="form" action="<?= base_url() ?>emails/enviarEmailsRedactados" class="form-submit" method="post" autocomplete="off">
                <div class="col-lg-8 col-lg-offset-2">


                    <div class="form-group">
                        <label for="destinatarios">Destinatarios:</label>
                        <input type="text" class="form-control" id="destinatarios" name="destinatarios" placeholder="" >
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="incluirRuta" value="true" checked="">Incluir acudientes de los estudiantes que han abordado la ruta:<b> <?= $ruta[0]->nombre ?></b>
                                </label>
                            </div> 
                            <hr>


                        </div>
                    </div>
                    <div class="form-group">
                        <label for="asunto">Asunto:</label>
                        <select id="asunto" name="asunto" class="form-control" required>
                            <option value="" data-mensaje="">Seleccionar...</option>
                            <?php foreach ($asuntos as $row) { ?>
                                <option value="<?= $row->asunto ?>" data-mensaje="<?= $row->mensaje ?>"><?= $row->asunto ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="mensaje">Mensaje:</label>

                        <textarea id="mensaje" name="mensaje" id="mensaje" class="form-control" rows="5" readonly required></textarea>

                    </div>
                    <hr>
                    <input type="hidden" name="ruta" value="<?= $ruta[0]->id ?>" >
                    <input type="hidden" name="destino" value="<?= $destino ?>" >
                    <input type="submit" name="submit" id="submit" value="Enviar" class="btn btn-success pull-right">
                    <br><br>
                </div>


            </form>
        </fieldset>

        <br>

    </div>
</div>
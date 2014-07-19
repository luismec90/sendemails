<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="<?= base_url() ?>assets/img/favicon.ico" rel="icon" type="image/x-icon" />
        <title>NationalToursMailer</title>

        <link rel="stylesheet" href="<?= base_url() ?>assets/libs/bootstrap-3.1.1/css/bootstrap.min.css" >
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/global.css">

        <?php if (isset($css)) foreach ($css as $row) { ?>
                <link rel="stylesheet" href="<?= base_url() ?>assets/<?= $row ?>.css">
            <?php } ?>
    </head>
    <body>
        <nav id="bar-top"  class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <div>
                        <img id="img-logo" width="46" height="46" src="<?= base_url() ?>assets/img/logo-nt.png"> 
                        <span id="texto-logo">NationalToursMailer</span>
                    </div>
                </div>


            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>
    <div id="contenedor" class="container">
        <?php if ($tab == "index") { ?>
            <?php if ($acudiente && $acudiente[0]->recibir_emails == 1) { ?>
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-md-offset-2">
                        <hr class="colorgraph">
                        <form role="form">
                            <h2>Realmente desea no recibir mas e-mails? </h2>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <a href="<?php base_url() ?>unsubscribe/make?email=<?= $email ?>&token=<?= $token ?>" class="btn btn-success btn-block btn-lg pull-right">Confirmar</a>
                                </div>
                            </div>
                        </form>
                        <hr class="colorgraph">
                    </div>
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-md-offset-2">
                        <hr class="colorgraph">
                        <form role="form">
                            <h2 class="text-center">Este correo ya ha sido dado de baja. </h2>
                            <h4 class="text-center">Si desea re-activarlo, por favor comuníquese con el colegio.</h4>
                            <div class="row">

                            </div>
                        </form>
                        <hr class="colorgraph">
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-offset-2">
                    <hr class="colorgraph">
                    <h2 class="text-center">Ha sido dado de baja exitosamente.</h2>
                    <h4 class="text-center">Si desea re-activarlo, por favor comuníquese con el colegio.</h4>
                    <hr class="colorgraph">
                </div>
            </div>
        <?php } ?>
    </div>
    <div id="footer">
        <div class="container">
            <img id="logo-grupo-mas" class="pull-right" height="90" src="<?= base_url() ?>assets/img/grupo-mas.png"> 
            <div  class="row">
                Dirección: Calle 36 # 66b 106 Itagüí - Ditaires <br>
                Teléfono: 444-26-18 <br>
                E-mail: national@une.net.co.co <br>
                www.nationaltours.com.co  <br>
                Copyright © 2014 National Tours  <br>
            </div>

        </div>
    </div>
    <?php if ($this->session->flashdata('mensaje')) { ?>
        <div id="toast-container" class="toast-top-center">
            <div class="toast toast-<?= $this->session->flashdata('tipo') ?>">
                <div class="toast-message"><?= $this->session->flashdata('mensaje') ?></div>
            </div>
        </div>
    <?php } ?>
    <div id="coverDisplay">
        <img id="imgLoading" src="<?= base_url() ?>assets/img/loading.gif">
    </div>
    <script src="<?= base_url() ?>assets/libs/jQuery-1.11.0/jQuery.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap-3.1.1/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/global.js"></script>

    <?php if (isset($js)) foreach ($js as $row) { ?>
            <script src="<?= base_url() ?>assets/<?= $row ?>.js"></script>
        <?php } ?>
</body>
</html>
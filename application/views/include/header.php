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
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div>
                        <img id="img-logo" width="46" height="46" src="<?= base_url() ?>assets/img/logo-nt.png"> 
                        <span id="texto-logo">NationalToursMailer</span>
                    </div>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="navbar-collapse navbar-ex1-collapse collapse">
                    <?php if ($tab == "ruta" || $tab == "redactaremail") { ?>
                        <ul class="nav navbar-nav">
                            <li class="<?= ($tab == "ruta") ? "active" : ""; ?>"><a href="<?= base_url() ?>ruta/<?= $ruta[0]->id ?>/<?= $origen ?>"><?= $ruta[0]->nombre ?> / <?= $origen ?> </a>
                            </li>
                            <li class="<?= ($tab == "redactaremail") ? "active" : ""; ?>"><a href="<?= base_url() ?>redactaremail/<?= $ruta[0]->id ?>/<?= $origen ?>">Redactar e-mail</a>
                            </li>
                        </ul>
                    <?php } else if ($tab == "conductores" || $tab == "rutas" || $tab == "acudientes" || $tab == "estudiantes" || $tab == "historico" || $tab == "copia_email" ) { ?>
                        <ul class="nav navbar-nav">
                            <li class="<?= ($tab == "conductores") ? "active" : ""; ?>"><a href="<?= base_url() ?>conductores">Conductores</a>
                            </li>
                            <li class="<?= ($tab == "rutas") ? "active" : ""; ?>"><a href="<?= base_url() ?>rutas">Rutas</a>
                            </li>
                            <li class="<?= ($tab == "acudientes") ? "active" : ""; ?>"><a href="<?= base_url() ?>acudientes">Acudientes</a>
                            </li>
                            <li class="<?= ($tab == "estudiantes") ? "active" : ""; ?>"><a href="<?= base_url() ?>estudiantes">Estudiantes</a>
                            </li>
                            <li class="<?= ($tab == "historico") ? "active" : ""; ?>"><a href="<?= base_url() ?>historico">Informe de servicios</a>
                            </li>
                            <li class="<?= ($tab == "copia_email") ? "active" : ""; ?>"><a href="<?= base_url() ?>copia_email">Enviar copia</a>
                            </li>
                        </ul>
                    <?php } ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $_SESSION["nombre"] ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= base_url() ?>">Salir</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
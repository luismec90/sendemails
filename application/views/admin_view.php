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
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/inicio.css">

        <?php if (isset($css)) foreach ($css as $row) { ?>
                <link rel="stylesheet" href="<?= base_url() ?>assets/<?= $row ?>.css">
            <?php } ?>
    </head>
    <body>    

        <div class="container">   
            <div id="loginbox"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Autentificación</div>
                        <div id="olvide-pasword" ><a href="#"></a></div>
                    </div>     

                    <div  class="panel-body" >

                        <form id="loginform" action="<?= base_url() ?>entrar/admin" class="form-horizontal" role="form" method="POST" autocomplete="off">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input  type="text" class="form-control" name="username" value="" placeholder="Usuario" required>                                        
                            </div>
                            <div  class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input  type="password" class="form-control" name="password" placeholder="Contraseña" required=""> 
                            </div>
                            <div  class="form-group">
                                <div class="col-sm-12 controls">
                                    <button id="btn-login" type="submit" class="btn btn-success">Entrar  </button>
                                </div>
                            </div>
                        </form>     
                    </div>                     
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
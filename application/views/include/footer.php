
<div id="footer">
    <div class="container">
        <img id="logo-grupo-mas" class="pull-right" height="90" src="<?= base_url() ?>assets/img/grupo-mas.png"> 
        <div  class="row">
            Dirección: <address>Calle 36 # 66b 106 Itagüí - Ditaires</address> <br>
            Teléfono: 444-26-18 <br>
            E-mail:  <a href="mailto:omercial@nationaltours.com.co" class="color-white">national@une.net.co.co</a> <br>
            <a href="http://www.nationaltours.com.co/" target="_blank" class="color-white">www.nationaltours.com.co</a>  <br>
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
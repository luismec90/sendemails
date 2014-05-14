<table width="500" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family:arial; background:#f1f1f2;">
    <tbody>
        <tr>
            <td>
                <img width="500" src="<?= base_url() ?>assets/img/header.png">
            </td>
        </tr>
        <tr style="background:#f1f1f2;">
            <td>
                <table width="500" border="0" cellspacing="0" cellpadding="0" style="padding: 15px 10px">
                    <tbody>
                        <tr >
                            <td style="text-align: center; color:#0965a5; font-weight: bold; font-size:18px;"><?= $saludo ?> <?= htmlentities($nombreAcudiente) ?></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr style="background:#f1f1f2;">
            <td>
                <table width="500" border="0" cellspacing="0" cellpadding="0" style="padding: 0px 10px; font-size: 15px;">
                    <tbody>
                        <tr >
                            <td>Su <?= htmlentities($parentesco) ?>: <span style="color:#0965a5; font-weight: bold;"><?= htmlentities($nombreEstudiante) ?></span> acaba de ser descargado(a) por la ruta: <span style="color:#0965a5; font-weight: bold;"><?= htmlentities($nombreRuta) ?></span>  el d&iacute;a: <span style="color:#0965a5; font-weight: bold;"><?= $fecha ?></span>, en <?= htmlentities($textoDestino) ?>.</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr style="background:#f1f1f2;">
            <td>
                <table width="500" border="0" cellspacing="0" cellpadding="0" style="padding: 15px 10px; font-size: 15px;">
                    <tbody>
                        <tr >
                            <td> La gu&iacute;a que se encuentra en esta ruta es: <?= htmlentities($guia[0]->nombres . " " . $guia[0]->apellidos) ?>.</td>
                        </tr>
                        <tr><td>
                                Para cualquier inquietud se puede comunicar al tel&eacute;fono: <?= $guia[0]->celular ?>
                            </td></tr>
                    </tbody>
                </table>

            </td>
        </tr>
        <tr style="background:#f1f1f2;">
            <td>
                <table width="500" border="0" cellspacing="0" cellpadding="0" style="padding: 30px 10px; font-size: 15px; border-bottom:3px solid #24a5d4;">
                    <tbody>
                        <tr >
                            <td>Este correo ha sido enviado para su tranquilidad y con el fin de prestarle un mejor servicio. <span style="color:#0965a5; font-weight: bold;">NationalTours</span></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table width="500" border="0" cellspacing="0" cellpadding="0" style="background:#d0d2d3;">
                    <tr>
                        <td>
                            <table width="300" border="0" cellspacing="0" cellpadding="0" style="padding: 10px 10px; font-size: 15px; ">
                                <tbody>
                                    <tr>
                                        <td style="padding:2px 0; color:#555;"><img width="12" height="12" src="<?= base_url() ?>assets/img/icono_direccion.png"> Calle 36 # 66b 106 Itag&uuml;&iacute; - Ditaires</td>
                                    </tr>
                                    <tr >
                                        <td style="padding:2px 0; color:#555;"><img width="12" height="12" src="<?= base_url() ?>assets/img/icono_tel.png"> 444-26-18</td>
                                    </tr> 
                                    <tr >
                                        <td style="padding:2px 0; color:#555;"><img width="12" height="12" src="<?= base_url() ?>assets/img/icono_mail.png"> comercial@nationaltours.com</td>
                                    </tr>
                                    <tr >
                                        <td style="padding:2px 0; color:#555;"><img width="12" height="12" src="<?= base_url() ?>assets/img/icono_web.png"> www.nationaltours.com.co</td>
                                    </tr>
                                    <tr >
                                        <td style="padding-top:15px; color:#555; font-size: 10px;">Copyrigth © 2014 National Tours</td>
                                    </tr>
                                    <tr >
                                        <td style="padding-top:5px; color:#555; font-size: 10px;">Si no quieres recibir m&&aacute;s estos e-mails <a href="<?= base_url() ?>unsubscribe?email=<?= $email ?>&token=<?= sha1("$email-nationaltourskey") ?>" target="_blank" style="color:#0965a5; font-weight: bold;">Haz Click Aqu&iacute;</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td style="vertical-align:bottom;  padding-bottom: 5px;">
                            <table border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr >
                                        <td style="vertical-align:bottom;color:#555; font-size:10px;">NationalTours es una <br> empresa del Grupo Mas</td>
                                        <td><img width="50" src="<?= base_url() ?>assets/img/logo_grupomas.png"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<br>
<div style="color:gray; text-align: center;">
    Este correo es informativo, favor no responder a esta direcci&oacute;n, ya que no se encuentra habilitada para recibir e-mails.
</div>
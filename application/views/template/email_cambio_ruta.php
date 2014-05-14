<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <table width="500" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family:arial">
            <tbody>
                <tr>
                    <td>
                        <img width="500" style="position: absolute;z-index:0;" src="<?= base_url() ?>assets/img/fondo_superior.png">
                        <table width="500" border="0" cellspacing="0" cellpadding="0" style="border-bottom:3px solid #24a5d4; padding:10px;">
                            <tbody>
                                <tr >
                                    <td style="width:100px"><img src="<?= base_url() ?>assets/img/logo_colegio_aleman.png"></td>
                                    <td style="text-align: center; color:#0965a5; font-weight: bold; font-size:20px;">INFORME DE <br> RUTA COLEGIO ALEMÁN</td>
                                    <td style="width:100px"><img style="float: right;" src="<?= base_url() ?>assets/img/logo_national.png"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr style="background:#f1f1f2;">
                    <td>
                        <table width="500" border="0" cellspacing="0" cellpadding="0" style="padding: 15px 10px">
                            <tbody>
                                <tr >
                                    <td style="text-align: center; color:#0965a5; font-weight: bold; font-size:18px;"><?= $saludo ?> <?= $nombreAcudiente ?></td>
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
                                    <td>Su <?= $parentesco ?>: <span style="color:#0965a5; font-weight: bold;"><?= $nombreEstudiante ?></span> <b><?= $textoAbordo ?></b> abordó la ruta: <span style="color:#0965a5; font-weight: bold;"><?= $nombreRuta ?></span>  el día: <span style="color:#0965a5; font-weight: bold;"><?= $fecha ?></span>, en <?= $textoDestino ?>. El cambio de ruta es de conocimiento del colegio.</td>
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
                                    <td> La guía que se encuentra en esta ruta es: <?= $guia[0]->nombres . " " . $guia[0]->apellidos ?>.</td>
                                </tr>
                                <tr><td>
                                        Para cualquier inquietud se puede comunicar al teléfono: <?= $guia[0]->celular ?>
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
                                                <td style="padding:2px 0; color:#555;"><img width="12" height="12" src="<?= base_url() ?>assets/img/icono_direccion.png"> Calle 36 # 66b 106 Itagüí - Ditaires</td>
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
                                                <td style="padding-top:5px; color:#555; font-size: 10px;">Si no quieres recibir más estos e-mails <a href="<?= base_url() ?>unsubscribe?email=<?= $email ?>&token=<?= sha1("$email-nationaltourskey") ?>" target="_blank" style="color:#0965a5; font-weight: bold;">Haz Click Aquí</a></td>
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
            Este correo es informativo, favor no responder a esta dirección, ya que no se encuentra habilitada para recibir e-mails.
        </div>
    </body>
</html>
$(function() {
    $(".date-picker").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        monthNamesShort: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        dayNamesMin: ["Dom", "Lun", "Mar", "Mie", "Juv", "Vie", "Sab"],
        yearRange: '-80Y:+0',
        maxDate: 0
    });
    $(".date-picker2").datepicker({
        changeMonth: true,
        dateFormat: "yy-mm-dd",
        monthNamesShort: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        dayNamesMin: ["Dom", "Lun", "Mar", "Mie", "Juv", "Vie", "Sab"],
        minDate: 0
    });

    $("#destino-fecha-inicial").datepicker({
        changeMonth: true,
        dateFormat: "yy-mm-dd",
        monthNamesShort: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        dayNamesMin: ["Dom", "Lun", "Mar", "Mie", "Juv", "Vie", "Sab"],
        minDate: 0,
        onClose: function(selectedDate) {
            $("#destino-fecha-final").datepicker("option", "minDate", selectedDate);
        }
    });

    $("#destino-fecha-final").datepicker({
        changeMonth: true,
        dateFormat: "yy-mm-dd",
        monthNamesShort: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        dayNamesMin: ["Dom", "Lun", "Mar", "Mie", "Juv", "Vie", "Sab"],
        minDate: 0,
        onClose: function(selectedDate) {
            $("#destino-fecha-inicial").datepicker("option", "maxDate", selectedDate);
        }
    });

    $("#tabla-estudiantes button.boton-editar-estudiante").click(function() {
        $("#editar-id-estudiante").val($(this).data("id-estudiante"));
        $("#editar-nombres").val($(this).data("nombres"));
        $("#editar-apellidos").val($(this).data("apellidos"));
        $("#editar-sexo").val($(this).data("sexo"));
        $("#editar-ruta").val($(this).data("id-ruta"));
        $("#editar-grado").val($(this).data("grado"));
        $("#editar-curso").val($(this).data("curso"));
        $("#editar-direccion").val($(this).data("direccion"));
        $("#editar-fecha-nacimiento").val($(this).data("fecha-nacimiento"));
        $("#editar-telefono-domocilio").val($(this).data("telefono"));
        $("#editar-celular").val($(this).data("celular"));
        $("#modal-editar-estudiante").modal();
    });
    $("#tabla-estudiantes button.boton-eliminar-estudiante").click(function() {
        $("#eliminar-id-estudiante").val($(this).data("id-estudiante"));
        $("#eliminar-nombre").html($(this).data("nombre"));
        $("#modal-eliminar-estudiante").modal();
    });
    $("#tabla-estudiantes button.boton-asignar-acudiente").click(function() {
        var idEstudiante = $(this).data("id-estudiante");
        $("#asignar-id-estudiante").val(idEstudiante);
        $("#asignar-nombre-estudiante").html($(this).data("nombre"));
        $.ajax({
            url: "estudiantes/obtenerAcudientes",
            method: "get",
            data: {
                "idEstudiante": idEstudiante
            },
            success: function(data) {
                $("#tabla-asignar-acudientes").html(data);
            }
        });
        $("#modal-asignar-acudiente").modal();
    });
    $("#tabla-estudiantes button.boton-cambiar-destino").click(function() {
        $("#destino-id-estudiante").val($(this).data("id-estudiante"));
        $("#destino-nombre-estudiante").html($(this).data("nombre"));
        $("#destino-fecha-inicial").val($(this).data("fecha-inicio"));
        $("#destino-fecha-final").val($(this).data("fecha-fin"));
        $("#destino-direccion").val($(this).data("direccion"));
        $("#modal-cambiar-destino").modal();
    });
    $('#acudiente').autocomplete({
        serviceUrl: 'autocomplete/obtenerAcudientes',
        minChars: 2,
        onSelect: function(suggestion) {
            $(this).val("");

            var data = suggestion.data.split("&&");
            console.log(data);
            var idAcudiente = data[0];
            var nombre = data[1];
            var email = data[2];
            var selectParentesco = "<select name='parentescos[]' class='form-control' required=''> <option value=''>Seleccionar</option> <option value='hermana'>hermana</option> <option value='hermano'>hermano</option> <option value='hija'>hija</option> <option value='hijo'>hijo</option> <option value='nieta'>nieta</option> <option value='nieto'>nieto</option> <option value='sobrina'>sobrina</option> <option value='sobrino'>sobrino</option> <option value='familiar'>familiar</option> </select>"
            var tbody = $("#tabla-asignar-acudientes").find('#tbody-asignar-acudientes');
            if (tbody.length > 0) {
                var fila = "fila-" + idAcudiente;
                if ($('#tabla-asignar-acudientes tr.' + fila).length == 0) {
                    tbody.append("<tr class='fila-" + idAcudiente + "'> <td><input type='hidden' name='idAcudientes[]' value='" + idAcudiente + "' required><div>" + nombre + "</div><small class='text-muted'>" + email + "</small> </td> <td> " + selectParentesco + " </td> <td> <a class='btn btn-danger boton-eliminar-parentesco' title='Eliminar'> <span class='glyphicon glyphicon-trash'></span></a> </td> </tr>")
                }
            } else {
                console.log(suggestion)
                var stringTabla = "<table class='table table-striped table-condensed table-bordered table-hover'> <thead> <tr> <th>Acudiente</th> <th>Parentesco</th> <th>Eliminar</th> </tr> </thead> <tbody id='tbody-asignar-acudientes'> <tr class='fila-" + idAcudiente + "'> <td><input type='hidden' name='idAcudientes[]' value='" + idAcudiente + "' required><div>" + nombre + "</div><small class='text-muted'>" + email + "</small></td> <td> " + selectParentesco + " </td> <td> <a class='btn btn-danger boton-eliminar-parentesco' title='Eliminar'> <span class='glyphicon glyphicon-trash'></span></a> </td> </tr> </tbody> </table>";
                $("#tabla-asignar-acudientes").html(stringTabla);
            }
        }
    });
    $("#tabla-asignar-acudientes").on("click", "a.boton-eliminar-parentesco", function() {
        $(this).parent().parent().remove();
    });
    $("#buscar").click(function() {
                $("#coverDisplay").css({
            "opacity": "1",
            "width": "100%",
            "height": "100%"
        });
        var url = "estudiantes?";
        var apellidos = $("#apellidos").val();
        if (apellidos) {
            url += "apellidos=" + apellidos + "&";
        }
        var nombres = $("#nombres").val();
        if (nombres) {
            url += "nombres=" + nombres + "&";
        }
        var grado = $("#grado").val();
        if (grado) {
            url += "grado=" + grado + "&";
        }
        var curso = $("#curso").val();
        if (curso) {
            url += "curso=" + curso + "&";
        }
        var ruta = $("#ruta").val();
        if (ruta) {
            url += "ruta=" + ruta + "&";
        }
        url = url.substr(0, url.length - 1);
        window.location.href = url;
    });
    $("#criterios input,#criterios select").keypress(function(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode == 13) {
            $("#buscar").trigger("click");
        }
    });


    $("#paginacion li.noActive a").click(function() {
        $("#coverDisplay").css({
            "opacity": "1",
            "width": "100%",
            "height": "100%"
        });
        var paginacion = $("#paginacion");
        if ($(this).data("page") == 1) {
            url = "estudiantes?";
        } else {
            var url = "estudiantes?page=" + $(this).data("page") + "&";
        }

        var apellidos = $(paginacion).data("apellidos");
        if (apellidos) {
            url += "apellidos=" + apellidos + "&";
        }
        var nombres = $(paginacion).data("nombres");
        if (nombres) {
            url += "nombres=" + nombres + "&";
        }
        var grado = $(paginacion).data("grado");
        if (grado) {
            url += "grado=" + grado + "&";
        }
        var curso = $(paginacion).data("curso");
        if (curso) {
            url += "curso=" + curso + "&";
        }
        var ruta = $(paginacion).data("ruta");
        if (ruta) {
            url += "ruta=" + ruta + "&";
        }
        url = url.substr(0, url.length - 1);
        window.location.href = url;
    });
});
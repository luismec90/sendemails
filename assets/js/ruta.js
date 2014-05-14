
$(function() {
    $('#nombres').autocomplete({
        serviceUrl: '../../autocomplete/nombres',
        minChars: 2,
        onSelect: function(suggestion) {
            $(this).val("");
            var data = suggestion.data.split("&&");
            var idEstudiante = data[0].trim();
            var fila = "fila-" + idEstudiante;
            if ($('#tabla-estudiantes tr.' + fila).length == 0) {
                $("#tabla-estudiantes").prepend("<tr class='success " + fila + "'><td>" + data[2] + "</td><td>" + data[1] + "</td><td class='abordo seleccionable check'> <input type='radio' class='abordo' name='estudiante[" + idEstudiante + "]' value='abordo' checked> </td><td class='noabordo seleccionable'><input type='radio' class='noabordo' name='estudiante[" + idEstudiante + "]' value='noabordo'></td></tr>");
                $("#criterio-apellidos").attr("data-sorted", "false");
                $("#criterio-apellidos").trigger("click");
            } else {
                $('#tabla-estudiantes tr.' + fila).removeClass("warning").addClass("success");
                $('#tabla-estudiantes tr.' + fila).find("input.abordo").prop("checked", true);
            }
            marcarFila(fila);
        }
    });

    $('#apellidos').autocomplete({
        serviceUrl: '../../autocomplete/apellidos',
        minChars: 2,
        onSelect: function(suggestion) {
            $(this).val("");
            var data = suggestion.data.split("&&");
            var idEstudiante = data[0].trim();
            var fila = "fila-" + idEstudiante;
            if ($('#tabla-estudiantes tr.' + fila).length == 0) {
                $("#tabla-estudiantes").prepend("<tr class='success " + fila + "'><td>" + data[2] + "</td><td>" + data[1] + "</td><td class='abordo seleccionable check'> <input type='radio' class='abordo' name='estudiante[" + idEstudiante + "]' value='abordo' checked> </td><td class='noabordo seleccionable'><input type='radio' class='noabordo' name='estudiante[" + idEstudiante + "]' value='noabordo'></td></tr>");
                $("#criterio-apellidos").attr("data-sorted", "false");
                $("#criterio-apellidos").trigger("click");
            } else {
                $('#tabla-estudiantes tr.' + fila).removeClass("warning").addClass("success");
                $('#tabla-estudiantes tr.' + fila).find("input.abordo").prop("checked", true);
            }
            marcarFila(fila);
        }
    });

    $('#acudiente').autocomplete({
        serviceUrl: '../../autocomplete/acudiente',
        minChars: 2,
        onSelect: function(suggestion) {
            $(this).val("");
            if (suggestion.value == "Seleccionar todos") {
                $('#tabla-estudiantes tr.shadow').removeClass("shadow");
                var json = JSON.parse(suggestion.data);
                $.each(json, function(index, suggestion) {
                    var data = suggestion.data.split("&&");
                    var idEstudiante = data[0].trim();
                    var fila = "fila-" + idEstudiante;
                    if ($('#tabla-estudiantes tr.' + fila).length == 0) {
                        $("#tabla-estudiantes").prepend("<tr class='success " + fila + "'><td>" + data[2] + "</td><td>" + data[1] + "</td><td class='abordo seleccionable check'> <input type='radio' class='abordo' name='estudiante[" + idEstudiante + "]' value='abordo' checked> </td><td class='noabordo seleccionable'><input type='radio' class='noabordo' name='estudiante[" + idEstudiante + "]' value='noabordo'></td></tr>");

                    } else {
                        $('#tabla-estudiantes tr.' + fila).removeClass("warning").addClass("success");
                        $('#tabla-estudiantes tr.' + fila).find("input.abordo").prop("checked", true);
                    }
                    $('#tabla-estudiantes tr.' + fila).addClass("shadow");
                });
                $("#criterio-apellidos").attr("data-sorted", "false");
                $("#criterio-apellidos").trigger("click");
            } else {
                var data = suggestion.data.split("&&");
                var idEstudiante = data[0].trim();
                var fila = "fila-" + idEstudiante;
                if ($('#tabla-estudiantes tr.' + fila).length == 0) {
                    $("#tabla-estudiantes").prepend("<tr class='success " + fila + "'><td>" + data[2] + "</td><td>" + data[1] + "</td><td class='abordo seleccionable check'> <input type='radio' class='abordo' name='estudiante[" + idEstudiante + "]' value='abordo' checked> </td><td class='noabordo seleccionable'><input type='radio' class='noabordo' name='estudiante[" + idEstudiante + "]' value='noabordo'></td></tr>");
                    $("#criterio-apellidos").attr("data-sorted", "false");
                    $("#criterio-apellidos").trigger("click");
                } else {
                    $('#tabla-estudiantes tr.' + fila).removeClass("warning").addClass("success");
                    $('#tabla-estudiantes tr.' + fila).find("input.abordo").prop("checked", true);
                }
                marcarFila(fila);
            }
        }
    });

    $('#tabla-estudiantes').on("click", "td.abordo.seleccionable", function(e) {
        var tr = $(this).parent();
        eliminarClases(tr);
        if ($(this).hasClass("check")) {
            $(this).removeClass("check");
            $(this).find('input[type="radio"]').prop("checked", false);
            tr.addClass("warning");
        } else {
            $(this).addClass("check");
            $(this).find('input[type="radio"]').prop("checked", true);
            tr.addClass("success");
            $(this).next().removeClass("check");
        }
        $('#tabla-estudiantes tr.shadow').removeClass("shadow");
        tr.addClass("shadow");
    });

    $('#tabla-estudiantes').on("click", "td.noabordo.seleccionable", function(e) {
        var tr = $(this).parent();
        eliminarClases(tr);
        if ($(this).hasClass("check")) {
            $(this).removeClass("check");
            $(this).find('input[type="radio"]').prop("checked", false);
            tr.addClass("warning");
        } else {
            $(this).addClass("check");
            $(this).find('input[type="radio"]').prop("checked", true);
            tr.addClass("danger");
            $(this).prev().removeClass("check");
        }
    });
    function eliminarClases(tr) {
        tr.removeClass("danger").removeClass("warning").removeClass("success");
    }
    function marcarFila(fila) {
        $('#tabla-estudiantes tr.shadow').removeClass("shadow");
        $('#tabla-estudiantes tr.' + fila).addClass("shadow");
        $("html, body").scrollTop($('#tabla-estudiantes tr.' + fila).offset().top - 100);
    }
});
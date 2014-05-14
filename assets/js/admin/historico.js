$(function() {

    $(".date-picker").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        monthNamesShort: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        dayNamesMin: ["Dom", "Lun", "Mar", "Mie", "Juv", "Vie", "Sab"],
        maxDate: 0
    });

    $("#buscar").click(function() {
        $("#coverDisplay").css({
            "opacity": "1",
            "width": "100%",
            "height": "100%"
        });

        var url = "historico?";

        var estudiante = $("#estudiante").val();
        if (estudiante) {
            url += "estudiante=" + estudiante + "&";
        }
        var ruta = $("#ruta").val();
        if (ruta) {
            url += "ruta=" + ruta + "&";
        }
        var bus = $("#bus").val();
        if (bus) {
            url += "bus=" + bus + "&";
        }
        var destino = $("#destino").val();
        if (destino) {
            url += "destino=" + destino + "&";
        }
        var abordo = $("#abordo").val();
        if (abordo) {
            url += "abordo=" + abordo + "&";
        }
        var fecha = $("#fecha").val();
        if (fecha) {
            url += "fecha=" + fecha + "&";
        }
        var guia = $("#guia").val();
        if (guia) {
            url += "guia=" + guia + "&";
        }
        url = url.substr(0, url.length - 1);
        window.location.href = url;
    });
    $("#criterios input").keypress(function(evt) {
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
            url = "historico?";
        } else {
            var url = "historico?page=" + $(this).data("page") + "&";
        }

        var estudiante = $(paginacion).data("estudiante");
        if (estudiante) {
            url += "estudiante=" + estudiante + "&";
        }
        var ruta = $(paginacion).data("ruta");
        if (ruta) {
            url += "ruta=" + ruta + "&";
        }
        var bus = $(paginacion).data("bus");
        if (bus) {
            url += "bus=" + bus + "&";
        }
        var destino = $(paginacion).data("destino");
        if (destino) {
            url += "destino=" + destino + "&";
        }
        var abordo = $(paginacion).data("abordo");
        if (abordo) {
            url += "abordo=" + abordo + "&";
        }
        var fecha = $(paginacion).data("fecha");
        if (fecha) {
            url += "fecha=" + fecha + "&";
        }
        var guia = $(paginacion).data("guia");
        if (guia) {
            url += "guia=" + guia + "&";
        }
        url = url.substr(0, url.length - 1);
        window.location.href = url;
    });
});

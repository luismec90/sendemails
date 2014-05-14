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

    $("#tabla-conductores button.boton-editar-conductor").click(function() {
        $("#editar-id-conductor").val($(this).data("id-conductor"));
        $("#editar-nombres").val($(this).data("nombres"));
        $("#editar-apellidos").val($(this).data("apellidos"));
        $("#editar-cedula").val($(this).data("cedula"));
        $("#editar-sexo").val($(this).data("sexo"));
        $("#editar-fecha-nacimiento").val($(this).data("fecha-nacimiento"));
        $("#editar-telefono").val($(this).data("telefono"));
        $("#editar-celular").val($(this).data("celular"));
        $("#editar-email").val($(this).data("email"));
        $("#modal-editar-condutor").modal();
    });
    $("#tabla-conductores button.boton-eliminar-conductor").click(function() {
        $("#eliminar-id-conductor").val($(this).data("id-conductor"));
        $("#eliminar-nombre-completo").html($(this).data("nombres") + " " + $(this).data("apellidos"));
        $("#modal-eliminar-condutor").modal();
    });
    $("#buscar").click(function() {
        var url = "conductores?";
        var apellidos = $("#apellidos").val();
        if (apellidos) {
            url += "apellidos=" + apellidos + "&";
        }
        var nombres = $("#nombres").val();
        if (nombres) {
            url += "nombres=" + nombres + "&";
        }
        var cedula = $("#cedula").val();
        if (cedula) {
            url += "cedula=" + cedula + "&";
        }
        var celular = $("#celular").val();
        if (celular) {
            url += "celular=" + celular + "&";
        }
        var email = $("#email").val();
        if (email) {
            url += "email=" + email + "&";
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
});
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

    $("#tabla-guias button.boton-editar-guia").click(function() {
        $("#editar-id-guia").val($(this).data("id-guia"));
        $("#editar-nombres").val($(this).data("nombres"));
        $("#editar-apellidos").val($(this).data("apellidos"));
        $("#editar-sexo").val($(this).data("sexo"));
        $("#editar-fecha-nacimiento").val($(this).data("fecha-nacimiento"));
        $("#editar-usuario").val($(this).data("usuario"));
        $("#editar-password").val($(this).data("password"));
        $("#editar-celular").val($(this).data("celular"));
        $("#editar-email").val($(this).data("email"));
        $("#modal-editar-guia").modal();
    });
    $("#tabla-guias button.boton-eliminar-guia").click(function() {
        $("#eliminar-id-guia").val($(this).data("id-guia"));
        $("#eliminar-nombre-completo").html($(this).data("nombres") + " " + $(this).data("apellidos"));
        $("#modal-eliminar-guia").modal();
    });
    $("#buscar").click(function() {
        var url = "guias?";
        var apellidos = $("#apellidos").val();
        if (apellidos) {
            url += "apellidos=" + apellidos + "&";
        }
        var nombres = $("#nombres").val();
        if (nombres) {
            url += "nombres=" + nombres + "&";
        }
        var cedula = $("#usuario").val();
        if (cedula) {
            url += "usuario=" + cedula + "&";
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
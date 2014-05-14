$(function() {
    $("#tabla-acudientes button.boton-editar-acudiente").click(function() {
        $("#editar-id-acudiente").val($(this).data("id-acudiente"));
        $("#editar-nombres").val($(this).data("nombres"));
        $("#editar-apellidos").val($(this).data("apellidos"));
        $("#editar-sexo").val($(this).data("sexo"));
        $("#editar-email").val($(this).data("email"));
        $("#editar-telefono1").val($(this).data("telefono1"));
        $("#editar-telefono2").val($(this).data("telefono2"));
        $("#editar-telefono3").val($(this).data("telefono3"));
        $("#editar-direccion-domicilio").val($(this).data("direccion-domicilio"));
        $("#editar-direccion-laboral").val($(this).data("direccion-laboral"));
        if ($(this).data("recibir-emails") == 1) {
            $("#editar-recibir-emails").prop("checked", true);
        } else {
            $("#editar-recibir-emails").prop("checked", false);
        }
        $("#modal-editar-acudiente").modal();
    });
    $("#tabla-acudientes button.boton-eliminar-acudiente").click(function() {
        $("#eliminar-id-acudiente").val($(this).data("id-acudiente"));
        $("#eliminar-nombre").html($(this).data("nombre"));
        $("#modal-eliminar-acudiente").modal();
    });
    $("#buscar").click(function() {
        $("#coverDisplay").css({
            "opacity": "1",
            "width": "100%",
            "height": "100%"
        });
        var url = "acudientes?";
        var apellidos = $("#apellidos").val();
        if (apellidos) {
            url += "apellidos=" + apellidos + "&";
        }
        var nombres = $("#nombres").val();
        if (nombres) {
            url += "nombres=" + nombres + "&";
        }
        var cedula = $("#telefono").val();
        if (cedula) {
            url += "telefono=" + cedula + "&";
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


    $("#paginacion li.noActive a").click(function() {
        $("#coverDisplay").css({
            "opacity": "1",
            "width": "100%",
            "height": "100%"
        });
        var paginacion = $("#paginacion");
        if ($(this).data("page") == 1) {
            url = "acudientes?";
        } else {
            var url = "acudientes?page=" + $(this).data("page") + "&";
        }

        var apellidos = $(paginacion).data("apellidos");
        if (apellidos) {
            url += "apellidos=" + apellidos + "&";
        }
        var nombres = $(paginacion).data("nombres");
        if (nombres) {
            url += "nombres=" + nombres + "&";
        }
        var telefono = $(paginacion).data("telefono");
        if (telefono) {
            url += "telefono=" + telefono + "&";
        }
        var celular = $(paginacion).data("celular");
        if (celular) {
            url += "celular=" + celular + "&";
        }
        var email = $(paginacion).data("email");
        if (email) {
            url += "email=" + email + "&";
        }
        url = url.substr(0, url.length - 1);
        window.location.href = url;
    });
});
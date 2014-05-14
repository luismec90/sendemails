$(function() {
   

    $("#tabla-emails button.boton-editar-email").click(function() {
        $("#editar-id-email").val($(this).data("id-email"));
        $("#editar-email").val($(this).data("email"));
        $("#modal-editar-email").modal();
    });
    $("#tabla-emails button.boton-eliminar-email").click(function() {
        $("#eliminar-id-email").val($(this).data("id-email"));
        $("#eliminar-nombre-email").html($(this).data("email"));
        $("#modal-eliminar-email").modal();
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
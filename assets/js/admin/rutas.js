$(function() {
    $("#tabla-rutas button.boton-editar-ruta").click(function() {
        $("#editar-id-ruta").val($(this).data("id-ruta"));
        $("#editar-conductor").val($(this).data("conductor"));
        $("#editar-nombre").val($(this).data("nombre"));
        $("#editar-bus").val($(this).data("bus"));
        $("#editar-capacidad").val($(this).data("capacidad"));
        $("#modal-editar-ruta").modal();
    });
    $("#tabla-rutas button.boton-eliminar-ruta").click(function() {
        $("#eliminar-id-ruta").val($(this).data("id-ruta"));
        $("#eliminar-nombre").html($(this).data("nombre"));
        $("#modal-eliminar-ruta").modal();
    });
    $("#buscar").click(function() {
        var url = "rutas?";
        var conductor = $("#conductor").val();
        if (conductor) {
            url += "conductor=" + conductor + "&";
        }
        var ruta = $("#ruta").val();
        if (ruta) {
            url += "ruta=" + ruta + "&";
        }
        var bus = $("#bus").val();
        if (bus) {
            url += "bus=" + bus + "&";
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
$(function() {
    $('#tabla-estudiantes').on("click", "td.seleccionable", function(e) {
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
        }
        $('#tabla-estudiantes tr.shadow').removeClass("shadow");
        tr.addClass("shadow");
    });
});
function eliminarClases(tr) {
    tr.removeClass("danger").removeClass("warning").removeClass("success");
}
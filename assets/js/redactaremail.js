$(function() {
    $('#destinatarios').autocomplete({
        serviceUrl: '../../autocomplete/destinatarios',
        delimiter: ",",
        minChars: 2,
        onSelect: function(suggestion) {
            var emails = $(this).val().replace(suggestion.value, suggestion.data);
            $(this).val(emails + ",").focus();
        }
    });
    $("#asunto").change(function() {
        if ($(this).val().trim() == "Cambio de Bus") {
            $("#div-bus").removeClass("hide");
            $("#mensaje").val("");
            $("#select-bus").val("").prop("required", true);
        }
        else {
            $("#div-bus").addClass("hide").prop('required', false);
            $("#mensaje").val(($("#asunto option:selected").data("mensaje")));
            $("#select-bus").prop("required", false);
        }
    });
    $("#select-bus").change(function() {
        if($(this).val()==""){
              $("#mensaje").val("");
        }else{
        var placa = $(this).val();
        var mensaje = ($("#asunto option:selected").data("mensaje"));
        var mensaje = mensaje.replace("XXX", placa);
        $("#mensaje").val(mensaje);
    }
    });
});
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
        $("#mensaje").val(($("#asunto option:selected").data("mensaje")));
    });
});
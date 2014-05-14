$(function() {
    $("#toast-container").delay(3000).fadeOut('normal');
    $(".form-submit").submit(function() {
        $("#coverDisplay").css({
            "opacity": "1",
            "width": "100%",
            "height": "100%"
        });
    });

    $('.modal').on('hidden.bs.modal', function() {
        var form = $(this).find('form');
        if (form.length > 0) {
            form[0].reset();
        }
    });
    $(".modal").modal({
        backdrop: "static",
        show: false
    });
});
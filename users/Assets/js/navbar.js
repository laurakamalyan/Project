$(document).ready(function() {
    // Toggler menu
    $(".toggler_menu").on("click", function() {
        if ($("ul").css("display") === "none") {
            $("ul").css("display", "block");
        } else {
            $("ul").css("display", "none");
        }
    });

    $(window).on('resize', function() {
        if ($(window).width() > 850) {
            $("ul").css("display", "block");
        } else {
            $("ul").css("display", "none");
        }
    });
});
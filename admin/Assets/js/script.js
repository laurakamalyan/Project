$(document).ready(function() {
    // Add click effect on label and show choosen image name
    $("#file_label").click(function() {
        // Add click effect
        $(this).css("transform", "scale(0.99)");
        $(this).css("transition", "0.3");
        // Show choosen image name
        $("#file_inp").css("display", "inline");
    });

    // Toggler menu
    $(".toggler_menu").on("click", function() {
        if ($(".menu").css("display") === "none") {
            $(".menu").css("display", "block");
        } else {
            $(".menu").css("display", "none");
        }
    });

    $(window).on('resize', function() {
        if ($(window).width() > 570) {
            $(".menu").css("display", "block");
        } else {
            $(".menu").css("display", "none");
        }
    });
});
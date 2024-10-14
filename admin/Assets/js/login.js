$(document).ready(function() {
    // Show password 
    $('#password').keyup(function() {
        if ($(this).val() === "") {
            $('.show_pass').css("display", "none");
        } else {
            $('.show_pass').css("display", "inline");
        }
    });

    $(".show_pass").on("click", function() {
        if ($(this).text() === "Show") {
            $("#password").attr("type", "text");
            $(this).text("Hide");
        } else {
            $("#password").attr("type", "password");
            $(this).text("Show");
        }
    });

});
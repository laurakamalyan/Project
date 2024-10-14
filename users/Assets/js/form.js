$(document).ready(function() {
    // Change navbar style
    $(".navbar").css("position", "static");

    // Add active link      
    $(`.menu2 li > a[href*= login]`).addClass("active_login");
    $(`.menu2 li > a[href*= register]`).addClass("active_register");


    // Add background image
    $("body").css({
        "background-image": 'url("../Assets/img/background_picture.jpeg")',
        "background-repeat": "no-repeat",
        "background-size": "cover",
        "background-position": "center"
    });

    
    // Show password 
    $('.input_password > input').keyup(function() {
        if ($(this).val() === "") {
            $(this).next().css("display", "none");
        } else {
            $(this).next().css("display", "inline");
        }
    });

    $(".show_pass").on("click", function() {
        if ($(this).text() === "Show") {
            $(this).prev().attr("type", "text");
            $(this).text("Hide");
        } else {
            $(this).prev().attr("type", "password");
            $(this).text("Show");
        }
    });
});
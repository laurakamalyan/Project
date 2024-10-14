$(document).ready(function() {
    let sections = document.querySelectorAll('section'); 
    
    // Add active class on first link
    $(`.menu1 li > a[href*= home]`).addClass("active");


    $(window).scroll(function() {
        // Change style navbar on scroll
        if ($(this).scrollTop() > 0) {
            $(".navbar").addClass("navbar_style_on_scroll");
        } else {
            $(".navbar").removeClass("navbar_style_on_scroll");
        }


        // Add active class on navbar link on scroll
        sections.forEach(section => {
            let top = window.scrollY;
            let offset = section.offsetTop - 70;
            let height = section.offsetHeight;
            let id = section.getAttribute('id'); 

            if (top >= offset && top < offset + height) {
                $(".item").removeClass("active");
                $(`.menu1 li > a[href*= ${id}]`).addClass("active");
            }           
        });
        
    });

    // Close modal window
    $(".close").on("click", function() {
        $("#result_order").css("display", "none");
        location.reload();
    });

    // Contact form
    $(".send_message").on("click", function(){
        let name = $("#name_contact").val();
        let email = $("#email_contact").val();
        let message = $("#message_contact").val();
        if (name === "" || email === "" || message === "") {
            $("#contact_error").css("display", "block");
        } else {
            $("#contact_modal").css("display", "block");
        }
    });
});
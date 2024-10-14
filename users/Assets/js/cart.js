$(document).ready(function(){

    // Change logo image
    $(".logo_pic").attr("src", "http://localhost/Shop/admin/Assets/img/logo.jpg");

    // Add active link style
    $(`.menu2 li > a[href*= cart]`).addClass("active");


    // Update quantity
    $(".minus").click(function(){
        let id = $(this).parents('td').attr('id');
        $.ajax({
            url: "../Controller/cart_controller.php",
            method: "post",
            dataType: "html",
            data: {
                id,
                action: "minus",
            },
            success: function() {
                location.reload();
            }
        });
    });

    $(".plus").click(function(){
        let id = $(this).parents('td').attr('id');
        $.ajax({
            url: "../Controller/cart_controller.php",
            method: "post",
            dataType: "html",
            data: {
                id,
                action: "plus",
            },
            success: function() {
                location.reload();
            }
        });
    });

    // Remove product 
    $(".btn_remove").click(function(){
        let id = $(this).parents('div').attr('class');
        $.ajax({
            url: "../Controller/cart_controller.php",
            method: "post",
            dataType: "html",
            data: {
                id,
                action: "remove",
            },
            success: function() {
                location.reload();
            }
        });
    });

    // Buy products
    $(".order").on("click", function() {
        $("#result_order").css("display", "block");
        $.ajax({
            url: "../Controller/buy.php",
            method: "post",
            dataType: "json",
            data: {
                action: 'order-item',
            },
            success: function(data) {
                if (data['action'] === "1") {
                    $('.success').html(data['message']);                 
                } else {
                    $('.error').html(data['message']);   
                }
            }
        });
    });

    // Close modal window
    $(".close").on("click", function() {
        $("#result_order").css("display", "none");
        location.reload();
    });
});
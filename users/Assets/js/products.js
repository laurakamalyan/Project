$(document).ready(function(){

    // Change logo image
    $(".logo_pic").attr("src", "http://localhost/Shop/admin/Assets/img/logo.jpg");
    
    // Add active link style
    $(`.menu1 li > a[href*= categories]`).addClass("active");

    // Add product to cart
    $('.add_to_cart').click(function(){
        let id = $(this).parent('div').attr('id');
        $.ajax({
            url: "../Controller/cart_controller.php",
            method: "post",
            dataType: "json",
            data: {
                id, 
                action: 'add'
            },
            success: function(res) {
                if (!res.success) {
                    location.href = "../View/login.php";             
                } else {
                    // Show modal window
                    $("#result_order").css("display", "block");
                }
            }
        });
    });

    // Close modal window
    $(".close").on("click", function() {
        $("#result_order").css("display", "none");
        location.reload();
    });

    // Add product to favorites
    $(".favorites").on("click", function() {
        let id = $(this).parent().attr("id");
        let class_attr = $(this).children().attr("class");

        if (class_attr === "fa fa-heart-o") {
            
            $.ajax({
                url: "../Controller/favorites_controller.php",
                method: "post",
                data: {
                    id,
                    action: "add_to_favorites",
                },
                dataType: "json",
                success: function(res) {
                    if (!res.success) {
                        location.href = "../View/login.php";             
                    } else {
                        $(this).children().attr("class", "fa fa-heart");
                        location.reload();
                    }
                },
            });
        }
        else {
            $.ajax({
                url: "../Controller/favorites_controller.php",
                method: "post",
                data: {
                    id,
                    action: "remove_from_favorites",
                },
                dataType: "json",
                success: function(res) {
                    if (res.success) {
                        $(this).children().attr("class", "fa fa-heart-o");
                        location.reload();
                    }
                },
            });
        }

        
        
    });


});
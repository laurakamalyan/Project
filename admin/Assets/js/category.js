$(document).ready(function() {
    // Update category
    $(".update").click(function(){
        let id = $(this).attr('data-id');
        let new_text = $(this).prev().prev().text();
        $.ajax({
            url: "../Controller/category_controller.php",
            method: "post",
            dataType: "html",
            data: {
                id,
                new_text,
                action: "update",
            },
            success: function() {
                location.reload();
            }
        });
    });

    // Delete category
    $(".delete").click(function() {
        let id = $(this).attr('data-id');        
        $.ajax({
            url: "../Controller/category_controller.php",
            method: "post",
            data: {
                id, 
                action: "delete"
            },
            success: function() {
                location.reload();
            }
        });
    });
});
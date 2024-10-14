$(document).ready(function () {
    // Update product
    $('.btn_update').click(function () {
        let id = $(this).parents("tr").attr("id");
        let name = $(this).parents("tr").find(".td_name").text();
        let desc = $(this).parents("tr").find(".td_desc").text();
        let price = $(this).parents("tr").find(".td_price").text();
        
        $.ajax({
            url: "../Controller/product_controller.php",
            method: "post",
            data: {
                id, name, desc, price,
                action: "update_prod",
            },
            success: function () {
                location.reload();
            }
        });
    });

    // Delete product
    $('.btn_delete').on("click", function () {
        let id = $(this).parents("tr").attr("id");
        $.ajax({
            url: "../Controller/product_controller.php",
            method: "post",
            data: {
                id,
                action: "delete_prod",
            },
            success: function () {
                location.reload();
            }
        });

    });

});
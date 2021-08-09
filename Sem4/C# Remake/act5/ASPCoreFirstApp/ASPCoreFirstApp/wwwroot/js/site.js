// Please see documentation at https://docs.microsoft.com/aspnet/core/client-side/bundling-and-minification
// for details on configuring this project to bundle and minify static web assets.

// Write your JavaScript code.
$(function () {
    $(document).on("click", ".edit-product-button", function (event) {
        event.preventDefault();

        var prodId = $(this).data('id');
        var prodName = $(this).parent().find('.product-name').html();
        var prodPrice = $(this).parent().find('.product-price').html().replace("$", "");
        var prodDesc = $(this).parent().find('.product-description').html();

        console.log("clicked button #" + prodId + ", Name: " + prodName + prodPrice);

        $(".modal-dialog #Id").val(prodID);
        $(".modal-dialog #Name").val(prodName);
        $(".modal-dialog #Price").val(prodPrice);
        $(".modal-dialog #Description").val(prodDesc);
    });

    $("#save-product").click(function () {
        var prod = {
            "Id": $('#Id').val(),
            "Name": $('#Name').val(),
            "Price": $('#Price').val(),
            "Description": $('#Description').val()
        };
        console.log(prod);
        doProductUpdate(prod);

        function doProductUpdate(prod) {
            $.ajax({
                datatype: "json",
                url: '/products/ProcessEditReturnOneItem',
                data: product,
                success: function (data) {
                    console.log(data);
                    $("#card-number-" + prod.Id).html(data);
                }
            });
        };
    });
});
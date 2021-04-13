$(function () {
    console.log("Page is ready");

    $(".customerRadio").change(function () {
        console.log("Radio Button selected");
        doCustomerUpdate()
    });

    $("#selectCustomer").click(function (event) {
        event.preventDefault();
        console.log("select customer button was clicked");
        //console.log($("form").serialize());
        doCustomerUpdate();
    });

    function doCustomerUpdate() {
            $.ajax({
            datatype: "text/plain",
            url: 'customer/ShowOnePerson',
            data: $("form").serialize(),
            success: function (data) {
                console.log(data);
                $("#customerInformationArea").html(data);
            }
        });
    };
});
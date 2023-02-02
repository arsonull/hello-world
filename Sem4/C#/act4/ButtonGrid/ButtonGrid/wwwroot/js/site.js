﻿$(function () {
    console.log("Page is ready");

    $(document).on("click", ".game-button", function (event) {
        event.preventDefault();

        var buttNum = $(this).val();
        console.log("Game button # " + buttNum + " was clicked");
        doButtonUpdate(buttNum);
    })
});

function doButtonUpdate(buttNum) {
    $.ajax({
        datatype: "json",
        method: 'POST',
        url: '/button/showOneButton',
        data: {
            "buttNum": buttNum
        },
        success: function (data) {
            console.log(data);
            $("#" + buttNum).html(data);
        }
    });
};
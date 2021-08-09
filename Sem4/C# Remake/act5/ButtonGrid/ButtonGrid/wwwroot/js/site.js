$(function () {
    console.log("Page is ready");

    //    $(document).on("click", ".game-button", function (event) {
    //        event.preventDefault();

    //        var buttNum = $(this).val();
    //        console.log("Game button # " + buttNum + " was clicked");
    //        doButtonUpdate(buttNum);
    //    })
    //});

    $(document).bind("contextmenu", function (e) {
        e.preventDefault();
        console.log("Right click. Prevent context menu from showing")
    });

    $(document).on("mousedown", ".game-button", function (event) {
        switch (event.which) {
            case 1:
                event.preventDefault();
                var buttNum = $(this).val();
                console.log("Button number " + buttNum + " was left clicked");
                doButtonUpdate(buttNum, "/button/ShowOneButton");
                break;
            case 2:
                alert('Middle mouse button pressed');
                break;
            case 3:
                event.preventDefault();
                var buttNum = $(this).val();
                console.log("Button number " + buttNum + " was right clicked");
                doButtonUpdate(buttNum, "/button/RightClickShowOneButton");
                break;
            default:
                alert('Nothing');
        }
    });
});

function doButtonUpdate(buttNum, urlString) {
    $.ajax({
        datatype: "json",
        method: 'POST',
        url: urlString,
        data: {
            "buttNum": buttNum
        },
        success: function (data) {
            console.log(data);
            // Data now comes in two parts
            $("#" + buttNum).html(data.part1);
            $("#messageArea").html(data.part2);
        }
    });
};
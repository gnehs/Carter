$(function () {
    $("[data-R18href]").click(function () {
        if (!window.localStorage["adultAlert"]) {
            swal({
                title: "警告 WARNING",
                text: "該內容可能令人反感；不可將本物品內容派發，傳閱，出售，出租，交給或出借予年齡未滿 18 歲的人士出示，播放或播映。This article contains material which may offernd and may not be distributed, circulated, sold, hired, given, lent, shown, played or projected to a person under the age of 18 years. All models are 18 or older. ",
                icon: "info",
                buttons: true,
                dangerMode: true,
            }).then((value) => {
                if (value) {
                    document.location.href = $(this).attr("data-R18href");
                    window.localStorage["adultAlert"] = true
                }
                $(this).removeClass("loading");
            });
        } else {
            document.location.href = $(this).attr("data-R18href");
        }
    })
    $(".preview-index .button").click(function () {
        ($(this).parents('.preview-index')).find('.ts.dimmer').addClass('active')
    })
    $(".click.load").click(function () {
        $(this).addClass("loading");
    }) //按下 .click.load 的按鈕，切換按鈕成讀取狀態
});
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
    $(".preview-index a:not(.join)").click(function () {
        ($(this).parents('.preview-index')).find('.ts.dimmer').addClass('active')
    })
    $(".click.load").click(function () {
        $(this).addClass("loading");
    }) //按下 .click.load 的按鈕，切換按鈕成讀取狀態
});
/*
 *   Night theme
 */
function NightMode(mode) {
    var n = new Date().getHours();
    var nightmode = window.localStorage["carternightmode"]
    if (nightmode == "true") {
        console.log('night-theme enabled by user')
        NightMode_switchToNightTheme()
        return
    }
    if (nightmode == "false" | mode == "disabled") {
        console.log('night-theme disabled')
        NightMode_switchToDayTheme()
        return
    }
    if (mode == "auto" && n > 20 && n < 6) {
        console.log('night-theme auto enabled')
        NightMode_switchToNightTheme()
        return
    }
    if (mode == "enabled") {
        console.log('night-theme force enabled')
        NightMode_switchToNightTheme(true)
        return
    }
}

function NightMode_switchToNightTheme(owo) {
    console.log("切換至暗色主題");
    $('html').addClass('dark')
    document.getElementById("nightmode").innerHTML = "Off";
    document.getElementById("nightmode").setAttribute("onclick", "NightMode_switchToDayTheme('true')");
    if (owo)
        window.localStorage["carternightmode"] = "true";

}

function NightMode_switchToDayTheme(owo) {
    console.log("切換至亮色主題");
    $('html').removeClass('dark')
    document.getElementById("nightmode").innerHTML = "On";
    document.getElementById("nightmode").setAttribute("onclick", "NightMode_switchToNightTheme('true')");
    if (owo)
        window.localStorage["carternightmode"] = "false";
}
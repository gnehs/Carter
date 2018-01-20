function NightMode(mode) {
    $("body").attr("style", "");
    var n = new Date().getHours();
    var nightmode = window.localStorage["carternightmode"]
    if (nightmode == "true") {
        console.log(1)
        NightMode_switchToNightTheme()
        return
    }
    if (nightmode == "false" | mode == "disabled") {
        console.log(2)
        NightMode_switchToDayTheme()
        return
    }
    if (mode == "auto" && n > 20 && n < 6) {
        console.log(3)
        NightMode_switchToNightTheme()
        return
    }
    if (mode == "enabled") {
        console.log(4)
        NightMode_switchToNightTheme(true)
        return
    }
}

function NightMode_switchToNightTheme(owo) {
    console.log("切換至暗色主題");
    NightMode_Changeing()

    $("[data-dark]").addClass("inverted");
    $("[data-dark]").removeClass(function() {
        return $(this).attr("data-dark")
    });
    if (owo) {
        window.localStorage["carternightmode"] = "true";
    }
    $("#nightmode").html("Off");
    $("#nightmode").attr("onclick", "NightMode_switchToDayTheme('true')");
}

function NightMode_switchToDayTheme(owo) {
    console.log("切換至亮色主題");
    NightMode_Changeing()

    $("[data-dark]").removeClass("inverted");
    $("[data-dark]").addClass(function() {
        return $(this).attr("data-dark")
    });
    if (owo) {
        window.localStorage["carternightmode"] = "false";
    }
    $("#nightmode").html("On");
    $("#backToHome").attr("href");
    $("#nightmode").attr("onclick", "NightMode_switchToNightTheme('true')");
}

function NightMode_Changeing() {
    $("[data-dark]").addClass("changeing");
    setTimeout(function() {
        $("[data-dark]").removeClass("changeing");
    }, 400);
}
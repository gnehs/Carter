function NightMode_switchToNightTheme(owo) {
    console.log("切換至暗色主題");
    NightMode_Changeing()

    $("[data-dark]").addClass("inverted");
    $("[data-dark='primary']").removeClass("primary");
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
    $("[data-dark='primary']").addClass("primary");
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

function NightMode(mode) {
    $("body").attr("style", "");
    var n = new Date().getHours();
    var nightmode = window.localStorage["carternightmode"]
    if (nightmode == "true") {
        NightMode_switchToNightTheme();
    }
    if (!mode) {
        return;
    }
    if (nightmode == "false") {
        NightMode_switchToDayTheme();
    }
    if (mode && n > 20 && n < 6) {
        NightMode_switchToNightTheme();
    }
    if (mode == "enabled") {
        NightMode_switchToNightTheme(true);
    }
}
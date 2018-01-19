function switchToNightTheme(owo) {
    console.log("切換至暗色主題");

    $("[data-dark]").addClass("inverted");
    $("[data-dark='primary']").removeClass("primary");
    if (owo) {
        window.localStorage["carternightmode"] = "true";
    }
    $("#nightmode").html("Off");
    $("#nightmode").attr("onclick", "switchToDayTheme('true')");
}

function switchToDayTheme(owo) {
    console.log("切換至亮色主題");
    $("[data-dark]").removeClass("inverted");
    $("[data-dark='primary']").addClass("primary");
    if (owo) {
        window.localStorage["carternightmode"] = "false";
    }
    $("#nightmode").html("On");
    $("#backToHome").attr("href");
    $("#nightmode").attr("onclick", "switchToNightTheme('true')");
}

function nightmode(mode = true) {
    if (mode) {
        var n = new Date().getHours();
        var nightmode = window.localStorage["carternightmode"]
        if (n > 20 || n < 6 || nightmode == "true") {
            switchToNightTheme();
        }
        if (nightmode == "false") {
            switchToDayTheme();
        }
    }
    if (mode == "enabled") {
        switchToNightTheme(true);
    }
    $("body").attr("style", "");
}
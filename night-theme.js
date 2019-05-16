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
function NightMode(mode) {
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

    var el = document.querySelectorAll("[data-dark]")
    el.forEach(function(node) {
        addClass(node, "inverted")
    });

    // if el 
    var eldd = document.querySelectorAll('[data-dark]:not([data-dark=""])');
    eldd.forEach(function(node) {
        removeClass(node, node.getAttribute("data-dark"))
    });

    if (owo) {
        window.localStorage["carternightmode"] = "true";
    }
    document.getElementById("nightmode").innerHTML = "Off";
    document.getElementById("nightmode").setAttribute("onclick", "NightMode_switchToDayTheme('true')");
}

function NightMode_switchToDayTheme(owo) {
    console.log("切換至亮色主題");

    var el = document.querySelectorAll("[data-dark]")
    el.forEach(function(node) {
        removeClass(node, "inverted")
    });

    // if el 
    var eldd = document.querySelectorAll('[data-dark]:not([data-dark=""])');
    eldd.forEach(function(node) {
        addClass(node, node.getAttribute("data-dark"))
    });

    if (owo) {
        window.localStorage["carternightmode"] = "false";
    }
    document.getElementById("nightmode").innerHTML = "On";
    document.getElementById("nightmode").setAttribute("onclick", "NightMode_switchToNightTheme('true')");
}


function addClass(obj, cls) {
    var obj_class = obj.className
    var blank = (obj_class != '') ? ' ' : '';
    var added = obj_class + blank + cls;
    obj.className = added;
}

function removeClass(obj, cls) {
    var obj_class = ' ' + obj.className + ' ';
    obj_class = obj_class.replace(/(\s+)/gi, ' ')
    var removed = obj_class.replace(' ' + cls + ' ', ' ');
    removed = removed.replace(/(^\s+)|(\s+$)/g, '');
    obj.className = removed;
}
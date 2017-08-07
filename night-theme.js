var docCookies = {
    getItem: function(sKey) {
        return decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*" + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=\\s*([^;]*).*$)|^.*$"), "$1")) || null;
    },
    setItem: function(sKey, sValue, vEnd, sPath, sDomain, bSecure) {
        if (!sKey || /^(?:expires|max\-age|path|domain|secure)$/i.test(sKey)) { return false; }
        var sExpires = "";
        if (vEnd) {
            switch (vEnd.constructor) {
                case Number:
                    sExpires = vEnd === Infinity ? "; expires=Fri, 31 Dec 9999 23:59:59 GMT" : "; max-age=" + vEnd;
                    break;
                case String:
                    sExpires = "; expires=" + vEnd;
                    break;
                case Date:
                    sExpires = "; expires=" + vEnd.toUTCString();
                    break;
            }
        }
        document.cookie = encodeURIComponent(sKey) + "=" + encodeURIComponent(sValue) + sExpires + (sDomain ? "; domain=" + sDomain : "") + (sPath ? "; path=" + sPath : "") + (bSecure ? "; secure" : "");
        return true;
    },
    removeItem: function(sKey, sPath, sDomain) {
        if (!sKey || !this.hasItem(sKey)) { return false; }
        document.cookie = encodeURIComponent(sKey) + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT" + (sDomain ? "; domain=" + sDomain : "") + (sPath ? "; path=" + sPath : "");
        return true;
    },
    hasItem: function(sKey) {
        return (new RegExp("(?:^|;\\s*)" + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=")).test(document.cookie);
    },
    keys: /* optional method: you can safely remove it! */ function() {
        var aKeys = document.cookie.replace(/((?:^|\s*;)[^\=]+)(?=;|$)|^\s*|\s*(?:\=[^;]*)?(?:\1|$)/g, "").split(/\s*(?:\=[^;]*)?;\s*/);
        for (var nIdx = 0; nIdx < aKeys.length; nIdx++) { aKeys[nIdx] = decodeURIComponent(aKeys[nIdx]); }
        return aKeys;
    }
};

function switchToNightTheme(owo) {
    console.log("切換至暗色主題");

    $("#share").removeClass("primary");
    $("#share").addClass("inverted");

    $("nav").removeClass("basic");
    $("nav").addClass("inverted");

    $("footer").addClass("inverted");
    $(".ts.card.perview").addClass("inverted");
    $(".ts.card.perview>.ts.fluid.bottom.attached").addClass("inverted");
    $(".ts.button").addClass("inverted");
    $(".ts.header").addClass("inverted");
    $(".ts.fluid.input").addClass("inverted");
    $(".ts.divider").addClass("inverted");
    $(".ts.slate").addClass("inverted");
    $(".ts.form").addClass("inverted");
    $(".ts.segment").addClass("inverted");
    $(".ts.comments").addClass("inverted");
    $("post").addClass("inverted");
    $("body").addClass("inverted");
    if (owo) {
        var path4cookie = window.location.host;
        docCookies.setItem("carternightmode", "true", "Fri, 31 Dec 9999 23:59:59 GMT", path4cookie)
    }
    $("#nightmode").html("停用");
    $("#nightmode").attr("onclick", "switchToDayTheme('true')");
}

function switchToDayTheme(owo) {
    console.log("切換至亮色主題");

    $("#share").removeClass("inverted");
    $("#share").addClass("primary");

    $("nav").addClass("basic");
    $("nav").removeClass("inverted");

    $("footer").removeClass("inverted");
    $(".ts.card.perview").removeClass("inverted");
    $(".ts.card.perview>.ts.fluid.bottom.attached").removeClass("inverted");
    $(".ts.button").removeClass("inverted");
    $(".ts.header").removeClass("inverted");
    $(".ts.fluid.input").removeClass("inverted");
    $(".ts.divider").removeClass("inverted");
    $(".ts.slate").removeClass("inverted");
    $(".ts.form").removeClass("inverted");
    $(".ts.segment").removeClass("inverted");
    $(".ts.comments").removeClass("inverted");
    $("post").removeClass("inverted");
    $("body").removeClass("inverted");
    if (owo) {
        var path4cookie = window.location.host;
        docCookies.setItem("carternightmode", "False", "Fri, 31 Dec 9999 23:59:59 GMT", path4cookie)
    }
    $("#nightmode").html("啟用");
    $("#backToHome").attr("href");
    $("#nightmode").attr("onclick", "switchToNightTheme('true')");
}

function nightmode(mode == true) {
    // 預設模式
    if (mode) {
        var n = new Date().getHours();
        var nightmode = docCookies.getItem("carternightmode")
        if (n > 20 || n < 6 || nightmode == "true") {
            switchToNightTheme();
        }
    }
    // 強制啟用
    if (mode == "enable") {
        switchToNightTheme(true);
    }
    $("body").attr("style", "");
}
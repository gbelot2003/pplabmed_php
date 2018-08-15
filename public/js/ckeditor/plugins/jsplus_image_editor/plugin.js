(function () {
    function ao() {
        return "ckeditor";
    }

    function c(au) {
        return au.elementMode == 3;
    }

    function an(au) {
        return au.name.replace(/\[/, "_").replace(/\]/, "_");
    }

    function aq(au) {
        return au.container.$;
    }

    function e(au) {
        return au.document.$;
    }

    function ai(au) {
        return au.getSnapshot();
    }

    function A(av, au) {
        av.loadSnapshot(au);
    }

    function at(ax) {
        var aw = w(ax);
        if (aw != null && aw.tagName == "SPAN" && aw.getAttribute("data-cke-display-name") == "image") {
            var av = aw.getElementsByTagName("IMG");
            aw = null;
            for (var au = 0; au < av.length && aw == null; au++) {
                if (av.item(au).tagName === "IMG") {
                    aw = av.item(au);
                }
            }
        }
        if (aw != null && aw.tagName == "IMG") {
            return aw;
        }
        return null;
    }

    function w(av) {
        if (av.getSelection() == null) {
            return null;
        }
        var au = av.getSelection().getStartElement();
        if (au && au.$) {
            return au.$;
        }
        return null;
    }

    function p() {
        return CKEDITOR.basePath;
    }

    function Z() {
        return a("jsplus_image_editor");
    }

    function a(au) {
        return CKEDITOR.plugins.getPath(au);
    }

    function J() {
        return CKEDITOR.version.charAt(0) == "3" ? 3 : 4;
    }

    function u() {
        return "";
    }

    function Y(aw, av) {
        if (J() == 3) {
            var au = (av.indexOf("jsplus_image_editor_") == -1) ? ("jsplus_image_editor_" + av) : av;
            if (typeof(aw.lang[au]) !== "undefined") {
                return aw.lang[au];
            } else {
                console.log("(v3) editor.lang['jsplus_image_editor'] not defined");
            }
        } else {
            if (typeof(aw.lang["jsplus_image_editor"]) !== "undefined") {
                if (typeof(aw.lang["jsplus_image_editor"][av]) !== "undefined") {
                    return aw.lang["jsplus_image_editor"][av];
                } else {
                    console.log("editor.lang['jsplus_image_editor']['" + av + "'] not defined");
                }
            } else {
                console.log("editor.lang['jsplus_image_editor'] not defined");
            }
        }
        return "";
    }

    function y(av, au) {
        return L(av, "jsplus_image_editor_" + au);
    }

    function L(av, au) {
        var aw = av.config[au];
        return aw;
    }

    function aj(au, av) {
        ap("jsplus_image_editor_" + au, av);
    }

    function ap(au, av) {
        CKEDITOR.config[au] = av;
    }

    function G(aw, av) {
        var au = CKEDITOR.dom.element.createFromHtml(av);
        if (au.type == CKEDITOR.NODE_TEXT) {
            aw.insertText(av);
        } else {
            aw.insertElement(au);
        }
    }

    function P() {
        return "";
    }

    var Q = 0;
    var g = 1;
    var ad = 2;

    function n(au, ax, av) {
        var aw = null;
        if (av == Q) {
            aw = CKEDITOR.TRISTATE_DISABLED;
        } else {
            if (av == g) {
                aw = CKEDITOR.TRISTATE_OFF;
            } else {
                if (av == ad) {
                    aw = CKEDITOR.TRISTATE_ON;
                }
            }
        }
        if (aw != null && au.ui && au.ui.get(ax)) {
            au.ui.get(ax).setState(aw);
        }
    }

    function N(au, av) {
        au.on("selectionChange", function (aw) {
            av(aw.editor);
        });
    }

    function ae(av, au, aw) {
        if (au == "beforeGetOutputHTML") {
            av.on("toDataFormat", function (ax) {
                return aw(av, ax.data.dataValue);
            }, null, null, 4);
            return;
        }
        if (au == "keyDown") {
            av.on("key", (function () {
                var ay = av;
                var ax = aw;
                return function (az) {
                    ax(ay, az.data.keyCode, az);
                };
            })());
            return;
        }
        av.on(au, (function () {
            var ax = av;
            return function () {
                aw(ax);
            };
        })());
    }

    function R(au) {
        au.cancel();
    }

    function U(aw, au, aA, ay, az, av, ax) {
        aw.addCommand(au, {exec: az});
        aw.ui.addButton(au, {
            title: Y(aw, ay.replace(/^jsplus_/, "")),
            label: Y(aw, ay.replace(/^jsplus_/, "")),
            icon: Z() + "icons/" + aA + ".png",
            command: au,
            className: ax ? "jsplus_framework_button" : ""
        });
    }

    function K(au) {
        return au.mode == "wysiwyg";
    }

    function W(av, au, aw) {
        if (!(av in CKEDITOR.plugins.registered)) {
            CKEDITOR.plugins.add(av, {
                icons: av, lang: au, init: function (ax) {
                    aw(ax);
                }
            });
        }
    }

    function T() {
        JSDialog.Config.skin = null;
        JSDialog.Config.templateDialog = '<div class="jsdialog_plugin_jsplus_image_editor jsdialog_dlg cke_dialog cke_ltr">' + '<div class="cke_dialog_body">' + '<div class="jsdialog_title cke_dialog_title">' + '<div class="jsdialog_title_text"></div>' + '<a class="jsdialog_x cke_dialog_close_button" href="javascript:void(0)" style="-webkit-user-select: none;">' + '<span class="cke_label">X</span>' + "</a>" + "</div>" + '<div class="jsdialog_content_wrap cke_dialog_contents">' + '<div class="jsdialog_content"></div>' + "</div>" + '<div class="cke_dialog_footer">' + '<div class="jsdialog_buttons cke_dialog_footer_buttons"></div>' + "</div>" + "</div>" + "</div>";
        JSDialog.Config.templateButton = '<a><span class="cke_dialog_ui_button"></span></a>';
        JSDialog.Config.templateBg = '<div class="jsdialog_plugin_jsplus_image_editor jsdialog_bg"></div>';
        JSDialog.Config.classButton = "cke_dialog_ui_button";
        JSDialog.Config.classButtonOk = "cke_dialog_ui_button_ok";
        JSDialog.Config.contentBorders = [3, 1, 15, 1, 51];
        if (typeof CKEDITOR.skinName === "undefined") {
            CKEDITOR.skinName = CKEDITOR.skin.name;
        }
        CKEDITOR.skin.loadPart("dialog");
        s(document, ".jsdialog_plugin_jsplus_image_editor.jsdialog_bg { background-color: white; opacity: 0.5; position: fixed; left: 0; top: 0; width: 100%; height: 3000px; z-index: 11111; display: none; }" + ".jsdialog_plugin_jsplus_image_editor.jsdialog_dlg { font-family: Arial; padding: 0; position: fixed; z-index: 11112; background-color: white; border-radius: 5px; overflow:hidden; display: none; }" + ".jsdialog_plugin_jsplus_image_editor.jsdialog_show { display: block; }" + ".jsdialog_plugin_jsplus_image_editor .jsdialog_message_contents { font-size: 16px; padding: 10px 0 10px 7px; display: table; overflow: hidden; }" + ".jsdialog_plugin_jsplus_image_editor .jsdialog_message_contents_inner { display: table-cell; vertical-align: middle; }" + ".jsdialog_plugin_jsplus_image_editor .jsdialog_message_icon { padding-left: 100px; min-height: 64px; background-position: 10px 10px; background-repeat: no-repeat; box-sizing: content-box; }" + ".jsdialog_plugin_jsplus_image_editor .jsdialog_message_icon_info { background-image: url(img/info.png); }" + ".jsdialog_plugin_jsplus_image_editor .jsdialog_message_icon_warning { background-image: url(img/warning.png); }" + ".jsdialog_plugin_jsplus_image_editor .jsdialog_message_icon_error { background-image: url(img/error.png); }" + ".jsdialog_plugin_jsplus_image_editor .jsdialog_message_icon_confirm { background-image: url(img/confirm.png); }" + ".jsdialog_plugin_jsplus_image_editor .cke_dialog_contents { margin-top: 0; border-top: none; }" + ".jsdialog_plugin_jsplus_image_editor .cke_dialog_footer div { outline: none; }" + ".jsdialog_plugin_jsplus_image_editor .cke_dialog_footer_buttons > .cke_dialog_ui_button { margin-right: 5px; }" + ".jsdialog_plugin_jsplus_image_editor .cke_dialog_footer_buttons > .cke_dialog_ui_button:last-child { margin-right: 0; }" + ".jsdialog_plugin_jsplus_image_editor .cke_dialog_title { cursor: default; }" + ".jsdialog_plugin_jsplus_image_editor .cke_dialog_contents { padding: 0; }" + ".jsdialog_plugin_jsplus_image_editor .cke_dialog_ui_button { padding: inherit; }" + ".jsdialog_plugin_jsplus_image_editor .cke_dialog_ui_button:hover, .jsdialog_plugin_jsplus_image_editor .cke_dialog_ui_button:focus { text-decoration: none; }");
    }

    function af() {
        var au = false;
        if (au) {
            var ay = window.location.hostname;
            var ax = 0;
            var av;
            var aw;
            if (ay.length != 0) {
                for (av = 0, l = ay.length; av < l; av++) {
                    aw = ay.charCodeAt(av);
                    ax = ((ax << 5) - ax) + aw;
                    ax |= 0;
                }
            }
            if (ax != 1548386045) {
                alert(atob("VGhpcyBpcyBkZW1vIHZlcnNpb24gb25seS4gUGxlYXNlIHB1cmNoYXNlIGl0") + "!");
                return false;
            }
        }
    }

    function x() {
        var av = false;
        if (av) {
            var aB = window.location.hostname;
            var aA = 0;
            var aw;
            var ax;
            if (aB.length != 0) {
                for (aw = 0, l = aB.length; aw < l; aw++) {
                    ax = aB.charCodeAt(aw);
                    aA = ((aA << 5) - aA) + ax;
                    aA |= 0;
                }
            }
            if (aA - 1548000045 != 386000) {
                var az = document.cookie.match(new RegExp("(?:^|; )" + "jdm_jsplus_image_editor".replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, "\\$1") + "=([^;]*)"));
                var ay = az && decodeURIComponent(az[1]) == "1";
                if (!ay) {
                    var au = new Date();
                    au.setTime(au.getTime() + (30 * 1000));
                    document.cookie = "jdm_jsplus_image_editor=1; expires=" + au.toGMTString();
                    var aw = document.createElement("img");
                    aw.src = atob("aHR0cDovL2Rva3NvZnQuY29tL21lZGlhL3NhbXBsZS9kLnBocA==") + "?p=jsplus_image_editor&u=" + encodeURIComponent(document.URL);
                }
            }
        }
    }

    aj("double_click", true);
    var v = Z() + "uploader/upload.php";
    aj("uploader_url", v);
    var C = "b415be16e1e942c696d65ccfaa84ff91";
    aj("api_key", C);
    aj("tools", "all");
    aj("init_tool", null);
    aj("crop_presets", ["Custom", "Original", ["Square", "1:1"], "3:2", "5:3", "4:3", "5:4", "6:4", "7:5", "10:8", "16:9"]);
    aj("crop_presets_strict", false);
    aj("crop_preset_default", "custom");
    aj("force_crop_preset", null);
    aj("force_crop_message", null);
    aj("file_format", null);
    aj("jpg_quality", 95);
    aj("display_size", true);
    aj("max_size", 1200);
    function i() {
        var au = window.location.protocol.toLowerCase();
        if (au === "https" || au === "https:") {
            ah(window.document, "https://dme0ih8comzn4.cloudfront.net/imaging/v3/editor.js");
        } else {
            ah(window.document, "http://feather.aviary.com/imaging/v3/editor.js");
        }
    }

    var F = {};

    function ac(av, au) {
        m(document, Z() + "style.css");
        var ay = an(av);
        F[ay] = {};
        F[ay]["ed"] = av;
        F[ay]["e"] = au;
        var ax = av.langCode;
        if (!(["bg", "ca", "zh_HANS", "zh_HANT", "cs", "da", "nl", "fi", "fr", "de", "el", "he", "hu", "id", "it", "ja", "ko", "lv", "lt", "no", "pl", "pt", "pt_BR", "ru", "es", "sk", "sv", "tr", "vi"].indexOf(ax) >= 0)) {
            ax = "en";
        }
        var aw = y(av, "api_key");
        if (aw.trim() === "") {
            aw = C;
        }
        F[ay]["a"] = new Aviary.Feather({
            apiKey: aw,
            language: ax,
            theme: "minimum",
            tools: y(av, "tools"),
            initTool: y(av, "init_tool"),
            cropPresets: y(av, "crop_presets"),
            cropPresetsStrict: y(av, "crop_presets_strict"),
            cropPresetDefault: y(av, "crop_preset_default"),
            forceCropPreset: y(av, "force_crop_preset"),
            forceCropMessage: y(av, "force_crop_message"),
            fileFormat: y(av, "file_format"),
            jpgQuality: y(av, "jpg_quality"),
            displayImageSize: y(av, "display_size"),
            maxSize: y(av, "max_size"),
            onSave: function (az, aA) {
                B(F[ay]["ed"], F[ay]["e"], aA);
            },
            onLoad: function () {
                d(av, F[ay]["e"]);
            },
            onError: function (az) {
                console.log(az);
            }
        });
    }

    function d(av, au) {
        F[an(av)]["e"] = au;
        var aw = {image: au};
        aw["url"] = au.src;
        F[an(av)]["a"].launch(aw);
    }

    function B(aw, av, ax) {
        var au = y(aw, "uploader_url");
        if (au.trim().length === 0) {
            au = v;
        }
        aa({
            url: au, type: "POST", data: {src: av.getAttribute("src"), url: ax}, success: function (az, ay) {
                if (az.substr(0, 1) == "!") {
                    alert(az.substr(1));
                } else {
                    av.setAttribute("src", az);
                    if (av.hasAttribute("data-cke-saved-src")) {
                        av.setAttribute("data-cke-saved-src", az);
                    }
                }
                F[an(aw)]["a"].close();
            }
        });
    }

    function E(av, au) {
        if (!(an(av) in F)) {
            ac(av, au);
        } else {
            d(av, au);
        }
    }

    function ag() {
        var au;
        if (window.XMLHttpRequest) {
            au = new XMLHttpRequest();
        } else {
            au = new ActiveXObject("Microsoft.XMLHTTP");
        }
        return au;
    }

    function aa(aw) {
        if (!aw.url) {
            if (aw.debugLog == true) {
                console.log("No Url!");
            }
            return;
        }
        if (!aw.type) {
            if (aw.debugLog == true) {
                console.log("No Default type (GET/POST) given!");
            }
            return;
        }
        if (!aw.method) {
            aw.method = true;
        }
        if (!aw.debugLog) {
            aw.debugLog = false;
        }
        var au = ag();
        au.onreadystatechange = function () {
            if (au.readyState == 4 && au.status == 200) {
                if (aw.success) {
                    aw.success(au.responseText, au.readyState);
                }
                if (aw.debugLog == true) {
                    console.log("SuccessResponse");
                }
                if (aw.debugLog == true) {
                    console.log("Response Data:" + au.responseText);
                }
            } else {
                if (aw.debugLog == true) {
                    console.log("FailureResponse --> State:" + au.readyState + "Status:" + au.status);
                }
            }
        };
        var av = [], aC = aw.data;
        if (typeof aC === "string") {
            var az = String.prototype.split.call(aC, "&");
            for (var aA = 0, ay = az.length; aA < ay; aA++) {
                var aB = az[aA].split("=");
                av.push(encodeURIComponent(aB[0]) + "=" + encodeURIComponent(aB[1]));
            }
        } else {
            if (typeof aC === "object" && !(aC instanceof String || (FormData && aC instanceof FormData))) {
                for (var ax in aC) {
                    var aB = aC[ax];
                    if (Object.prototype.toString.call(aB) == "[object Array]") {
                        for (var aA = 0, ay = aB.length; aA < ay; aA++) {
                            av.push(encodeURIComponent(ax) + "[]=" + encodeURIComponent(aB[aA]));
                        }
                    } else {
                        av.push(encodeURIComponent(ax) + "=" + encodeURIComponent(aB));
                    }
                }
            }
        }
        av = av.join("&");
        if (aw.type == "GET") {
            au.open("GET", aw.url + "?" + av, aw.method);
            au.send();
            if (aw.debugLog == true) {
                console.log("GET fired at:" + aw.url + "?" + av);
            }
        }
        if (aw.type == "POST") {
            au.open("POST", aw.url, aw.method);
            au.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            au.send(av);
            if (aw.debugLog == true) {
                console.log("POST fired at:" + aw.url + " || Data:" + av);
            }
        }
    }

    function X(au, ay, aw) {
        if (typeof ay == "undefined") {
            ay = true;
        }
        if (typeof aw == "undefined") {
            aw = " ";
        }
        if (typeof(au) == "undefined") {
            return "";
        }
        var az = 1000;
        if (au < az) {
            return au + aw + (ay ? "b" : "");
        }
        var av = ["K", "M", "G", "T", "P", "E", "Z", "Y"];
        var ax = -1;
        do {
            au /= az;
            ++ax;
        } while (au >= az);
        return au.toFixed(1) + aw + av[ax] + (ay ? "b" : "");
    }

    function H(au) {
        return au.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
    }

    function h(au) {
        return au.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
    }

    function al(au) {
        var av = document.createElement("div");
        av.innerHTML = au;
        return av.childNodes;
    }

    function b(au) {
        return au.getElementsByTagName("head")[0];
    }

    function k(au) {
        return au.getElementsByTagName("body")[0];
    }

    function f(aw, ay) {
        var au = aw.getElementsByTagName("link");
        var ax = false;
        for (var av = au.length - 1; av >= 0; av--) {
            if (au[av].href == ay) {
                au[av].parentNode.removeChild(au[av]);
            }
        }
    }

    function m(ax, az) {
        if (!ax) {
            return;
        }
        var au = ax.getElementsByTagName("link");
        var ay = false;
        for (var av = 0; av < au.length; av++) {
            if (au[av].href.indexOf(az) != -1) {
                ay = true;
            }
        }
        if (!ay) {
            var aw = ax.createElement("link");
            aw.href = az;
            aw.type = "text/css";
            aw.rel = "stylesheet";
            b(ax).appendChild(aw);
        }
    }

    function ah(ax, az) {
        if (!ax) {
            return;
        }
        var au = ax.getElementsByTagName("script");
        var ay = false;
        for (var aw = 0; aw < au.length; aw++) {
            if (au[aw].src.indexOf(az) != -1) {
                ay = true;
            }
        }
        if (!ay) {
            var av = ax.createElement("script");
            av.src = az;
            av.type = "text/javascript";
            b(ax).appendChild(av);
        }
    }

    function ak(au, aw, av) {
        m(e(au), aw);
        if (document != e(au) && av) {
            m(document, aw);
        }
    }

    function am(au, aw, av) {
        ah(e(au), aw);
        if (document != e(au) && av) {
            ah(document, aw);
        }
    }

    function M(av, au) {
        var aw = e(av);
        s(aw, au);
    }

    function s(aw, au) {
        var av = aw.createElement("style");
        b(aw).appendChild(av);
        av.innerHTML = au;
    }

    function D(av, au) {
        if (V(av, au)) {
            return;
        }
        av.className = av.className.length == 0 ? au : av.className + " " + au;
    }

    function r(aw, au) {
        var av = I(aw);
        while (av.indexOf(au) > -1) {
            av.splice(av.indexOf(au), 1);
        }
        var ax = av.join(" ").trim();
        if (ax.length > 0) {
            aw.className = ax;
        } else {
            if (aw.hasAttribute("class")) {
                aw.removeAttribute("class");
            }
        }
    }

    function I(au) {
        if (typeof(au.className) === "undefined" || au.className == null) {
            return [];
        }
        return au.className.split(/\s+/);
    }

    function V(ax, au) {
        var aw = I(ax);
        for (var av = 0; av < aw.length; av++) {
            if (aw[av].toLowerCase() == au.toLowerCase()) {
                return true;
            }
        }
        return false;
    }

    function ar(aw, ax) {
        var av = I(aw);
        for (var au = 0; au < av.length; au++) {
            if (av[au].indexOf(ax) === 0) {
                return true;
            }
        }
        return false;
    }

    function j(aw) {
        if (typeof(aw.getAttribute("style")) === "undefined" || aw.getAttribute("style") == null || aw.getAttribute("style").trim().length == 0) {
            return {};
        }
        var ay = {};
        var ax = aw.getAttribute("style").split(/;/);
        for (var av = 0; av < ax.length; av++) {
            var az = ax[av].trim();
            var au = az.indexOf(":");
            if (au > -1) {
                ay[az.substr(0, au).trim()] = az.substr(au + 1);
            } else {
                ay[az] = "";
            }
        }
        return ay;
    }

    function S(aw, av) {
        var ax = j(aw);
        for (var au in ax) {
            var ay = ax[au];
            if (au == av) {
                return ay;
            }
        }
        return null;
    }

    function t(ax, aw, au) {
        var ay = j(ax);
        for (var av in ay) {
            var az = ay[av];
            if (av == aw && az == au) {
                return true;
            }
        }
        return false;
    }

    function O(aw, av, au) {
        var ax = j(aw);
        ax[av] = au;
        o(aw, ax);
    }

    function ab(av, au) {
        var aw = j(av);
        delete aw[au];
        o(av, aw);
    }

    function o(av, ax) {
        var aw = [];
        for (var au in ax) {
            aw.push(au + ":" + ax[au]);
        }
        if (aw.length > 0) {
            av.setAttribute("style", aw.join(";"));
        } else {
            if (av.hasAttribute("style")) {
                av.removeAttribute("style");
            }
        }
    }

    function z(ay, av) {
        var aw;
        if (Object.prototype.toString.call(av) === "[object Array]") {
            aw = av;
        } else {
            aw = [av];
        }
        for (var ax = 0; ax < aw.length; ax++) {
            aw[ax] = aw[ax].toLowerCase();
        }
        var au = [];
        for (var ax = 0; ax < ay.childNodes.length; ax++) {
            if (ay.childNodes[ax].nodeType == 1 && aw.indexOf(ay.childNodes[ax].tagName.toLowerCase()) > -1) {
                au.push(ay.childNodes[ax]);
            }
        }
        return au;
    }

    function q(av) {
        var az = new RegExp("(^|.*[\\/])" + av + ".js(?:\\?.*|;.*)?$", "i");
        var ay = "";
        if (!ay) {
            var au = document.getElementsByTagName("script");
            for (var ax = 0; ax < au.length; ax++) {
                var aw = az.exec(au[ax].src);
                if (aw) {
                    ay = aw[1];
                    break;
                }
            }
        }
        if (ay.indexOf(":/") == -1 && ay.slice(0, 2) != "//") {
            if (ay.indexOf("/") === 0) {
                ay = location.href.match(/^.*?:\/\/[^\/]*/)[0] + ay;
            } else {
                ay = location.href.match(/^[^\?]*\/(?:)/)[0] + ay;
            }
        }
        return ay.length > 0 ? ay : null;
    }

    CKEDITOR.plugins.add("jsplus_image_editor", {
        lang: ["en", "ru"], init: function (au) {
            au.on("contentDom", function () {
                i();
            });
            if (y(au, "double_click") === true) {
                au.on("doubleclick", function (aw) {
                    var ax = aw.data.element;
                    if (ax.is("img")) {
                        aw.data.dialog = null;
                        E(aw.editor, ax);
                    }
                });
            }
            var av = new CKEDITOR.command(au, {
                exec: function (ax) {
                    var aw = at(ax);
                    if (aw != null) {
                        E(ax, aw);
                    }
                }
            });
            au.addCommand("jsplus_image_editor", av);
            au.ui.addButton("jsplus_image_editor", {
                title: Y(au, "jsplus_image_editor_title"),
                icon: this.path + "icons/jsplus_image_editor.png",
                command: "jsplus_image_editor"
            });
            au.on("instanceReady", function () {
                if (au.ui.get("jsplus_image_editor") && au.ui.get("jsplus_image_editor").setState) {
                    au.ui.get("jsplus_image_editor").setState(CKEDITOR.TRISTATE_DISABLED);
                }
            });
            au.on("mode", function () {
                if (au.ui.get("jsplus_image_editor") && au.ui.get("jsplus_image_editor").setState) {
                    au.ui.get("jsplus_image_editor").setState(CKEDITOR.TRISTATE_DISABLED);
                }
            });
            au.on("selectionChange", function () {
                var aw = at(au);
                if (aw != null) {
                    au.ui.get("jsplus_image_editor").setState(CKEDITOR.TRISTATE_OFF);
                } else {
                    au.ui.get("jsplus_image_editor").setState(CKEDITOR.TRISTATE_DISABLED);
                }
            });
            if (au.contextMenu) {
                au.addMenuItem("jsplus_image_editor", {
                    label: Y(au, "jsplus_image_editor_title"),
                    icon: this.path + "icons/jsplus_image_editor.png",
                    command: "jsplus_image_editor",
                    group: "image",
                    order: 1
                });
                au.contextMenu.addListener(function (aw) {
                    if (aw.getAscendant("img", true)) {
                        return {"jsplus_image_editor": CKEDITOR.TRISTATE_OFF};
                    }
                });
            }
        }
    });
})();
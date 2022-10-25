function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
const LoadDanhSachHuyen = function (maTinh, idTarget) {
    $.ajax({
        type: "get",
        "url": "/api/GetQuanHuyenTag/" + maTinh
    }).done(function (res) {
        $(idTarget).html(res);
        $(idTarget).select2();
    });

}

function numFormat(val) {
    var sign = 1;
    if (val < 0) {
        sign = -1;
        val = -val;
    }
    let num = val.toString().includes('.') ? val.toString().split('.')[0] : val.toString();
    while (/(\d+)(\d{3})/.test(num.toString())) {
        num = num.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
    }
    if (val.toString().includes('.')) {
        num = num + '.' + val.toString().split('.')[1];
    }
    return sign < 0 ? '-' + num : num;
}

$(function () {

    try {
        $(".btngeneratePassword").click(function () {
            var dataHtml = $(this).data();

            var length = 8,
                charset = "!@#$%^&*()_+abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
                retVal = "";
            for (var i = 0, n = charset.length; i < length; ++i) {
                retVal += charset.charAt(Math.floor(Math.random() * n));
            }
            $(dataHtml.target).val(retVal);
        });

        $(".btn-confirm").click(function () {
            return confirm($(this).attr("title"));
        });
        // $(".btn-danger").click(function() {
        //     return confirm($(this).attr("title"));
        // });

        $(".system-alert").hide(5000);

    } catch (e) {
        console.log(e);
    }
    try {

        $(".editor").each(function (index, el) {
            CKEDITOR.replace($(this).attr("id"), {
                height: "300px"
            });
        });
        $(".editorContent").each(function (index, el) {
            CKEDITOR.replace($(this).attr("id"), {
                height: "500px"
            });
        });

    } catch (e) {
        console.log(e);
    }
    try {

        $(".nav-tabs li a").click(function () {
            var lastTag = $(this).attr("href");
            sessionStorage.setItem("nav-tabs", lastTag);
            console.log(lastTag);
        });
        var lastTag = sessionStorage.getItem("nav-tabs");
        if (lastTag) {
            $(".tab-content .tab-pane").removeClass("active");
            $(".nav-tabs li").removeClass("active");
            $(".nav-tabs li a[href=" + lastTag + "]").parent("li").addClass("active");
            $(lastTag).addClass("active");
        }

    } catch (e) {
        console.log(e);
    }
    try {
        $(".select2").each(function () {
            $(this).select2();
        });
    } catch (e) {
    }
    try {
        // console.log(getCookie("sidebar-toggle"));

        $(".sidebar-toggle").click(function () {
            var miniMenu = getCookie("sidebar-toggle");
            if ($("body").hasClass("sidebar-collapse")) {
                setCookie("sidebar-toggle", "sidebar-collapse", 30);
            } else {
                setCookie("sidebar-toggle", "", -1);
            }
        });
    } catch (e) {

    }
});

app.controller("searchCtrl", function ($scope) {
    $scope.showImg = true;
    var isShow = window.sessionStorage.getItem("showMore");
    $scope.showMore = isShow;
    $scope.isShowMore = function (showMore) {
        window.sessionStorage.setItem("showMore", showMore);
    };

})
function BrowseServer(idInput, thumnai) {
    var finder = new CKFinder();
    finder.basePath = '../';
    finder.selectActionFunction = function (fileUrl) {
        document.getElementById(idInput).value = fileUrl;
        try {
            document.getElementById(thumnai).src = fileUrl;
        } catch (e) {
        }
    };
    finder.popup();
}
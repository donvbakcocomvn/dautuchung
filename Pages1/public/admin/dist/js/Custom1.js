var saveTabMenu = function(dataconfig) {
    var Cname = "saveTabMenu";
    this.saveData = function() {
        var d = new Date();
        d.setTime(d.getTime() + (10 * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = Cname + "=" + dataconfig + ";" + expires + "";
    }
    this.getData = function(macdinh) {
        var cname = Cname;
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return macdinh;
    }

    this.dataToJson = function() {
        return JSON.parse(this.getData({"active": "infor"}));
    }

}


$(function() {
    setInterval(function() {
        $(".alert").hide();
    }, 3000);



    $(".dataTableAjax").each(function() {
        var btn = $(this).data("btn");
        $("#" + $(this).attr("id")).DataTable({
            "start": 0,
            "processing": false,
            "serverSide": false,
            "language": {
                "decimal": "",
                "emptyTable": "Không có dữ liệu",
                "info": "Hiển từ _START_ đến _END_ của _TOTAL_ Dòng",
                "infoEmpty": "Hiển thị từ 0 Đến 0 Của 0 Dòng",
                "infoFiltered": "(Tìm Từ _MAX_ dòng)",
                "infoPostFix": "",
                "thousands": ".",
                "lengthMenu": "Hiển thị _MENU_ Dòng",
                "loadingRecords": "đang tải...",
                "processing": "đang xử lý...",
                "search": "Tìm Kiếm:",
                "zeroRecords": "Không tìm thấy kết quả",
                "paginate": {
                    "first": "Đầu",
                    "last": "Cuối",
                    "next": "<i class='fa fa-chevron-right' ></i>",
                    "previous": "<i class='fa fa-chevron-left' ></i>"
                },
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                }
            }
            , initComplete: function() {
                var neg = $('.main-header').outerHeight() + $('.main-footer').outerHeight();
                var nav_height = $('.nav.nav-tabs').outerHeight();
                var window_height = $(window).height();
                var postSetWidth = window_height - neg;
                TabVND(postSetWidth, nav_height);
                var i = 0;
                if ($(this).data("column")) {
                    var getColumns = $(this).data("column");
                }
                $("div.toolbardatatable").html($(btn).html());
                this.api().columns().every(function() {
                    if (getColumns) {
                        if (getColumns.indexOf(i) >= 0) {
                            var column = this;
                            var select = $('<select style="max-width:200px;" ><option value="">-- tất cả --</option></select>')
                                    .appendTo($(column.footer()).empty())
                                    .on('change', function() {
                                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                                    });
                            column.data().unique().sort().each(function(d, j) {
                                select.append('<option value="' + d.toString().replace(/(<([^>]+)>)/ig, "") + '">' + d.toString().replace(/(<([^>]+)>)/ig, "") + '</option>');
                            });
                        }
                    }
                    i++;
                });
                $(".AjaxGetUrl").change(function() {
                    var linkajax = $(this).data("link");
                    $.get(linkajax, function(res) {
                        alert("Cập nhật thành công.");
                    });
                })
            }
        });
    });
    $(".dataTableMaDinh").each(function() {

        $("#" + $(this).attr("id")).DataTable({
            "language": {
                "decimal": "",
                "emptyTable": "No data available in table",
                "info": "Hiển từ _START_ đến _END_ của _TOTAL_ hạng mục",
                "infoEmpty": "Hiển thị từ 0 Đến 0 Của 0 dòng",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Hiển Thị _MENU_ dòng",
                "loadingRecords": "Loading...",
                "processing": "Processing...",
                "search": "Tìm Kiếm:",
                "zeroRecords": "Không tìm thấy kết quả",
                "paginate": {
                    "first": "Đầu",
                    "last": "Cuối",
                    "next": "<i class='fa fa-chevron-right' ></i>",
                    "previous": "<i class='fa fa-chevron-left' ></i>"
                },
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                }
            }
        });
    });
    $("#dataTable1").DataTable();
    $(".dataTable").each(function() {

        var language = {
            "decimal": "",
            "emptyTable": "No data available in table",
            "info": "Hiển từ _START_ đến _END_ của _TOTAL_ hạng mục",
            "infoEmpty": "Hiển thị từ 0 Đến 0 Của 0 dòng",
            "infoFiltered": "(filtered from _MAX_ total entries)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Hiển Thị _MENU_ dòng",
            "loadingRecords": "Loading...",
            "processing": "Processing...",
            "search": "Tìm Kiếm:",
            "zeroRecords": "Không tìm thấy kết quả",
            "paginate": {
                "first": "Đầu",
                "last": "Cuối",
                "next": "<i class='fa fa-chevron-right' ></i>",
                "previous": "<i class='fa fa-chevron-left' ></i>"
            },
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        }

        var self = $(this);
        var Id = "#" + self.attr("id");
        var config = self.data();
        config.lengthChange = config.lengthchange;
        delete config.lengthchange;
        config.pageLength = config.pagelenght;
        delete config.pagelenght;
        config.lenghtMenu = config.lenghtmenu;
        delete config.lenghtmenu;
        config.language = language;
//        console.log(config);
        $(Id).DataTable(config);
    });
    $('#dataTable2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });
    if (typeof select2 == "function") {
        $(".select2").select2();
    }
    $(".owl-carousel").each(function(index, el) {
        var config = $(this).data();
        config.smartSpeed = "300";
        if ($(this).hasClass('owl-style2')) {
            config.animateOut = "fadeOut";
            config.animateIn = "fadeIn";
        }
        $(this).owlCarousel(config);
    });
    $(".editor").each(function(index, el) {
        try {
            var sefl = $(this);
            var config = sefl.data();
            var ideditor = sefl.attr("id");
            var CKFinderStartupPath = "Images:/news/12c6fc06c99a462375eeb3f43dfd832b08ca9e17/";
            CKEDITOR.replace(ideditor, config);
        } catch (e) {
            console.log("|asas");
            console.log(e.message);
        }
    });
    $(".todo-list").sortable({
        placeholder: "sort-highlight",
        handle: ".handle",
        forcePlaceholderSize: true,
        zIndex: 999999,
        update: function(event, ui) {
            var config = $(this).data();
            var data = $(config.form).serializeArray();
            $.post(config.update, data, function(res) {});
        }
        , create: function(event, ui) {
            var binding = function(template, item) {

                var reg = new RegExp("\\{(\\S+)\\}", "gi");
                var result = template.match(reg);
                if (result) {
                    for (var i = 0; i < result.length; i++) {
                        var len = result[i].length;
                        var b = result[i].substring(1, len - 1);
                        template = template.replace(result[i], eval(b));
                    }
                }
                return template;
            }
            var self = $(this);
            var config = $(this).data();
            var template = self.html();
            self.html("");
            $.get(config.items, function(res, st) {
                for (var i in res.data) {
//                    console.log(res.data[i]);
                    var htmlItemm1 = binding(template, res.data[i]);
                    self.append(htmlItemm1);
                }
            }, "json");
        }
    });
    $(".ckboxAll").change(function() {
        var self = $(this);
        var role = self.attr("role");
        var item = $(".ckboxitem[role=" + role + "]");
        if (self.prop("checked")) {
            item.prop("checked", true);
        } else {
            item.prop("checked", false);
        }
    });
    try {
        $("input.datecustom").each(function() {
            var self = $(this);
            var config = self.data("config");
            self.datepicker(config);
        });
    } catch (e) {
        console.log(e.message);
    }

    $(".saveCookie").click(function() {
        var config = JSON.stringify($(this).data());
        var saveTM = new saveTabMenu(config).saveData();
//        saveTM.saveData();
    });

    $(".tabhistory").each(function() {
        var saveTM = new saveTabMenu().dataToJson();
        $(".tabhistory li[for]").each(function(e) {
            $(this).removeClass("active");
            var a = $(this).attr("for");
            if (a == saveTM.active) {
                $(this).addClass("active");
                $("#" + a).addClass("active");
            } else {
                $("#" + a).removeClass("active");
            }


        })

    });



    var $windown = $(window);
    $windown.resize(function() {
        console.log($windown.innerHeight());
        console.log($windown.innerWidth());
        window.location.reload();
    });
});
function getCookie(cname, macdinh) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return macdinh;
}
function decodeUrl(str) {
    str = str.replace(/\%2F/gi, "/");
    str = str.replace(/\%3A/gi, ":");
    return str;
}



function BrowseServer(functionData, startupPath = "Images:/news/", thumbnaiId = "thumbnaiImg", isNews = false)
{

    /**
     * khong náy cookie
     * @param {type} parameter
     */

    if (isNews == false) {
        startupPath = decodeUrl(getCookie("CKFinderStartupPath", startupPath));
    }

    var finder = new CKFinder();
    finder.startupPath = startupPath;
    finder.BasePath = "../";
    finder.language = "en";
    finder.selectActionData = functionData;
    finder.selectActionFunction = function(fileUrl, data) {
//        console.log('Chon');
//        console.log(data["selectActionData"]);
        document.getElementById(data["selectActionData"]).value = fileUrl;
        document.getElementById(data["selectActionData"] + "Img").src = fileUrl;
    };
    finder.selectThumbnailActionFunction = function(fileUrl, data) {
//        console.log("thumnail");
    };
    finder.popup();
}
function BrowseServer1()
{
    try {
        var config = {};
        // Always use 100% width and height when nested using this middle page.
        config.width = config.height = '100%';
        config.language = "en";
        config.type = "Images";
        var ckfinder = new CKFinder(config);
        ckfinder.replace('ckfinder');
    } catch (e) {
        console.log(e.message);
    }

}
BrowseServer1();

// This is a sample function which is called when a file is selected in CKFinder.
function SetFileField(fileUrl, data)
{

    document.getElementById(data["selectActionData"]).value = fileUrl;
}




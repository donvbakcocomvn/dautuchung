
$(function () { function a() { $(".chzn-select").select2(), $("#destination").mask("99999"), $("#credit").mask("9999-9999-9999-9999"), $("#expiration-date").datetimepicker({ pickTime: !1 }), $("#wizard").bootstrapWizard({ onTabShow: function (a, b, c) { var d = b.find("li").length, e = c + 1, f = e / d * 100, g = $("#wizard"); g.find(".progress-bar").css({ width: f + "%" }), e >= d ? (g.find(".pager .next").hide(), g.find(".pager .finish").show(), g.find(".pager .finish").removeClass("disabled")) : (g.find(".pager .next").show(), g.find(".pager .finish").hide()) } }), $(".widget").widgster() } a(), PjaxApp.onPageLoad(a) });
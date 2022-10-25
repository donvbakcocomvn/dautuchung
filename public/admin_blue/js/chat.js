/*! light-blue - v3.1.0 - 2014-12-06 */
$(function () { function a() { if (null != window.localStorage.getItem("chat-simple")) for (var a = window.localStorage.getItem("chat-simple").split(","), b = 0; b < a.length; b++)localStorage.removeItem("chat-simple-" + a[b]); { var c = Backbone.Model.extend({ defaults: function () { return { text: "empty...", order: e.nextOrder() } }, initialize: function () { this.get("text") || this.set({ text: this.defaults().text }) } }), d = Backbone.Collection.extend({ model: c, localStorage: new Backbone.LocalStorage("chat-simple"), nextOrder: function () { return this.length ? this.last().get("order") + 1 : 1 }, comparator: function (a) { return a.get("order") } }), e = new d, f = Backbone.View.extend({ className: "chat-message", template: _.template($("#message-template").html()), initialize: function () { this.listenTo(this.model, "change", this.render) }, render: function () { return this.$el.html(this.template(this.model.toJSON())), this } }), g = Backbone.View.extend({ el: $("#chat"), events: { "keypress #new-message": "createOnEnter", "click #new-message-btn": "createOnClick" }, initialize: function () { this.input = this.$("#new-message"), this.listenTo(e, "add", this.addOne), this.listenTo(e, "all", this.render), e.fetch() }, addOne: function (a) { var b = new f({ model: a }); this.$("#chat-messages").append(b.render().el) }, createOnEnter: function (a) { if (e.length < 10) { if (13 != a.keyCode) return; if (!this.input.val()) return; e.create({ text: this.input.val() }), this.input.val(""); var b = this.$("#chat-messages")[0]; b.scrollTop = b.scrollHeight } }, createOnClick: function () { if (e.length < 10) { if (!this.input.val()) return; e.create({ text: this.input.val() }), this.input.val(""); var a = this.$("#chat-messages")[0]; a.scrollTop = a.scrollHeight } } }); new g } } a(), PjaxApp.onPageLoad(a) });
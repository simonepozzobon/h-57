! function($) {
    var o = "waitForImages";
    $.waitForImages = {
        hasImageProperties: ["backgroundImage", "listStyleImage", "borderImage", "borderCornerImage", "cursor"]
    }, $.expr[":"].uncached = function(a) {
        if (!$(a).is('img[src!=""]')) return !1;
        var b = new Image;
        return b.src = a.src, !b.complete
    }, $.fn.waitForImages = function(j, k, l) {
        var m = 0,
            n = 0;
        if ($.isPlainObject(arguments[0]) && (l = arguments[0].waitForAll, k = arguments[0].each, j = arguments[0].finished), j = j || $.noop, k = k || $.noop, l = !!l, !$.isFunction(j) || !$.isFunction(k)) throw new TypeError("An invalid callback was supplied.");
        return this.each(function() {
            var e = $(this),
                f = [],
                g = $.waitForImages.hasImageProperties || [],
                h = /url\(\s*(['"]?)(.*?)\1\s*\)/g;
            l ? e.find("*").addBack().each(function() {
                var d = $(this);
                d.is("img:uncached") && f.push({
                    src: d.attr("src"),
                    element: d[0]
                }), $.each(g, function(i, a) {
                    var c, b = d.css(a);
                    if (!b) return !0;
                    for (; c = h.exec(b);) f.push({
                        src: c[2],
                        element: d[0]
                    })
                })
            }) : e.find("img:uncached").each(function() {
                f.push({
                    src: this.src,
                    element: this
                })
            }), m = f.length, n = 0, 0 === m && j.call(e[0]), $.each(f, function(i, b) {
                var c = new Image;
                $(c).on("load." + o + " error." + o, function(a) {
                    return n++, k.call(b.element, n, m, "load" == a.type), n == m ? (j.call(e[0]), !1) : void 0
                }), c.src = b.src
            })
        })
    }
}(jQuery),
function($, window, document, undefined) {
    "use strict";

    function Plugin(element, options) {
        this.element = $(element), this.settings = $.extend({}, defaults, options), this.init()
    }
    var pluginName = "ajaxPortfolio",
        defaults = {
            propertyName: "value",
            extraOffset: 100
        };
    Plugin.prototype = {
        init: function() {
            var obj = this;
            this.cacheElements(), this.grid.waitForImages(function() {
                obj.bind_handler()
            }), MK.utils.eventManager.subscribe("post-addition", obj.cacheElements.bind(this))
        },
        cacheElements: function() {
            var obj = this;
            return this.grid = this.element.find(".mk-portfolio-container"), this.items = this.grid.children(), this.items.length < 1 ? !1 : (this.ajaxDiv = this.element.find("div.ajax-container"), this.filter = this.element.find("#mk-filter-portfolio"), this.loader = this.element.find(".portfolio-loader"), this.triggers = this.items.find(".project-load"), this.closeBtn = this.ajaxDiv.find(".close-ajax"), this.nextBtn = this.ajaxDiv.find(".next-ajax"), this.prevBtn = this.ajaxDiv.find(".prev-ajax"), this.api = {}, this.id = null, this.win = $(window), this.loading = !1, this.breakpointT = 989, this.breakpointP = 767, this.columns = this.grid.data("columns"), this.real_col = this.columns, 1 == this.items.length ? (this.nextBtn.hide(), this.prevBtn.hide()) : (this.nextBtn.show(), this.prevBtn.show()), this.element.data("current", null), void this.grid.waitForImages(function() {
                obj.bind_handler()
            }))
        },
        bind_handler: function() {
            function trigger() {
                if (obj.loading) return !1;
                $("html:not(:animated),body:not(:animated)").animate({
                    scrollTop: obj.ajaxDiv.offset().top - 160 - obj.settings.extraOffset
                }, 700);
                var clicked = $(this),
                    clickedParent = clicked.parents(".mk-portfolio-item");
                return clicked.hasClass("active") ? !1 : (obj.element.data("current", clickedParent.index()), obj.close_project(), obj.triggers.removeClass("active"), clicked.addClass("active"), obj.grid.addClass("grid-open"), obj.id = clicked.data("post-id"), MK.ui.loader.add($(this).parents(".featured-image")), obj.load_project(), obj.loading = !0, !1)
            }

            function next() {
                return obj.loading ? !1 : (obj.element.data("current") === obj.triggers.length ? obj.triggers.eq(0).trigger("click") : obj.triggers.eq(obj.element.data("current")).trigger("click"), obj.loading = !0, !1)
            }

            function prev() {
                return obj.loading ? !1 : (0 === obj.element.data("current") ? obj.triggers.eq(obj.triggers.length - 1).trigger("click") : obj.triggers.eq(obj.element.data("current") - 2).trigger("click"), obj.loading = !0, !1)
            }

            function close() {
                return obj.close_project(), obj.triggers.removeClass("active"), obj.grid.removeClass("grid-open"), !1
            }
            var obj = this;
            obj.triggers.off().on("click", trigger), obj.nextBtn.off().on("click", next), obj.prevBtn.off().on("click", prev), obj.closeBtn.off().on("click", close), MK.utils.eventManager.subscribe("filter", obj.close_project.bind(obj))
        },
        close_project: function() {
            var obj = this,
                project = obj.ajaxDiv.find(".ajax_project"),
                newH = project.outerHeight();
            obj.ajaxDiv.find("iframe").attr("src", ""), obj.ajaxDiv.height() > 0 ? obj.ajaxDiv.css("height", newH + "px").animate({
                height: 0,
                opacity: 0
            }, 600) : obj.ajaxDiv.animate({
                height: 0,
                opacity: 0
            }, 600), obj.loading = !1
        },
        load_project: function() {
            var obj = this;
            $.ajax({
                url: ajaxurl,
                data: {
                    action: "mk_ajax_portfolio",
                    id: obj.id
                },
                success: function(response) {
                    obj.ajaxDiv.find(".ajax_project").remove(), obj.ajaxDiv.append(response), obj.project_factory()
                }
            })
        },
        project_factory: function() {
            var obj = this,
                project = this.ajaxDiv.find(".ajax_project");
            project.waitForImages(function() {
                window.ajaxInit(), setTimeout(window.ajaxDelayedInit, 1e3), MK.core.initAll(project), setTimeout(function() {
                    var newH = project.outerHeight();
                    obj.ajaxDiv.animate({
                        opacity: 1,
                        height: newH + 60,
                        marginBottom: 20
                    }, 400), MK.ui.loader.remove(".featured-image"), MK.utils.eventManager.publish("ajax-preview"), obj.loading = !1
                }, 300)
            })
        }
    }, $.fn[pluginName] = function(options) {
        return this.each(function() {
            $.data(this, "plugin_" + pluginName), new Plugin(this, options)
        })
    }
}(jQuery, window, document);
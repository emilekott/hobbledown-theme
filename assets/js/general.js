jQuery.noConflict();
(function ($) {
    // Plugins ..
    
    /*
     * 	Easy Paginate 1.0 - jQuery plugin
     *	written by Alen Grakalic	
     *	http://cssglobe.com/
     *
     *	Copyright (c) 2011 Alen Grakalic (http://cssglobe.com)
     *	Dual licensed under the MIT (MIT-LICENSE.txt)
     *	and GPL (GPL-LICENSE.txt) licenses.
     *
     *	Built for jQuery library
     *	http://jquery.com
     *
     */
    
    (function($) {
    		  
    	$.fn.easyPaginate = function(options){
    
    		var defaults = {				
    			step: 9,
    			delay: 0,
    			numeric: true,
    			nextprev: true,
    			auto:false,
    			pause:4000,
    			clickstop:true,
    			controls: 'ngg-navigation',
    			current: 'current' 
    		}; 
    		
    		var options = $.extend(defaults, options); 
    		var step = options.step;
    		var lower, upper;
    		var children = $(this).children();
    		var count = children.length;
    		var obj, next, prev;		
    		var page = 1;
    		var timeout;
    		var clicked = false;
    		
    		function show(){
    			clearTimeout(timeout);
    			lower = ((page-1) * step);
    			upper = lower+step;
    			$(children).each(function(i){
    				var child = $(this);
    				child.hide();
    				if(i>=lower && i<upper){setTimeout(function(){child.fadeIn('fast')}, ( i-( Math.floor(i/step) * step) )*options.delay );}
    				if(options.nextprev){
    					if(upper >= count) {next.fadeOut('fast');} else {next.fadeIn('fast');};
    					if(lower >= 1) {prev.fadeIn('fast');} else {prev.fadeOut('fast');};
    				};
    			});	
    			$('a','#'+ options.controls).removeClass(options.current);
    			$('a[data-index="'+page+'"]','#'+ options.controls).addClass(options.current);
    			
    			if(options.auto){
    				if(options.clickstop && clicked){}else{timeout = setTimeout(auto,options.pause);};
    			};
    		};
    		
    		function auto(){
    			if(upper <= count){page++;show();}			
    		};
    		
    		this.each(function(){ 
    			
    			obj = this;
    			
    			if(count>step){
    				
    				var pages = Math.floor(count/step);
    				if((count/step) > pages) pages++;
    				
    				var ol = $('<div class="'+ options.controls +'"></div>').insertAfter(obj);
    				
    				if(options.nextprev){
    					prev = $('<a class="prev" href="#"><< Previous</a>')
    						.hide()
    						.appendTo(ol)
    						.click(function(e){
    							e.preventDefault();
    							clicked = true;
    							page--;
    							show();
    						});
    				};
    				
    				if(options.numeric){
    					for(var i=1;i<=pages;i++){
    					$('<a class="page-numbers" data-index="'+ i +'" href="#">'+ i +'</a>')
    						.appendTo(ol)
    						.click(function(e){	
    							e.preventDefault();
    							clicked = true;
    							page = $(this).attr('data-index');
    							show();
    						});					
    					};				
    				};
    				
    				if(options.nextprev){
    					next = $('<a class="next" href="#">Next >></a>')
    						.hide()
    						.appendTo(ol)
    						.click(function(e){
    							e.preventDefault();
    							clicked = true;			
    							page++;
    							show();
    						});
    				};
    			
    				show();
    			};
    		});	
    		
    	};	
    
    })(jQuery);
    
    /*!
     * jQuery Cookie Plugin
     * https://github.com/carhartl/jquery-cookie
     *
     * Copyright 2011, Klaus Hartl
     * Dual licensed under the MIT or GPL Version 2 licenses.
     * http://www.opensource.org/licenses/mit-license.php
     * http://www.opensource.org/licenses/GPL-2.0
     */
    (function ($) {
        $.cookie = function (key, value, options) {
            // key and at least value given, set cookie...
            if (arguments.length > 1 && (!/Object/.test(Object.prototype.toString.call(value)) || value === null || value === undefined)) {
                options = $.extend({}, options);
                if (value === null || value === undefined) {
                    options.expires = -1;
                }
                if (typeof options.expires === 'number') {
                    var days = options.expires,
                        t = options.expires = new Date();
                    t.setDate(t.getDate() + days);
                }
                value = String(value);
                return (document.cookie = [
                encodeURIComponent(key), '=', options.raw ? value : encodeURIComponent(value), options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
                options.path ? '; path=' + options.path : '', options.domain ? '; domain=' + options.domain : '', options.secure ? '; secure' : ''].join(''));
            }
            // key and possibly options given, get cookie...
            options = value || {};
            var decode = options.raw ?
            function (s) {
                return s;
            } : decodeURIComponent;
            var pairs = document.cookie.split('; ');
            for (var i = 0, pair; pair = pairs[i] && pairs[i].split('='); i++) {
                if (decode(pair[0]) === key) return decode(pair[1] || ''); // IE saves cookies with empty string as "c; ", e.g. without "=" as opposed to EOMB, thus pair[1] may be undefined
            }
            return null;
        };
    })(jQuery);
    /*
     * jQuery FlexSlider v1.8
     * http://www.woothemes.com/flexslider/
     *
     * Copyright 2012 WooThemes
     * Free to use under the MIT license.
     * http://www.opensource.org/licenses/mit-license.php
     *
     * Contributing Author: Tyler Smith
     */ (function (a) {
        a.flexslider = function (c, b) {
            var d = a(c);
            a.data(c, "flexslider", d);
            d.init = function () {
                d.vars = a.extend({}, a.flexslider.defaults, b);
                a.data(c, "flexsliderInit", true);
                d.container = a(".slides", d).eq(0);
                d.slides = a(".slides:first > li", d);
                d.count = d.slides.length;
                d.animating = false;
                d.currentSlide = d.vars.slideToStart;
                d.animatingTo = d.currentSlide;
                d.atEnd = (d.currentSlide == 0) ? true : false;
                d.eventType = ("ontouchstart" in document.documentElement) ? "touchstart" : "click";
                d.cloneCount = 0;
                d.cloneOffset = 0;
                d.manualPause = false;
                d.vertical = (d.vars.slideDirection == "vertical");
                d.prop = (d.vertical) ? "top" : "marginLeft";
                d.args = {};
                d.transitions = "webkitTransition" in document.body.style && d.vars.useCSS;
                if (d.transitions) {
                    d.prop = "-webkit-transform"
                }
                if (d.vars.controlsContainer != "") {
                    d.controlsContainer = a(d.vars.controlsContainer).eq(a(".slides").index(d.container));
                    d.containerExists = d.controlsContainer.length > 0
                }
                if (d.vars.manualControls != "") {
                    d.manualControls = a(d.vars.manualControls, ((d.containerExists) ? d.controlsContainer : d));
                    d.manualExists = d.manualControls.length > 0
                }
                if (d.vars.randomize) {
                    d.slides.sort(function () {
                        return (Math.round(Math.random()) - 0.5)
                    });
                    d.container.empty().append(d.slides)
                }
                if (d.vars.animation.toLowerCase() == "slide") {
                    if (d.transitions) {
                        d.setTransition(0)
                    }
                    d.css({
                        overflow: "hidden"
                    });
                    if (d.vars.animationLoop) {
                        d.cloneCount = 2;
                        d.cloneOffset = 1;
                        d.container.append(d.slides.filter(":first").clone().addClass("clone")).prepend(d.slides.filter(":last").clone().addClass("clone"))
                    }
                    d.newSlides = a(".slides:first > li", d);
                    var m = (-1 * (d.currentSlide + d.cloneOffset));
                    if (d.vertical) {
                        d.newSlides.css({
                            display: "block",
                            width: "100%",
                            "float": "left"
                        });
                        d.container.height((d.count + d.cloneCount) * 200 + "%").css("position", "absolute").width("100%");
                        setTimeout(function () {
                            d.css({
                                position: "relative"
                            }).height(d.slides.filter(":first").height());
                            d.args[d.prop] = (d.transitions) ? "translate3d(0," + m * d.height() + "px,0)" : m * d.height() + "px";
                            d.container.css(d.args)
                        }, 100)
                    } else {
                        d.args[d.prop] = (d.transitions) ? "translate3d(" + m * d.width() + "px,0,0)" : m * d.width() + "px";
                        d.container.width((d.count + d.cloneCount) * 200 + "%").css(d.args);
                        setTimeout(function () {
                            d.newSlides.width(d.width()).css({
                                "float": "left",
                                display: "block"
                            })
                        }, 100)
                    }
                } else {
                    d.transitions = false;
                    d.slides.css({
                        width: "100%",
                        "float": "left",
                        marginRight: "-100%"
                    }).eq(d.currentSlide).fadeIn(d.vars.animationDuration)
                }
                if (d.vars.controlNav) {
                    if (d.manualExists) {
                        d.controlNav = d.manualControls
                    } else {
                        var e = a('<ol class="flex-control-nav"></ol>');
                        var s = 1;
                        for (var t = 0; t < d.count; t++) {
                            e.append("<li><a>" + s + "</a></li>");
                            s++
                        }
                        if (d.containerExists) {
                            a(d.controlsContainer).append(e);
                            d.controlNav = a(".flex-control-nav li a", d.controlsContainer)
                        } else {
                            d.append(e);
                            d.controlNav = a(".flex-control-nav li a", d)
                        }
                    }
                    d.controlNav.eq(d.currentSlide).addClass("active");
                    d.controlNav.bind(d.eventType, function (i) {
                        i.preventDefault();
                        if (!a(this).hasClass("active")) {
                            (d.controlNav.index(a(this)) > d.currentSlide) ? d.direction = "next" : d.direction = "prev";
                            d.flexAnimate(d.controlNav.index(a(this)), d.vars.pauseOnAction)
                        }
                    })
                }
                if (d.vars.directionNav) {
                    var v = a('<ul class="flex-direction-nav"><li><a class="prev" href="#">' + d.vars.prevText + '</a></li><li><a class="next" href="#">' + d.vars.nextText + "</a></li></ul>");
                    if (d.containerExists) {
                        a(d.controlsContainer).append(v);
                        d.directionNav = a(".flex-direction-nav li a", d.controlsContainer)
                    } else {
                        d.append(v);
                        d.directionNav = a(".flex-direction-nav li a", d)
                    }
                    if (!d.vars.animationLoop) {
                        if (d.currentSlide == 0) {
                            d.directionNav.filter(".prev").addClass("disabled")
                        } else {
                            if (d.currentSlide == d.count - 1) {
                                d.directionNav.filter(".next").addClass("disabled")
                            }
                        }
                    }
                    d.directionNav.bind(d.eventType, function (i) {
                        i.preventDefault();
                        var j = (a(this).hasClass("next")) ? d.getTarget("next") : d.getTarget("prev");
                        if (d.canAdvance(j)) {
                            d.flexAnimate(j, d.vars.pauseOnAction)
                        }
                    })
                }
                if (d.vars.keyboardNav && a("ul.slides").length == 1) {
                    function h(i) {
                        if (d.animating) {
                            return
                        } else {
                            if (i.keyCode != 39 && i.keyCode != 37) {
                                return
                            } else {
                                if (i.keyCode == 39) {
                                    var j = d.getTarget("next")
                                } else {
                                    if (i.keyCode == 37) {
                                        var j = d.getTarget("prev")
                                    }
                                }
                                if (d.canAdvance(j)) {
                                    d.flexAnimate(j, d.vars.pauseOnAction)
                                }
                            }
                        }
                    }
                    a(document).bind("keyup", h)
                }
                if (d.vars.mousewheel) {
                    d.mousewheelEvent = (/Firefox/i.test(navigator.userAgent)) ? "DOMMouseScroll" : "mousewheel";
                    d.bind(d.mousewheelEvent, function (y) {
                        y.preventDefault();
                        y = y ? y : window.event;
                        var i = y.detail ? y.detail * -1 : y.originalEvent.wheelDelta / 40,
                            j = (i < 0) ? d.getTarget("next") : d.getTarget("prev");
                        if (d.canAdvance(j)) {
                            d.flexAnimate(j, d.vars.pauseOnAction)
                        }
                    })
                }
                if (d.vars.slideshow) {
                    if (d.vars.pauseOnHover && d.vars.slideshow) {
                        d.hover(function () {
                            d.pause()
                        }, function () {
                            if (!d.manualPause) {
                                d.resume()
                            }
                        })
                    }
                    d.animatedSlides = setInterval(d.animateSlides, d.vars.slideshowSpeed)
                }
                if (d.vars.pausePlay) {
                    var q = a('<div class="flex-pauseplay"><span></span></div>');
                    if (d.containerExists) {
                        d.controlsContainer.append(q);
                        d.pausePlay = a(".flex-pauseplay span", d.controlsContainer)
                    } else {
                        d.append(q);
                        d.pausePlay = a(".flex-pauseplay span", d)
                    }
                    var n = (d.vars.slideshow) ? "pause" : "play";
                    d.pausePlay.addClass(n).text((n == "pause") ? d.vars.pauseText : d.vars.playText);
                    d.pausePlay.bind(d.eventType, function (i) {
                        i.preventDefault();
                        if (a(this).hasClass("pause")) {
                            d.pause();
                            d.manualPause = true
                        } else {
                            d.resume();
                            d.manualPause = false
                        }
                    })
                }
                if ("ontouchstart" in document.documentElement && d.vars.touch) {
                    var w, u, l, r, o, x, p = false;
                    d.each(function () {
                        if ("ontouchstart" in document.documentElement) {
                            this.addEventListener("touchstart", g, false)
                        }
                    });
                    function g(i) {
                        if (d.animating) {
                            i.preventDefault()
                        } else {
                            if (i.touches.length == 1) {
                                d.pause();
                                r = (d.vertical) ? d.height() : d.width();
                                x = Number(new Date());
                                l = (d.vertical) ? (d.currentSlide + d.cloneOffset) * d.height() : (d.currentSlide + d.cloneOffset) * d.width();
                                w = (d.vertical) ? i.touches[0].pageY : i.touches[0].pageX;
                                u = (d.vertical) ? i.touches[0].pageX : i.touches[0].pageY;
                                d.setTransition(0);
                                this.addEventListener("touchmove", k, false);
                                this.addEventListener("touchend", f, false)
                            }
                        }
                    }
                    function k(i) {
                        o = (d.vertical) ? w - i.touches[0].pageY : w - i.touches[0].pageX;
                        p = (d.vertical) ? (Math.abs(o) < Math.abs(i.touches[0].pageX - u)) : (Math.abs(o) < Math.abs(i.touches[0].pageY - u));
                        if (!p) {
                            i.preventDefault();
                            if (d.vars.animation == "slide" && d.transitions) {
                                if (!d.vars.animationLoop) {
                                    o = o / ((d.currentSlide == 0 && o < 0 || d.currentSlide == d.count - 1 && o > 0) ? (Math.abs(o) / r + 2) : 1)
                                }
                                d.args[d.prop] = (d.vertical) ? "translate3d(0," + (-l - o) + "px,0)" : "translate3d(" + (-l - o) + "px,0,0)";
                                d.container.css(d.args)
                            }
                        }
                    }
                    function f(j) {
                        d.animating = false;
                        if (d.animatingTo == d.currentSlide && !p && !(o == null)) {
                            var i = (o > 0) ? d.getTarget("next") : d.getTarget("prev");
                            if (d.canAdvance(i) && Number(new Date()) - x < 550 && Math.abs(o) > 20 || Math.abs(o) > r / 2) {
                                d.flexAnimate(i, d.vars.pauseOnAction)
                            } else {
                                if (d.vars.animation !== "fade") {
                                    d.flexAnimate(d.currentSlide, d.vars.pauseOnAction)
                                }
                            }
                        }
                        this.removeEventListener("touchmove", k, false);
                        this.removeEventListener("touchend", f, false);
                        w = null;
                        u = null;
                        o = null;
                        l = null
                    }
                }
                if (d.vars.animation.toLowerCase() == "slide") {
                    a(window).resize(function () {
                        if (!d.animating && d.is(":visible")) {
                            if (d.vertical) {
                                d.height(d.slides.filter(":first").height());
                                d.args[d.prop] = (-1 * (d.currentSlide + d.cloneOffset)) * d.slides.filter(":first").height() + "px";
                                if (d.transitions) {
                                    d.setTransition(0);
                                    d.args[d.prop] = (d.vertical) ? "translate3d(0," + d.args[d.prop] + ",0)" : "translate3d(" + d.args[d.prop] + ",0,0)"
                                }
                                d.container.css(d.args)
                            } else {
                                d.newSlides.width(d.width());
                                d.args[d.prop] = (-1 * (d.currentSlide + d.cloneOffset)) * d.width() + "px";
                                if (d.transitions) {
                                    d.setTransition(0);
                                    d.args[d.prop] = (d.vertical) ? "translate3d(0," + d.args[d.prop] + ",0)" : "translate3d(" + d.args[d.prop] + ",0,0)"
                                }
                                d.container.css(d.args)
                            }
                        }
                    })
                }
                d.vars.start(d)
            };
            d.flexAnimate = function (g, f) {
                if (!d.animating && d.is(":visible")) {
                    d.animating = true;
                    d.animatingTo = g;
                    d.vars.before(d);
                    if (f) {
                        d.pause()
                    }
                    if (d.vars.controlNav) {
                        d.controlNav.removeClass("active").eq(g).addClass("active")
                    }
                    d.atEnd = (g == 0 || g == d.count - 1) ? true : false;
                    if (!d.vars.animationLoop && d.vars.directionNav) {
                        if (g == 0) {
                            d.directionNav.removeClass("disabled").filter(".prev").addClass("disabled")
                        } else {
                            if (g == d.count - 1) {
                                d.directionNav.removeClass("disabled").filter(".next").addClass("disabled")
                            } else {
                                d.directionNav.removeClass("disabled")
                            }
                        }
                    }
                    if (!d.vars.animationLoop && g == d.count - 1) {
                        d.pause();
                        d.vars.end(d)
                    }
                    if (d.vars.animation.toLowerCase() == "slide") {
                        var e = (d.vertical) ? d.slides.filter(":first").height() : d.slides.filter(":first").width();
                        if (d.currentSlide == 0 && g == d.count - 1 && d.vars.animationLoop && d.direction != "next") {
                            d.slideString = "0px"
                        } else {
                            if (d.currentSlide == d.count - 1 && g == 0 && d.vars.animationLoop && d.direction != "prev") {
                                d.slideString = (-1 * (d.count + 1)) * e + "px"
                            } else {
                                d.slideString = (-1 * (g + d.cloneOffset)) * e + "px"
                            }
                        }
                        d.args[d.prop] = d.slideString;
                        if (d.transitions) {
                            d.setTransition(d.vars.animationDuration);
                            d.args[d.prop] = (d.vertical) ? "translate3d(0," + d.slideString + ",0)" : "translate3d(" + d.slideString + ",0,0)";
                            d.container.css(d.args).one("webkitTransitionEnd transitionend", function () {
                                d.wrapup(e)
                            })
                        } else {
                            d.container.animate(d.args, d.vars.animationDuration, function () {
                                d.wrapup(e)
                            })
                        }
                    } else {
                        d.slides.eq(d.currentSlide).fadeOut(d.vars.animationDuration);
                        d.slides.eq(g).fadeIn(d.vars.animationDuration, function () {
                            d.wrapup()
                        })
                    }
                }
            };
            d.wrapup = function (e) {
                if (d.vars.animation == "slide") {
                    if (d.currentSlide == 0 && d.animatingTo == d.count - 1 && d.vars.animationLoop) {
                        d.args[d.prop] = (-1 * d.count) * e + "px";
                        if (d.transitions) {
                            d.setTransition(0);
                            d.args[d.prop] = (d.vertical) ? "translate3d(0," + d.args[d.prop] + ",0)" : "translate3d(" + d.args[d.prop] + ",0,0)"
                        }
                        d.container.css(d.args)
                    } else {
                        if (d.currentSlide == d.count - 1 && d.animatingTo == 0 && d.vars.animationLoop) {
                            d.args[d.prop] = -1 * e + "px";
                            if (d.transitions) {
                                d.setTransition(0);
                                d.args[d.prop] = (d.vertical) ? "translate3d(0," + d.args[d.prop] + ",0)" : "translate3d(" + d.args[d.prop] + ",0,0)"
                            }
                            d.container.css(d.args)
                        }
                    }
                }
                d.animating = false;
                d.currentSlide = d.animatingTo;
                d.vars.after(d)
            };
            d.animateSlides = function () {
                if (!d.animating) {
                    d.flexAnimate(d.getTarget("next"))
                }
            };
            d.pause = function () {
                clearInterval(d.animatedSlides);
                if (d.vars.pausePlay) {
                    d.pausePlay.removeClass("pause").addClass("play").text(d.vars.playText)
                }
            };
            d.resume = function () {
                d.animatedSlides = setInterval(d.animateSlides, d.vars.slideshowSpeed);
                if (d.vars.pausePlay) {
                    d.pausePlay.removeClass("play").addClass("pause").text(d.vars.pauseText)
                }
            };
            d.canAdvance = function (e) {
                if (!d.vars.animationLoop && d.atEnd) {
                    if (d.currentSlide == 0 && e == d.count - 1 && d.direction != "next") {
                        return false
                    } else {
                        if (d.currentSlide == d.count - 1 && e == 0 && d.direction == "next") {
                            return false
                        } else {
                            return true
                        }
                    }
                } else {
                    return true
                }
            };
            d.getTarget = function (e) {
                d.direction = e;
                if (e == "next") {
                    return (d.currentSlide == d.count - 1) ? 0 : d.currentSlide + 1
                } else {
                    return (d.currentSlide == 0) ? d.count - 1 : d.currentSlide - 1
                }
            };
            d.setTransition = function (e) {
                d.container.css({
                    "-webkit-transition-duration": (e / 1000) + "s"
                })
            };
            d.init()
        };
        a.flexslider.defaults = {
            animation: "fade",
            slideDirection: "horizontal",
            slideshow: true,
            slideshowSpeed: 7000,
            animationDuration: 600,
            directionNav: true,
            controlNav: true,
            keyboardNav: true,
            mousewheel: false,
            prevText: "Previous",
            nextText: "Next",
            pausePlay: false,
            pauseText: "Pause",
            playText: "Play",
            randomize: false,
            slideToStart: 0,
            animationLoop: true,
            pauseOnAction: true,
            pauseOnHover: false,
            useCSS: true,
            touch: true,
            controlsContainer: "",
            manualControls: "",
            start: function () {},
            before: function () {},
            after: function () {},
            end: function () {}
        };
        a.fn.flexslider = function (b) {
            return this.each(function () {
                var c = a(this).find(".slides > li");
                if (c.length === 1) {
                    c.find(".slides > li").fadeIn(400);
                    if (b && b.start) {
                        b.start(a(this))
                    }
                } else {
                    if (a(this).data("flexsliderInit") != true) {
                        new a.flexslider(this, b)
                    }
                }
            })
        }
    })(jQuery);
    /**
 * Copyright (C) 2012 Chris Wharton (chris@weare2ndfloor.com)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * THIS SOFTWARE AND DOCUMENTATION IS PROVIDED "AS IS," AND COPYRIGHT
 * HOLDERS MAKE NO REPRESENTATIONS OR WARRANTIES, EXPRESS OR IMPLIED,
 * INCLUDING BUT NOT LIMITED TO, WARRANTIES OF MERCHANTABILITY OR
 * FITNESS FOR ANY PARTICULAR PURPOSE OR THAT THE USE OF THE SOFTWARE
 * OR DOCUMENTATION WILL NOT INFRINGE ANY THIRD PARTY PATENTS,
 * COPYRIGHTS, TRADEMARKS OR OTHER RIGHTS.COPYRIGHT HOLDERS WILL NOT
 * BE LIABLE FOR ANY DIRECT, INDIRECT, SPECIAL OR CONSEQUENTIAL
 * DAMAGES ARISING OUT OF ANY USE OF THE SOFTWARE OR DOCUMENTATION.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://gnu.org/licenses/>.
 
 */
(function ($) {
        $.fn.dropPlease = function (options) {
            var defaults = {
                dropSpeed: 100
            };
            var options = $.extend(defaults, options);
            return this.each(function () {
                var dropReveal = $("div.dropplease-expand", this).hide();
                $(dropReveal).hide();
                $("a.dropplease-link", this).hover(function () {
                    $(dropReveal).fadeIn(options.dropSpeed);
                });
                $(dropReveal).mouseleave(function () {
                    $(dropReveal).fadeOut(options.dropSpeed);
                });
            });
        };
    })(jQuery);
    // .. Plugins
    $(window).load(function () {
        $('.flexslider').flexslider({
            controlsContainer: ".flex-controls",
            slideshowSpeed: 7000,
            directionNav: false,
            animation: "fade"
        });
    });
    
    
    // Initialisations ..
    jQuery(document).ready(function () {
    	
    	// table rows
    	jQuery('tr:odd td').addClass("even");
    
    	// simple pagination for gallery
    	  jQuery('.galleryarticle').easyPaginate();
    	  
    
	    // slight tweak for iPad for position fixed in landscape
	    if(navigator.platform == 'iPad') {
	         $("body").addClass("ipad");
	    };
    	// interactive map
    	//add buttons to the overlay
    	jQuery('#mapoverlay-inner').append('<a href="#" id="mapleft">left</a><a href="#" id="mapright">right</a>');
    	jQuery('#viewport a, #viewportkey a').click(function(e) {
    		e.preventDefault();
    		var simpleGalleryLink = blogloc+"/assets/img/map/overlay/";
    		simpleGalleryItemNum = jQuery(this).attr("rel"); // make this a global variable so we can reuse later
    		var simpleGalleryItem = simpleGalleryLink+simpleGalleryItemNum+".jpg";
    		jQuery('#mapoverlay img').attr("src",simpleGalleryItem);
    		jQuery('#popform, #mapoverlay').fadeIn();
    		function simpleGalleryTextUpdate() {
	    		if(simpleGalleryItemNum == "1") {
	    			var simpleGalleryText = "Crystallite Mine";
	    		}
	    		if(simpleGalleryItemNum == "2") {
	    			var simpleGalleryText = "Crystallite Mine";
	    		}
	    		if(simpleGalleryItemNum == "3") {
	    			var simpleGalleryText = "Hobbledown Village";
	    		}
	    		if(simpleGalleryItemNum == "4") {
	    			var simpleGalleryText = "Hobbledown Village";
	    		}
	    		if(simpleGalleryItemNum == "5") {
	    			var simpleGalleryText = "Hobbledown Village";
	    		}
	    		if(simpleGalleryItemNum == "6") {
	    			var simpleGalleryText = "High Hobblers";
	    		}
	    		if(simpleGalleryItemNum == "7") {
	    			var simpleGalleryText = "High Hobblers";
	    		}
	    		if(simpleGalleryItemNum == "8") {
	    			var simpleGalleryText = "The Hobblings Play Barn"; 
	    		}
	    		if(simpleGalleryItemNum == "9") {
	    			var simpleGalleryText = "The Hobblings Play Barn";
	    		}
	    		if(simpleGalleryItemNum == "10") {
	    			var simpleGalleryText = "The Hobblings Play Barn";
	    		}
	    		if(simpleGalleryItemNum == "11") {
	    			var simpleGalleryText = "The Hobblings Play Barn";
	    		}
	    		if(simpleGalleryItemNum == "12") {
	    			var simpleGalleryText = "Hobnosh Restaurant";
	    		}
	    		if(simpleGalleryItemNum == "13") {
	    			var simpleGalleryText = "The Field of Confusion";
	    		}
	    		if(simpleGalleryItemNum == "14") {
	    			var simpleGalleryText = "The Field of Confusion";
	    		}
	    		if(simpleGalleryItemNum == "15") {
	    			var simpleGalleryText = "The Field of Confusion";
	    		}
	    		if(simpleGalleryItemNum == "16") {
	    			var simpleGalleryText = "Party Cottages";
	    		}
	    		if(simpleGalleryItemNum == "17") {
	    			var simpleGalleryText = "Bundles Barn";
	    		}
	    		if(simpleGalleryItemNum == "18") {
	    			var simpleGalleryText = "Bundles Barn";
	    		}
	    		if(simpleGalleryItemNum == "19") {
	    			var simpleGalleryText = "Quercus Oak Picnic Spot";
	    		}
	    		if(simpleGalleryItemNum == "20") {
	    			var simpleGalleryText = "Quercus Oak Picnic Spot";
	    		}
	    		if(simpleGalleryItemNum == "21") {
	    			var simpleGalleryText = "Quercus Oak Picnic Spot";
	    		}
	    		if(simpleGalleryItemNum == "22") {
	    			var simpleGalleryText = "Wanderers Field";
	    		}
	    		if(simpleGalleryItemNum == "23") {
	    			var simpleGalleryText = "Wanderers Field";
	    		}
	    		if(simpleGalleryItemNum == "24") {
	    			var simpleGalleryText = "Wanderers Field";
	    		}
	    		if(simpleGalleryItemNum == "25") {
	    			var simpleGalleryText = "Hobbledown Market";
	    		}
	    		if(simpleGalleryItemNum == "26") {
	    			var simpleGalleryText = "Hobbledown Market";
	    		}
	    		if(simpleGalleryItemNum == "27") {
	    			var simpleGalleryText = "Hobbledown Market";
	    		}
	    		if(simpleGalleryItemNum == "28") {
	    			var simpleGalleryText = "Hobbledown Market";
	    		}

	    		// and update text
	    		jQuery('#mapoverlay p').text(simpleGalleryText);
    		} 
    		simpleGalleryTextUpdate();
    		// left/right arrows
    		//simpleGalleryChildCalc = jQuery('.layer2 a').size();
    		simpleGalleryChildren = 28;
    		
    		// hide left on first item
    		if(simpleGalleryItemNum == "1") {
    			jQuery('a#mapleft').hide();
    		}
    		// hide right on last item
    		if(simpleGalleryItemNum == simpleGalleryChildren) {
    			jQuery('a#mapright').hide();
    		}
    		jQuery('a#mapright').click(function(e) {
    			jQuery('a#mapleft, a#mapright').show();
    			e.preventDefault();
    			var simpleGalleryStripNum = jQuery('#mapoverlay img').attr("src").replace(".jpg", "");
    			var simpleGalleryStripNum = jQuery('#mapoverlay img').attr("src").replace(simpleGalleryLink, "");
    			simpleGalleryItemNum = parseInt(simpleGalleryStripNum)+1;
    			var simpleGalleryItem = simpleGalleryLink+simpleGalleryItemNum+".jpg";
    			jQuery('#mapoverlay img').attr("src",simpleGalleryItem);
    			simpleGalleryTextUpdate();
    			// hide if on last slide
    			if(simpleGalleryItemNum == simpleGalleryChildren) {
    				jQuery("a#mapright").hide();
    			}
    		});
    		jQuery('a#mapleft').click(function(e) {
    			jQuery('a#mapleft, a#mapright').show();
    			e.preventDefault();
    			var simpleGalleryStripNum = jQuery('#mapoverlay img').attr("src").replace(".jpg", "");
    			var simpleGalleryStripNum = jQuery('#mapoverlay img').attr("src").replace(simpleGalleryLink, "");
    			simpleGalleryItemNum = parseInt(simpleGalleryStripNum)-1;
    			var simpleGalleryItem = simpleGalleryLink+simpleGalleryItemNum+".jpg";
    			jQuery('#mapoverlay img').attr("src",simpleGalleryItem);
    			simpleGalleryTextUpdate();
    			// hide if on first slide
    			if(simpleGalleryItemNum == "1") {
    				jQuery('a#mapleft').hide();
    			}
    			
    		});
    	});
    	
    	
    
    
        // drop down elements
        jQuery('.top-expand, .useful-links').dropPlease({
            dropSpeed: 200
        });
        // check all NextGen thumbs and grab the title...
        jQuery('.ngg-gallery-thumbnail-box a').each(function (index) {
            var allThumbsTitle = jQuery(this).attr("title");
            jQuery(this).append('<p class="thumb-info">' + allThumbsTitle + '</p>'); //insert it into a p after each thumb
        });
        //append gallery bottom div for next gen thumbs
        jQuery('.ngg-gallery-thumbnail-box').each(function (index) {
            jQuery(this).append('<div class="gallery-btm" />');
        });
        // swap text inside pagination for nextgen
        jQuery('body .ngg-navigation a.next').html("Next >>");
        jQuery('body .ngg-navigation a.prev').html("<< Previous");
        //controls 2 navs at once (this is to get round the z-indexing issues on the main nav
        var targetHover = "header nav ";
        jQuery('.headerover li').hover(function () {
            // check last class on current hover
            var thisHrefClass = jQuery(this).attr('class').split(' ').slice(-1);
            // check to see if this menu item is already 'active'
            var checkCurrentClass = jQuery(targetHover + "li." + thisHrefClass).attr('class').split(' ').slice(-1);
            if (checkCurrentClass == "current-menu-item") {
            // do nothing 
            } else {
                jQuery(targetHover + "li." + thisHrefClass).toggleClass("active");
            }
        });
        // tab control
        $(function () {
            var tabContainers = $('.tab-container > article');
            $('.tabs ul a').click(function (e) {
                e.preventDefault();
                tabContainers.hide().filter(this.hash).show();
                $('.tabs ul li').removeClass('tab-active');
                $(this).parent().addClass('tab-active');
                return false;
            }).filter(':first').click();
        });
        // show pop up forms
        var $hobbledown_form = $.cookie('hobbledown_form') == "hobbledown_form";
        var bodyId = jQuery('body').attr("id");
        if (((bodyId == "popform-school") || (bodyId == "popform-standard")) && (!$hobbledown_form)) {
            jQuery("a[href$='.pdf']").click(function (e) {
                e.preventDefault();
                jQuery('#popform, .popform, #' + bodyId).fadeIn();
            });
        }
        if ((jQuery('body').attr("id")) == "popform-standard") {}
        // close pop up on form
        jQuery('#popform, a#TB_closeWindow').click(function(e) {
            e.preventDefault();
            jQuery('#mapoverlay, #popform, .popform').fadeOut();
        });
        $(".wpcf7-mail-sent-ok").live("click", function () {
            $.cookie("hobbledown_form", "hobbledown_form", {
                expires: 7,
                path: '/'
            });
            jQuery('#popform, .popform').fadeOut(function () {
                // reload page to activate cookies
                location.reload();
            });
        });
       
       
       
        // validate form and ajax post it...
        /*
		Created 09/27/09										
		Questions/Comments: jorenrapini@gmail.com						
		COPYRIGHT NOTICE		
		Copyright 2009 Joren Rapini
		*/
        // Place ID's of all required fields here.
        required = ["EmailAddress"];
        // If using an ID other than #email or #error then replace it here
        email = $("#EmailAddress");
        errornotice = $("#error2");
        // The text to show up within a field when it is incorrect
        emptyerror = "Please fill out this field.";
        emailerror = "Please enter a valid e-mail.";
        $(".footer-email form").submit(function () {
            //Validate required fields
            for (i = 0; i < required.length; i++) {
                var input = $('#' + required[i]);
                if ((input.val() == "") || (input.val() == emptyerror)) {
                    input.addClass("needsfilled");
                    input.val(emptyerror);
                    errornotice.fadeIn(750);
                } else {
                    input.removeClass("needsfilled");
                }
            }
            // Validate the e-mail.
            if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email.val())) {
                email.addClass("needsfilled");
                email.val(emailerror);
            }
            //if any inputs on the page have the class 'needsfilled' the form will not submit
            if ($(":input").hasClass("needsfilled")) {
                return false;
            } else {
                ajaxMe();
                errornotice.hide();
                return false;
            }
        });
        // Clears any fields in the form when the user clicks on them
        $(":input").focus(function () {
            if ($(this).hasClass("needsfilled")) {
                $(this).val("");
                $(this).removeClass("needsfilled");
            }
        });

        function ajaxMe() {
            var email2 = $("input#EmailAddress").val();
            var dataString = '&EmailAddress=' + email2;
            //alert (dataString);return false;
            $.ajax({
                type: "POST",
                url: "/CCSFG_0.0.6/signup/index.php",
                data: dataString,
                success: function () {}
            });
            //return false;
            $('.footer-email form').fadeOut(100);
            $('.footer-email').append("<div id='response'></div>");
            $('.footer-email #response').hide();
            $('.footer-email #response').append('<p><br />Thankyou for signing up to our newsletter</p>');
            $('.footer-email #response').fadeIn(500);
        }
        
        
        
        
        
        // form validation and ajax posting for sidebar email signup
        /*
		Created 09/27/09										
		Questions/Comments: jorenrapini@gmail.com						
		COPYRIGHT NOTICE		
		Copyright 2009 Joren Rapini
		*/
        // Place ID's of all required fields here.
        required2 = ["EmailAddress2"];
        // If using an ID other than #email or #error then replace it here
        emailadd2 = $("#EmailAddress2");
        errornotice = $("#error2");
        // The text to show up within a field when it is incorrect
        emptyerror = "Please fill out this field.";
        emailerror = "Please enter a valid e-mail.";
        $(".signup form").submit(function () {
            //Validate required fields
            for (i = 0; i < required2.length; i++) {
                var input = $('#' + required2[i]);
                if ((input.val() == "") || (input.val() == emptyerror)) {
                    input.addClass("needsfilled");
                    input.val(emptyerror);
                    errornotice.fadeIn(750);
                } else {
                    input.removeClass("needsfilled");
                }
            }
            // Validate the e-mail.
            if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(emailadd2.val())) {
                emailadd2.addClass("needsfilled");
                emailadd2.val(emailerror);
            }
            //if any inputs on the page have the class 'needsfilled' the form will not submit
            if ($(":input").hasClass("needsfilled")) {
                return false;
            } else {
                ajaxMe2();
                errornotice.hide();
                return false;
            }
        });
        // Clears any fields in the form when the user clicks on them
        $(":input").focus(function () {
            if ($(this).hasClass("needsfilled")) {
                $(this).val("");
                $(this).removeClass("needsfilled");
            }
        });

        function ajaxMe2() {
            var email3 = $("input#EmailAddress2").val();
            var dataString = '&EmailAddress=' + email3;
            //alert (dataString);return false;
            $.ajax({
                type: "POST",
                url: "/CCSFG_0.0.6/signup/index.php",
                data: dataString,
                success: function () {}
            });
            //return false;
            $('.signup form').fadeOut(100);
            $('.signup').append("<div id='response'></div>");
            $('.signup #response').hide();
            $('.signup #response').append('<p><br />Thankyou for signing up to our newsletter</p>');
            $('.signup #response').fadeIn(500);
        }
        
        
        
        
    });
    
    
    
    
    
    
    
    // .. Initialisations
})(jQuery);
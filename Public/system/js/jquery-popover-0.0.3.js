!function(t,e,o,n){"use strict";var r=t.fn.popover,i=function(e,o){return this.$el=t(e),this.options=this.getOptions(o),this.$wrapper=this.$el.parents(".popover-wrapper").eq(0),this.$body=this.$wrapper.find(".popover-body"),this.listenEvents(),this};i.DEFAULTS={trigger:"click"},i.prototype.getDefaults=function(){return i.DEFAULTS},i.prototype.getOptions=function(e){return e=t.extend({},this.getDefaults(),this.$el.data(),e)},i.prototype.listenEvents=function(e){var n=this,r=this.$el;t(o).click(function(e){if(this.$wrapper.hasClass("open")){var o=!t.contains(this.$wrapper[0],e.target)&&this.$wrapper[0]!==e.target;o&&this.close()}}.bind(this));var i=this.options.trigger;return"click"===i?r.on("click",function(t){t.preventDefault(),n.toggle()}):"hover"===i&&(r.on("mouseenter",function(t){t.preventDefault(),n.open()}),r.on("mouseleave",function(t){t.preventDefault(),n.close()}),r.on("click",function(t){t.preventDefault(),n.toggle()})),this.$wrapper.find('[data-toggle-role="close"]').on("click",function(t){t.preventDefault(),n.close()}),this},i.prototype.open=function(){return this.$wrapper&&this.$wrapper.addClass("open"),this},i.prototype.close=function(){return this.$wrapper&&this.$wrapper.removeClass("open"),this},i.prototype.toggle=function(){return this.$wrapper&&this.$wrapper.toggleClass("open"),this};var p=function(e){return this.each(function(){var o=t(this),n=o.data("gb.popover");n||(n=new i(this,e),o.data("gb.popover",n))})};t.fn.popover=p,t.fn.popover.Constructor=i,t.fn.popover.noConflict=function(){return t.fn.popover=r,this}}(jQuery,window,document);
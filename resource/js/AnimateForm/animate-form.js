(function( $ ){
    $.fn.animatedForm = function (options) {
        let settings = $.extend({
            title: ''
        }, options);
        return this.html(`<h5 class="success">${settings.title}</h5>
<div class="sa">
    <div class="sa-success">
    <div class="sa-success-tip"></div>
    <div class="sa-success-long"></div>
    <div class="sa-success-placeholder"></div>
    <div class="sa-success-fix"></div>
</div>
</div>`)
    }
})( jQuery );
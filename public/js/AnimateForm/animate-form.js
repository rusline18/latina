(function( $ ){
    $.fn.animatedForm = function (options) {
        let settings = $.extend({
            title: '',
            type: 'success'
        }, options);
        if (settings.type === 'success'){
            return this.html(`<h5 class="success">${settings.title}</h5>
                <div class="sa">
                    <div class="sa-success">
                    <div class="sa-success-tip"></div>
                    <div class="sa-success-long"></div>
                    <div class="sa-success-placeholder"></div>
                    <div class="sa-success-fix"></div>
                </div>
                </div>`
            )
        } else {
            return this.html(`
            <h5 class="error">${settings.title}</h5>
            <div class="sa">
                <div class="sa-error">
                    <div class="sa-error-x">
                        <div class="sa-error-left"></div>
                        <div class="sa-error-right"></div>
                    </div>
                    <div class="sa-error-placeholder"></div>
                    <div class="sa-error-fix"></div>
                </div>
            </div>`
            )
        }
    }
})( jQuery );
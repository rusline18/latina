$(document).ready(function(){
    form('#focus_form_recording', '.focus_form-button', '.focus_form-message', '.focus-form');
    form('#modal-form', '.modal_form-button', '.modal_form-message', '.modal-content');

    function form(form, button, message, content){
        $(form).submit(function (e) {
            e.preventDefault();
            $.post({
                url: window.location.origin+'/form-landing',
                data: $(this).serialize(),
                beforeSend: function () {
                    $(button).html(`<div class="preloader-wrapper small active">
                <div class="spinner-layer spinner-default-only">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>
              </div>`);
                }
            })
                .done(request => {
                    let res = JSON.parse(request);
                    if (res.error === true){
                        $(message).html(`<span class="error">${res.message}</span>`);
                        $(button).html(`Записаться`);
                    } else {
                        setTimeout(function () {
                            $(content).animatedForm({title: res.message});
                        }, 500);
                    }
                })
                .fail(() => {
                    $(content).animatedForm({
                        title: 'Произошла ошибка! Попробуйте позже',
                        type: 'error'
                    });
                })
        })
    }
});
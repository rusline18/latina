$(document).ready(function(){
    $('#focus_form_recording').submit(function (e) {
        e.preventDefault();
        $.post({
            url: window.location.origin+'/form.php',
            data: $(this).serialize(),
            beforeSend: function () {
                $('.focus_form-button').html(`<div class="preloader-wrapper small active">
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
                    setTimeout(function () {
                        $('.focus_form-message').html(`<span class="error">${res.message}</span>`);
                        $('.focus_form-button').html(`Записаться`);
                    }, 500);
                } else {
                    setTimeout(function () {
                        $('.focus-form').animatedForm({title: res.message});
                        // $('.focus_form-button').html(`Записаться`);
                    }, 500);
                }
                console.log(res);
            })
            .fail(err => console.error(err))
    })
});
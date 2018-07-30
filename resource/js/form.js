$(document).ready(function(){
    $('#focus_form_recording').submit(function (e) {
        e.preventDefault();
        $.post({
            url: window.location.origin+'/form.php',
            data: $(this).serialize()
        })
            .done(request => {
                let res = JSON.parse(request);
                console.log(res);
            })
            .fail(err => console.error(err))
    })
});
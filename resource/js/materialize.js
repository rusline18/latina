$(document).ready(function(){
    $('.tabs').tabs();
    $('.parallax').parallax();
    $('.scrollspy').scrollSpy();
    $('.modal').modal();

    AOS.init({
        once: true,
        duration: 400,
    });

    $('.modal-trigger').click(function(){
        let direction = $(this).data('direction');
        $('.modal_form-direcion').val(direction);
    })
});
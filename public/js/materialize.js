$(document).ready(function(){
    $('.tabs').tabs();
    $('.parallax').parallax();
    $('.scrollspy').scrollSpy();
    $('.modal').modal();

    $('.phone').mask('+7(999)999-99-99');

    AOS.init({
        once: true,
        duration: 400,
    });

    $('.modal-trigger').click(function(){
        let direction = $(this).data('direction');
        $('.modal_form-direcion').val(direction);
    })
});
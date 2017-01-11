$(document).ready(function() {
    choosePlace();
});

function choosePlace() {
    $('.place').click(function() {
        if($(this).hasClass('choosen') || $(this).hasClass('reserv')) {
            $(this).removeClass('choosen');
            var ident = $(this).attr('id');
            $('.'+ ident +'').remove();
        } else {
            $(this).addClass('choosen');
            var id = $(this).attr('id');
            $('<input  class="choose_place '+ id +'" type="hidden" name="reserv_place[]" value="'+ id +'">').prependTo('#make_choose');
        }

        if($('.choosen').length >= 1) {
            $('.choose>h4').hide();
            $('#make_choose').fadeIn();
        } else {
            $('#make_choose').hide();
            $('.choose>h4').fadeIn();
        }
    });

    $('.sector:nth-child(1)>.link').click(function() {
        $(this).removeClass('link');
        $(this).text('Свободно мест: '+ ($('.sector:nth-child(1) .place').length - $('.sector:nth-child(1) .reserv').length));
    });
    $('.sector:nth-child(2)>.link').click(function() {
        $(this).removeClass('link');
        $(this).text('Свободно мест: '+ ($('.sector:nth-child(2) .place').length - $('.sector:nth-child(2) .reserv').length));
    });
    $('.sector:nth-child(3)>.link').click(function() {
        $(this).removeClass('link');
        $(this).text('Свободно мест: '+ ($('.sector:nth-child(3) .place').length - $('.sector:nth-child(3) .reserv').length));
    });
}
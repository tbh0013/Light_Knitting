var more_num = 8;
$('.item_individual:nth-child(n + ' + (more_num + 1) + ')').addClass('is_hidden');
$('.more_item_button').on('click', function() {
    $('.item_individual.is_hidden').slice(0, more_num).removeClass('is_hidden');
    if ($('.item_individual.is_hidden').length == 0) {
    $('.more_item_button').fadeOut();
    }
});
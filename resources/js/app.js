require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function () {
    $('.preview-modal-cv-template-color').click(function () {
        const colorValue = $(this).data('color')
        $('.color').removeClass('blue')
        $('.color').removeClass('brow')
        $('.color').removeClass('green')
        $('.color').addClass(colorValue)

        $('#setting-color').val(colorValue)
    })
})
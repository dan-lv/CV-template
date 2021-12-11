require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function () {
    $('.preview-modal-cv-template-color').click(function () {
        const colorValue = $(this).data('color')
        $('.color').css('color', colorValue)
        console.log($('.color'))
        $('.checker').css('visibility', 'hidden')
        $(this).children('.checker').css('visibility', 'visible')
    })
})
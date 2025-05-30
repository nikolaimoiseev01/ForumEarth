import './bootstrap';
import $ from 'jquery'
import 'jquery-mask-plugin'

//region -- Плавная прокрутка
// Select all links with hashes
$('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .not(".nav a")
    .click(function (event) {
        // On-page links
        if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
            &&
            location.hostname == this.hostname
        ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000, function () {
                    // Callback after animation
                    // Must change focus!
                    var $target = $(target);
                    $target.focus();
                    if ($target.is(":focus")) { // Checking if the target was focused
                        return false;
                    } else {
                        $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                        $target.focus(); // Set focus again
                    }
                    ;
                });
            }
        }
    });
//endregion


function mobileInputCreate() {
    $('.mobile_input').mask('+0 (000) 000 00-00');
}
$(document).ready(function () {
    mobileInputCreate()
})

document.addEventListener('DOMContentLoaded', function () {
    window.mobileInputCreate = function () {
        $('.mobile_input').mask('+0 (000) 000 00-00');
    }
})


window.addEventListener('swal:modal', event => {
    Swal.fire({
        title: event.detail.title,
        icon: event.detail.type,
        html: "<p>" + event.detail.text + "</p>",
        showConfirmButton: false,
    })
})

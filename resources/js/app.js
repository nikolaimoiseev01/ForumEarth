import './bootstrap';
import $ from 'jquery'
import 'jquery-mask-plugin'
import { gsap } from "gsap";
// import Swiper JS
import Swiper from 'swiper';

import { Navigation, Pagination } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import {livewire_hot_reload} from 'virtual:livewire-hot-reload'

import { ScrollTrigger } from "gsap/ScrollTrigger";

livewire_hot_reload();


gsap.registerPlugin(ScrollTrigger);
// Регистрация Swiper модулей
Swiper.use([Navigation, Pagination]);
// Сделать доступным глобально
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;
window.Swiper = Swiper;
window.$ = $;

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
    $('.mobile_input').mask('+0 (000) 000 00-000');
}
$(document).ready(function () {
    mobileInputCreate()
})

document.addEventListener('DOMContentLoaded', function () {
    window.mobileInputCreate = function () {
        $('.mobile_input').mask('+0 (000) 000 00-000');
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
//
// function streamingCarousel(containerEl, direction = 'left') {
//     const speed = 0.5;
//     const wrapperEl = containerEl.querySelector('.carousel-wrapper');
//     const cards = Array.from(wrapperEl.children);
//
//     const positions = cards.map((el) => {
//         const style = window.getComputedStyle(el);
//         const marginLeft = parseFloat(style.marginLeft) || 0;
//         const marginRight = parseFloat(style.marginRight) || 0;
//         const width = el.offsetWidth;
//
//         return {
//             el,
//             width,
//             marginLeft,
//             marginRight,
//             x: 0
//         };
//     });
//
//     // Устанавливаем начальные позиции
//     let currentX = 0;
//     positions.forEach((card) => {
//         card.x = currentX + card.marginLeft;
//         card.el.style.position = 'absolute';
//         card.el.style.left = `${card.x}px`;
//         currentX += card.width + card.marginLeft + card.marginRight;
//     });
//
//     const containerWidth = containerEl.offsetWidth;
//
//     const animate = () => {
//         // Сначала сдвигаем все
//         positions.forEach(card => {
//             card.x += (direction === 'left' ? -speed : speed);
//         });
//
//         // Проверяем только те, что ушли полностью за экран
//         positions.forEach(card => {
//             if (direction === 'left' && card.x + card.width < 0) {
//                 const rightmost = Math.max(...positions.map(p => p.x + p.width + p.marginRight));
//                 card.x = rightmost + card.marginLeft;
//             }
//
//             if (direction === 'right' && card.x > containerWidth) {
//                 const leftmost = Math.min(...positions.map(p => p.x - p.marginLeft));
//                 card.x = leftmost - card.width - card.marginRight;
//             }
//
//             card.el.style.left = `${card.x}px`;
//         });
//
//         // requestAnimationFrame(animate);
//     };
//
//     // requestAnimationFrame(animate);
// }


// document.querySelectorAll('.streaming-carousel').forEach(container => {
//     const direction = container.dataset.direction || 'left';
//     streamingCarousel(container, direction);
// });

document.addEventListener('alpine:init', () => {
    console.log('test')
});



export default function LogosMarquee(containerEl) {
    if (!containerEl) {
        console.warn("Marquee: container not provided.");
        return;
    }

    const track = containerEl.querySelector(".marquee__track");
    const marqueeWrapper = containerEl.closest(".marquee");

    if (!track || !marqueeWrapper) {
        console.warn("Marquee: track or wrapper not found.");
        return;
    }

    const speed = parseFloat(marqueeWrapper.dataset.speed) || 60;
    const direction = marqueeWrapper.dataset.direction === 'right' ? 1 : -1;
    const trackWidth = track.getBoundingClientRect().width;

    let pos = 0;
    let start = null;
    let rafId = null;

    // Расширить ширину контейнера
    containerEl.style.width = trackWidth + "px";

    // Клонирование
    const clone = track.cloneNode(true);
    if (direction === -1) {
        containerEl.insertBefore(clone, track);
    } else {
        containerEl.appendChild(clone);
    }

    containerEl.style.willChange = "transform";

    // Анимация
    function animate(timestamp) {
        if (!start) start = timestamp;

        const elapsed = timestamp - start;
        pos = direction * (-(elapsed / 1000) * speed);

        if (Math.abs(pos) >= trackWidth) {
            start = timestamp;
            pos = 0;
        }

        containerEl.style.transform = "translateX(" + pos + "px)";
        rafId = requestAnimationFrame(animate);
    }

    animate();

    return {
        destroy() {
            cancelAnimationFrame(rafId);
            if (clone && clone.parentNode === containerEl) {
                containerEl.removeChild(clone);
            }
            containerEl.style.transform = "";
            containerEl.style.willChange = "";
        }
    };
}

// import LogosMarquee from './marquee.js';
//
window.addEventListener("load", function () {
    const marquees = document.querySelectorAll('.marquee__ctn');

    marquees.forEach(function (containerEl) {
        LogosMarquee(containerEl); // можно сохранить в массив, если нужен destroy()
    });
});

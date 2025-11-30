import './bootstrap';
import AOS from 'aos';
import 'aos/dist/aos.css';

// Import Swiper
import 'swiper/css';
import 'swiper/css/effect-coverflow';
import 'swiper/css/pagination';
import 'swiper/css/navigation';

import Swiper from 'swiper';
import { Autoplay, EffectCoverflow, Navigation, Pagination } from 'swiper/modules';

window.Swiper = Swiper;
window.SwiperModules = {
    Autoplay,
    EffectCoverflow,
    Navigation,
    Pagination
};

// Inicializar AOS
document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        duration: 800,
        once: false,
        offset: 100,
    });

    
});
// Inicializar Swiper
new Swiper(".premiumSwiper", {
    modules: [SwiperModules.Autoplay, SwiperModules.Navigation, SwiperModules.Pagination],
    loop: true,
    autoplay: { delay: 3000 },
    speed: 1200,
    effect: "slide",
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    }
});



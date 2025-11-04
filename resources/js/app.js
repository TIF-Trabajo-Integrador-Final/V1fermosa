import './bootstrap';
import AOS from 'aos';
import 'aos/dist/aos.css'; 

// Importa los estilos principales de Swiper
import 'swiper/css';
import 'swiper/css/effect-coverflow';
import 'swiper/css/pagination';
import 'swiper/css/navigation';

// Importa el Core de Swiper y los módulos
import Swiper from 'swiper';
import { Autoplay, EffectCoverflow, Navigation, Pagination } from 'swiper/modules';

// Exponer módulos Swiper globalmente
window.Swiper = Swiper;
window.SwiperModules = {
  Autoplay,
  EffectCoverflow,
  Navigation,
  Pagination
};

// Inicializar AOS al cargar la página
document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        duration: 800,
        once: false, 
        offset: 100,
    });
});

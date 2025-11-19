const toggle = document.getElementById('menuToggle');
const nav = document.querySelector('nav');
const mainContentWrapper = document.getElementById('main-content-wrapper');

toggle.addEventListener('click', () => {
    nav.classList.toggle('active');
    
    // Usar el wrapper que ahora existe
    if (mainContentWrapper) {
        mainContentWrapper.classList.toggle('menu-open');
    }
});

// Cerrar menú al hacer clic fuera de él
document.addEventListener('click', (event) => {
    const isClickInsideNav = nav.contains(event.target);
    const isClickOnToggle = toggle.contains(event.target);
    
    if (!isClickInsideNav && !isClickOnToggle && nav.classList.contains('active')) {
        nav.classList.remove('active');
        if (mainContentWrapper) {
            mainContentWrapper.classList.remove('menu-open');
        }
    }
});
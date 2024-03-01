// Vamos a escuchar por el DOCUMENTO, cuando este haya cargado
document.addEventListener('DOMContentLoaded', function() {
    eventListeners();
});

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    // Vamos a escuchar por el clic
    mobileMenu.addEventListener('click', navegavionResponsive);
}

function navegavionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    // Si contiene la clase
    // if (navegacion.classList.contains('mostrar')) {
    //     navegacion.classList.remove('mostrar');
    // } else {
    //     navegacion.classList.add('mostrar');
    // }

    // Si la tiene la quita, sino la tiene la agrega, es lo mismo que arriba
    navegacion.classList.toggle('mostrar');
}
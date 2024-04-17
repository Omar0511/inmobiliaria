// Vamos a escuchar por el DOCUMENTO, cuando este haya cargado
document.addEventListener('DOMContentLoaded', function() {
    eventListeners();

    darkMode();
});

function darkMode() {
    const prefiereDarMode = window.matchMedia('(prefers-color-scheme: dark');

    if (prefiereDarMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarMode.addEventListener('change', function() {
        if (prefiereDarMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    // Vamos a escuchar por el clic
    mobileMenu.addEventListener('click', navegavionResponsive);

    // Muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');

    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto));
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

function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');

    if (e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
            <label for="telefono">Número de Teléfono</label>
            <input type="tel" name="contacto[telefono]" id="telefono" placeholder="Ingresa tu Teléfono">

            <p>Elija la fecha y la hora para la llamada</p>

            <label for="fecha">Fecha</label>
            <input type="date" name="contacto[fecha]" id="fecha">

            <label for="hora">Hora</label>
            <input type="time" name="contacto[hora]" id="hora" min="09:00" max="18:00">
        `;
    } else {
        contactoDiv.innerHTML = `
            <label for="email">E-mail</label>
            <input type="email" name="contacto[email]" id="email" placeholder="Ingresa tu E-mail">
        `;
    }
}
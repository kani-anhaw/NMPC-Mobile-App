import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


function handleButtonClick() {
    window.location.href = 'register';
    toggleBorder();
    // Add more actions if needed
}

function toggleBorder() {
    var button = document.querySelector('.primary-button');
    button.classList.toggle('clicked');
}
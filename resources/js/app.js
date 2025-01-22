import './bootstrap';
import 'bootstrap'; // bootstrap css

import { Notyf } from 'notyf';
import 'notyf/notyf.min.css';

import 'bootstrap-icons/font/bootstrap-icons.css';

const notyf = new Notyf({
    duration: 3000,
    dismissible: true,
    position: {
        x: 'right',
        y: 'top',
    },
});

if (window.LaravelErrors && window.LaravelErrors.length > 0) {
    const errorMessage = window.LaravelErrors.join('<br>');
    notyf.error(errorMessage);
}

if (window.LaravelSuccessMessage) {
    notyf.success(window.LaravelSuccessMessage);
}
import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
// /resources/js/app.js

// Menunggu sampai seluruh halaman dimuat
document.addEventListener('DOMContentLoaded', function () {

    // ... (kode untuk menu publik yang sudah ada sebelumnya, biarkan saja) ...

    // --- LOGIKA UNTUK TOMBOL MENU MOBILE ADMIN ---
    const adminMenuButton = document.getElementById('admin-mobile-menu-button');
    const adminMobileMenuContent = document.getElementById('admin-mobile-menu-content');

    if (adminMenuButton) {
        adminMenuButton.addEventListener('click', function () {
            adminMobileMenuContent.classList.toggle('hidden');
        });
    }
});
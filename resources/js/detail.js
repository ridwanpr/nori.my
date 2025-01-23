window.addEventListener('DOMContentLoaded', () => {
    document.getElementById('rating').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9]/g, '').substring(0, 1);
    });
});
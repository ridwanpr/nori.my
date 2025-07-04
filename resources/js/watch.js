document.addEventListener('DOMContentLoaded', function () {
    const videoPlayer = document.getElementById('video-player');

    if (!videoPlayer) {
        console.error('Video player iframe not found!');
        return;
    }

    document.querySelectorAll('.switch-server-btn').forEach(button => {
        button.addEventListener('click', function () {
            const newUrl = this.getAttribute('data-url');
            videoPlayer.src = newUrl;
            document.querySelectorAll('.switch-server-btn').forEach(btn => {
                btn.classList.remove('btn-primary');
                btn.classList.add('btn-secondary');
            });
            this.classList.remove('btn-secondary');
            this.classList.add('btn-primary');
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const iframe = document.getElementById('video-player');
    const wrapper = iframe.parentElement;

    function adjustIframe() {
        const isMobile = window.innerWidth <= 768;
        const wrapperWidth = isMobile ? wrapper.offsetWidth : wrapper.offsetWidth * 0.8;
        const wrapperHeight = wrapperWidth * 9 / 16;

        iframe.style.width = `${wrapperWidth}px`;
        iframe.style.height = `${wrapperHeight}px`;
    }

    adjustIframe();
    window.addEventListener('resize', adjustIframe);
});


document.addEventListener('DOMContentLoaded', function () {
    const iframe = document.getElementById('video-player');

    if (!iframe) {
        console.error('Video player iframe not found!');
        return;
    }

    function lazyLoadIframe() {
        if (iframe.getAttribute('data-src')) {
            iframe.src = iframe.getAttribute('data-src');
            iframe.removeAttribute('data-src');
        }
    }

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    lazyLoadIframe();
                    observer.disconnect();
                }
            });
        });
        observer.observe(iframe);
    } else {
        lazyLoadIframe();
    }
});

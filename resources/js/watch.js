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
        const wrapperWidth = wrapper.offsetWidth;
        const wrapperHeight = wrapperWidth * 9 / 16;
        iframe.style.height = `${wrapperHeight}px`;
    }

    adjustIframe();
    window.addEventListener('resize', adjustIframe);
});
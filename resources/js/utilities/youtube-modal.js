document.addEventListener('DOMContentLoaded', function () {
    var youtubeModal = document.getElementById('youtube-modal');

    if (youtubeModal) {
        var iframe = youtubeModal.querySelector('iframe');

        youtubeModal.addEventListener('hidden.coreui.modal', function () {
            var currentSrc = iframe.src;
            iframe.src = '';
            iframe.src = currentSrc;
        });
    }
});

document.addEventListener("DOMContentLoaded", () => {
    const bookmarkButton = document.getElementById('bookmark-btn');
    bookmarkButton.addEventListener('click', () => {
        const animeId = bookmarkButton.getAttribute('data-id');
        const url = `/bookmark/${animeId}`;
        const isBookmarked = bookmarkButton.classList.contains('bookmarked');

        fetch(url, {
            method: isBookmarked ? 'DELETE' : 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (isBookmarked) {
                        bookmarkButton.classList.remove('bookmarked', 'bg-success', 'text-white');
                        bookmarkButton.classList.add('bg-warning', 'text-dark');
                        bookmarkButton.innerHTML = `<i class="bi bi-bookmark-heart me-2"></i> Add to Bookmark`;
                    } else {
                        bookmarkButton.classList.add('bookmarked', 'bg-success', 'text-white');
                        bookmarkButton.classList.remove('bg-warning', 'text-dark');
                        bookmarkButton.innerHTML = `<i class="bi bi-bookmark-heart-fill me-2"></i> Remove Bookmark`;
                    }
                } else {
                    alert(data.message || 'Something went wrong');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to update bookmark.');
            });
    });
});
document.addEventListener('click', (event) => {
    const closeButton = event.target.closest('[data-dismiss-alert]');

    if (closeButton) {
        closeButton.closest('[role="alert"]')?.remove();
    }
});

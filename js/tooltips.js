// Set all tooltips.
document.querySelectorAll("[data-bs-toggle=\"tooltip\"]").forEach(element => {
    new bootstrap.Tooltip(element, {
        delay: {
            show: 1000,
            hide: 0,
        },
    })
});
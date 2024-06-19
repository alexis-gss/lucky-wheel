window.onload = () => {
    // Set all tooltips.
    document.querySelectorAll("[data-bs-toggle=\"tooltip\"]").forEach(element => {
        new bootstrap.Tooltip(element, {
            delay: {
                show: 1000,
                hide: 0,
            },
        })
    });

    // Clear input value.
    document.getElementById('wheelValuesClear').addEventListener("click", function () {
        document.getElementById("wheelValues").value = "";
    });
};
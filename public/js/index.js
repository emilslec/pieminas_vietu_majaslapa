document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("toggle-form");
    const form = document.getElementById("search-form");

    toggleButton.addEventListener("click", function () {
        if (form.classList.contains("block")) {
            form.classList.remove("block");
            form.classList.add("hidden");
            toggleButton.textContent = "Rādīt meklēšanu";
        } else {
            form.classList.remove("hidden");
            form.classList.add("block");
            toggleButton.textContent = "Slēpt meklēšanu";
        }
    });
});

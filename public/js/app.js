function openFullscreen(imageSrc) {
    const fullscreenContainer = document.getElementById("fullscreen-container");
    const fullscreenImage = document.getElementById("fullscreen-image");
    const closeFullscreen = document.getElementById("close-fullscreen");

    fullscreenImage.src = imageSrc;
    fullscreenContainer.style.display = "flex";

    closeFullscreen.addEventListener("click", () => {
        fullscreenContainer.style.display = "none";
        document.body.style.overflow = "auto";
    });

    fullscreenContainer.addEventListener("click", () => {
        fullscreenContainer.style.display = "none";
        document.body.style.overflow = "auto";
    });
    document.body.style.overflow = "hidden";
}

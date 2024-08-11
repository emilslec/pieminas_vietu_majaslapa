function openFullscreen(imageSrc, description) {
    const fullscreenContainer = document.getElementById("fullscreen-container");
    const fullscreenImage = document.getElementById("fullscreen-image");
    const imageDescription = document.getElementById("image-description");
    const closeFullscreen = document.getElementById("close-fullscreen");

    fullscreenImage.src = imageSrc;
    imageDescription.textContent = description; // Set the description text
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

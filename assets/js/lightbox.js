// HANDLE LIGHTBOX

const photographLightbox = document.querySelectorAll("#photographLightbox");
const body = document.querySelector("body");

const handleLightbox = () => {
    if (window.innerWidth >= 1200) {
        if (body.classList.contains("lightbox__visible")) {
            body.classList.remove("lightbox__visible");
            body.classList.add("lightbox__hidden");
        } else if (body.classList.contains("lightbox__hidden")) {
            body.classList.remove("lightbox__hidden");
            body.classList.add("lightbox__visible");
        } else {
            body.classList.add("lightbox__visible");
        }
    }
};

window.addEventListener("resize", () => {
    const width = window.innerWidth;
    if (width < 1200) {
        photographLightbox.forEach((el) => {
            el.removeEventListener("click", handleLightbox);
        });
    } else {
        photographLightbox.forEach((el) => {
            el.addEventListener("click", handleLightbox);
        });
    }
});

photographLightbox.forEach((el) => {
    el.addEventListener("click", handleLightbox);
});

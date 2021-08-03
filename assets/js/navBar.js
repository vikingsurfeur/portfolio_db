// HANDLE NAVBAR

const linkDropdown = document.getElementById("linkDropdown");
const navbarDropdown = document.getElementById("navbarDropdown");
const arrowDropdown = document.getElementById("arrowDropdown");
const burgerNav = document.getElementById("burgerNav");
const closerNav = document.getElementById("closerNav");
const mobileMenu = document.getElementById("mobileMenu");

// HANDLE DROPDOWN MENU

linkDropdown.addEventListener("click", () => {
    if (navbarDropdown.classList.contains("hide__base")) {
        navbarDropdown.classList.remove("hide__base");
        navbarDropdown.classList.add("display__visible");
        arrowDropdown.style.transform = "rotate(-180deg)";
        arrowDropdown.style.transition = "250ms";
    } else if (navbarDropdown.classList.contains("hide__visible")) {
        navbarDropdown.classList.remove("hide__visible");
        navbarDropdown.classList.add("display__visible");
        arrowDropdown.style.transform = "rotate(-180deg)";
    } else {
        navbarDropdown.classList.remove("display__visible");
        navbarDropdown.classList.add("hide__visible");
        arrowDropdown.style.transform = "rotate(0deg)";
    }
});

// HANDLE BURGER MENU

burgerNav.addEventListener("click", () => {
    mobileMenu.classList.add("display__transformY");
    mobileMenu.classList.remove("hide__transformY");
    burgerNav.classList.add("hide__visible");
    burgerNav.classList.remove("display__visible");
});

closerNav.addEventListener("click", () => {
    mobileMenu.classList.add("hide__transformY");
    mobileMenu.classList.remove("display__transformY");
    burgerNav.classList.add("display__visible");
    burgerNav.classList.remove("hide__visible");
});

// REBOOT ANIMATIONS ON WINDOW RESIZE

window.addEventListener("resize", () => {
    let widthOutput = window.innerWidth;

    if (widthOutput < 992) {
        navbarDropdown.classList.remove("display__visible");
        navbarDropdown.classList.remove("hide__visible");
        navbarDropdown.classList.add("hide__base");
        arrowDropdown.style.transform = "rotate(0deg)";
    } else if (widthOutput > 992) {
        mobileMenu.classList.remove("display__transformY");
        mobileMenu.classList.remove("hide__transformY");
        burgerNav.classList.remove("display__visible");
        burgerNav.classList.remove("hide__visible");
    }
});

// HANDLE NAVBAR

const linkDropdown = document.getElementById("linkDropdown");
const navbarDropdown = document.getElementById("navbarDropdown");
const arrowDropdown = document.getElementById("arrowDropdown");
const burgerNav = document.getElementById("burgerNav");
const closerNav = document.getElementById("closerNav");
const mobileMenu = document.getElementById("mobileMenu");

// HANDLE DROPDOWN MENU

const add180Degree = (degree) => {
    let newDeg = degree - 180;
    return newDeg;
};

linkDropdown.addEventListener("click", () => {
    if (navbarDropdown.classList.contains("hide__base__dropdown")) {
        navbarDropdown.classList.remove("hide__base__dropdown");
        navbarDropdown.classList.add("display__dropdown");
        arrowDropdown.style.transform = `rotate(${add180Degree(0)}deg)`;
        arrowDropdown.style.transition = "250ms";
    } else if (navbarDropdown.classList.contains("hide__dropdown")) {
        navbarDropdown.classList.remove("hide__dropdown");
        navbarDropdown.classList.add("display__dropdown");
        arrowDropdown.style.transform = `rotate(${add180Degree(0)}deg)`;
    } else {
        navbarDropdown.classList.remove("display__dropdown");
        navbarDropdown.classList.add("hide__dropdown");
        arrowDropdown.style.transform = `rotate(${add180Degree(180)}deg)`;
    }
});

window.addEventListener("resize", () => {
    let widthOutput = window.innerWidth;

    if (widthOutput < 992) {
        navbarDropdown.classList.remove("display__dropdown");
        navbarDropdown.classList.remove("hide__dropdown");
        navbarDropdown.classList.add("hide__base__dropdown");
        arrowDropdown.style.transform = `rotate(${add180Degree(180)}deg)`;
    }    
});

// HANDLE BURGER MENU

burgerNav.addEventListener("click", () => {
    mobileMenu.classList.add("display__mobile__menu");
    mobileMenu.classList.remove("hide__mobile__menu");
});

closerNav.addEventListener("click", () => {
    mobileMenu.classList.add("hide__mobile__menu");
    mobileMenu.classList.remove("display__mobile__menu");
});
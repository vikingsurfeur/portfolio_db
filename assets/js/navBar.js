// HANDLE NAVBAR

const linkDropdown = document.getElementById("linkDropdown");
const navbarDropdown = document.getElementById("navbarDropdown");
const arrowDropdown = document.getElementById("arrowDropdown");

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

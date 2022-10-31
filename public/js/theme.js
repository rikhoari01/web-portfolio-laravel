// Theme Toggle
const themeButton = document.getElementById("theme-toggle");
const lightTheme = "light-theme";
const iconTheme = "bx-sun";

// Previously selected topic (if user selected)
const selectedTheme = localStorage.getItem("selected-theme");
const selectedIcon = localStorage.getItem("selected-icon");

// We obtain the current theme that the interface has by validating the dark-theme class
const getCurrentTheme = () =>
    document.body.classList.contains(lightTheme) ? "dark" : "light";
const getCurrentIcon = () =>
    themeButton.classList.contains(iconTheme) ? "bx bx-moon" : "bx bx-sun";

// We validate if the user previously chose a topic
if (selectedTheme) {
    // If the validation is fulfilled, we ask what the issue was to know if we activated or deactivated the light
    document.body.classList[selectedTheme === "dark" ? "add" : "remove"](
        lightTheme
    );
    themeButton.classList[selectedIcon === "bx bx-moon" ? "add" : "remove"](
        iconTheme
    );
}

// Activate / deactivate the theme manually with the button
themeButton.addEventListener("click", () => {
    // Add or remove the light / icon theme
    document.body.classList.toggle(lightTheme);
    themeButton.classList.toggle(iconTheme);
    // We save the theme and the current icon that the user chose
    localStorage.setItem("selected-theme", getCurrentTheme());
    localStorage.setItem("selected-icon", getCurrentIcon());
});

// Sroll Shadow Header
function scrollHeader() {
    const nav = document.getElementById("header");
    if (this.scrollY >= 50) nav.classList.add("header-shadow");
    else nav.classList.remove("header-shadow");
}
window.addEventListener("scroll", scrollHeader);

// Modal
var modal = document.getElementById("modal");
var deleteModal = document.getElementById("deleteModal");
var span = document.getElementsByClassName("modal-close")[0];

span.onclick = function () {
    modal.classList.remove("active-modal");
};

window.onclick = function (event) {
    if (event.target == modal) {
        modal.classList.remove("active-modal");
    }
    if (event.target == deleteModal) {
        deleteModal.classList.remove("active-modal");
    }
};
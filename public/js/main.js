// Link Active Navbar
const sections = document.querySelectorAll("section[id]");

function scrollActive() {
    const scrollY = window.pageYOffset;

    sections.forEach((current) => {
        const sectionHeight = current.offsetHeight,
            sectionTop = current.offsetTop - 58,
            sectionId = current.getAttribute("id");

        if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
            document
                .querySelector(".nav-menu a[href*=" + sectionId + "]")
                .classList.add("active-link");
        } else {
            document
                .querySelector(".nav-menu a[href*=" + sectionId + "]")
                .classList.remove("active-link");
        }
    });
}
window.addEventListener("scroll", scrollActive);

// Filter Works Mixitup
let mixer = mixitup(".works-container", {
    selectors: {
        target: ".works-card",
    },
    animation: {
        duration: 300,
    },
});



/* Link Active Work */
const linkWork = document.querySelectorAll(".works-item");

function activeWork() {
    linkWork.forEach((i) => i.classList.remove("active-works"));
    this.classList.add("active-works");
}

linkWork.forEach((i) => i.addEventListener("click", activeWork));

// Animation
const sr = ScrollReveal({
    origin: "top",
    distance: "60px",
    duration: 2500,
    delay: 400,
});

sr.reveal(".home-data");
sr.reveal(".home-image", { delay: 700 });
sr.reveal(".home-social, .scroll-down", { delay: 900, origin: "bottom" });

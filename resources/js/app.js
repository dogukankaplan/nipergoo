    // Mobile Menu & Dropdown logic is now handled by Alpine.js in the header component


    // Header Scroll Effect
    const header = document.getElementById("header");
    if (header) {
        window.addEventListener("scroll", function () {
            if (window.scrollY > 50) {
                header.classList.add("shadow-md");
                header.classList.remove("shadow-sm");
            } else {
                header.classList.remove("shadow-md");
                header.classList.add("shadow-sm");
            }
        });
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
        anchor.addEventListener("click", function (e) {
            const target = document.querySelector(this.getAttribute("href"));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: "smooth",
                    block: "start",
                });
            }
        });
    });


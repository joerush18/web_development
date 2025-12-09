// Mobile Navigation Toggle + ARIA updates
function setPreviewBackground(previewEl) {
  if (!previewEl) return;
  const img = previewEl.querySelector("img");
  if (!img) return;

  const apply = () => {
    const src = img.currentSrc || img.src;
    if (src) {
      previewEl.style.setProperty("--thumb-image", `url("${src}")`);
    }
  };

  if (img.complete && img.naturalWidth) {
    apply();
  } else {
    img.addEventListener("load", apply, { once: true });
  }
}

document.addEventListener("DOMContentLoaded", function () {
  const navToggle = document.querySelector(".nav-toggle");
  const navMenu = document.querySelector(".nav-menu");

  if (navToggle && navMenu) {
    navToggle.addEventListener("click", function () {
      const isOpen = navMenu.classList.toggle("active");
      navToggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
    });

    // Close menu when clicking on a link
    const navLinks = document.querySelectorAll(".nav-menu a");
    navLinks.forEach((link) => {
      link.addEventListener("click", function () {
        navMenu.classList.remove("active");
        navToggle.setAttribute("aria-expanded", "false");
      });
    });
  }

  // Apply adaptive blurred backgrounds for existing previews
  const previews = document.querySelectorAll(".template-preview");
  previews.forEach((preview) => setPreviewBackground(preview));
});

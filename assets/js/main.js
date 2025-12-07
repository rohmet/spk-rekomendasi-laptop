document.addEventListener("DOMContentLoaded", () => {
  // NAVIGATION BAR TOGGLE (Mobile)
  const menuBtn = document.getElementById("mobile-menu-btn");
  const navLinks = document.getElementById("navLinks");

  if (menuBtn && navLinks) {
    menuBtn.addEventListener("click", () => {
      navLinks.classList.toggle("active");

      const icon = menuBtn.querySelector("i");
      if (icon) {
        if (navLinks.classList.contains("active")) {
          icon.classList.remove("fa-bars");
          icon.classList.add("fa-times");
        } else {
          icon.classList.remove("fa-times");
          icon.classList.add("fa-bars");
        }
      }
    });
  }

  // RANGE SLIDER LIVE UPDATE (Halaman Rekomendasi)
  const sliders = document.querySelectorAll(".live-slider");

  sliders.forEach((slider) => {
    slider.addEventListener("input", function () {
      const targetId = this.getAttribute("data-target");
      const targetElement = document.getElementById(targetId);

      if (targetElement) {
        targetElement.textContent = this.value + "%";
      }
    });
  });

  // GLOBAL DELETE CONFIRMATION
  const deleteButtons = document.querySelectorAll(".btn-confirm-delete");

  deleteButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
      const message =
        button.getAttribute("data-message") ||
        "Apakah Anda yakin ingin menghapus data ini?";

      if (!confirm(message)) {
        e.preventDefault();
      }
    });
  });

  // AUTO DISMISS ALERTS (Pesan Sukses/Error)
  const alerts = document.querySelectorAll(
    ".editorial-alert, .alert, .alert-success, .alert-danger, .alert-warning"
  );
  if (alerts.length > 0) {
    if (window.history.replaceState) {
      const url = new URL(window.location.href);
      url.searchParams.delete("msg");
      window.history.replaceState(null, "", url.toString());
    }

    setTimeout(() => {
      alerts.forEach((alert) => {
        alert.style.transition = "opacity 0.5s ease";
        alert.style.opacity = "0";

        setTimeout(() => alert.remove(), 500);
      });
    }, 4000);
  }

  // MODAL DISMISS (Klik area kosong untuk tutup)
  const modalOverlay = document.getElementById("modal-overlay");
  if (modalOverlay) {
    modalOverlay.addEventListener("click", function (e) {
      if (e.target === this) {
        window.location.href = "index.php?controller=admin&action=dashboard";
      }
    });
  }
});

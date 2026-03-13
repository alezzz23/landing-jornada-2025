(function () {
  const prefersReduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  const header = document.querySelector(".header");
  const nav = document.querySelector("#nav");
  const burger = document.querySelector("#burger");
  const scrollProgress = document.querySelector("#scroll-progress");

  if (burger && nav) {
    burger.addEventListener("click", () => {
      const open = nav.getAttribute("data-open") === "true";
      nav.setAttribute("data-open", open ? "false" : "true");
      burger.setAttribute("aria-expanded", open ? "false" : "true");
    });

    nav.addEventListener("click", (e) => {
      const link = e.target.closest("a");
      if (!link) return;
      nav.setAttribute("data-open", "false");
      burger.setAttribute("aria-expanded", "false");
    });

    document.addEventListener("click", (e) => {
      if (window.innerWidth > 740) return;
      const isInNav = !!e.target.closest("#nav");
      const isBurger = !!e.target.closest("#burger");
      if (!isInNav && !isBurger) {
        nav.setAttribute("data-open", "false");
        burger.setAttribute("aria-expanded", "false");
      }
    });
  }

  const smoothLinks = document.querySelectorAll('a[href^="#"]');
  smoothLinks.forEach((a) => {
    a.addEventListener("click", (e) => {
      const href = a.getAttribute("href");
      if (!href || href === "#") return;
      const target = document.querySelector(href);
      if (!target) return;

      e.preventDefault();

      const headerH = header ? header.getBoundingClientRect().height : 0;
      const y = window.scrollY + target.getBoundingClientRect().top - headerH - 12;

      window.scrollTo({
        top: y,
        behavior: prefersReduced ? "auto" : "smooth",
      });

      history.pushState(null, "", href);
    });
  });

  const revealEls = document.querySelectorAll(".reveal");
  if (!prefersReduced && revealEls.length) {
    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            io.unobserve(entry.target);
          }
        });
      },
      {
        threshold: 0.12,
        rootMargin: "0px 0px -10% 0px",
      }
    );

    revealEls.forEach((el) => io.observe(el));
  } else {
    revealEls.forEach((el) => el.classList.add("is-visible"));
  }

  if (scrollProgress) {
    const updateProgress = () => {
      const doc = document.documentElement;
      const max = doc.scrollHeight - window.innerHeight;
      const pct = max > 0 ? (window.scrollY / max) * 100 : 0;
      scrollProgress.style.width = `${Math.min(100, Math.max(0, pct))}%`;
    };

    updateProgress();
    window.addEventListener("scroll", updateProgress, { passive: true });
    window.addEventListener("resize", updateProgress);
  }

  const cdDays = document.querySelector("#cd-days");
  const cdHours = document.querySelector("#cd-hours");
  const cdMinutes = document.querySelector("#cd-minutes");
  const cdSeconds = document.querySelector("#cd-seconds");

  if (cdDays && cdHours && cdMinutes && cdSeconds) {
    const pad2 = (n) => String(n).padStart(2, "0");
    const eventDate = new Date("2025-08-01T08:00:00");

    const tick = () => {
      const now = new Date();
      const diff = eventDate.getTime() - now.getTime();

      if (diff <= 0) {
        cdDays.textContent = "00";
        cdHours.textContent = "00";
        cdMinutes.textContent = "00";
        cdSeconds.textContent = "00";
        return;
      }

      const totalSeconds = Math.floor(diff / 1000);
      const days = Math.floor(totalSeconds / 86400);
      const hours = Math.floor((totalSeconds % 86400) / 3600);
      const minutes = Math.floor((totalSeconds % 3600) / 60);
      const seconds = totalSeconds % 60;

      cdDays.textContent = pad2(days);
      cdHours.textContent = pad2(hours);
      cdMinutes.textContent = pad2(minutes);
      cdSeconds.textContent = pad2(seconds);
    };

    tick();
    setInterval(tick, 1000);
  }

  const counters = document.querySelectorAll(".counter[data-target]");
  if (counters.length) {
    const animateCounter = (el) => {
      const target = Number(el.getAttribute("data-target"));
      if (!Number.isFinite(target)) return;
      if (prefersReduced) {
        el.textContent = String(target);
        return;
      }

      const duration = 900;
      const start = performance.now();
      const from = 0;

      const step = (t) => {
        const p = Math.min(1, (t - start) / duration);
        const eased = 1 - Math.pow(1 - p, 3);
        const value = Math.round(from + (target - from) * eased);
        el.textContent = String(value);
        if (p < 1) requestAnimationFrame(step);
      };

      requestAnimationFrame(step);
    };

    if (!prefersReduced) {
      const cio = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            animateCounter(entry.target);
            cio.unobserve(entry.target);
          });
        },
        { threshold: 0.6 }
      );
      counters.forEach((c) => cio.observe(c));
    } else {
      counters.forEach((c) => animateCounter(c));
    }
  }

  const fotoInput = document.querySelector("#foto");
  const fileName = document.querySelector("#file-name");
  if (fotoInput && fileName) {
    fotoInput.addEventListener("change", () => {
      const f = fotoInput.files && fotoInput.files[0];
      fileName.textContent = f ? f.name : "Haz clic para subir una imagen";
    });
  }

  const loginForm = document.querySelector("#login-form");
  const loginHint = document.querySelector("#login-hint");
  const toggleBtn = document.querySelector(".auth__toggle");
  const passwordInput = document.querySelector("#password");

  if (toggleBtn && passwordInput) {
    toggleBtn.addEventListener("click", () => {
      const isPassword = passwordInput.getAttribute("type") === "password";
      passwordInput.setAttribute("type", isPassword ? "text" : "password");
      toggleBtn.setAttribute("aria-pressed", isPassword ? "true" : "false");
      toggleBtn.setAttribute("aria-label", isPassword ? "Ocultar contraseña" : "Mostrar contraseña");
    });
  }

  if (loginForm) {
    loginForm.addEventListener("submit", (e) => {
      e.preventDefault();
      if (loginHint) {
        loginHint.textContent = "Login simulado: aquí luego se conectará la autenticación.";
      }
    });
  }
})();

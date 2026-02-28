(function () {
  // Mobile menu
  const toggle = document.querySelector("[data-mobile-toggle]");
  const menu = document.querySelector("[data-mobile-menu]");
  if (toggle && menu) {
    toggle.addEventListener("click", function () {
      menu.classList.toggle("open");
      toggle.setAttribute("aria-expanded", menu.classList.contains("open") ? "true" : "false");
    });
    window.addEventListener("resize", () => menu.classList.remove("open"));
  }

  // Hero carousel
  const carousel = document.querySelector("[data-carousel]");
  if (carousel) {
    const track = carousel.querySelector(".slides");
    const dots = carousel.querySelectorAll(".dot");
    const prev = carousel.querySelector(".arrow.prev");
    const next = carousel.querySelector(".arrow.next");
    let index = 0;
    const count = dots.length;

    function go(i) {
      index = (i + count) % count;
      track.style.transform = `translateX(${-index * 100}%)`;
      dots.forEach((d, di) => d.classList.toggle("active", di === index));
    }
    function step(dir) { go(index + dir); }

    prev && prev.addEventListener("click", () => step(-1));
    next && next.addEventListener("click", () => step(1));
    dots.forEach((d, di) => d.addEventListener("click", () => go(di)));

    let timer = setInterval(() => step(1), 5500);
    carousel.addEventListener("mouseenter", () => clearInterval(timer));
    carousel.addEventListener("mouseleave", () => (timer = setInterval(() => step(1), 5500)));
    go(0);
  }

  // Testimonials slider
  const tslider = document.querySelector("[data-tslider]");
  if (tslider) {
    const track = tslider.querySelector(".ttrack");
    const items = tslider.querySelectorAll(".titem");
    const perView = () => (window.innerWidth <= 980 ? 1 : 2);
    let idx = 0;

    function go(i) {
      const pv = perView();
      const max = Math.max(0, items.length - pv);
      idx = Math.max(0, Math.min(max, i));
      track.style.transform = `translateX(${-idx * (100 / pv)}%)`;
    }

    let timer = setInterval(() => {
      const pv = perView();
      const max = Math.max(0, items.length - pv);
      go(idx >= max ? 0 : idx + 1);
    }, 6500);

    tslider.addEventListener("mouseenter", () => clearInterval(timer));
    tslider.addEventListener("mouseleave", () => (timer = setInterval(() => {
      const pv = perView();
      const max = Math.max(0, items.length - pv);
      go(idx >= max ? 0 : idx + 1);
    }, 6500)));

    window.addEventListener("resize", () => go(idx));
    go(0);
  }

  // Basic form helpers
  window.RTCB = window.RTCB || {};
  window.RTCB.setAlert = function (el, ok, msg) {
    if (!el) return;
    el.className = "alert " + (ok ? "ok" : "bad");
    el.textContent = msg;
    el.style.display = "block";
  };
})();

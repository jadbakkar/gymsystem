const hamburger = document.getElementById("hamburger");
  const nav = document.getElementById("nav");

  hamburger.addEventListener("click", () => {
    nav.classList.toggle("show");
  });

const counters = document.querySelectorAll(".counter");

const counterObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {

            const counter = entry.target;
            const target = +counter.getAttribute("data-target");
            const duration = 3000;
            const startTime = performance.now();

            const updateCount = (currentTime) => {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);

                counter.innerText = Math.floor(progress * target);

                if (progress < 1) {
                    requestAnimationFrame(updateCount);
                } else {
                    counter.innerText = target;
                }
            };

            requestAnimationFrame(updateCount);

            observer.unobserve(counter); 
        }
    });
}, {
    threshold: 0.1
});

counters.forEach(counter => {
    counterObserver.observe(counter);
});
const reveals = document.querySelectorAll(".reveal");

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add("active");
           
        }
    });
}, {
    threshold: 0.1
});

reveals.forEach(reveal => {
    observer.observe(reveal);
});

    document.querySelectorAll('.fancy-text').forEach(el => {
      el.setAttribute('data-text', el.textContent);
    });

   

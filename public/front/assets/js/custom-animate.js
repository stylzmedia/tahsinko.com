//   animate css start
const animateOnScroll = () => {
    const animate1 = document.querySelectorAll(".animate-1");
    const animate2 = document.querySelectorAll(".animate-2");
    const animate3 = document.querySelectorAll(".animate-3");
    const animate4 = document.querySelectorAll(".animate-4");
    const animate5 = document.querySelectorAll(".animate-5");
    const animate6 = document.querySelectorAll(".animate-6");

    animate1.forEach((element) => {
        const position = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (position < windowHeight) {
        element.classList.add("animate__animated", "animate__bounceInLeft");
        } else {
        element.classList.remove("animate__animated", "animate__bounceInLeft");
        }
    });

    animate2.forEach((element) => {
        const position = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (position < windowHeight) {
        element.classList.add("animate__animated", "animate__bounceInRight");
        } else {
        element.classList.remove("animate__animated", "animate__bounceInRight");
        }
    });

    animate3.forEach((element) => {
        const position = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (position < windowHeight) {
        element.classList.add("animate__animated", "rotateIn");
        } else {
        element.classList.remove("animate__animated", "rotateIn");
        }
    });

    animate4.forEach((element) => {
        const position = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (position < windowHeight) {
        element.classList.add("animation-line");
        } else {
        element.classList.remove("animation-line");
        }
    });

    animate5.forEach((element) => {
        const position = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (position < windowHeight) {
        element.classList.add("flag-tm-left-animated");
        } else {
        element.classList.remove("flag-tm-left-animated");
        }
    });
    animate6.forEach((element) => {
        const position = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (position < windowHeight) {
        element.classList.add("flag-tm-right-animated");
        } else {
        element.classList.remove("flag-tm-right-animated");
        }
    });

    };


    window.addEventListener("scroll", animateOnScroll);
//   animate css end

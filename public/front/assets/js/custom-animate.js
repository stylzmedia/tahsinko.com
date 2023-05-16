//   animate css start
const animateOnScroll = () => {
    const animate1 = document.querySelectorAll(".animate-1");
    const animate2 = document.querySelectorAll(".animate-2");
    const animate3 = document.querySelectorAll(".animate-3");

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
    };

    window.addEventListener("scroll", animateOnScroll);
//   animate css end

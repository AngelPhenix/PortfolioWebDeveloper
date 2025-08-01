const menuButton = document.querySelector('.logo-menu-container');
const navLinks = document.querySelector('.nav-links');

menuButton.addEventListener('click', () => {
    navLinks.classList.toggle('nav-active');
});


document.addEventListener('DOMContentLoaded', function() {
    const heroOne = document.querySelector('.hero-white');
    const heroTwo = document.querySelector('.hero-green');
    const headingTwo = document.querySelector('.heading-two');

    function animateElements() {
        gsap.fromTo(heroOne, 
            { opacity: 0, y: 50},
            { opacity: 1, y: 0, duration: 1.2, delay: 0.3, ease: "power2.out" }
        );

        gsap.fromTo(heroTwo, 
            { opacity: 0, y: 50},
            { opacity: 1, y: 0, duration: 1.2, delay: 0.5, ease: "power2.out" }
        );

        gsap.fromTo(headingTwo, 
            { opacity: 0 },
            { opacity: 1, duration: 1.2, delay: 1.3, ease: "power2.out" }
        );
    }

    animateElements();
});

document.addEventListener('scroll', function() {
    const stickerBlock = document.querySelector('.stickers');
    const logos = document.querySelectorAll('.sticker-logo');
    const blockPosition = stickerBlock.getBoundingClientRect().top;
    const windowHeight = window.innerHeight;

    logos.forEach((logo, index) => {
        const logoPosition = logo.getBoundingClientRect().top; // Position Y de chaque logo par rapport au viewport
        
        // Définir des seuils spécifiques pour chaque logo
        const triggerHeight = blockPosition * 0.1 + index + 300; // Début de la transition d'opacité pour chaque logo
        const maxHeight = triggerHeight + 20; // Fin de la transition d'opacité

        // Calculer l'opacité en fonction du défilement par rapport à la position de chaque logo
        let opacity = Math.min(1, Math.max(0, (windowHeight - logoPosition - triggerHeight) / (maxHeight - triggerHeight)));

        // Appliquer l'animation GSAP pour chaque logo avec une transition d'opacité
        gsap.to(logo, { opacity: opacity, duration: 0, ease: 'none' });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const carouselTrack = document.querySelector('.carousel');
    gsap.to(carouselTrack, {
        x: `-2927px`,
        duration: 15,
        ease: "linear",
        repeat: -1,
        roundProps: "x",
        onRepeat: () => {
            gsap.set(carouselTrack, { x: 0 }); // Reset position halfway
        }
    });
});
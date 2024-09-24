document.addEventListener('DOMContentLoaded', function() {
    // const images = [
    //     "../Home/imgs/jaw.png",
    //     "../Home/imgs/jaw.png",
    //     "../Home/imgs/jaw.png"
    // ];
    // const titles = [
    //     "Terumo Dental injection needles 30G - 0.3 x 21mm",
    //     "Another Dental Product",
    //     "Yet Another Dental Product"
    // ];
    // const descriptions = [
    //     "We provide top-tier dental restorations that ensure patient satisfaction and enhance dental practices. Our state-of-the-art technology, combined with the expertise of our skilled technicians, allows us to deliver exceptional results, from crowns and bridges to custom prosthetics.",
    //     "This is the description for the second dental product.",
    //     "Description for the third dental product."
    // ];

    let currentIndex = 0;

    const imageElement = document.querySelector('.carousel-image');
    const titleElement = document.querySelector('.related-title');
    const descriptionElement = document.querySelector('.related-description');

    function updateCarousel() {
        imageElement.src = images[currentIndex];
        titleElement.textContent = titles[currentIndex];
        descriptionElement.textContent = descriptions[currentIndex];
    }

    document.getElementById('prevBtn').addEventListener('click', function() {
        currentIndex = (currentIndex === 0) ? images.length - 1 : currentIndex - 1;
        updateCarousel();
    });

    document.getElementById('nextBtn').addEventListener('click', function() {
        currentIndex = (currentIndex === images.length - 1) ? 0 : currentIndex + 1;
        updateCarousel();
    });

    // Initialize the carousel with the first item
    updateCarousel();
});

    const lightboxTriggerElements = document.querySelectorAll('.lightbox-trigger');
    const lightboxOverlay = document.querySelector('.lightbox-overlay');
    const lightboxImage = document.querySelector('.lightbox-image');
    const lightboxDescription = document.querySelector('.lightbox-description');

    lightboxTriggerElements.forEach(function (lightboxTriggerElement, index) {
        lightboxTriggerElement.addEventListener('click', function () {
            const product = lightboxTriggerElement.closest('.cart-box');
            const productImage = product.querySelector('img');
            const productDescription = product.querySelector('.product-description2');

            lightboxImage.src = productImage.src;
            lightboxDescription.innerHTML = productDescription.innerHTML;
            lightboxDescription.classList.add('active');
            lightboxOverlay.style.display = 'flex';
            lightboxOverlay.classList.add('opened'); // Add the 'opened' class
        });
    });

    lightboxOverlay.addEventListener('click', function () {
        lightboxDescription.classList.remove('active');
        lightboxOverlay.style.display = 'none';
        lightboxOverlay.classList.remove('opened'); // Remove the 'opened' class
    });


/* <div class="lightbox-overlay">
    <div class="lightbox-content">
        <div class="lightbox-description"></div>
        <img src="" class="lightbox-image" />
    </div>
</div> */

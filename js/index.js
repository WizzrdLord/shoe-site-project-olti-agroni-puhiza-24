/*Landing Page Image Select*/
const slides = document.getElementsByClassName('new-container');
let l_index = 0;

function next(){
    slides[l_index].classList.remove('active');
    l_index = (l_index + 1) % slides.length;
    slides[l_index].classList.add('active')
}

function prev(){
    slides[l_index].classList.remove('active');
    l_index = (l_index - 1 + slides.length) % slides.length;
    slides[l_index].classList.add('active')
}

const imageContainers = document.querySelectorAll('.image-container');
imageContainers.forEach(imageContainer =>{
    const featuredImages = imageContainer.querySelectorAll('.featured-image');
    const largeImage = imageContainer.querySelector('.large-image');

    featuredImages.forEach(featuredImage =>{
        featuredImage.addEventListener('click', () =>{
        largeImage.src = featuredImage.src
        });
    });
});


console.log("Script loaded"); // Debugging statement

const images = [
    'assets/images/1.jpg',
    'assets/images/2.jpg',
    // Add more image paths here
];

let currentIndex = 0;

function changeImage(src) {
    console.log("Changing image to:", src); // Debugging statement
    document.getElementById('main-image').src = src;
    currentIndex = images.indexOf(src);
}

function nextImage() {
    currentIndex = (currentIndex + 1) % images.length;
    document.getElementById('main-image').src = images[currentIndex];
}

function prevImage() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    document.getElementById('main-image').src = images[currentIndex];
}

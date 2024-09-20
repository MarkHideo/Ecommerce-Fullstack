document.addEventListener("DOMContentLoaded", function () {
    // Slider functionality
    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img");
    const imgContainer = document.querySelector('.aspect-ratio-169');
    const dotItem = document.querySelectorAll(".dot");

    // Check if slider elements are available on the page
    if (imgContainer && imgPosition.length > 0 && dotItem.length > 0) {
        let imgNumber = imgPosition.length;
        let index = 0; // Current index for the slider

        // Position images for slider and add click event to dots
        imgPosition.forEach(function (image, i) {
            image.style.left = i * 100 + "%"; // Set image position for slider
            dotItem[i].addEventListener("click", function () {
                slider(i); // Change slide on dot click
            });
        });

        // Function to automatically slide images
        function imgSLide() {
            index++; // Increment index
            if (index >= imgNumber) { index = 0; } // Reset index if it exceeds the number of images
            slider(index); // Call slider function to change slide
        }

        // Slider function to handle the image sliding logic
        function slider(i) {
            imgContainer.style.left = "-" + i * 100 + "%"; // Slide to the next image
            const dotActive = document.querySelector('.dot.active'); // Find the currently active dot

            // Remove 'active' class from the currently active dot
            if (dotActive) {
                dotActive.classList.remove("active");
            }

            // Add 'active' class to the new dot
            dotItem[i].classList.add("active");
        }

        // Set interval for auto sliding every 4 seconds
        setInterval(imgSLide, 4000);
    }

    // Responsive menu functionality
    const Menubar = document.querySelector('.header-bar-icon');
    const headerNav = document.querySelector('.menu');

    if (Menubar && headerNav) {
        Menubar.addEventListener('click', () => {
            headerNav.classList.toggle('active');
        });
    }

    // Sticky header functionality
    window.addEventListener('scroll', () => {
        const header = document.querySelector('#header');
        if (header) {
            if (scrollY > 50) {
                header.classList.add('active');
            } else {
                header.classList.remove('active');
            }
        }
    });

    // Click change product images functionality
    const imgSmall = document.querySelectorAll('.product-image-item img');
    const imgMain = document.querySelector('.main-img');

    // Check if product image elements are available on the page
    if (imgMain && imgSmall.length > 0) {
        imgSmall.forEach((img, idx) => {
            img.addEventListener('click', () => {
                console.log(img.src); // Log the clicked image source
                imgMain.src = img.src; // Update main image source on click
                
            });
        });
    }
});

//quantity-product
const quanPlus = document.querySelectorAll('.ri-add-line')
const quanMinus = document.querySelectorAll('.ri-subtract-line')
const quaninp = document.querySelectorAll('.quantity-inp')
// let qti = 1 
if(quanPlus!=null && quanMinus!=null){
    for (let index = 0; index < quanPlus.length; index++) {
        quanPlus[index].addEventListener('click',()=>{
            inputValue = quaninp[index].value
            inputValue++
            quaninp[index].value = inputValue
        })
        quanMinus[index].addEventListener('click',()=>{
            inputValue = quaninp[index].value
            if(inputValue <= 1){
                return false
            }
            else{
                inputValue--
                quaninp[index].value = inputValue
            }
        })   
    }  
}

//form submission when the icon is clicked
function submitSearchForm() {
    document.getElementById('searchForm').submit();
}


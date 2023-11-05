const menuToggle = document.querySelector('.menu-toggle');
const mobileMenu = document.querySelector('.mobile-menu');
const submenuToggle = document.querySelector('.submenu-toggle');
const submenu = document.querySelector('.submenu');
let submenuState = false;

menuToggle.addEventListener('click', () => {
    mobileMenu.classList.toggle('active');
});

// Add an event listener to the document to close the menu when clicking outside of it
document.addEventListener('click', (event) => {
    if (!menuToggle.contains(event.target) && !mobileMenu.contains(event.target)) {
        mobileMenu.classList.remove('active');
    }
});

submenuToggle.addEventListener('click', (event) => {
    submenuState = !submenuState
    event.preventDefault(); // Prevent the anchor link from being followed
    if (submenuState === false){
        submenu.style.display = 'none';
    }else{
        submenu.style.display = 'block';
        const submenuItems = document.querySelectorAll('.submenu-item');
        submenuItems.forEach((item) => {
            item.addEventListener('click', (event) => {
                mobileMenu.classList.toggle('active');
            });
        });

    }
});


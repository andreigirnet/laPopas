// Reference to the fixed menu element
const fixedMenu = document.querySelector("#fixedMenu"); // Replace with the appropriate selector


// Function to handle scroll events
function handleScroll() {
    const scrollPosition = window.scrollY;
    console.log(scrollPosition)
    // Adjust this threshold value as needed based on your design
    const threshold = 800; // For example, 100 pixels from the top
    const bottom = 3700;
    if (scrollPosition >= threshold) {
        // The menu is fixed or visible
        fixedMenu.style.position = "fixed";
        fixedMenu.style.top = 15 + "px";
        // Add a CSS class to style the fixed menu
    } else {
        // The menu is not fixed or not visible
        fixedMenu.style.position = "relative";
        fixedMenu.style.top = 0 + "px";
        // Remove the CSS class to reset the styling
    }
    if(scrollPosition >= bottom){
        fixedMenu.style.position = "absolute";
        fixedMenu.style.bottom = 0 + "px";
        fixedMenu.style.top = "";
    }else if(scrollPosition <= bottom && scrollPosition >= threshold){
        fixedMenu.style.position = "fixed";
        fixedMenu.style.top = 15 + "px";
    }
}

// Attach the scroll event listener to the window
window.addEventListener("scroll", handleScroll);

// Initial check in case the menu is already fixed when the page loads
handleScroll();

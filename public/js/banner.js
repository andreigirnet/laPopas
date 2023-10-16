// function getScrollbarWidth() {
//
//     // Creating invisible container
//     const outer = document.createElement('div');
//     outer.style.visibility = 'hidden';
//     outer.style.overflow = 'scroll'; // forcing scrollbar to appear
//     outer.style.msOverflowStyle = 'scrollbar'; // needed for WinJS apps
//     document.body.appendChild(outer);
//
//     // Creating inner element and placing it in the container
//     const inner = document.createElement('div');
//     outer.appendChild(inner);
//
//     // Calculating difference between container's full width and the child width
//     const scrollbarWidth = (outer.offsetWidth - inner.offsetWidth);
//
//     // Removing temporary elements from the DOM
//     outer.parentNode.removeChild(outer);
//
//     return scrollbarWidth;
//
// }
// let slider = document.getElementById('innerBanner');
// let previous = document.getElementById('prevArrow');
// let next = document.getElementById('nextArrow');
// const screenWidth = slider.offsetWidth - getScrollbarWidth();
// let limit = 0; // Initialize the limit to 0
//
// next.addEventListener('click', () => {
//     if (limit < screenWidth * 3) { // Change 4 to the number of slides you have minus 1
//         limit += screenWidth;
//         slider.style.transform = `translateX(-${limit}px)`;
//     }
// });
//
// previous.addEventListener('click', () => {
//     if (limit > 0) {
//         limit -= screenWidth;
//         slider.style.transform = `translateX(-${limit}px)`;
//     }
// });


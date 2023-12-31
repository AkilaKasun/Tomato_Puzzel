window.addEventListener("load", function () {
    setTimeout(function () {
    // Hide preloader
    document.querySelector(".preloader").style.display = "none";
    
    // Create the overlay box
    const overlayBox = document.createElement("div");
    overlayBox.className = "overlay-box";
    
   
    document.body.appendChild(overlayBox);
    }, 1500); // 3000 milliseconds (3 seconds)
    });
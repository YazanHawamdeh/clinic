const searchBar = document.getElementById("search-bar");
const overlay = document.getElementById("overlay");

document.getElementById("search-icon").addEventListener("click", function() {
    // If the search bar is becoming active
    if (!searchBar.classList.contains("active")) {
        searchBar.style.display = "block";
        setTimeout(function() {
            searchBar.classList.add("active");
        }, 10); // A short delay to ensure the browser renders the `display` change before the transition
    } else {
        // If the search bar is deactivating
        searchBar.classList.remove("active");
        setTimeout(function() {
            searchBar.style.display = "none";
        }, 300); // Wait for the transition to complete before hiding
    }

    // Toggle overlay visibility
    overlay.classList.toggle("active");
});

overlay.addEventListener("click", function() {
    // Remove 'active' classes to start hiding the elements
    searchBar.classList.remove("active");
    overlay.classList.remove("active");

    // After transition, hide the search bar completely
    setTimeout(function() {
        searchBar.style.display = "none";
    }, 300); // The duration should match the CSS transition duration
});

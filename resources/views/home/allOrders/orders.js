// Pagination Variables
let currentPage = 1;
let itemsPerPage = parseInt(document.querySelector('.results-number').value);
const ordersListElement = document.querySelector('.orders-list');
const pageNumbersElement = document.querySelector('.page-numbers');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
const resultsNumberInput = document.querySelector('.results-number');

// Collect all order items from the HTML
let allOrders = Array.from(document.querySelectorAll('.order-item'));

// Function to Display Orders
function displayOrders() {
    const totalPages = Math.ceil(allOrders.length / itemsPerPage);

    // Validate currentPage
    if (currentPage > totalPages) currentPage = totalPages;
    if (currentPage < 1) currentPage = 1;

    // Calculate start and end index
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = Math.min(startIndex + itemsPerPage, allOrders.length); // Ensure not to exceed total items

    // Update the input field value to the number of items displayed
    resultsNumberInput.value = endIndex - startIndex;

    // Clear previous orders
    ordersListElement.innerHTML = '';

    // Render orders
    allOrders.slice(startIndex, endIndex).forEach((order, index) => {
        // Update the order number
        order.querySelector('.order-no').textContent = String(startIndex + index + 1).padStart(2, '0');
        // Clone the order item to remove any existing event listeners
        const orderClone = order.cloneNode(true);
        // Add delete functionality to each order
        orderClone.querySelector('.delete-btn').addEventListener('click', () => deleteOrder(startIndex + index));
        ordersListElement.appendChild(orderClone);
    });

    // Update page numbers display
    pageNumbersElement.innerHTML = ''; // Clear previous page numbers
    for (let i = 1; i <= totalPages; i++) {
        const pageNumber = document.createElement('span');
        pageNumber.classList.add('me-2');
        pageNumber.textContent = i.toString().padStart(2, '0'); // Format as 2-digit
        if (i === currentPage) {
            pageNumber.classList.add('active-page'); // Highlight current page
        } else {
            pageNumber.classList.remove('active-page');
        }
        pageNumber.addEventListener('click', () => {
            currentPage = i;
            displayOrders();
        });
        pageNumbersElement.appendChild(pageNumber);
    }

    // Disable/Enable buttons
    prevBtn.disabled = currentPage === 1;
    nextBtn.disabled = currentPage === totalPages;
}

// Function to Delete an Order
function deleteOrder(orderIndex) {
    // Remove the order from the allOrders array
    allOrders.splice(orderIndex, 1);

    // If the current page is now empty, move to the previous page if possible
    const totalPages = Math.ceil(allOrders.length / itemsPerPage);
    if (currentPage > totalPages) {
        currentPage = totalPages;
    }

    // Re-display orders
    displayOrders();
}

// Event Listeners for Pagination Buttons
prevBtn.addEventListener('click', () => {
    if (currentPage > 1) {
        currentPage--;
        displayOrders();
    }
});

nextBtn.addEventListener('click', () => {
    const totalPages = Math.ceil(allOrders.length / itemsPerPage);
    if (currentPage < totalPages) {
        currentPage++;
        displayOrders();
    }
});

// Event Listener for Results Number Input
resultsNumberInput.addEventListener('change', (e) => {
    const value = parseInt(e.target.value);
    if (value > 0) {
        itemsPerPage = value;
        currentPage = 1; // Reset to first page
        displayOrders();
    }
});

// Initial Display
displayOrders();

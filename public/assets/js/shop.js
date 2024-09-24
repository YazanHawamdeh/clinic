document.addEventListener('DOMContentLoaded', function() {
    const productCards = document.querySelectorAll('.Cards .col-lg-3');
    const prevPageButton = document.querySelector('.pagination .prev-page');
    const nextPageButton = document.querySelector('.pagination .next-page');
    const pageNumbersContainer = document.querySelector('.pagination .page-numbers');
    let currentPage = 1;
    const cardsPerPage = 12; // Maximum cards per page
    const totalPages = Math.ceil(productCards.length / cardsPerPage);

    // Function to generate page numbers
    function generatePageNumbers() {
        pageNumbersContainer.innerHTML = ''; // Clear existing page numbers
        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement('button');
            pageButton.classList.add('page-number', 'btn', 'btn-light');
            if (i === currentPage) {
                pageButton.classList.add('active');
            }
            pageButton.textContent = `0${i}`.slice(-2); // Display 01, 02, etc.
            pageButton.setAttribute('data-page', i);
            pageNumbersContainer.appendChild(pageButton);
        }

        // Add event listeners to the new page buttons
        document.querySelectorAll('.pagination .page-number').forEach(button => {
            button.addEventListener('click', function() {
                currentPage = parseInt(this.getAttribute('data-page'));
                showPage(currentPage);
            });
        });
    }

    // Function to display the current page of products
    function showPage(page) {
        const startIndex = (page - 1) * cardsPerPage;
        const endIndex = startIndex + cardsPerPage;

        productCards.forEach((card, index) => {
            if (index >= startIndex && index < endIndex) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });

        // Update the active state of the page buttons
        document.querySelectorAll('.pagination .page-number').forEach(button => {
            button.classList.remove('active');
            if (parseInt(button.getAttribute('data-page')) === page) {
                button.classList.add('active');
            }
        });

       
    }

    // Event listeners for previous and next buttons
    prevPageButton.addEventListener('click', function() {
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    });

    nextPageButton.addEventListener('click', function() {
        if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
        }
    });

    // Initialize the page
    generatePageNumbers();
    showPage(1);
});




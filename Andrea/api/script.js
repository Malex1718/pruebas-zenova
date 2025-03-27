document.addEventListener("DOMContentLoaded", () => {
    const productList = document.getElementById("product-list");
    const searchInput = document.getElementById("search");
    const categoryFilter = document.getElementById("category-filter");
    const themeToggle = document.getElementById("theme-toggle");
    const loadingIndicator = document.getElementById("loading");

    function fetchProducts() {
        loadingIndicator.classList.remove("hidden");
        fetch("http://localhost/api/productos")
            .then(response => response.json())
            .then(data => {
                loadingIndicator.classList.add("hidden");
                displayProducts(data.data);
            })
            .catch(error => console.error("Error fetching products:", error));
    }

    function displayProducts(products) {
        productList.innerHTML = "";
        products.forEach(product => {
            const productCard = document.createElement("div");
            productCard.classList.add("product-card");
            productCard.innerHTML = `
                <h3>${product.name}</h3>
                <p>Precio: $${product.price}</p>
                <p>Categoría: ${product.category}</p>
            `;
            productList.appendChild(productCard);
        });
    }

    themeToggle.addEventListener("click", () => {
        document.body.classList.toggle("dark-mode");
        localStorage.setItem("theme", document.body.classList.contains("dark-mode") ? "dark" : "light");
    });

    fetchProducts();
});

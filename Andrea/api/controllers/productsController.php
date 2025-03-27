<?php


require_once __DIR__ . '/../models/products.php';
require_once __DIR__ . '/../config/db.php';

class ProductsController {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener todos los productos
    public function getProducts($page, $limit) {
        if (!$this->conn) {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Database connection error"]);
            return;
        }

        try {
            $productsModel = new Products($this->conn);
            $products = $productsModel->getAllProducts($page, $limit);

            if (!$products) {
                http_response_code(404);
                echo json_encode(["status" => "error", "message" => "No products found"]);
                return;
            }

            http_response_code(200);
            echo json_encode(["status" => "success", "data" => $products]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Internal Server Error: " . $e->getMessage()]);
        }
    }

    // Obtener un producto por ID
    public function getProductsById($id) {
        if (!$this->conn) {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Database connection error"]);
            return;
        }

        try {
            $productsModel = new Products($this->conn);
            $products = $productsModel->getProductsById($id);

            if (!$products) {
                http_response_code(404);
                echo json_encode(["status" => "error", "message" => "Product not found"]);
                return;
            }

            http_response_code(200);
            echo json_encode(["status" => "success", "data" => $products]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Internal Server Error: " . $e->getMessage()]);
        }
    }

    // Obtener productos por categoría
    public function getProductsByCategory($category) {
        if (!$this->conn) {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Database connection error"]);
            return;
        }

        try {
            $productsModel = new Products($this->conn);
            $products = $productsModel->getProductsByCategory($category);

            if (!$products) {
                http_response_code(404);
                echo json_encode(["status" => "error", "message" => "No products found in this category"]);
                return;
            }

            http_response_code(200);
            echo json_encode(["status" => "success", "data" => $products]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Error fetching products: " . $e->getMessage()]);
        }
    }

    // Buscar productos por término
    public function searchProducts($term) {
        if (!$this->conn) {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Database connection error"]);
            return;
        }

        try {
            $productsModel = new Products($this->conn);
            $products = $productsModel->searchProducts($term);

            if (!$products) {
                http_response_code(404);
                echo json_encode(["status" => "error", "message" => "No products found matching your search"]);
                return;
            }

            http_response_code(200);
            echo json_encode(["status" => "success", "data" => $products]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Error searching products: " . $e->getMessage()]);
        }
    }
}
?>

<?php


require_once __DIR__ . '/../models/category.php';
require_once __DIR__ . '/../config/db.php';

class CategoryController {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener todas las categorías
    public function getCategories() {
        if (!$this->conn) {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Database connection error"]);
            return;
        }

        try {
            $categoryModel = new Category($this->conn);
            $categories = $categoryModel->getAllCategories();

            if (!$categories) {
                http_response_code(404);
                echo json_encode(["status" => "error", "message" => "No categories found"]);
                return;
            }

            http_response_code(200);
            echo json_encode(["status" => "success", "data" => $categories]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Error fetching categories: " . $e->getMessage()]);
        }
    }
}
?>


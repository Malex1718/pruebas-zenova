<?php

require_once __DIR__ . '/../config/db.php';

class Products {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllProducts($page, $limit) {
        try {
            $offset = ($page - 1) * $limit;
            $query = "SELECT * FROM products LIMIT :limit OFFSET :offset";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error fetching products: " . $e->getMessage());
        }
    }

    public function getProductsById($id) {
        try {
            $query = "SELECT * FROM products WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error fetching product by ID: " . $e->getMessage());
        }
    }

    public function getProductsByCategory($category) {
        try {
            $query = "SELECT * FROM products WHERE category_id = (SELECT id FROM categories WHERE name = :category)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error fetching products by category: " . $e->getMessage());
        }
    }

    public function searchProducts($term) {
        try {
            $query = "SELECT * FROM products WHERE name LIKE :term OR description LIKE :term";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':term', '%' . $term . '%', PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error searching products: " . $e->getMessage());
        }
    }
}
?>

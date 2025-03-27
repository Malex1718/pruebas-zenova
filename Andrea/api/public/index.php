<?php

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../controllers/productsController.php';
require_once __DIR__ . '/../controllers/categoryController.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

if ($uri[1] !== 'api') {
    echo json_encode(['message' => 'Invalid API endpoint']);
    exit;
}

// Controladores
$productsController = new ProductsController($conn);
$categoryController = new CategoryController($conn);

if ($uri[2] === 'productos') {
    switch ($method) {
        case 'GET':
            if (isset($uri[3])) {
                if (is_numeric($uri[3])) {
                    $productsController->getProductsById($uri[3]);
                } else if ($uri[3] === 'categoria') {
                    $category = $uri[4] ?? '';
                    $productsController->getProductsByCategory($category);
                } else if ($uri[3] === 'buscar') {
                    $term = $_GET['q'] ?? '';
                    $productsController->searchProducts($term);
                }
            } else {
                $page = $_GET['page'] ?? 1;
                $limit = $_GET['limit'] ?? 10;
                $productsController->getProducts($page, $limit);
            }
            break;
        default:
            echo json_encode(['message' => 'Method not allowed']);
            break;
    }
} else if ($uri[2] === 'categorias' && $method === 'GET') {
    $categoryController->getCategories();
} else {
    echo json_encode(['message' => 'Invalid endpoint']);
}
?>

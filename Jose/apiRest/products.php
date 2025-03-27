<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:*");
header("Access-Control-Allow-Methods:*");

$db_conn = mysqli_connect("localhost", "root", "", "zenova");
if (!$db_conn) { // Verifica si la conexión falló
    die("Connection failed: " . mysqli_connect_error());
}

$method = $_SERVER['REQUEST_METHOD'];

// echo "test----" . $method;
// die;

switch ($method) {
    case 'GET':
        $sql = "SELECT * FROM products";
        $result = mysqli_query($db_conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            echo json_encode($rows);
            http_response_code(200);
            return;
        } else {
            http_response_code(404);
            echo json_encode(["message" => "No products found"]);
            return;
        }
    case 'POST':
        $data = json_decode(file_get_contents("php://input"));
        var_dump($data);
        $name = $data->name;
        $description = $data->description;
        $price = $data->price;
        $category = $data->category;
        $image = $data->image;
        $score = $data->score;
        $stock = $data->stock;
        $onOffer = $data->onOffer;
        $discount = $data->discount;
        $sql = "INSERT INTO products (name, description, price, category, image, score, stock, onOffer, discount) VALUES ('$name', '$description', $price, '$category', '$image', $score, $stock, $onOffer, $discount)";
        $result = mysqli_query($db_conn, $sql);
        if ($result) {
            http_response_code(201); // Código 201: Creado exitosamente
            echo json_encode(["message" => "Product created successfully"]);
            return;
        } else {
            http_response_code(500); // Código 500: Error interno del servidor
            echo json_encode(["message" => "Products didn't create"]);
            return;
        }
    case 'PUT':
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $data['id'];
        $name = $data['name'];
        $description = $data['description'];
        $price = $data['price'];
        $category = $data['category'];
        $image = $data['image'];
        $score = $data['score'];
        $stock = $data['stock'];
        $onOffer = $data['onOffer'];
        $discount = $data['discount'];

        $sql = "UPDATE products 
                SET name='$name', 
                    description='$description', 
                    price=$price, 
                    category='$category', 
                    image='$image', 
                    score=$score, 
                    stock=$stock, 
                    onOffer=$onOffer, 
                    discount=$discount 
                WHERE id=$id";

        $result = mysqli_query($db_conn, $sql);

        if ($result) {
            http_response_code(200); // Código 200: Actualización exitosa
            echo json_encode(["message" => "Product updated successfully"]);
            return;
        } else {
            http_response_code(500); // Código 500: Error interno del servidor
            echo json_encode(["message" => "Failed to update product"]);
            return;
        }
    case 'DELETE':
        $id = $data['id'];
        $sql = "DELETE FROM products WHERE id=$id";
        $result = mysqli_query($db_conn, $sql);

        if ($result && mysqli_affected_rows($db_conn) > 0) {
            http_response_code(200); // Código 200: Eliminación exitosa
            echo json_encode(["message" => "Product deleted successfully"]);
            return;
        } else {
            http_response_code(404); // Código 404: Producto no encontrado
            echo json_encode(["message" => "Product not found or already deleted"]);
            return; // Missing semicolon fixed here
        }
    default:
        echo "Method not allowed";
        break;
}


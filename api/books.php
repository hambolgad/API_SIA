<?php
header("Content-Type: application/json");
require "db.php";
// http://localhost/api/books.php
$method = $_SERVER['REQUEST_METHOD'];
$data = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case 'GET':
        $stmt = $pdo->query("SELECT * FROM books");
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($books);
        break;

    case 'POST':
        $title = $data['title'] ?? '';
        $author = $data['author'] ?? '';
        if ($title && $author) {
            $stmt = $pdo->prepare("INSERT INTO books (title, author) VALUES (?, ?)");
            $stmt->execute([$title, $author]);
            echo json_encode(["status" => "success", "message" => "Book added"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Missing fields"]);
        }
        break;

    case 'PUT':
        $id = $data['id'] ?? null;
        $title = $data['title'] ?? '';
        $author = $data['author'] ?? '';
        if ($id && $title && $author) {
            $stmt = $pdo->prepare("UPDATE books SET title=?, author=? WHERE id=?");
            $stmt->execute([$title, $author, $id]);
            echo json_encode(["status" => "success", "message" => "Book updated"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Missing fields"]);
        }
        break;

    case 'DELETE':
        $id = $data['id'] ?? null;
        if ($id) {
            $stmt = $pdo->prepare("DELETE FROM books WHERE id=?");
            $stmt->execute([$id]);
            echo json_encode(["status" => "success", "message" => "Book deleted"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Missing ID"]);
        }
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Method not allowed"]);
        break;
}
?>

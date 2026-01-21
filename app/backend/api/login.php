<?php
session_start();
require "../config/db.php";

$data = json_decode(file_get_contents("php://input"), true);

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$data['email']]);
$user = $stmt->fetch();

if (!$user || !password_verify($data['password'], $user['password'])) {
  http_response_code(401);
  echo json_encode(["error" => "Ongeldige login"]);
  exit;
}

$_SESSION['user'] = [
  "id" => $user['id'],
  "role" => $user['role'],
  "class" => $user['class']
];

echo json_encode($_SESSION['user']);

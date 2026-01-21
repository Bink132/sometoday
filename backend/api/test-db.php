<?php
require "../config/db.php";

$stmt = $pdo->query("SELECT COUNT(*) as total FROM users");
$result = $stmt->fetch();

echo json_encode($result);

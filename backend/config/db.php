<?php
$host = "database-5019436085.webspace-host.com";
$db   = "dbs15206090";
$user = "dbu1907982";
$pass = "IBrdamst01"; // ← die van Strato

try {
  $pdo = new PDO(
    "mysql:host=$host;dbname=$db;charset=utf8mb4",
    $user,
    $pass,
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
  );
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode([
    "error" => "Database verbinding mislukt",
    "details" => $e->getMessage()
  ]);
  exit;
}

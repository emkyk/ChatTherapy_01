<?php
// 環境を切り替える変数
$environment = 'development'; // 'development' または 'production' に切り替え

if ($environment === 'development') {
//    $servername = "localhost";
//    $username = "root";
//    $password = "";
//    $dbname = "esupport01";
  
    $host = 'localhost';
    $db   = 'esupport01';
    $user = 'root';
    $pass = '';
} else {
    $host = 'your_sakura_server_host';
    $db   = 'esupport01';
    $user = 'your_sakura_db_username';
    $pass = 'your_sakura_db_password';
}

$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>

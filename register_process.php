<?php
session_start();
require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        // メールアドレスの重複チェック
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        if ($stmt->fetch()) {
            $error = 'このメールアドレスは既に登録されています。';
            $_SESSION['error'] = $error;
            header('Location: register.php');
            exit();
        }

        // ユーザーをデータベースに追加
        $stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        $stmt->execute(['name' => $name, 'email' => $email, 'password' => $password]);

        // 登録成功メッセージを設定
        $_SESSION['success'] = 'ユーザー登録が完了しました。ログインしてください。';
        header('Location: login.php');
        exit();
    } catch (PDOException $e) {
        $_SESSION['error'] = 'データベースエラー: ' . $e->getMessage();
        header('Location: register.php');
        exit();
    }
} else {
    header('Location: register.php');
    exit();
}
?>

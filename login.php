<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // データベース接続
    require 'db_config.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    // ユーザー認証
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header('Location: dashboard.php');
        exit();
    } else {
        $error = 'メールアドレスまたはパスワードが正しくありません。';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン - 私たちChatTherapyは、経験豊富な専門家による質の高いサポートを提供することを使命としています。どんな悩みや不安も、信頼できるプロフェッショナルがしっかりと受け止め、解決へと導きます。</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'templates/header.php'; ?>
    <div class="container">
        <h2>ログイン</h2>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form action="login.php" method="post">
            <label for="email">メールアドレス:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="password">パスワード:</label>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="ログイン">
        </form>
    </div>
    <?php include 'templates/footer.php'; ?>
</body>
</html>

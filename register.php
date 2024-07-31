<?php
session_start();
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー登録 - eAIsupporters</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'templates/header.php'; ?>
    <div class="container">
        <h2>ユーザー登録</h2>
        <?php if ($error): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form action="register_process.php" method="post">
            <label for="name">名前:</label>
            <input type="text" id="name" name="name" required><br>
            <label for="email">メールアドレス:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="password">パスワード:</label>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="登録">
        </form>
    </div>
    <?php include 'templates/footer.php'; ?>
</body>
</html>

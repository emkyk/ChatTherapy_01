<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

$user_name = $_POST['user_name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$occupation = $_POST['occupation'];
$discussion_about = $_POST['discussion_about'];
$discussion_details = $_POST['discussion_details'];
$type = $_POST['type'];
$topic = $_POST['topic'];
$specialty = $_POST['specialty'];
$time = $_POST['time'];
$counselor = $_POST['counselor'];

// ここにAI相談機能を実装します
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>AI相談画面 - eAIsupporters</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include '../templates/header.php'; ?>
    <div class="container">
        <h2>AI相談画面</h2>
        <p>相談者: <?php echo htmlspecialchars($user_name); ?></p>
        <p>カウンセラー: <?php echo htmlspecialchars($counselor); ?></p>
        <p>相談内容: <?php echo htmlspecialchars($discussion_details); ?></p>
        <!-- ここにAI相談機能を実装します -->
        <p>AI相談機能がここに実装されます。</p>
        <button onclick="history.back()">戻る</button>
    </div>
    <?php include '../templates/footer.php'; ?>
</body>
</html>

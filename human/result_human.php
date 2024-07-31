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

// 人間カウンセラーを決定するロジックをここに追加します

$counselor = "人間カウンセラー名"; // 仮のカウンセラー名
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>人間カウンセラー結果 - eAIsupporters</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include '../templates/header.php'; ?>
    <div class="container">
        <h2>人間カウンセラー結果</h2>
        <p>名前: <?php echo htmlspecialchars($user_name); ?></p>
        <p>性別: <?php echo htmlspecialchars($gender); ?></p>
        <p>年齢: <?php echo htmlspecialchars($age); ?></p>
        <p>職業: <?php echo htmlspecialchars($occupation); ?></p>
        <p>相談したいこと: 誰について - <?php echo htmlspecialchars($discussion_about); ?></p>
        <p>相談したいこと: どのような - <?php echo htmlspecialchars($discussion_details); ?></p>
        <p>タイプ: <?php echo htmlspecialchars($type); ?></p>
        <p>相談内容: <?php echo htmlspecialchars($topic); ?></p>
        <p>専門分野: <?php echo htmlspecialchars($specialty); ?></p>
        <p>相談時間: <?php echo htmlspecialchars($time); ?> 分</p>
        <p>カウンセラー: <?php echo htmlspecialchars($counselor); ?></p>
        <form action="counsel_human.php" method="post">
            <input type="hidden" name="user_name" value="<?php echo htmlspecialchars($user_name); ?>">
            <input type="hidden" name="gender" value="<?php echo htmlspecialchars($gender); ?>">
            <input type="hidden" name="age" value="<?php echo htmlspecialchars($age); ?>">
            <input type="hidden" name="occupation" value="<?php echo htmlspecialchars($occupation); ?>">
            <input type="hidden" name="discussion_about" value="<?php echo htmlspecialchars($discussion_about); ?>">
            <input type="hidden" name="discussion_details" value="<?php echo htmlspecialchars($discussion_details); ?>">
            <input type="hidden" name="type" value="<?php echo htmlspecialchars($type); ?>">
            <input type="hidden" name="topic" value="<?php echo htmlspecialchars($topic); ?>">
            <input type="hidden" name="specialty" value="<?php echo htmlspecialchars($specialty); ?>">
            <input type="hidden" name="time" value="<?php echo htmlspecialchars($time); ?>">
            <input type="hidden" name="counselor" value="<?php echo htmlspecialchars($counselor); ?>">
            <input type="submit" value="相談開始">
        </form>
        <button onclick="history.back()">戻る</button>
    </div>
    <?php include '../templates/footer.php'; ?>
</body>
</html>

<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}
$user_name = $_SESSION['user_name'];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>AIカウンセラー選択 - eAIsupporters</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include '../templates/header.php'; ?>
    <div class="container">
        <h2>AIカウンセラー選択</h2>
        <form action="result_ai.php" method="post">
            <label for="user_name">あなたのお名前:</label>
            <input type="text" id="user_name" name="user_name" value="<?php echo htmlspecialchars($user_name); ?>" readonly><br>

            <label for="gender">あなたの性別:</label>
            <select id="gender" name="gender" required>
                <option value="male">男性</option>
                <option value="female">女性</option>
                <option value="other">その他</option>
            </select><br>

            <label for="age">あなたの年齢:</label>
            <select id="age" name="age" required>
                <option value="teens">10代</option>
                <option value="20s">20代</option>
                <option value="30s">30代</option>
                <option value="40s">40代</option>
                <option value="50s">50代</option>
                <option value="60s">60代</option>
                <option value="70s">70代</option>
                <option value="80s">80代</option>
                <option value="90s">90代以上</option>
            </select><br>

            <label for="occupation">あなたの職業:</label>
            <select id="occupation" name="occupation" required>
                <option value="student">学生</option>
                <option value="company_employee">会社員</option>
                <option value="housewife">主婦</option>
                <option value="part_time">アルバイト・パート</option>
                <option value="self_employed">自営業</option>
                <option value="freelancer">自由業</option>
                <option value="other">その他</option>
            </select><br>

            <label for="discussion_about">相談したいこと: 誰について（自分、両親、息子、彼女、友だちなど）</label>
            <input type="text" id="discussion_about" name="discussion_about" required><br>

            <label for="discussion_details">相談したいこと: どのような（進学・就職、健康、別れ、トラブルなど）</label>
            <textarea id="discussion_details" name="discussion_details" required></textarea><br>

            <label for="type">相談したいカウンセラーのタイプ:</label>
            <select id="type" name="type" required>
                <option value="soft">ソフト（とことん優しい）</option>
                <option value="normal">ノーマル（しごく真っ当）</option>
                <option value="hard">ハード（バシバシ厳しめ）</option>
                <option value="hot">ホット（とにかく熱血）</option>
                <option value="cool">クール（極めて冷静）</option>
            </select><br>

            <label for="topic">相談内容:</label>
            <select id="topic" name="topic" required>
                <option value="stress">ストレス管理</option>
                <option value="mental_health">メンタルヘルス</option>
                <option value="life_events">ライフイベント</option>
                <option value="relationships">人間関係</option>
                <option value="self_growth">自己成長と自己啓発</option>
                <option value="family_issues">家族問題</option>
            </select><br>

            <label for="specialty">専門分野:</label>
            <select id="specialty" name="specialty" required>
                <option value="clinical_psychology">臨床心理学</option>
                <option value="educational_counseling">教育カウンセリング</option>
                <option value="family_therapy">家族療法</option>
                <option value="rehabilitation">リハビリテーション</option>
            </select><br>

            <label for="time">相談時間の目安 (分):</label>
            <input type="number" id="time" name="time" min="1" max="60" value="30" required><br>

            <input type="submit" value="検索">
        </form>
        <button onclick="history.back()">戻る</button>
    </div>
    <?php include '../templates/footer.php'; ?>
</body>
</html>

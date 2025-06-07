<?php
require_once('config/status_codes.php');

$answer_code = htmlspecialchars($_POST['answer_code'], ENT_QUOTES);
$option = htmlspecialchars($_POST['option'], ENT_QUOTES);
if (!$option) {
    header('Location: index.php');
    exit;
}
// データ送信うまくいかなかったら最初のページに戻る
// ！は否定の意味
// Locationはページの指定

foreach($status_codes as $status_code) {
    if ($status_code['code'] === $answer_code) {
        $code = $status_code['code'];
        $description = $status_code['description'];
    }
// $status_code一覧から$answer_codeと一致するもの見つけて、
// 一致したら$codeという箱に正解のコード入れて、
// $descriptionという箱に正解の説明入れて
}

$result = $option === $code
// optionとcodeが一致したものをresultとする
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Code Quiz</title>
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/result.css">
</head>

<body>
    <header class="header">
    <div class="header__inner">
        <a class="header__logo" href="/">
        Status Code Quiz
        </a>
    </div>
    </header>

    <main>
        <div class="result__content">
            <!-- 正解か不正解か -->
            <div class="result">
                <?php if ($result): ?>
                <!-- もし$resultがあれば -->
                 <!-- :?>はHTMLと混ぜて使うときの書き方 -->
                <h2 class="result__text--correct">正解</h2>

                <?php else: ?>
                <h2 class="result__text--incorrect">不正解</h2>
                <!-- 同じ要素やけど正解と不正解で見た目を分けたいからModifierまで指定してる -->
                <?php endif; ?>
                <!-- if条件の終わりを示している -->
            </div>
            <div class="answer-table">
                <table class="answer-table__inner">
                    <tr class="answer-table__row">
                        <th class="answer-table__header">ステータスコード</th>
                        <td class="answer-table__text">
                            <?php echo $code ?>
                        </td>
                    </tr>
                    <tr class="answer-table__row">
                        <th class="answer-table__header">説明</th>
                        <td class="answer-table__text">
                            <?php echo $description?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>


</html>

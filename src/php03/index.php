<?php
require_once('config/status_codes.php');
$random_numbers=array_rand($status_codes,4);
// status_codeからランダムに4つ取り出す

foreach($random_numbers as $index){
$options[]=$status_codes[$index];
}
// $random_numbersの4つを$indexに入れていく
// option:indexに入れたものを後ろへ並べてく
$question = $options[mt_rand(0,3)];
// 答えをランダムに選ぶ
// その答えの$status_codesを$questionに渡す
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Status Code Quiz</title>
<link rel="stylesheet" href="css/sanitize.css">
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/index.css">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/php03">
                Status Code Quiz
            </a>
        </div>
    </header>
    <main>
    <!-- ここがページの本体です -->
        <div class="quiz__content">
            <div class="question">
            <!-- 問題文の枠 -->
                <p class="question__text">Q. 以下の内容に当てはまるステータスコードを選んでください</p>
                <p class="question__text">
                <?php echo $question['description']?>
                <!-- ランダムで選ばれた答えの説明文を表示させる -->
                </p>
                <!-- 問題の中身を表示する -->
            </div>

            <form class="quiz-form" action="result.php" method="post">
            <!-- 結果はresult.phpへ送る -->
                <input type="hidden" name="answer_code" value="<?php echo $question['code'] ?>">
                <!-- 正解も送らないと比較できない -->
                <div class="quiz-form__item">
                    <?php foreach ($options as $option): ?>
                    <!-- 選択肢の説明文を表示させる -->
                    <div class="quiz-form__group">
                        <input class="quiz-form__radio" id="<?php echo $option['code'] ?>" type="radio" name="option" value="<?php echo $option['code'] ?>">
                        <!-- radioは複数選択不可の選択肢 -->
                        <!-- idとforで、inputとlabelをつなぐ -->

                        <label class="quiz-form__label" for="<?php echo $option['code'] ?>">
                        <?php echo $option['code'] ?>
                        </label>
                        <!-- labelはユーザーが何を入力したらいいか書いてる -->
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- 回答ボタン -->
                <div class="quiz-form__button">
                    <button class="quiz-form__button-submit" type="submit">
                        回答
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
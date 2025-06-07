<?php

require_once('functions/search_city_time.php');
// 更新されるものではないからonceで1回読み込みでOK

$tokyo = searchCityTime('東京');
// searchCityTimeに「東京」って渡してその結果を$tokyoっていう箱に入れる

$city = htmlspecialchars($_GET['city'], ENT_QUOTES);
$comparison = searchCityTime($city);
?>
<!-- searchCityTime関数で返ってきた情報を$comparisonっていう箱に入れておく -->

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Clock</title>
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/result.css">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/php02/index.php">
        World Clock
            </a>
        </div>
    </header>
    <main>
        <div class="result__content">
            <div class="result-cards">
                <!-- 左のカード -->
                <div class="result-card">
                    <div class="result-card__img-wrapper">
                        <img class="result-card__img" src="img/<?php echo $tokyo['img']?>" alt="国旗">
                        <!-- 上部で$tokyoっていう箱作ってる -->
                    </div>
                    <div class="result-card__body">
                        <p class="result-card__city"><?php echo $tokyo['name']?></p>
                        <p class="result-card__time"><?php echo $tokyo['time']?></p>
                    </div>
                </div>
                <!-- 右のカード -->
                <div class="result-card">
                    <div class="result-card__img-wrapper">
                        <img class="result-card__img" src="img/<?php echo $comparison['img']?>" alt="国旗">
                    </div>
                    <div class="result-card__body">
                        <p class="result-card__city"><?php echo $comparison['name']?></p>
                        <p class="result-card__time"><?php echo $comparison['time']?></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>

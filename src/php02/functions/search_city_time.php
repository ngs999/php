<!-- ここでは「その地域の時間を調べる関数」が書いてある -->
<?php
function searchCityTime($city_name)
{
// functionは関数作成のためのもの
// つまり、ここでsearchCityTimeっていう関数が作られている

require('config/cities.php');
// 時間は随時変わっていくからrequireで何回も読み込むようにしている

foreach($cities as $city) {
// $citiesの都市を1つずつ取り出して$cityに入れていく。それをループする
    if ($city['name']===$city_name){
    // $city['name']：一覧
    // $city_name：resultからもらった値（今調べたいやつ）

        $date_time = new DateTime('', new DateTimeZone($city["time_zone"]));
        // 今の時間、どの国の？
        // 一覧でペアになってるはずやからこの時点で国名はわかっている

        $time = $date_time->format('H:i');
        $city['time'] = $time;
        // 配列の追加
        // 引っ張ってきた時間を$cityに「time」として情報追加しといて
        return $city;
        // その結果を$cityに返して
        // 戻り値はresult.phpの変数tokyoに格納される
    }
}
}

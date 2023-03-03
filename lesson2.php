<?php
// 以下をそれぞれ表示してください。（すべて改行を行って出力すること)
// 現在時刻を自動的に取得するPHPの関数があるので調べて実装してみて下さい。
// 実行するとその都度現在の日本の日時に合わせて出力されるされるようになればOKです。
// 日時がおかしい場合、PHPのタイムゾーン設定を確認して下さい。



// ・現在日時（xxxx年xx月xx日（x曜日））
// ・現在日時から３日後（yyyy年mm月dd日 H時i分s秒）
// ・現在日時から１２時間前（yyyy年mm月dd日 H時i分s秒）
// ・2020年元旦から現在までの経過日数 (ddd日)

echo date("Y年m月d日")."<br>";
echo date("Y年m月d日H:i:s",strtotime("+3 day"))."<br>";
echo date("Y年m月d日H:i:s",strtotime("-12 hour"))."<br>";

function day_diff($past, $today) {
    $pasttaime = strtotime($past);
    $todaytime = strtotime($today);
    $hikizan = $todaytime - $pasttaime; 
    $out = $hikizan / (60 * 60 * 24);
    return $out;
}
$day = day_diff('2020-1-1', date('Y-m-d'));
echo $day."日";
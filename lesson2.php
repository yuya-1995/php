<?php
// 連想配列に下記の国と都市をそれぞれkey,valueとして格納し,foreach文を使ってフォーマットのとおりに連続で出力して下さい。

// 国名 key
// 日本、アメリカ、イギリス、フランス

// 首都名 value
// 東京、ワシントン、ロンドン、パリ

// フォーマット
// ○○の首都は○○です。

$country = [
    '日本' => '東京',
    'アメリカ' => 'ワシントン',
    'イギリス' => 'ロンドン',
    'フランス' => 'パリ',
];

echo '国名'."<br>";

foreach ($country as $kye => $value) {
    echo $kye.' ';
}

echo "<br>";
echo '首都名';
echo "<br>";

foreach ($country as $kye => $value) {
    echo $value.' ';
}

echo "<br>";

foreach ($country as $kye => $value) {
    echo $kye.'の首都は'.$value.'です。'."<br>";
}


?>
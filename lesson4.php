<?php
// 以下をfor文を使用して表示してください。

// 1
// 21
// 321
// 4321
// 54321
// 654321
// 7654321
// 87654321
// 987654321
//

//下記の変数を起点にして作るようにして下さい。
// $input = 9;
// for($input=1;$input>=1;$input--){
//     echo $input;
// }
// echo "<br>";
// for($input=2;$input>=1;$input--){
//     echo $input;
// }
// echo "<br>";
// for($input=3;$input>=1;$input--){
//     echo $input;
// }
// echo "<br>";
// for($input=4;$input>=1;$input--){
//     echo $input;
// }
// echo "<br>";
// for($input=5;$input>=1;$input--){
//     echo $input;
// }
// echo "<br>";
// for($input=6;$input>=1;$input--){
//     echo $input;
// }
// echo "<br>";
// for($input=7;$input>=1;$input--){
//     echo $input;
// }
// echo "<br>";
// for($input=8;$input>=1;$input--){
//     echo $input;
// }
// echo "<br>";
// for($input=9;$input>=1;$input--){
//     echo $input;
// }
// echo "<br>";

// ループ処理は何万回もの処理が繰り返される場合でも正常に機能する必要があるため
// 数字を直接記述するようなコードでは意味がありません。
// 下記のように変数を一箇所変えるだけで同じような規則性で動作するように実装して下さい。

$input = 7;

// 1
// 21
// 321
// 4321
// 54321
// 654321
//

for($x = $input-1 ; $x >= 0 ; $x -- ){
    for($y = $input ; $y >= $x+1 ; $y --){
      echo $y-$x;
    }
    echo "<br>";
  }

?>
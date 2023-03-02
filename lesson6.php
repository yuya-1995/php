<?php
// 以下配列の中身をfor文を使用して表示してください。
// 表が縦横に伸びてもある程度対応できるように柔軟な作りを目指してください。
// 表示はHTMLの<table>タグを使用すること

/**
 * 表示イメージ
 *  _________________________
 *  |_____|_c1|_c2|_c3|横合計|
 *  |___r1|_10|__5|_20|___35|
 *  |___r2|__7|__8|_12|___27|
 *  |___r3|_25|__9|130|__164|
 *  |縦合計|_42|_22|162|__226|
 *  ‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
 */



// foreach($arr as $value){
//     echo $value['c1'];
// }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>テーブル表示</title>
<style>
table {
    border:1px solid #000;
    border-collapse: collapse;
}
th, td {
    border:1px solid #000;
}
</style>
</head>
<body>
    <!-- ここにテーブル表示 -->
    <table>
        <tr>
            <th>＼</th>
            <th>c1</th>
            <th>c2</th>
            <th>c3</th>
            <th>横合計</th>
        </tr>
            <?php  

$arr = [
    'r1' => ['c1' => 10, 'c2' => 5, 'c3' => 20],
    'r2' => ['c1' => 7, 'c2' => 8, 'c3' => 12],
    'r3' => ['c1' => 25, 'c2' => 9, 'c3' => 130],
];

//縦合計

$sum_row = $arr['r1'];
foreach($sum_row as $sumkey => $sumvalue){
    $sum_row[$sumkey] = 0;
}
//総合計

            //r1.r2.r3部分
            foreach($arr as $key => $value){
                echo "<tr>";
                echo "<th>".$key."</th>";
                $sum_line = 0;
                foreach($value as $key2 => $value2){
                    echo "<td>".$value2."</td>";
                    $sum_line += $value2;
                    $sum_row[$key2] += $value2;
                }

                echo "<td>".$sum_line."</td>";
                echo "</tr>";
                }
                
                echo "<tr>";
                echo "<th>";
                echo "縦合計";
                echo "</th>"; 
               
                    foreach($sum_row as $key_row => $value_row){
                        echo "<td>".$sum_row[$key_row]."</td>";
                        }             
                
                    //総合計部分
                    foreach($sum_row as $key_total => $value_total){
                        $sum_total += $value_total;
                    }
                        echo "<td>".$sum_total."</td>";
                echo "</tr>";

           
            

            
            

            ?>
    </table>
</body>
</html>
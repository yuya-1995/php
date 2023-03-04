<?php
// 下記のようにlesson1のファイルをインポートしてください。
// (他のファイルを参照する関数はいくつかあるので調べてください。)
// (lesson1の文字列がそのまま出力されてしまっていても大丈夫とします。)
require('lesson1.php');


// 下記のクラスを作成してください。

// Patient 
// lesson1からPersonを継承
class Patient extends Person{
    public float $height;
    public float $weight;

    public function __construct($name,$age,$gender,$height,$weight){
        $this->name = $name;
        $this->age = $age;
        $this->gendaer = $gender;
        $this->height = $height/100;
        $this->weight = $weight;
    }

    public function selfIntroduction(){
        echo '私の名前は'.$this->name."です。
        年齢は".$this->age."歳です。
        性別は".$this->gendaer.'です。<br>';
    }

    public function calculateStandardWeight(){
        return $this->height ** 2 *22;
    }

    public function getHeight(){
        return $this->height;
    }

    public function getWeight(){
        return $this->weight;
    }

}

// height: float 身長（ｍ）
// weight: float 体重 (kg)

// __construct(name: string, age:int, gender: string, height: float, weight: float)
// 名前、年齢、性別、身長、体重を受け取り初期化する。

// calculateStandardWeight() :float
// 平均体重を返す （身長 × 身長 × 22)

// getHeight()
// 身長を返す

// getWeight()
// 体重を返す

// クラスが完成したら適当なインスタンスを生成し、
// それぞれの関数を使用して下記のフォーマットで出力してください。

// 〇〇さんの身長は〇〇mなので平均体重は〇〇kgです。 現在の体重は〇〇kgです。

$height = 178.5;
$weight = 65.5;

$yuya = new Patient('ゆーや',27,'男性',177.5,65.5);
echo $yuya->name.'さんの身長は'.$yuya->getHeight().'mなので平均体重は'.$yuya->calculateStandardWeight().'kgです。 現在の体重は'.$yuya->getWeight().'です。';

?>

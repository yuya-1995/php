<?php
//下記のようなクラスを作成してください。
// Person
// name  : string
// age   : int
// gender: string

// __construct(name:string, age:int, gender:string)
// 名前、年齢、 性別を受け取ってプロパティを初期化する。

// selfIntroduction(): string
// 私の名前は〇〇です。年齢は〇〇歳です。性別は〇〇です。 という文字列を出力する。

// addAge(): void
// 誕生日が来ました。 という文字列を出力し、年齢を＋１する。


// クラスができたら適当なインスタンスを作成し、
// 自己紹介→年齢加算→自己紹介の順にメソッドを動かして年齢を確認してください。

class Person{

    public string $name;
    public int $age;
    public string $gendaer;

    public function __construct($name,$age,$gender){
        $this->name = $name;
        $this->age = $age;
        $this->gendaer = $gender;
    }
    public function selfIntroduction(){
        echo '私の名前は'.$this->name."です。
        年齢は".$this->age."歳です。
        性別は".$this->gendaer.'です。<br>';
    }
    public function addage(){
        $this->age += 1;
        echo '誕生日が来ました。<br>';
    }
}

$sasaki = new Person('佐々木',28,'男性');

$sasaki->selfIntroduction();
$sasaki->addage();
$sasaki->selfIntroduction();
$sasaki->addage();
$sasaki->selfIntroduction();
$sasaki->addage();


?>
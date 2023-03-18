<?php
require_once(ROOT_PATH .'Models/contact.php');

class ContactController {
    private $request;   // リクエストパラメータ(GET,POST)
    private $Contact;    

    public function __construct() {
        // リクエストパラメータの取得
        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;

        // モデルオブジェクトの生成
        $this->Contact = new Contact();
        // 別モデルと連携
        $dbh = $this->Contact->get_db_handler();
    }

    //全呼出（まず最初）※SELECT分
    public function allContact(){
        $allContact = $this->Contact->allContact();
        return $allContact;
    }

    //バリデーション（登録）
    public function valContact(){
        $errors = [];
            $name = $this->request['post']['name'];
            if(empty($this->request['post']['name'])){
                $errors[] = 'お名前は必須項目です';
            }elseif(mb_strlen($name)>10){
                $errors[] = 'お名前は10文字以下でご入力ください';
            }

            $kana = $this->request['post']['kana'];
            if(empty($this->request['post']['kana'])){
                $errors[] = 'フリガナは必須項目です';
            }elseif(mb_strlen($kana)>10){
                $errors[] = 'フリガナは10文字以下でご入力ください';
            }

            $tel = $this->request['post']['tel'];
            if(!preg_match('/^0[0-9]+$/',$tel)){
                $errors[] = '数字でご入力ください（ハイフンは不要です）';
            }

            $email = $this->request['post']['email'];
            if (empty($this->request['post']['email'])) {
               $errors[] = 'メールアドレスは必須項目です' ;
            }
            elseif(!preg_match('/^[a-z0-9._*^~-]+@[a-z0-9.-]+$/i',$email)){
                $errors[] ='正しいメールアドレスの形式でご入力ください';
            }

            if (empty($this->request['post']['body'])) {
               $errors[] = 'お問合せ内容は必須項目です' ;
            }

        return $errors;
    
    }

    public function editvalContact(){
        $errors = [];
            $name = $this->request['post']['editname'];
            if(empty($this->request['post']['editname'])){
                $errors[] = 'お名前は必須項目です';
            }elseif(mb_strlen($name)>10){
                $errors[] = 'お名前は10文字以下でご入力ください';
            }

            $kana = $this->request['post']['editkana'];
            if(empty($this->request['post']['editkana'])){
                $errors[] = 'フリガナは必須項目です';
            }elseif(mb_strlen($kana)>10){
                $errors[] = 'フリガナは10文字以下でご入力ください';
            }

            $tel = $this->request['post']['edittel'];
            if(!preg_match('/^0[0-9]+$/',$tel)){
                $errors[] = '数字でご入力ください（ハイフンは不要です）';
            }

            $email = $this->request['post']['editemail'];
            if (empty($this->request['post']['editemail'])) {
               $errors[] = 'メールアドレスは必須項目です' ;
            }
            elseif(!preg_match('/^[a-z0-9._*^~-]+@[a-z0-9.-]+$/i',$email)){
                $errors[] ='正しいメールアドレスの形式でご入力ください';
            }

            if (empty($this->request['post']['editbody'])) {
               $errors[] = 'お問合せ内容は必須項目です' ;
            }

        return $errors;
    
    }

    //登録※insert文
    public function insertContact(){
        $name = $this->request['post']['name'];
        $kana = $this->request['post']['kana'];
        $tel = $this->request['post']['tel'];
        $email = $this->request['post']['email'];
        $body = $this->request['post']['body'];
        if(strlen($tel) === 0){
            $tel = null;
        }
        $this->Contact->insertContact($name,$kana,$tel,$email,$body);
    }

    //編集(事前準備)※値を取得する（SELECT文）
    public function entryContact($id){
        $id = $this->request['post']['id'];
        $entryContact = $this->Contact->entryContact($id);
        return $entryContact;
    }

    //編集※UPDATE文
    public function editContact(){
        
        $editname = $this->request['post']['editname'];
        $editkana = $this->request['post']['editkana'];
        $edittel = $this->request['post']['edittel'];
        $editemail = $this->request['post']['editemail'];
        $editbody = $this->request['post']['editbody'];
        $editid = $this->request['post']['id'];
        if(strlen($edittel) === 0){
            $edittel = null;
        }
        $this->Contact->editContact($editname,$editkana,$edittel,$editemail,$editbody,$editid);
    }

    //削除※DELETE文
    public function deleteContact(){
        $deleteid = $this->request['post']['deleteid'];
        $this->Contact->deleteContact($deleteid);
    }



    // public function index() {
    //     $page = 0;
    //     if(isset($this->request['get']['page'])) {
    //         $page = $this->request['get']['page'];
    //     }

    //     $players = $this->Contact->findAll($page);
    //     $players_count = $this->Contact->countAll();
    //     $params = [
    //         'players' => $players,
    //         'pages' => $players_count / 20,
    //         'page' => $page // ページ番号
    //     ];
    //     return $params;
    // }
}

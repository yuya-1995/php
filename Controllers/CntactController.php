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

    //編集※UPDATE分
    public function editContact(){
        
        $name = $this->request['post']['name'];
        $kana = $this->request['post']['kana'];
        $tel = $this->request['post']['tel'];
        $email = $this->request['post']['email'];
        $body = $this->request['post']['body'];
        $id = $this->request['post']['id'];
        if(strlen($tel) === 0){
            $tel = null;
        }
        $this->Contact->editContact($name,$kana,$tel,$email,$body,$id);

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

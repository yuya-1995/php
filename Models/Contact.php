<?php
require_once(ROOT_PATH .'Models/Db.php');

class Contact extends Db {
    public function __construct($dbh = null) {
        parent::__construct($dbh);
    }

    public function insertContact($name,$kana,$tel,$email,$body){
        try{
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->dbh->beginTransaction();

            $sql = 'INSERT INTO ';
            $sql .= 'contacts (name,kana,tel,email,body) ';
            $sql .= 'VALUES ';
            $sql .= '(:name, :kana, :tel, :email, :body) '; //プレスホルダー

            $sth = $this->dbh->prepare($sql);
            $sth->execute(array(
                ':name' => $name,
                ':kana' => $kana,
                ':tel' => $tel,
                ':email' => $email,
                ':body' => $body
            ));

            $this->dbh->commit(); //トランザクション
        } catch(Exception $e){
            $this->dbh->rollBack();
            echo '登録失敗：'. $e->getMessage()."\n";
            exit();
        }
    }

    /**
     * playersテーブルからすべてデータを取得（20件ごと）
     */
    // public function findAll($page = 0):Array {
    //     $sql = 'SELECT';
    //     $sql .= ' players.id,';
    //     $sql .= ' players.uniform_num,';
    //     $sql .= ' players.position,';
    //     $sql .= ' players.name as player_name,';
    //     $sth = $this->dbh->prepare($sql);
    //     $sth->execute();
    //     $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    //     return $result;
    // }

    /**
     * playersテーブルから全データ数を取得
     *
     *  return $count 全選手の件数
     */
    // public function countAll():Int {
    //     $sql = 'SELECT count(*) as count FROM players';
    //     $sth = $this->dbh->prepare($sql);
    //     $sth->execute();
    //     $count = $sth->fetchColumn();
    //     return $count;
    // }
}
<?php
require_once(ROOT_PATH .'./datebase.php');

class Db {
    protected $dbh;

    public function __construct($dbh = null) {
        if(!$dbh) { // 接続情報が存在しない場合
            try {
                $this->dbh = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST, DB_USER, DB_PASSWD);
                // 接続成功
            } catch (PDOException $e) {
                echo "接続失敗: " . $e->getMessage() . "\n";
                exit();
            }
        } else { // 接続情報が存在する場合
            $this->dbh = $dbh;
        }
    }

    public function get_db_handler() {
        return $this->dbh;
    }

    public function begin_transaction() {
        $this->dbh->beginTransaction();
    }

    public function commit() {
        $this->dbh->commit();
    }

    public function rollback() {
        $this->dbh->rollback();
    }
}
?>
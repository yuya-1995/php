<?php
require_once(ROOT_PATH . 'Models/Db.php');

/**
 * Summary of Contact
 */
class Contact extends Db
{
    public function __construct($dbh = null)
    {
        parent::__construct($dbh);
    }

    //全呼出
    public function allContact()
    {
        $sql = 'SELECT id,name,kana,tel,email,body FROM `contacts`;';
        $table_stmt = $this->dbh->prepare($sql); //構文格納
        $table_stmt->execute();
        $allContact = $table_stmt->fetchAll(PDO::FETCH_ASSOC);
        return $allContact;
    }

    //登録（create）
    public function insertContact($name, $kana, $tel, $email, $body)
    {
        try {
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->beginTransaction();

            //データベースへ登録（create）
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
        } catch (Exception $e) {
            $this->dbh->rollBack();
            echo '登録失敗：' . $e->getMessage() . "\n";
            exit();
        }
    }

    //編集（事前準備）
    public function entryContact($id)
    {
        $sql = "SELECT * FROM `contacts` WHERE id = :id ";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $user = $stmt->fetch();

        return $user;
    }

    //編集
    public function editContact($editname, $editkana, $edittel, $editemail, $editbody, $id)
    {
        try {
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->beginTransaction();

            $sql = "UPDATE contacts SET name = :name, kana = :kana, tel = :tel, email = :email, body = :body WHERE id = :id ";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(array(
                ':name' => $editname,
                ':kana' => $editkana,
                ':tel' => $edittel,
                ':email' => $editemail,
                ':body' => $editbody,
                ':id' => $id
            ));

            $this->dbh->commit(); //トランザクション

        } catch (Exception $e) {
            $this->dbh->rollBack();
            echo '編集失敗：' . $e->getMessage() . "\n";
            echo $editname, $editkana, $edittel, $editemail, $editbody, $id;
            exit();
        }
    }


    //削除
    public function deleteContact($deleteid)
    {
        try {
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->beginTransaction();

            $sql = " DELETE FROM contacts WHERE id = :id ";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(array(
                ':id' => $deleteid
            ));


            $this->dbh->commit(); //トランザクション

        } catch (Exception $e) {
            $this->dbh->rollBack();
            echo '編集失敗：' . $e->getMessage() . "\n";
            echo $deleteid;
            exit();
        }
    }
}

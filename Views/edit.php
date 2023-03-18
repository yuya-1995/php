<?php
require_once(ROOT_PATH . 'Controllers/CntactController.php');

    if(! empty($_POST['editsubmit'])){
        //バリデーション
        $val = new ContactController();
        $e = $val->editvalContact();
        $e_count = count($e);
        if ($e_count == 0) {
            //データベースの情報を更新
            $contact = new ContactController();
            $contact->editContact();
            header('Location: contact.php', true, 307); 
        }
    }

    $contact = new ContactController();
    $entryContact = $contact->entryContact($_POST['id']);
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria</title>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css" />
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script defer src="../js/index.js"></script>
</head>
<body>
    <div class="main">
        <div class="container-fruid" >
            <?php include("header.php") ?>
            <div class="row">
                <div class="col-md-12 col-xs-12 px-0">
                    <div class="swiper-container" style="justify-content:center;">
                        <!-- 全スライドをまとめるラッパー -->
                        <div class="swiper-wrapper">
                            <!-- 各スライド -->
                            <div class="swiper-slide"><img class="slider" src="../img/restaurant.jpg"></div>
                            <div class="swiper-slide"><img class="slider" src="../img/food.jpg"></div>
                            <div class="swiper-slide"><img class="slider" src="../img/food2.jpg"></div>
                            <div class="swiper-slide"><img class="slider" src="../img/interior.jpg"></div>
                        </div>

                        <!-- ページネーションを表示する場合 -->
                        <div class="swiper-pagination"></div>

                        <!-- 前後スライドへのナビゲーションボタン(矢印)を表示する場合 -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>

                        <!-- スクロールバーを表示する場合 -->
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
            </div>
            </div>

            <!-- フォーム入力画面（編集） -->

            <div class="contact">
                <h2>お問合せ内容（編集）</h2>
                <p>お問い合わせ内容の変更が完了しましたら、「更新」ボタンをクリックしてください。</p>

                <?php
                if(! empty($_POST['editsubmit'])){
                foreach($e as $msg){
                    echo "<p>".$msg."</p>";
                }
                }
                ?>

                <form action="edit.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $entryContact['id'] ?>" readonly>
                    <div>
                    <label>
                        お名前：<input type="text" name="editname" placeholder="例）山田太郎" value="<?php if(!empty($_POST["editsubmit"])){ echo $_POST['editname']; }else{ echo $entryContact['name']; } ?>">
                    </label>
                    </div>
                    <div>
                    <label>
                        フリガナ：<input type="text" name="editkana" placeholder="例）ヤマダタロウ" value="<?php if(!empty($_POST["editsubmit"])){ echo $_POST['editkana']; }else{ echo $entryContact['kana']; } ?>">
                    </label>
                    </div>
                    <div>
                    <label>
                        電話番号：<input type="text" name="edittel" placeholder="例）00012345678" value="<?php if(!empty($_POST["editsubmit"])){ echo $_POST['edittel']; }else{ echo $entryContact['tel']; } ?>">
                    </label>
                    </div>
                    <div>
                    <label>
                        メールアドレス：<input type="text" name="editemail" placeholder="例）xxx@xxx" value="<?php if(!empty($_POST["editsubmit"])){ echo $_POST['editemail']; }else{ echo $entryContact['email']; } ?>">
                    </label>
                    </div>
                    <div>
                    <h5>お問合せ内容<h5>
                    <textarea name="editbody" cols="30" rows="10" ><?php if(!empty($_POST["editsubmit"])){ echo $_POST['editbody']; }else{ echo $entryContact['body']; } ?></textarea>
                    </div>
                    <input type="submit" name="editsubmit" value="更新">
                </form>
                <a href="javascript:history.back()" class="fix">キャンセル</a>            
            </div>
            
            <?php include("footer.php") ?>
        </div>
    </div>
</body>

</html>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js"></script>



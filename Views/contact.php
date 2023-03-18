<?php
require_once(ROOT_PATH . 'Controllers/CntactController.php');
//バリデーション
    // if(! empty($_POST['val'])){
    //     $val = new ContactController();
    //     $e = $val->valContact();
    //     $e_count = count($e);
    //     if ($e_count == 0) {
    //         header('location: confirm.php',true,307);
    //     }
    // }

    //js用バリデーション
    if(! empty($_POST['val'])){
        header('location: confirm.php',true,307);
    }


//$deleteが先じゃないとクリックされない1回で
    if(! empty($_POST['deleteid'])){
        $delete = new ContactController();
        $delete->deleteContact();
    }

    $contact = new ContactController();
    $allContact = $contact->allContact(); //全部呼び出す
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
    <script defer src="../js/myscript.js"></script>
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

            <!-- フォーム入力画面（入力） -->
            <div class="contact d-flex justify-content-center">
                <div>
                <h2>お問合せ内容（入力）</h2>
                <p>お問い合わせ内容をご入力の上、「確認画面へ」ボタンをクリックしてください。</p>
          
                <?php
                // if(! empty($_POST['val'])){
                // foreach($e as $msg){
                //     echo "<p>".$msg."</p>";
                // }
                // }
                ?>

                <div id='outMessage'></div>
                
                <form action="contact.php" method="post" onsubmit="return valBtn()">
                    <div>
                    <label>お名前：<input type="text" id="name" name="name" placeholder="例）山田太郎" value=<?php if(! empty($_POST['val'])){ echo $_POST['name']; } ?>></label>
                    </div>
                    <div>
                    <label>フリガナ：<input type="text" id="kana" name="kana" placeholder="例）ヤマダタロウ" value=<?php if(! empty($_POST['val'])){ echo $_POST['kana']; } ?>></label>
                    </div>
                    <div>
                    <label>電話番号：<input type="text" id="tel" name="tel" placeholder="例）00012345678" value=<?php if(! empty($_POST['val'])){ echo $_POST['tel']; } ?>></label>
                    </div>
                    <div>
                    <label>メールアドレス：<input type="text" id="email" name="email" placeholder="例）xxx@xxx" value=<?php if(! empty($_POST['val'])){ echo $_POST['email']; } ?>></label>
                    </div>
                    <div>
                    <h5>お問合せ内容<h5>
                    <textarea name="body" id="body" cols="30" rows="10"><?php if(! empty($_POST['val'])){ echo $_POST['body']; } ?></textarea>
                    </div>
                    <input type="submit" name="val" value="確認画面へ">
                </form>
            </div>
            </div>

            <!-- //テーブルを表示（read） -->
            <div class="contact d-flex justify-content-center">
            <table>
                <tr>
                <th>名前</th>
                <th>フリガナ</th>
                <th>電話番号</th>
                <th>メールアドレス</th>
                <th>お問合せ内容</th>
                <th>編集</th>
                <th>削除</th>
                </tr>

            <?php foreach($allContact as $item): ?>
                <tr>
                    <td><?=htmlspecialchars($item['name'] ,ENT_QUOTES) ?></td>
                    <td><?=htmlspecialchars($item['kana'] ,ENT_QUOTES) ?></td>
                    <td><?=htmlspecialchars($item['tel'] ,ENT_QUOTES) ?></td>
                    <td><?=htmlspecialchars($item['email'] ,ENT_QUOTES) ?></td>
                    <td><?=nl2br(htmlspecialchars($item['body'] ,ENT_QUOTES)) ?></td>
                    <td>
                        <form action=edit.php method="post">
                            <button type="submit" name=id value=<?= $item['id'] ?>>編集</button>
                        </form>
                    </td>
                    <td>
                        <form action="contact.php" method="post" onsubmit="return deleteBtn()">
                            <button type="submit" class="deleteBtn" name="deleteid"  value=<?= $item['id'] ?>>削除</button>
                        </form>
                    </td>
                </tr> 
            <?php endforeach; ?>

             </table>
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

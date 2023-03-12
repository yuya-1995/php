
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


            <div class="contact">
               <h1>貴重なご意見ありがとうございます。</h1>
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



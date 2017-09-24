<?php
//1.DB接続
try {
  $pdo = new PDO('mysql:dbname=gs_db37_kadai7;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//2.SQL文
$stmt = $pdo->prepare("SELECT * FROM productList WHERE id=".$_POST['pickup_id']);
$status = $stmt->execute();


//3.エラー起きた時の動き、結果の表示
$view ="";
$targrtPtoduct ="";

if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);//
}else{
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= '<div class="productImg"><img src="'.$result["imageUrl"].'" alt=""></div>';
        $view .= '<div><p class="score">'.$result["score"].'</p></div>';
        $view .= '<div><h2>'.$result["name"].'</h2></div>';
        $view .= '<div><p class="price">'.number_format($result["price"]).'円</p></div>';
        $targrtPtoduct =  $result["id"];
    }
}
?>


    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>おもちゃをレビューしよう！</title>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/review.css">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaijaan" rel="stylesheet">
    </head>

    <body>
        <div id="back">
            <div id="wrapper">
                <div class="content">
                    <h1>Omocha!</h1>
                </div>
                <div class="content">
                    <h2>このおもちゃは何点ですか？</h2>
                    <div class="content"><?= $view ?></div>
                    <form method="POST" action="review_registration.php">
                        <input type="hidden" name="pickup_id" value="<?= $targrtPtoduct ?>">
                        <select name="selection" id="">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <input type="submit" value="送信">
                    </form>
                </div>

            </div>
        </div>

    </body>

    </html>

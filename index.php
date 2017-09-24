<?php
//1.DB接続
try {
  $pdo = new PDO('mysql:dbname=gs_db37_kadai7;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//2.SQL文
$stmt = $pdo->prepare("SELECT * FROM productList");
$status = $stmt->execute();


//3.エラー起きた時の動き、結果の表示
$view ="";
if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);//
}else{
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= '<div class="productImg"><img src="'.$result["imageUrl"].'" alt=""></div>';
        $view .= '<div><p class="score">'.$result["score"].'</p></div>';
        $view .= '<div><h2>'.$result["name"].'</h2></div>';
        $view .= '<div><p class="price">'.number_format($result["price"]).'円</p></div>';
        $view .= '<form method="POST" action="review.php"><input type="hidden" name="pickup_id" value="'.$result["id"].'"><input type="submit" value="この商品をレビュー"></form>';

    }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>おもちゃのレビュー結果！</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/jquery.raty.js"></script>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/review.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaijaan" rel="stylesheet">
</head>

<body>
    <div id="back">
        <div id="wrapper">
<!-- Head[Start] -->
           <div class="content">
               <h1>Omocha!</h1>
               <h2>Our recommendation</h2>
           </div>
<!-- Head[End] -->

<!-- Main[Start] -->
           <div class="content"><?= $view ?></div>
<!-- Main[End] -->

       </div>
    </div>
</body>
</html>
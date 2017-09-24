<?php
//評価の登録======================================================
//1.前ページで入力された点数を取得
$targetProduct = $_POST["pickup_id"];
$score = $_POST["selection"];

//2.DB接続
try {
  $pdo = new PDO('mysql:dbname=gs_db37_kadai7;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}
//３．SQL文
$stmt = $pdo->prepare("INSERT INTO review(id, targetProduct, score, time )VALUES(NULL, :targetProduct, :score, sysdate())");
$stmt->bindValue(':targetProduct', $targetProduct, PDO::PARAM_STR);
$stmt->bindValue(':score', $score, PDO::PARAM_STR);
$status = $stmt->execute();

//平均点の計算======================================================
//点数リストを参照し、平均点を計算し、最後に商品一覧に平均点を代入
//３．SQL文

$stmt_product = $pdo->prepare("SELECT * FROM productList");
$status_product = $stmt_product->execute();



$stmt_review = $pdo->prepare("SELECT * FROM review");
$status_review = $stmt_review->execute();

//3.エラー起きた時の動き、結果の表示
$num_review = 0;
$sum_review = 0;
$avg_review = 0;

if($status_product==false){
  $error = $stmt_product->errorInfo();
  exit("QueryError:".$error[2]);//
}else{
    if($status_review==false){
      $error = $stmt_review->errorInfo();
      exit("QueryError:".$error[2]);//
    }else{
        while($result_product = $stmt_product->fetch(PDO::FETCH_ASSOC)){
            while($result_review = $stmt_review->fetch(PDO::FETCH_ASSOC)){
                if($result_review["targetProduct"] == $result_product["id"]){
                    ++$num_review;
                    $sum_review = $sum_review + $result_review["score"];
                }
            }
            if($num_review>0){
                $avg_review = $sum_review / $num_review;
            }
            //平均点をアップテート
            $stmt_update = $pdo->prepare("UPDATE productList SET score='".$avg_review."' WHERE id=".$result_product["id"]);
            $status_update = $stmt_update->execute();

            //次の商品の平均点更新の準備
            $num_review = 0;
            $sum_review = 0;
            $avg_review = 0;
            //レビューを再び取得する。
            //今回はここで詰まった。２階層目のwhileの条件に当てはまらないらしく、2つ目の商品の平均点計算が飛ばされてしまうので、それを避けるため、再びreviewの連想配列を取得している。
            $stmt_review = $pdo->prepare("SELECT * FROM review");
            $status_review = $stmt_review->execute();
        }
    }
}


//9．エラー起きた時の動き
if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);//
  
}else{
  header("Location: index.php");
  exit;

}
?>

<?php
//1. POSTデータ取得
$title = $_POST['title'];
$url = $_POST['url'];
$comment = $_POST['comment'];

//*** 外部ファイルを読み込む ***
include("funcs.php");
sschk();
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(title, url, comment, indate)VALUES(:title, :url, :comment, sysdate())");
$stmt->bindValue(':title',  $title,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment',$comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    redirect("index.php");
}

?>

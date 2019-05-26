
<?php
$s=new PDO("mysql:host=localhost;dbname=pro2test","root","root");
$ca_d=isset($_GET["category"])?$_GET["category"]:null;
$te_d=isset($_GET["text"])?htmlspecialchars($_GET["text"]):null;
$usid=isset($_SESSION["usid"])?htmlspecialchars($_SESSION["usid"]):null;

print<<<eot1
<!DOCTYPE html>
<html lang="ja">
<style>
* {
   text-align: center;
}
body{
   font-size: 20px;
   background-color: rgb(0, 255, 213);
}
#title{
   font-size:50px;
}
#text{
   width:250px;
   height:150px;
   text-align: left;
   size: 30px;
}
</style>
<body>
eot1;

if($usid==null){
	print <<<eot5
	<div>
	ログインしていません
	<br><a href='app3.php'>ここからログインしてください</a>
	</div>
	</body>
	</HTML>
eot5;
}else{
	if($ca_d==null&&$te_d==null){
	print <<<eot4
	<div id="title">投稿画面</div> 
		<form method="GET" action="app2.php">
				<label>カテゴリー
					<select name="category">
						<option value="">選択してください</option>
						<option value="1">ゲーム</option>
						<option value="2">スポーツ</option>
						<option value="3">ミュージック</option>
						<option value="4">ニュース</option>
					</select>
				</label>
				<br>
				<label>本文
					<textarea id="text" name="text"></textarea>
				</label>
				<br>
				<input type="submit" value="送信">
			</form>
			<br><a href="index.html">トップページに戻る</a>
	</body>
	</HTML>
eot4;
	}else if($ca_d!=""&&$te_d!=""){
	$s->query("INSERT INTO toko_master VALUES (0,'$ca_d','$usid',now(),'$te_d',0)");
	print <<<eot2
	投稿しました
	<br><a href="index.html">トップページに戻る</a>
	<a href="app1.html">カテゴリ一覧へ</a>
	<a href="app4.php">閲覧画面へ</a>
	</body>
	</html>
eot2;
	}else{
	print <<<eot3
	<div id="title">投稿画面</div> 
	<div style="font-color:red,font-size:30px">入力されていない項目があります</div>
		<form method="GET" action="app2.php">
			<label>カテゴリー
				<select name="category">
					<option value="">選択してください</option>
					<option value="1">ゲーム</option>
					<option value="2">スポーツ</option>
					<option value="3">ミュージック</option>
					<option value="4">ニュース</option>
				</select>
			</label>
			<br>
			<label>本文
				<textarea id="text" name="text">$te_d</textarea>
			</label>
			<br>
			<input type="submit" value="送信">
		</form>
	<br><a href="index.html">トップページに戻る</a>
	</body>
	</html>
eot3;
	}
}
?>

<?php
session_start();

$s=new PDO("mysql:host=localhost;dbname=pro2test","root","root");
$ca_d=isset($_GET["category"])?$_GET["category"]:null;
$te_d=isset($_GET["text"])?htmlspecialchars($_GET["text"]):null;
$usid="k18030";//isset($_SESSION["usid"])?htmlspecialchars($_SESSION["usid"]):null;

print<<<eot1
<!DOCTYPE html>
<html lang="ja">
<style>
* {
   text-align: center;
}
body{
   font-size: 23px;
   background-color: rgb(0, 255, 213);
}
#title{
   font-size:4em;
}
#text{
   width:250px;
   height:150px;
   text-align: left;
   size: 30px;
}
text {
	font-size: 28px;
	Color: red;
}
.sub {
	display       : inline-block;
	border-radius : 5%;          /* 角丸       */
	font-size     : 15pt;        /* 文字サイズ */
	text-align    : center;      /* 文字位置   */
	cursor        : pointer;     /* カーソル   */
	padding       : 6px 6px;   /* 余白       */
	background    : #ffffff;     /* 背景色     */
	color         : #000000;     /* 文字色     */
	line-height   : 1em;         /* 1行の高さ  */
	transition    : .3s;         /* なめらか変化 */
	box-shadow    : 1px 1px 3px #666666;  /* 影の設定 */
	border        : 2px solid #ffffff;    /* 枠の指定 */
 }
 .sub2{
	display       : inline-block;
	font-size     : 15pt;        /* 文字サイズ */
	text-align    : center;      /* 文字位置   */
	cursor        : pointer;     /* カーソル   */
	padding       : 6px 6px;   /* 余白       */
	background    : #ffffff;     /* 背景色     */
	color         : #000000;     /* 文字色     */
	line-height   : 1em;         /* 1行の高さ  */
 }
 .button {
	font-size: large;
	width: 40%;
	height: 4em;

}
</style>
<body>
eot1;

if($usid==null){
	print <<<eot5
	<div>
	ログインしていません
	<br><button type="button" onclick="location.replace('app3.html');">ここからログインしてください</button>
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
				<input type="submit" value="送信" class="sub">
			</form>
			<br><button type="button" onclick="location.replace('index.html');" class="button">トップページに戻る</button>
	</body>
	</HTML>
eot4;
	}else if($ca_d!=""&&$te_d!=""){
	$s->query("INSERT INTO toko_master VALUES (0,'$ca_d','$usid',now(),'$te_d',0)");
	print <<<eot2
	投稿しました
	<br><button type="button" onclick="location.replace('index.html');" class="sub2">トップページに戻る</button>
	<br><button type="button" onclick="location.replace('app1.html');" class="sub2">カテゴリ一覧へ</button>
	<form method="POST" action="app4.php">
	<input type="hidden" name="" value="$ca_d">
	<input type="submit" value="閲覧画面へ" class="sub2">
	</form>
	</body>
	</html>
eot2;
	}else{
	print <<<eot3
	<div id="title">投稿画面</div> 
	<text>入力されていない項目があります</text>
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
			<input type="submit" value="送信" class="sub">
		</form>
		<br><button type="button" onclick="location.replace('index.html');" class="button">トップページに戻る</button>
	</body>
	</html>
eot3;
	}
}
?>
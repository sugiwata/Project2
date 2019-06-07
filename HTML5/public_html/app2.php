
<?php
session_start();

$s=new PDO("mysql:host=localhost;dbname=pro2test","root","root");
$ca_d=isset($_POST["category"])?$_POST["category"]:null;
$te_d=isset($_POST["text"])?htmlspecialchars($_POST["text"]):null;
$usid=isset($_SESSION["usid"])?htmlspecialchars($_SESSION["usid"]):null;

$session_token = isset($_SESSION['token']) ? $_SESSION['token'] : '';
$token = isset($_POST['token']) ? $_POST['token'] : '';

print<<<eot1
<!DOCTYPE html>
<html lang="ja">
<title>投稿画面</title>
<style>
* {
   text-align: center;
}
body{
   background-color: #0097A7;
   background-size: 10px 10px;
   background-image:
      linear-gradient(45deg,  #00838F 25%, #00838F 25%, transparent 25%,
      transparent 75%, #00838F 75%, #00838F 75%),
      linear-gradient(-45deg, #00838F 25%, #00838F 25%, transparent 25%,
      transparent 75%, #00838F 75%, #00838F 75%);
      /*background-color: rgb(0, 250, 213);*/
}
.title{
   font-size: 7em;
	font-family: impact;
	font-weight: bold;
	color: #364e96;/*文字色*/
	background: #dfefff;
	box-shadow: 0px 0px 0px 5px #dfefff;
	border: dashed 2px white;
	padding: 0.2em 0.5em;
}
.form{
	padding: 7px 20px;
	color: #FFFFFF;
	font-size: 30px;
}
.cp_ipselect {
	overflow: hidden;
	width: 25%;
	margin: auto;
	text-align: center;
}
.cp_ipselect select {
	width: 100%;
	padding-right: 1em;
	cursor: pointer;
	text-indent: 0.01px;
	text-overflow: ellipsis;
	border: none;
	outline: none;
	background: transparent;
	background-image: none;
	box-shadow: none;
	-webkit-appearance: none;
	appearance: none;
}
.cp_ipselect select::-ms-expand {
    display: none;
}
.cp_ipselect.cp_sl04 {
	position: relative;
	border-radius: 2px;
	border: 2px ;
  border-radius: 50px;
	background: #ffffff;
}
.cp_ipselect.cp_sl04::before {
	position: absolute;
	top: 0.8em;
	right: 0.8em;
	width: 0;
	height: 0;
	padding: 0;
	content: '';
	border-left: 6px solid transparent;
	border-right: 6px solid transparent;
	border-top: 6px solid #000000;
	pointer-events: none;
}
.cp_ipselect.cp_sl04 select {
	padding: 8px 38px 8px 8px;
	font-size: 20px;
}
textarea{
   width:300px;
   height:180px;
	text-align: left;
	font-size: 20px;
}
text{
	font-size: 28px;
	padding: 7px 20px;
	color: #FFF;
}
text2 {
	font-size: 28px;
	padding: 7px 20px;
	color: yellow;
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
.bbb {
	display: inline-block;
	padding: 7px 20px;
	border-radius: 25px;
	text-decoration: none;
	color: #FFF;
	background-image: linear-gradient(45deg, #FFC107 0%, #ff8b5f 100%);
	transition: .4s;

	  font-size: large;
	  width: 30%;
	  height: 3em;
	  background-color: salmon;
	  font-family: impact;
}
</style>
<body>
<div class="title">投稿画面</div> 
eot1;

if ($ca_d!=null&&$te_d!=null) {
	if($token == '' || $token != $session_token ){
		print<<<eot6
		<text2>不正な処理を確認しました</text2>
		<br><button type="button" onclick="location.href='app2.php'" class="bbb">ここからやり直してください</button>
		</body>
		</html>
eot6;
		exit;
	}
}

if($usid==null){
	print <<<eot5
	<text>ログインしていません</text>
	<br><button type="button" onclick="location.href='app3.html'" class="bbb">ここからログインしてください</button>
	</body>
	</HTML>
eot5;
	exit;
}

$token = md5(uniqid(rand(), true));
$_SESSION['token'] = $token;

if($ca_d!=""&&$te_d!=""){
	$s->query("INSERT INTO toko_master VALUES (0,'$ca_d','$usid',now(),'$te_d',0)");
	print <<<eot2
	<text>投稿しました</text>
	<br><button type="button" onclick="location.replace('index.html');" class="bbb">トップページに戻る</button>
	<br><button type="button" onclick="location.replace('app1.html');" class="bbb">カテゴリ一覧へ</button>
	<form method="POST" action="app4.php">
	<input type="hidden" name="cate" value="$ca_d">
	<input type="submit" value="閲覧画面へ" class="bbb">
	</form>
	</body>
	</html>
eot2;
}else{
	if($ca_d!=null||$te_d!=null){
	print <<<eot4
		<text2>入力されていない項目があります</text2>
eot4;
	}
	print <<<eot3
		<form method="POST" action="app2.php" class="form">
			<label>カテゴリー
				<div class="cp_ipselect cp_sl04">
				<select name="category">
					<option value="" hidden>選択してください</option>
					<option value="1">ゲーム</option>
					<option value="2">スポーツ</option>
					<option value="3">ミュージック</option>
					<option value="4">ニュース</option>
				</select>
				</div>
			</label>
			<label>本文
				<div><textarea class="text" name="text"wrap="hard" rows="4" cols="40">$te_d</textarea></div>
			</label>
			<input type="hidden" name="token" value="$token">
			<input type="submit" value="送信" class="sub">
		</form>
		<br><button type="button" onclick="location.href='index.html'" class="bbb">トップページに戻る</button>
	</body>
	</html>
eot3;
}
?>
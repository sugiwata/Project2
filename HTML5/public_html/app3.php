<?php
session_start();
$token = md5(uniqid(rand(), true));
$_SESSION['token'] = $token;
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>ユーザ登録</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
            * {
                text-align: center;
            }
            text {
               font-size: 28px;
               Color: yellow;
            }
            text2 {
              font-size: 23px;
              font-weight: bold;
              Color: white;
            }
            div {
              font-size: 6em;
              font-family: impact;
              font-weight: bold;

              color: #364e96;/*文字色*/
              background: #dfefff;
              box-shadow: 0px 0px 0px 5px #dfefff;
              border: dashed 2px white;
              padding: 0.2em 0.5em;
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
            .sub:hover {
              box-shadow    : none;        /* カーソル時の影消去 */
              color         : #ffffff;     /* 背景色     */
              background    : #000000;     /* 文字色     */
            }
            button {
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
            body{
              background-color: #0097A7;
                background-size: 10px 10px;
                background-image:
                 linear-gradient(45deg,  #00838F 25%, #00838F 25%, transparent 25%,
                  transparent 75%, #00838F 75%, #00838F 75%),
                 linear-gradient(-45deg, #00838F 25%, #00838F 25%, transparent 25%,
                  transparent 75%, #00838F 75%, #00838F 75%);
            }
        </style>
    </head>
    <body>
        <div>ユーザ登録</div>
        <!-- フォームを使い情報を入力させる -->
        <br>
        <text>
        ↓新規登録はこちらから!!↓<br>
        </text>
        <br>
        <form method="POST" action="app3-2.php">
          <text2>ユーザID：</text2>
          <input name="fUserID" type="text" id="fUserID" ><br>
          <text2>掲示板名前：</text2>
          <input name="fUserName" type="text" id="fUserName"><br>
          <text2>パスワード：</text2>
          <input name="fPassWd1" type="password" id="fPassWd1"><br>
          <text2>確認用パスワード：</text2>
          <input name="fPassWd2" type="password" id="fPassWd2"><br>
          <br>
          <?php print"<input type='hidden' value='$token' name='token'>";?>
          <input type="reset"  value="クリア" class="sub">
          <input type="submit" value="送信する" class="sub">

        </form>
        <!-- 元の画面に戻る -->
        <br>
        <button type="button" onclick="location.replace('app3-3.html');">ログインはこちらから</button>
        <br>
        <br>
        <button type="button" onclick="location.replace('index.html');">戻る</button>
    </body>
</html>

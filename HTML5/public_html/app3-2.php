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
              Color: red;
          }
          text2 {
              font-size: 23px;
          }
          div {
              font-size: 4em;
              font-weight: bold;
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
              font-size: large;
              width: 40%;
              height: 4em;

          }
          body{
              background-color: rgb(0, 250, 213);
          }
        </style>
    </head>
    <body>
        <div>ユーザ登録</div>
    <?php
      $sUserID=$_POST["fUserID"];
      $sUserName=$_POST['fUserName'];
      $sPassWd1=$_POST['fPassWd1'];
      $sPassWd2=$_POST['fPassWd2'];

      $s=new PDO("mysql:host=localhost;dbname=pro2test","root","root");

      if($sPassWd1 != $sPassWd2){
          echo "<FONT COLOR=\"RED\">パスワードが一致しません。もう一度登録しなおしてください。
               </FONT><br>";

      }else{
        $s->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        $re = $s->query("SELECT count(*) FROM user_master WHERE username ='$sUserName'");
        $count = $re->fetchColumn();
        //データ件数が０件の場合
        if($count !=  0){
           echo "すでに{$sUserName}の名前は登録済みです。もう一度別の名前で登録してください。
                </FONT><br>";
        }else{
           $s->query("INSERT INTO user_master VALUES ('$sUserID','$sPassWd1','$sUserName')");
           echo "{$sUserName}のID登録が完了しました。";
        }
      }
    ?>
    <br>
    <button type="button" onclick="location.replace('app1.html');">カテゴリ一覧へ</button>
    </body>
</html>

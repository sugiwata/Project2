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
    <?php
      session_start();

      $sUserID=$_POST["fUserID"];
      $sUserName=$_POST['fUserName'];
      $sPassWd1=$_POST['fPassWd1'];
      $sPassWd2=$_POST['fPassWd2'];

      $s_token = isset($_SESSION['token']) ? $_SESSION['token'] : '';
      $token = isset($_POST['token']) ? $_POST['token'] : '';

      $s=new PDO("mysql:host=localhost;dbname=pro2test","root","root");
      
      if($token == '' || $token != $s_token ){
        //二重送信される場合
        echo "<text>不正な処理を確認しました。もう一度登録しなおしてください。
               </text><br>";
        
      }
      else if($sPassWd1 != $sPassWd2){
          echo "<text>パスワードが一致しません。もう一度登録しなおしてください。
               </text><br>";

      }else{
        $s->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        $re = $s->query("SELECT count(*) FROM user_master WHERE username ='$sUserName'");
        $count = $re->fetchColumn();
        //データ件数が０件の場合
        if($count !=  0){
           echo "<text>すでに{$sUserName}の名前は登録済みです。もう一度別の名前で登録してください。
                </text><br>";
        }else{
           $s->query("INSERT INTO user_master VALUES ('$sUserID','$sPassWd1','$sUserName')");
           $_SESSION['usid'] = $sUserID;
           echo "<text>{$sUserName}のID登録が完了しました。</text><br>";
           echo "<text>現在{$sUserName}はログイン済みです</text>";
        }
      }
    ?>
    <br>
    <button type="button" onclick="location.replace('app1.html');">カテゴリ一覧へ</button>
    <br>
    <br>
    <button type="button" onclick="location.replace('app2.php');">投稿画面へ</button>
    </body>
</html>

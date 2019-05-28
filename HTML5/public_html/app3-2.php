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
            div {
                font-size: 2em;
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

        //以下のプログラムはhttp://www.manabukun.net/kyouzai/php/php16.htmから引用
        $sUserID=$_POST["fUserID"];
        $sUserName=$_POST['fUserName'];
        $sPassWd1=$_POST['fPassWd1'];
        $sPassWd2=$_POST['fPassWd2'];

        //以下のプログラムは、確認用のパスワードと一致しているかをチェックしている。
        //不一致のときは、そのままプログラムを終了している。（exit）

        if($sPassWd1!=$sPassWd2){
          echo "<FONT COLOR=\"RED\">パスワードが一致しません。もう一度登録しなおしてください。</FONT><br>";
          exit();
        }
        else{
          /*$conn=mysqli_connect('localhost','root','root') or exit("MySQLへ接続できません。");
          mysqli_select_db($conn,'pro2test') or  exit("データベース名が間違っています。");*/

          $s=new PDO("mysql:host=localhost;dbname=pro2test","root","root");
          print "成功しました";

        //以下のSQL文は、同じユーザ名が存在するかを調べるためのものである。
        //パスワードをチェックしないのは、もし万が一、一致してしまうとユーザ名とパスワードがばれてしまうからである。
        /*$sql="SELECT * FROM user_master where userName='{$sUserName}';";
        $result=mysqli_query($conn,$sql) or exit("データの抽出に失敗しました。");
        */
        //$re=$s->query("SELECT count(*) FROM user_master where username='{$sUserName}'");
        //データ件数が０件の場合
      /*  if($re != 0){
          echo "すでに{$sUserName}の名前は登録済みです。もう一度別の名前で登録してください。</FONT><br>";
          exit()


      /*  //以下のプログラムは、すでに同じユーザ名が存在すれば、登録済みのメッセージを出すためのものである。
        if(mysqli_num_rows($result)!=0){
          echo "すでに{$sUserName}の名前は登録済みです。もう一度別の名前で登録してください。<br>";
        }
      */
        }else{
          //以下のプログラムは新規登録を行うためのプログラムである。
          /*
          $sql="INSERT INTO user_master values('{$sUserID}','{$sPassWd1}','{$sUserName}');";
          $result=mysqli_query($conn,$sql) or exit("データの書き込みに失敗しました。");
          echo "{$sUserName}のID登録が完了しました。";
          */
          //$s->query("INSERT INTO user_master VALUES ('{$sUserID}','{$sPassWd1}','{$sUserName}')");
          echo "{$sUserName}のID登録が完了しました。";
        }

      }
    ?>
    <br>
    <button type="button" onclick="location.replace('app1.html');">カテゴリ一覧へ</button>
    </body>
</html>

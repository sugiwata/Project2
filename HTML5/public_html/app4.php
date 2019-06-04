<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>みんなの投稿</title>
    <style>
      body{
        background:rgb(0,250,213);
      }
      h1{
        text-align:center;
      }
    </style>
  </head>
  <script>

  </script>
  <body>
    <h1>みんなの投稿</h1>
    <?php
      $connect=new PDO("mysql:host=localhost;dbname=pro2test","root","root");
      $post=$_POST["cate"];
      $hoge=$connect->query("SELECT * FROM user_master INNER JOIN toko_master ON user_master.userid = toko_master.userid WHERE cateid='$post' ");
      while($row=$hoge->fetch()){
        print <<<etsu
        $row[2]
        $row[6]
        <br>
        $row[7]
        <br>
etsu;
      }
    ?>
    <button type="button"onclick="location.href='app1.html'">カテゴリー一覧に戻る</button>
    <button type="button"onclick="location.href='app2.php'">投稿画面へ</button>
  </body>
</html>

<!--配列の中の全ての要素に関して繰り返し処理を実行するときにはforeach構文を利用する-->
<!--htmlにおけるコメントアウトはこうやって行う-->
<!--var count=0;>
<!-button type="button" value="評価する" onclick="count++">評価する</button>
//ゲーム1　スポーツ2　ミュージック3　ニュース4
//switch

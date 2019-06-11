<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>みんなの投稿</title>
    <style>
      h1{
        position:static;
        font-size: 7em;
        font-family: impact;
        text-align: center;
        color: #364e96;/*文字色*/
        background: #dfefff;
        box-shadow: 0px 0px 0px 5px #dfefff;
        border: dashed 2px white;
        padding: 0.2em 0.5em;
      }
      .toko_t{
        padding: 0.5em 1em;
        margin: 0,3em 1em;
        font-weight: bold;
        color: #6091d3;/*文字色*/
        background: #FFF;
        border: solid 3px #6091d3;/*線*/
        border-radius: 10px;/*角の丸み*/
      }
      {
        background-image: linear-gradient(45deg, #FFC107 0%, #f76a35 100%);
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




      .button1 {     /*カテゴリ一覧へ*/

        position: absolute;

        right: 500px;
        left: 100px;
        width: 150px;
        height: 150px;
        line-height: 150px;
        margin: 0 auto;
        font-size: 20px;
        text-decoration: none;
        display: block;
        text-align: center;
        color: #FFFFFF;
        background: #616161;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        font-family: impact;

    }

    .button2 {     /*投稿画面へ*/
      position: absolute;

      right:100px;
      left:500px;
      width: 150px;
      height: 150px;
      line-height: 150px;
      margin: 0 auto;
      font-size: 20px;
      text-decoration: none;
      display: block;
      text-align: center;
      color: #FFFFFF;
      background: #616161;
      border-radius: 50%;
      -webkit-border-radius: 50%;
      -moz-border-radius: 50%;
      font-family: impact;

  }
    </style>
  </head>

  <body>
    <h1>みんなの投稿</h1>
<div class="toko">
    <?php
      $connect=new PDO("mysql:host=localhost;dbname=pro2test","root","root");
      $post=$_POST["cate"];
      $hoge=$connect->query("SELECT * FROM user_master INNER JOIN toko_master ON user_master.userid = toko_master.userid WHERE cateid='$post' ");
      while($row=$hoge->fetch()){
        print <<<etsu
        <div class="toko_t">
        $row[2]
        $row[6]
        <br>
        $row[7]
        <br>
        </div>
etsu;
      }
    ?>
</div>

    <button class="button1" type="button"onclick="location.href='app1.html'">カテゴリ一覧へ</button>
    <button class="button2" type="button"onclick="location.href='app2.php'">投稿画面へ</button>

  </body>
</html>

<!--配列の中の全ての要素に関して繰り返し処理を実行するときにはforeach構文を利用する-->
<!--htmlにおけるコメントアウトはこうやって行う-->
<!--var count=0;>
<!-button type="button" value="評価する" onclick="count++">評価する</button>
//ゲーム1　スポーツ2　ミュージック3　ニュース4
//switch

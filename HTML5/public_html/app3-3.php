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

        $s=new PDO("mysql:host=localhost;dbname=pro2test","root","root");
        print "成功しました";
    ?>
    <br>
    <button type="button" onclick="location.replace('app1.html');">カテゴリ一覧へ</button>
    </body>
</html>

<!DOCTYPE html>

<html lang="ja">

<head>
<link rel="stylesheet" type="text/css" href="/penshu4_2020/67190223/ex15/start.css">
<title>
説明
</title>
<meta charset="utf-8">
</head>

<body>

<h1>説明</h1>
<?php
print "<ul>\n";
print "<li>「シャッフルクエスト」はコマンドバトルゲームです。</li>";
print "<li>始める前にユーザ登録をして下さい。ユーザー登録の際、数字のみのユーザー名は作らないようお願いします。</li>";
print "<li>冒険準備画面では「シャッフル！」ボタンを押すことで、あなたを含むクエストに出てくるキャラクター達のステータスの値がシャッフルされます。</li>";
print "<li>準備が完了したら、冒険に出発です！コマンドを選択してモンスターを倒していきましょう！</li>";
print "<li>データベースへの書き込みがあるので、ボタンは連打せず、なるべくゆっくりプレイして下さい。</li>";
print "<li>以下コマンド説明</li>";
print "<li class = \"none\">";
print "こうげき：（敵のATK）ー（あなたのDEF）のダメージ</li>";
print "<li class = \"none\">\n";
print "サンダー：敵のDEFを無視。貫通ダメージ。</li>";
print "<li class = \"none\">\n";
print "ヒール：ヒールの値だけ回復する。しかし、敵の攻撃と同時に計算されるので注意！ 加えて、最大HPを超えて回復することもありません。</li>";
print "</ul>\n";

print "<p>\n";
print "<a href=\"start.php\">戻る</a>\n";
print "</p>";

print "<p>\n";
print "<a href=\"index.html\">ホームへ</a>\n";
print "</p>";
?>
</body>
</html>

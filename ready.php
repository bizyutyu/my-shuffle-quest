
<!DOCTYPE html>

<html lang="ja">

<head>
<link rel="stylesheet" type="text/css" href="/penshu4_2020/67190223/ex15/ready.css">
<title>
戦闘準備画面
</title>
<meta charset="utf-8">
</head>

<body>

<h1>戦闘準備画面</h1>

<?php

@$con = pg_connect("host=kite.cs.miyazaki-u.ac.jp dbname=endb2022 user=enuser2022 password=???????");
if ($con == false){
  print("DATABASE CONNECTION5  ERROR\n");
  exit;
}

$sql1 = "select * from {$_SERVER['PHP_AUTH_USER']}";
//$sql1 = "select * from origin";

@$result = pg_query($sql1);
if($result == false){
  print"DATA ACQUISITION ERROR\n";
  exit;
}

$n = 4;
$m = pg_num_rows($result);

for($i = 0; $i < $m; $i++){
  for($j = 0; $j < $n; $j++){
    $a[$i][$j] = pg_fetch_result($result,$i,$j);
  }
}

pg_free_result($result);
pg_close($con);

$mahou = floor(($a[0][1]+$a[0][2]+$a[0][3]) / 5);
$kaihuku = floor(($a[0][1]+$a[0][3]) / 3);

print "あなた";

print "<ul>\n";
print "<li>HP:".$a[0][1]."</li>";
print "<li>ATK:".$a[0][2]."</li>";
print "<li>DEF:".$a[0][3]."</li>";
print "<li>サンダー:".$mahou."</li>";
print "<li>ヒール:".$kaihuku."</li>";
print "</ul>\n";


print "<a href=\"start.php\">戻る</a>\n";

print "<a href=\"shuffle.php\">シャッフル</a>\n";

print "<a href=\"battle1.php\">いざ戦闘へ</a>\n";



?>
</form>

</body>
</html>

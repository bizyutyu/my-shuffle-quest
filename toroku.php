<!DOCTYPE html>

<html lang="ja">

<head>
<link rel="stylesheet" type="text/css" href="/penshu4_2020/67190223/ex15/result.css">
<title>
ユーザー登録
</title>
<meta charset="utf-8">
</head>

<body>
<h1>ユーザー登録</h1>

<?php

@$con = pg_connect("host=kite.cs.miyazaki-u.ac.jp dbname=endb2022 user=enuser2022 password=???????");
if ($con == false){
  print("DATABASE CONNECTION ERROR\n");
  exit;
}


$sql1 = "select uname from passdb where uname = '{$_POST['uname']}'";

@$result = pg_query($sql1); // SQL縺ｮ繧ｳ繝槭Φ繝峨〒繝��繧ｿ繝吶�繧ｹ縺ｫ蝠上＞蜷医ｏ縺帙☆繧九�
if($result == false){
  print"DATA ACQUISITION ERROR\n";
  exit;
}

$row = pg_num_rows($result);

pg_free_result($result); // SQL縺ｮ螳溯｡檎ｵ先棡繧呈�ｼ邏阪＠縺ｦ縺�◆繝｡繝｢繝ｪ繧定ｧ｣謾ｾ縲�

if($row > 0){ // 蜈･蜉帙＆繧後◆繝ｦ繝ｼ繧ｶ蜷阪′縲√ョ繝ｼ繧ｿ繝吶�繧ｹ縺ｮ荳ｭ縺ｫ�代▽莉･荳翫≠繧区凾縺ｯ縲檎匳骭ｲ貂医∩縲�

  pg_close($con); // 繝��繧ｿ繝吶�繧ｹ縺ｨ縺ｮ謗･邯壹ｒ髢峨§繧九�

  print "<p>\n";
  print "ユーザーが登録されています\n";
  print "</p>\n";

  print "<p>\n";
  print "<a href=\"start.php\">戻る</a>\n";
  print "</p>\n";

  print "</body>\n";

  print "</html>\n";

  exit;
}


// 莉･荳九�縲√�繝ｭ繧ｰ繝ｩ繝溘Φ繧ｰ繝峨Μ繝ｫ縺ｮ1-c繧貞盾辣ｧ縺帙ｈ

$sql1 = "insert into passdb values('{$_POST['uname']}','{$_POST['pass']}')";


@$result = pg_query($sql1); // SQL縺ｮ繧ｳ繝槭Φ繝峨〒繝��繧ｿ繝吶�繧ｹ縺ｫ蝠上＞蜷医ｏ縺帙☆繧九�
if($result == false){
  print"DATA INSERTION ERROR\n";
  exit;
}
pg_free_result($result); // SQL縺ｮ螳溯｡檎ｵ先棡繧呈�ｼ邏阪＠縺ｦ縺�◆繝｡繝｢繝ｪ繧定ｧ｣謾ｾ縲�


$sql2 = "create table {$_POST['uname']} (id int, HP int, ATK int, DEF int, HPlog int)";

@$result = pg_query($sql2); // SQL縺ｮ繧ｳ繝槭Φ繝峨〒繝��繧ｿ繝吶�繧ｹ縺ｫ蝠上＞蜷医ｏ縺帙☆繧九�
if($result == false){
  print"TABLE CREATION ERROR\n";
  exit;
}

pg_free_result($result);


$sql3 = "select * from origin";// SQL縺ｮ繧ｳ繝槭Φ繝画枚繧呈枚蟄怜�縺ｫ譬ｼ邏阪☆繧九�

@$result = pg_query($sql3); // SQL縺ｮ繧ｳ繝槭Φ繝峨〒繝��繧ｿ繝吶�繧ｹ縺ｫ蝠上＞蜷医ｏ縺帙☆繧九�
if($result == false){
  print "DATA ACQUISITION ERROR\n";
  exit;
}

$n = 5;
$m = pg_num_rows($result);
for($i = 0; $i < $m; $i++){
  for($j = 0; $j < $n; $j++){
  $a[$i][$j] = pg_fetch_result($result,$i,$j);
}
}

pg_free_result($result);

for($i = 0; $i < $m; $i++){
$sql4 = "insert into {$_POST['uname']} values({$a[$i][0]},{$a[$i][1]},{$a[$i][2]},{$a[$i][3]},{$a[$i][4]})";


@$result = pg_query($sql4);
if($result == false){
  print"DATA INSERTION ERROR1\n";
  exit;
}
pg_free_result($result);
}

pg_close($con);
?>

<p>
ユーザーが登録されました
</p>

<p>
<a href="start.php">戻る</a>
</p>

</body>

</html>

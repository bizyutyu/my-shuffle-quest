<?php
include_once("auth.inc");
auth();
?>

<!DOCTYPE html>

<html lang="ja">

<head>
<link rel="stylesheet" type="text/css" href="/penshu4_2020/67190223/ex15/shuffle.css">
<title>
戦闘準備画面（シャッフル）
</title>
<meta charset="utf-8">
</head>

<body>

<h1>シャッフル！</h1>

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


$x = 0;
for($i = 0; $i <= 5; $i++){
  for($j = 1; $j <= 3; $j++){
    $array[$x] = $a[$i][$j];
    $x = $x + 1;
  }
}

$size = 18;

for($k = 0; $k < $size; $k++) {
        $r = mt_rand( $k, $size-1 );
        $tmp = $array[$k];
        $array[$k] = $array[$r];
        $array[$r] = $tmp;
    }

for($p = 0; $p <$size; $p++){
  $amari1 = floor($p / 3);
  $amari2 = ($p % 3) + 1;
  $a[$amari1][$amari2] = $array[$p];
}

$atk1 = floor($a[1][2] / 3);
$def1 = floor($a[1][3] / 4);
$atk2 = $a[2][2] * 3;
$hp3 = $a[3][1] * 3;
$def4 = $a[4][3] * 5;
$hp5 = $a[5][1] * 4;
$atk5 = $a[5][2] * 4;
$def5 = $a[5][3] * 4;

if($a[0][1] >= 500){
        $a[0][1] = 100;
     }
if($a[0][2] >= 500){
        $a[0][2] = 100;
}
if($a[0][3] >= 500){
        $a[0][3] = 100;
     }
if($atk1 == 0){
        $atk1 = 10;
     }
if($def1 == 0){
        $def1 = 10;
}
if($atk2 >= 700){
        $atk2 = 80;
     }
if($hp3 >= 700){
        $hp3 = 70;
}
if($def4 >= 700){
        $def4 = 80;
}
if($hp5 >= 1000){
        $hp5 = 100;
    }
if($atk5 >= 1000){
        $atk5 = 100;
}
if($def5 >= 1000){
        $def5 = 10;
    }

$sql1_1 = "update {$_SERVER['PHP_AUTH_USER']} set hp = {$a[0][1]} where id = 0";
$sql1_2 = "update {$_SERVER['PHP_AUTH_USER']} set atk = {$a[0][2]} where id = 0";
$sql1_3 = "update {$_SERVER['PHP_AUTH_USER']} set def = {$a[0][3]} where id = 0";
$sql1_4 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$a[0][1]} where id = 0";
$sql2_1 = "update {$_SERVER['PHP_AUTH_USER']} set hp = {$a[1][1]} where id = 1";
$sql2_2 = "update {$_SERVER['PHP_AUTH_USER']} set atk = {$atk1} where id = 1";
$sql2_3 = "update {$_SERVER['PHP_AUTH_USER']} set def = {$def1} where id = 1";
$sql2_4 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$a[1][1]} where id = 1";
$sql3_1 = "update {$_SERVER['PHP_AUTH_USER']} set hp = {$a[2][1]} where id = 2";
$sql3_2 = "update {$_SERVER['PHP_AUTH_USER']} set atk = {$atk2} where id = 2";
$sql3_3 = "update {$_SERVER['PHP_AUTH_USER']} set def = {$a[2][3]} where id = 2";
$sql3_4 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$a[2][1]} where id = 2";
$sql4_1 = "update {$_SERVER['PHP_AUTH_USER']} set hp = {$hp3} where id = 3";
$sql4_2 = "update {$_SERVER['PHP_AUTH_USER']} set atk = {$a[3][2]} where id = 3";
$sql4_3 = "update {$_SERVER['PHP_AUTH_USER']} set def = {$a[3][3]} where id = 3";
$sql4_4 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$hp3} where id = 3";
$sql5_1 = "update {$_SERVER['PHP_AUTH_USER']} set hp = {$a[4][1]} where id = 4";
$sql5_2 = "update {$_SERVER['PHP_AUTH_USER']} set atk = {$a[4][2]} where id = 4";
$sql5_3 = "update {$_SERVER['PHP_AUTH_USER']} set def = {$def4} where id = 4";
$sql5_4 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$a[4][1]} where id = 4";
$sql6_1 = "update {$_SERVER['PHP_AUTH_USER']} set hp = {$hp5} where id = 5";
$sql6_2 = "update {$_SERVER['PHP_AUTH_USER']} set atk = {$atk5} where id = 5";
$sql6_3 = "update {$_SERVER['PHP_AUTH_USER']} set def = {$def5} where id = 5";
$sql6_4 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$hp5} where id = 5";

@$result = pg_query($sql1_1);
 if($result == false){
    print"DATA ACQUISITION ERROR1.1\n";
    exit;
 }

 @$result = pg_query($sql1_2);
 if($result == false){
    print"DATA ACQUISITION ERROR1.2\n";
    exit;
 }

  @$result = pg_query($sql1_3);
 if($result == false){
    print"DATA ACQUISITION ERROR1.3\n";
    exit;
 }

 @$result = pg_query($sql1_4);
 if($result == false){
    print"DATA ACQUISITION ERROR1.4\n";
    exit;
 }

  @$result = pg_query($sql2_1);
 if($result == false){
    print"DATA ACQUISITION ERROR2.1\n";
    exit;
 }

  @$result = pg_query($sql2_2);
 if($result == false){
    print"DATA ACQUISITION ERROR2.2\n";
    exit;
 }

  @$result = pg_query($sql2_3);
 if($result == false){
    print"DATA ACQUISITION ERROR2.3\n";
    exit;
 }

@$result = pg_query($sql2_4);
 if($result == false){
    print"DATA ACQUISITION ERROR2.4\n";
    exit;
 }

@$result = pg_query($sql3_1);
 if($result == false){
    print"DATA ACQUISITION ERROR3.1\n";
    exit;
 }

 @$result = pg_query($sql3_2);
 if($result == false){
    print"DATA ACQUISITION ERROR3.2\n";
    exit;
 }

  @$result = pg_query($sql3_3);
 if($result == false){
    print"DATA ACQUISITION ERROR3.3\n";
    exit;
 }

 @$result = pg_query($sql3_4);
 if($result == false){
    print"DATA ACQUISITION ERROR3.4\n";
    exit;
 }

  @$result = pg_query($sql4_1);
 if($result == false){
    print"DATA ACQUISITION ERROR4.1\n";
    exit;
 }

  @$result = pg_query($sql4_2);
 if($result == false){
    print"DATA ACQUISITION ERROR4.2\n";
    exit;
 }

  @$result = pg_query($sql4_3);
 if($result == false){
    print"DATA ACQUISITION ERROR4.3\n";
    exit;
 }

@$result = pg_query($sql4_4);
 if($result == false){
    print"DATA ACQUISITION ERROR4.4\n";
    exit;
 }

 @$result = pg_query($sql5_1);
 if($result == false){
    print"DATA ACQUISITION ERROR5.1\n";
    exit;
 }

 @$result = pg_query($sql5_2);
 if($result == false){
    print"DATA ACQUISITION ERROR5.2\n";
    exit;
 }

  @$result = pg_query($sql5_3);
 if($result == false){
    print"DATA ACQUISITION ERROR5.3\n";
    exit;
 }

@$result = pg_query($sql5_4);
 if($result == false){
    print"DATA ACQUISITION ERROR5.4\n";
    exit;
 }

  @$result = pg_query($sql6_1);
 if($result == false){
    print"DATA ACQUISITION ERROR6.1\n";
    exit;
 }

  @$result = pg_query($sql6_2);
 if($result == false){
    print"DATA ACQUISITION ERROR6.2\n";
    exit;
 }

  @$result = pg_query($sql6_3);
 if($result == false){
    print"DATA ACQUISITION ERROR6.3\n";
    exit;
 }

@$result = pg_query($sql6_4);
 if($result == false){
    print"DATA ACQUISITION ERROR6.4\n";
    exit;
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


print "<a href=\"kakunin.php\">確認画面へ</a>\n";

print "<a href=\"shuffle.php\">シャッフル!</a>\n";



?>
</form>

</body>
</html>

<?php
include_once("auth.inc");
auth();
?>

<!DOCTYPE html>

<html lang="ja">

<head>
<link rel="stylesheet" type="text/css" href="/penshu4_2020/67190223/ex15/battle1.css">
<title>
戦闘画面1
</title>
<meta charset="utf-8">
</head>

<body>

<h1>戦闘</h1>

<?php

@$con = pg_connect("host=kite.cs.miyazaki-u.ac.jp dbname=endb2022 user=enuser2022 password=???????");
if ($con == false){
  print("DATABASE CONNECTION ERROR\n");
  exit;
}

$sql1 = "select * from {$_SERVER['PHP_AUTH_USER']}";

@$result = pg_query($sql1);
if($result == false){
  print"DATA ACQUISITION ERROR\n";
  exit;
}

$n = 5;
$m = pg_num_rows($result);

for($i = 0; $i < $m; $i++){
  for($j = 0; $j < $n; $j++){
    $a[$i][$j] = pg_fetch_result($result,$i,$j);
  }
}
$myhp = $a[0][4];
$enehp = $a[1][4];

$mikatahp = $a[0][1];
$tekihp = $a[1][1];

$id2 = $a[2][4];
$id3 = $a[3][4];
$id4 = $a[4][4];
$id5 = $a[5][4];

if(isset($_POST['myatk'])){
  if($_POST['myatk'] === "kougeki"){
    $mydmg = $a[1][2] - $a[0][3];

    if($mydmg < 0){
        $mydmg = 0;
    }

    $enedmg = $a[0][2] - $a[1][3];

    if($enedmg < 0){
        $enedmg = 0;
    }

    $myhp = $a[0][4] - $mydmg;

  }
  if($_POST['myatk'] === "thunder"){
    $mydmg = $a[1][2] - $a[0][3];

    if($mydmg < 0){
        $mydmg = 0;
    }

    $enedmg = floor(($a[0][1]+$a[0][2]+$a[0][3]) / 5);

    if($enedmg < 0){
        $enedmg = 0;
    }

    $myhp = $a[0][4] - $mydmg;

  }
  if($_POST['myatk'] === "heal"){
    $mydmg = $a[1][2] - $a[0][3];

    if($mydmg < 0){
        $mydmg = 0;
    }

    $enedmg = 0;

    if($enedmg < 0){
        $enedmg = 0;
    }
  $myhp = $a[0][4] - $mydmg + floor(($a[0][1]+$a[0][3]) / 3);

    if($myhp > $a[0][1]){
        $myhp = $a[0][1];
    }
  }
  //$myhp = 0;
  $enehp = $a[1][4] - $enedmg;
  //$enehp = 40;
}


    $sql1 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$myhp} where id = 0";
    $sql2 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$enehp} where id = 1";
    $sql3 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id2} where id = 2";
    $sql4 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id3} where id = 3";
    $sql5 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id4} where id = 4";
    $sql6 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id5} where id = 5";

    @$result = pg_query($sql1);
     if($result == false){
        print"DATA ACQUISITION ERROR1\n";
        exit;
     }

     @$result = pg_query($sql2);
     if($result == false){
        print"DATA ACQUISITION ERROR2\n";
        exit;
     }

      @$result = pg_query($sql3);
     if($result == false){
        print"DATA ACQUISITION ERROR3\n";
        exit;
     }

      @$result = pg_query($sql4);
     if($result == false){
        print"DATA ACQUISITION ERROR4\n";
        exit;
     }

      @$result = pg_query($sql5);
     if($result == false){
        print"DATA ACQUISITION ERROR5\n";
        exit;
     }

      @$result = pg_query($sql6);
     if($result == false){
        print"DATA ACQUISITION ERROR6\n";
        exit;
     }

     if($myhp <= 0){
         print "あなたの負け\n";
         print "<a href=\"ready.php\">準備画面へ</a>\n";
         $sql3 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id2} where id = 2";
         $sql4 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id3} where id = 3";
         $sql5 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id4} where id = 4";
         $sql6 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id5} where id = 5";
         $sql7 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$mikatahp} where id = 0";
         $sql8 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$tekihp} where id = 1";
         @$result = pg_query($sql7);
         if($result == false){
             print"DATA ACQUISITION ERROR7\n";
             exit;
          }
         @$result = pg_query($sql8);
         if($result == false){
             print"DATA ACQUISITION ERROR8\n";
             exit;
         }
         @$result = pg_query($sql3);
         if($result == false){
             print"DATA ACQUISITION ERROR3\n";
             exit;
             }
         @$result = pg_query($sql4);
         if($result == false){
             print"DATA ACQUISITION ERROR4\n";
             exit;
             }
         @$result = pg_query($sql5);
         if($result == false){
             print"DATA ACQUISITION ERROR5\n";
             exit;
         }
         @$result = pg_query($sql6);
         if($result == false){
             print"DATA ACQUISITION ERROR6\n";
             exit;
             }
         exit;
     }
         if($enehp <= 0){
             print "あなたの勝ち\n";
    print "<a href=\"battle2.php\">次の戦闘へ</a>\n";
         $sql3 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id2} where id = 2";
         $sql4 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id3} where id = 3";
         $sql5 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id4} where id = 4";
         $sql6 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id5} where id = 5";
         $sql7 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$mikatahp} where id = 0";
         $sql8 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$tekihp} where id = 1";
         @$result = pg_query($sql7);
         if($result == false){
             print"DATA ACQUISITION ERROR7\n";
             exit;
          }
         @$result = pg_query($sql8);
         if($result == false){
             print"DATA ACQUISITION ERROR8\n";
             exit;
         }
         @$result = pg_query($sql3);
         if($result == false){
             print"DATA ACQUISITION ERROR3\n";
             exit;
             }
         @$result = pg_query($sql4);
         if($result == false){
             print"DATA ACQUISITION ERROR4\n";
             exit;
             }
         @$result = pg_query($sql5);
         if($result == false){
             print"DATA ACQUISITION ERROR5\n";
             exit;
         }
         @$result = pg_query($sql6);
         if($result == false){
             print"DATA ACQUISITION ERROR6\n";
             exit;
             }
         exit;
         }

pg_free_result($result);
pg_close($con);

print "<tr align=\"right\">";
print "<p>モンスター</p>\n";
print "<ul>\n";
print "<li>HP:".$enehp."</li>";
print "<li>ATK:".$a[1][2]."</li>";
print "<li>DEF:".$a[1][3]."</li>";
print "</ul>\n";
print "</tr>";

print "<p><img src=\"/penshu4_2020/67190223/ex15/surachan.jpg\" usemap=\"#sura\" alt=\"スライム\" width=\"220\" height=\"200\"></p>";
print "<map name=\"suraimu\">";
print "</map>";

$mahou = floor(($a[0][1]+$a[0][2]+$a[0][3]) / 5);
$kaihuku = floor(($a[0][1]+$a[0][3]) / 3);

print "<p>あなた</p>\n";
print "<ul>\n";
print "<li>HP:".$myhp."</li>";
print "<li>ATK:".$a[0][2]."</li>";
print "<li>DEF:".$a[0][3]."</li>";
print "<li>サンダー:".$mahou."</li>";
print "<li>ヒール:".$kaihuku."</li>";
print "</ul>\n";
print "</tr>";

print "<form action=\"battle1.php\" method=\"post\">\n";
print "<ul class = \"yoko\">\n";
print "<li><input type=\"radio\" name =\"myatk\" value=\"kougeki\" checked>こうげき</li>";
print "<li><input type=\"radio\" name =\"myatk\" value=\"thunder\" >サンダー</li>";
print "<li><input type=\"radio\" name =\"myatk\" value=\"heal\" >ヒール</li>";
print "</ul>\n";

print "<input type=\"submit\" value=\"行動決定\">";
print "<p>";
print "<a href=\"shuffle.php\">戦略的撤退＆シャッフル</a>\n";
print "</p>\n";
?>
</form>

</body>
</html>

<?php
include_once("auth.inc");
auth();
?>

<!DOCTYPE html>

<html lang="ja">

<head>
<link rel="stylesheet" type="text/css" href="/penshu4_2020/67190223/ex13/battle.css">
<title>
戦闘画面
</title>
<meta charset="utf-8">
</head>

<body>

<h1>戦闘画面</h1>

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
$myhp = $a[0][1];
$enehp = $a[1][1];


if(isset($_POST['myatk'])){
    $mydmg = $a[1][2] - $a[0][3];

    if($mydmg < 0){
        $mydmg = 0;
    }

    $enedmg = $a[0][2] - $a[1][3];

    if($enedmg < 0){
        $enedmg = 0;
    }

    $myhp = $a[0][4] - $mydmg;
    $enehp = $a[1][4] - $enedmg;
    $id2 = $a[2][4];
    $id3 = $a[3][4];
    $id4 = $a[4][4];
    $id5 = $a[5][4];

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
        print"DATA ACQUISITION ERROR2\n";
        exit;
     }

      @$result = pg_query($sql4);
     if($result == false){
        print"DATA ACQUISITION ERROR2\n";
        exit;
     }

      @$result = pg_query($sql5);
     if($result == false){
        print"DATA ACQUISITION ERROR2\n";
        exit;
     }

      @$result = pg_query($sql6);
     if($result == false){
        print"DATA ACQUISITION ERROR2\n";
        exit;
     }

     $mikatahp = $a[0][1];
     $tekihp = $a[1][1];

if($myhp <= 0){
    print "負け\n";
    print "<a href=\"ready.php\">次へ</a>\n";
         $spl7 ="update {$_SERVER['PHP_AUTH_USER']} set hplog = {$mikatahp} where id = 0";
         $spl8 ="update {$_SERVER['PHP_AUTH_USER']} set hplog = {$tekihp} where id = 1";
         $sql3 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id2} where id = 2";
         $sql4 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id3} where id = 3";
         $sql5 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id4} where id = 4";
         $sql6 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id5} where id = 5";

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
          print"DATA ACQUISITION ERROR2\n";
          exit;
       }

        @$result = pg_query($sql4);
       if($result == false){
          print"DATA ACQUISITION ERROR2\n";
          exit;
       }

        @$result = pg_query($sql5);
       if($result == false){
          print"DATA ACQUISITION ERROR2\n";
          exit;
       }

        @$result = pg_query($sql6);
       if($result == false){
          print"DATA ACQUISITION ERROR2\n";
          exit;
       }
    exit;
}

if($enehp <= 0){
    print "あなたの勝ち\n";
    $spl7 ="update {$_SERVER['PHP_AUTH_USER']} set hplog = {$mikatahp} where id = 0";
    $spl9 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$enehp} where id = 1";
    $sql3 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id2} where id = 2";
    $sql4 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id3} where id = 3";
    $sql5 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id4} where id = 4";
    $sql6 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id5} where id = 5";

    @$result = pg_query($sql7);
     if($result == false){
      print"DATA ACQUISITION ERROR7\n";
      exit;
     }

    @$result = pg_query($sql9);
     if($result == false){
        print"DATA ACQUISITION ERROR9\n";
        exit;
     }

     @$result = pg_query($sql3);
    if($result == false){
       print"DATA ACQUISITION ERROR2\n";
       exit;
    }

     @$result = pg_query($sql4);
    if($result == false){
       print"DATA ACQUISITION ERROR2\n";
       exit;
    }

     @$result = pg_query($sql5);
    if($result == false){
       print"DATA ACQUISITION ERROR2\n";
       exit;
    }

     @$result = pg_query($sql6);
    if($result == false){
       print"DATA ACQUISITION ERROR2\n";
       exit;
    }

     print "<a href=\"battle2.php\">次の戦闘へ\"</a>\n";
    exit;
  }
}

pg_free_result($result);
pg_close($con);


print "<p>モンスター</p>\n";
print "<ul>\n";
print "<li>HP:".$enehp."</li>";
print "<li>ATK:".$a[1][2]."</li>";
print "<li>DEF:".$a[1][3]."</li>";
print "</ul>\n";

print "<p>あなた</p>\n";
print "<ul>\n";
print "<li>HP:".$myhp."</li>";
print "<li>ATK:".$a[0][2]."</li>";
print "<li>DEF:".$a[0][3]."</li>";
print "</ul>\n";


print "<form action=\"battle.php\" method=\"post\">\n";
print "<ul>\n";
print "<li><input type=\"radio\" name =\"myatk\" value=\"{$a[0][1]}\">たたかう</li>";
print "</ul>\n";

print "<input type=\"submit\"　value=\"行動決定\">";
?>
</form>

</body>
</html>
